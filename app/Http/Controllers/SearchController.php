<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KataBenda;
use App\Models\Hipernim;

class SearchController extends Controller
{
    //mencari kata benda yang ada pada database
    public function searchnoun(Request $request)
    {
        
        $kata = $request->input('searchnoun'); // kode untuk menangkap masukan kata yang dimasukkan oleh perngguna
        if($kata){ //baris dibawah untuk memastikan kolom masukan tidak kosong
            $noun = KataBenda::with("relations.hipernim") //melakukan pencarian kata benda berdasar kata yang telah diisikan pada kolom masukan
            ->where('nama_kb', 'LIKE', $kata . '%') 
                            ->get();
            if(count($noun) > 0){ //jika hasil kata benda ditemukan, maka respon ke json 
                return response()->json($noun);
            }
        }
    }

    public function getNoun(Request $request)
    {
        
        $id_kb = $request->input('id_kb');
        
        if($id_kb){

            $noun = KataBenda::with("relations.hipernim")
            // ->where('nama_kb', 'LIKE', '%' . $kata . '%')
            ->where('id_kb', '=', $id_kb)->first();
            // if(count($noun) >0){
                // dd($noun);
                return response()->json($noun);//view('pencarian-noun')->withDetails($noun)->withQuery($kata);
            // } else {
                // Session::flash('error','Maaf kata yang anda cari belum terdapat di basis data kami.');
	            // return view('pencarian-noun');
            // }

        } // else return view('pencarian-noun');
    }

    public function searchhipernim(Request $request)
    {
        
        $hipernim = $request->input('searchhipernim');
        
        if($hipernim){

            $hip=Hipernim::where('hipernim', 'LIKE', $hipernim . '%')
                            ->get();
            if(count($hip) >0){
                // dd($noun);
                return response()->json($hip);//view('pencarian-noun')->withDetails($noun)->withQuery($kata);
            } else {
                // Session::flash('error','Maaf kata yang anda cari belum terdapat di basis data kami.');
	            // return view('pencarian-noun');
            }

        } // else return view('pencarian-noun');
    }

}
