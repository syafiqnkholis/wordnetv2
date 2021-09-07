<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KataBenda;
use App\Models\Hipernim;

class SearchController extends Controller
{
    public function searchnoun(Request $request)
    {
        
        $kata = $request->input('searchnoun');
        
        if($kata){

            $noun = KataBenda::with("relations.hipernim")
            ->where('nama_kb', 'LIKE', $kata . '%')
                            ->get();
            if(count($noun) >0){
                return response()->json($noun);
            } else {
                // Session::flash('error','Maaf kata yang anda cari belum terdapat di basis data kami.');
	            // return view('pencarian-noun');
            }

        } // else return view('pencarian-noun');
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
