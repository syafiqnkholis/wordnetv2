<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Hipernim;
use App\Models\KataBenda;
use App\Models\Relation;
use App\Models\Kategori;
use PhpParser\Builder\Param;
use Illuminate\Support\Facades\Session;
use Redirect;

class NounController extends Controller{

    //Untuk membuat kata benda baru
    public function simpannoun(Request $request){

        // if(isset($request->nama) && isset($request->desc)){
        $hipernims = $request->hipernims;
        $kb =  KataBenda::create([
            'id_kb' => "0",
            'nama_kb' => $request->nama,
            'desc_kb' => $request->desc,
            'id_kategori' => $request->id_kategori
        ]);

        $kedalaman = 1;
        foreach ($hipernims as $key=> $val){
            $hipernim = explode("___", $val);
            
            if($hipernim[0] == 0){ // jika id = 0 maka buat hipernim baru
                $result = new Hipernim;
                $result->hipernim = $hipernim[1];
                $result->desc_hipernim = $hipernim[2];
                $result->save();
                $id_hipernim = $result->id_hipernim;
            } else {
                $id_hipernim = $hipernim[0];
            }
            
            $relation = new Relation;
            $relation->id_hipernim = $id_hipernim;
            $relation->id_kb= $kb->id_kb;
            $relation->kedalaman= $kedalaman;
            $relation->save();
            $kedalaman++;
        }
    }

     //untuk menampilkan form kategori di halaman kbbaru

     public function showNewNounForm(){
        $kategori = Kategori::get();
        return view('kbbaru')->with(['kategori'=>$kategori]);
    }

    //Menampilkan semua kata benda
    public function tampilnoun(){
        $tampil= KataBenda::all();
        $data["data"] = $tampil;
        return response()->json($data);
    }

    //Menghapus Kata benda
    public function hapusnoun($id){

        $relations = Relation::where("id_kb", $id)->get();
        foreach($relations as $relation){
            $result = Relation::where("id_hipernim", $relation->id_hipernim)->count();
            if($result < 2){ //make sure the hipernim just used in one noun
                $id_hipernim = $relation->id_hipernim;
                $relation->delete(); //detete the relation
                Hipernim::where("id_hipernim", $id_hipernim)->delete(); //and delete the hipernim
            } else { //delete the relation but not the hipernim
                $relation->delete();
            }
        }

        KataBenda::where('id_kb',$id)->delete();
    }

    //Menampilkan sebuah kata benda yang dipilih beserta hipernimnya (halaman hasil pencarian kata benda)
    public function display($id){   
        $noun = KataBenda::with("relations.hipernim")
            ->where('id_kb', '=', $id)->first();

        return view('halamanhipernimkonten', compact('noun'));
    }

    //Menghitung jarak kata
    public function jarak (Request $request){
        $pertama = $request->input('katasatu');
        $kedua = $request->input('katadua');
        if($pertama && $kedua){
            $kata1 = KataBenda::with("relations.hipernim")
                    ->where('nama_kb', $pertama )
                    ->first();
            $kata2 = KataBenda::with("relations.hipernim")
                    ->where('nama_kb',  $kedua  )
                    ->first();
            if($kata1 && $kata2){
                $kedalaman = 9999;
                foreach($kata1->relations as $satu){
                    foreach($kata2->relations as $dua){
                        if(strtolower($satu->hipernim) == strtolower($dua->hipernim)){

                            // dd('ada');
                            $temp = $satu->kedalaman + $dua->kedalaman;
                            if($temp < $kedalaman){
                                $kedalaman = $temp;
                            }
                        }
                    } 
                }
                if ($kedalaman != 9999){
                    return view('halamanjarakkata', compact('kedalaman'));
                }else {
                    Session::flash('error1','Maaf jarak kata tidak dapat ditemukan.');
                    return view('halamanjarakkata');
                }
            }else{
            Session::flash('error2','Maaf kata yang anda cari tidak terdapat di basis data kami.');
            return view('halamanjarakkata');
            }
        } else {
            Session::flash('error3','Isikan kedua form.');
            return view('halamanjarakkata');
        }
    }

    //Menampilkan sebuah kata benda yang akan diedit beserta hipernimnya
    public function edit ($id){
        $noun = KataBenda::with("relations.hipernim")
            ->where('id_kb', '=', $id)->first();
            $kategori = Kategori::get();
        return view('kbedit')->with(['noun'=>$noun, 'id'=>$id,'kategori'=>$kategori]);
    }


    public function editFormProcess(Request $request){
        $action = $request->action;
        // dd($request);

        if($action == "hipernim"){
            //Menambah hipernim saat edit
            //-------------------------------
            if(isset($request->hipernim) && isset($request->desc_hipernim)){
                $kedalaman = 1;
                //Mendapatkan kedalaman paling besar
                $noun = Relation::where('id_kb', '=', $request->id_kb)->orderBy('kedalaman','DESC')->first();
                if($noun) $kedalaman = $noun->kedalaman+1;
                if(isset($request->id_hipernim)){
                    $id_hipernim = $request->id_hipernim;
                } else {
                    //Menyimpan Hipernim
                    $result = new Hipernim;
                    $result->hipernim = $request->hipernim;
                    $result->desc_hipernim = $request->desc_hipernim;
                    $result->save();
                    $id_hipernim = $result->id_hipernim;
                }
                //Menyimpan relasi antara kata benda dan hipernim
                $relation = new Relation;
                $relation->id_hipernim = $id_hipernim;
                $relation->id_kb= $request->id_kb;
                $relation->kedalaman= $kedalaman;
                $relation->save();
                Session::forget('hipernim');
                Session::forget('desc_hipernim');
            } else {
                if($request->hipernim == "") Session::flash('error1','Nama hipernim tidak boleh kosong.');
                else Session::flash('hipernim',$request->hipernim);
                if($request->desc_hipernim == "") Session::flash('error2','Deskripsi hipernim tidak boleh kosong.');
                else Session::flash('desc_hipernim',$request->desc_hipernim);
            }
            return \Redirect::route('kbedit', $request->id_kb);
        } else {
            //Mengubah kata benda
            if(isset($request->katabaru) && isset($request->descbaru)){
            $noun = KataBenda::find($request->id_kb);
            $noun->nama_kb = $request->katabaru;
            $noun->desc_kb = $request->descbaru;
            $noun->id_kategori = $request->id_kategori;
            $noun->save();
            return \Redirect::route('kbtable');
            }else{
                if($request->katabaru == "") Session::flash('error3','Nama tidak boleh kosong.');
                else Session::flash('katabenda',$request->katabaru);
                if($request->descbaru == "") Session::flash('error4','Deskripsi tidak boleh kosong.');
                else Session::flash('desc',$request->descbaru);
                return \Redirect::route('kbedit', $request->id_kb);
            }      
        }
    }

    //Menghapus relasi hipernim saat edit
    public function deleteHipernim($id){
        $relasiYangAkanDihapus = Relation::find($id);
        if($relasiYangAkanDihapus){
            $id_kb = $relasiYangAkanDihapus->id_kb;
            $relasiYangAkanDihapus->delete();

            //Mengurangi kedalaman
            $relations = Relation::where("id_kb", $id_kb)->get();
            foreach($relations as $relation){
                if($relation->kedalaman > $relasiYangAkanDihapus->kedalaman){
                    $relation->kedalaman = $relation->kedalaman-1;
                    $relation->save();
                }
            }
            return \Redirect::route('kbedit', $id_kb);
        } else {
            return \Redirect::route('kbtable', $id_kb);
        }
    }
}