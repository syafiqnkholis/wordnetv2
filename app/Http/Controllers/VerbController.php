<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\HipernimsKk;
use App\Models\KataKerja;
use App\Models\RelationsKk;
use App\Models\Kategori;
use PhpParser\Builder\Param;
use Illuminate\Support\Facades\Session;
use Redirect;

class VerbController extends Controller{

    //Untuk membuat kata kerja baru
    public function simpanverb(Request $request){

        // if(isset($request->nama) && isset($request->desc)){
        $hipernims = $request->hipernims;
        $kk =  KataKerja::create([
            'id_kk' => "0",
            'nama_kk' => $request->nama,
            'desc_kk' => $request->desc,
            'id_kategori' => $request->id_kategori
        ]);

        $kedalaman = 1;
        foreach ($hipernims as $key=> $val){
            $hipernim = explode("___", $val);
            
            if($hipernim[0] == 0){ // jika id = 0 maka buat hipernim baru
                $result = new HipernimsKk;
                $result->hipernim_kk = $hipernim[1];
                $result->desc_hipernim_kk = $hipernim[2];
                $result->save();
                $id_hipernim = $result->id_hipernim_kk;
            } else {
                $id_hipernim = $hipernim[0];
            }
            
            $relation = new RelationsKk;
            $relation->id_hipernim = $id_hipernim;
            $relation->id_kk= $kk->id_kk;
            $relation->kedalaman= $kedalaman;
            $relation->save();
            $kedalaman++;
        }
    }

     //untuk menampilkan form kategori di halaman kkbaru

     public function showNewVerbForm(){
        $kategori = Kategori::get();
        return view('kkbaru')->with(['kategori'=>$kategori]);
    }

    //Menampilkan semua kata kerja
    public function tampilverb(){
        $tampil= KataKerja::all();
        $data["data"] = $tampil;
        return response()->json($data);
    }

    //Menghapus Kata kerja
    public function hapusverb($id){
        $relationskk = RelationsKk::where("id_kk", $id)->get();
        foreach($relationskk as $relationkk){
            $result = RelationsKk::where("id_hipernim", $relationkk->id_hipernim)->count();
            if($result < 2){ //make sure the hipernim just used in one noun
                $id_hipernim = $relationkk->id_hipernim;
                $relationkk->delete(); //detete the relation
                HipernimsKk::where("id_hipernim_kk", $id_hipernim)->delete(); //and delete the hipernim
            } else { //delete the relation but not the hipernim
                $relationkk->delete();
            }
        }
        KataKerja::where('id_kk',$id)->delete();
    }

    //Menampilkan sebuah kata kerja beserta hipernimnya
    public function display($id){   
        $verb = KataKerja::with("relations.hipernim")
            ->where('id_kk', '=', $id)->first();

        return view('halamanhipernimkontenkk', compact('verb'));
    }

    //Menghitung jarak kata
    public function jarak (Request $request){

        $pertama = $request->input('katasatu');
        $kedua = $request->input('katadua');

        if($pertama && $kedua){

            $kata1 = KataKerja::with("relations.hipernim")
                    ->where('nama_kk', $pertama )
                    ->first();
            
            $kata2 = KataKerja::with("relations.hipernim")
                    ->where('nama_kk',  $kedua  )
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

    //Menampilkan sebuah kata kerja yang akan diedit beserta hipernimnya
    public function edit ($id){
        $verb = KataKerja::with("relations.hipernim")
            ->where('id_kk', '=', $id)->first();
            $kategori = Kategori::get();
            // dd($verb);
        return view('kkedit')->with(['verb'=>$verb, 'id'=>$id,'kategori'=>$kategori]);
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
                $verb = RelationsKk::where('id_kk', '=', $request->id_kk)->orderBy('kedalaman','DESC')->first();
                if($verb) $kedalaman = $verb->kedalaman+1;
        
                if(isset($request->id_hipernim)){
                    $id_hipernim = $request->id_hipernim;
                } else {
                    //Menyimpan Hipernim
                    $result = new HipernimsKk;
                    $result->hipernim_kk = $request->hipernim;
                    $result->desc_hipernim_kk = $request->desc_hipernim;
                    $result->save();
                    $id_hipernim = $result->id_hipernim_kk;
                }
        
                //Menyimpan relasi antara kata benda dan hipernim
                $relation = new RelationsKk;
                $relation->id_hipernim = $id_hipernim;
                $relation->id_kk= $request->id_kk;
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
            return \Redirect::route('kkedit', $request->id_kk);
        } else {
            //Mengubah kata benda
            //-------------------------------

            if(isset($request->katabaru) && isset($request->descbaru)){
            $verb = KataKerja::find($request->id_kk);
            $verb->nama_kk = $request->katabaru;
            $verb->desc_kk = $request->descbaru;
            $verb->id_kategori = $request->id_kategori;
            $verb->save();
            return \Redirect::route('kktable');

            }else{
                if($request->katabaru == "") Session::flash('error3','Nama tidak boleh kosong.');
                else Session::flash('katakerja',$request->katabaru);
                if($request->descbaru == "") Session::flash('error4','Deskripsi tidak boleh kosong.');
                else Session::flash('desc_kk',$request->descbaru);
                return \Redirect::route('kkedit', $request->id_kk);
            }
        }
    }

    //Menghapus relasi hipernim saat edit
    public function deleteHipernim($id){
        $relasiYangAkanDihapus = RelationsKk::find($id);
        if($relasiYangAkanDihapus){
            $id_kk = $relasiYangAkanDihapus->id_kk;
            $relasiYangAkanDihapus->delete();

            //Mengurangi kedalaman
            $relations = RelationsKk::where("id_kk", $id_kk)->get();
            foreach($relations as $relation){
                if($relation->kedalaman > $relasiYangAkanDihapus->kedalaman){
                    $relation->kedalaman = $relation->kedalaman-1;
                    $relation->save();
                }
            }
            return \Redirect::route('kkedit', $id_kk);
        } else {
            return \Redirect::route('kktable', $id_kk);
        }
    }
}