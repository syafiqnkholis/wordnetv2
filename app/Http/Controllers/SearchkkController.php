<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KataKerja;
use App\Models\HipernimsKk;

class SearchkkController extends Controller
{
    public function searchverb(Request $request)
    {
        
        $kata = $request->input('searchverb');
        
        if($kata){

            $verb = KataKerja::with("relations.hipernim")
            // ->where('nama_kb', 'LIKE', '%' . $kata . '%')
            ->where('nama_kk', 'LIKE', $kata . '%')
                            ->get();
            if(count($verb) >0){
                // dd($noun);
                return response()->json($verb);//view('pencarian-noun')->withDetails($noun)->withQuery($kata);
            } else {
                // Session::flash('error','Maaf kata yang anda cari belum terdapat di basis data kami.');
	            // return view('pencarian-noun');
            }

        } // else return view('pencarian-noun');
    }

    public function getVerb(Request $request)
    {
        
        $id_kk = $request->input('id_kk');
        
        if($id_kk){

            $verb = KataKerja::with("relations.hipernim")
            // ->where('nama_kb', 'LIKE', '%' . $kata . '%')
            ->where('id_kk', '=', $id_kk)->first();
            // if(count($noun) >0){
                // dd($verb);
                return response()->json($verb);//view('pencarian-noun')->withDetails($noun)->withQuery($kata);
            // } else {
                // Session::flash('error','Maaf kata yang anda cari belum terdapat di basis data kami.');
	            // return view('pencarian-noun');
            // }

        } // else return view('pencarian-noun');
    }

    public function searchhipernimsKk(Request $request)
    {
        
        $hipernimskk = $request->input('searchhipernimsKk');
        
        if($hipernimskk){

            $hip=HipernimsKk::where('hipernim_kk', 'LIKE', $hipernimskk . '%')
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
