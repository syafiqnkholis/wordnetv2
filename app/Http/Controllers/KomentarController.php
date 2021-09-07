<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KomentarKk;
use App\Models\KomentarKb;
use Auth;
use Redirect;


class KomentarController extends Controller
{
    public function storekomentarkb(Request $request, $id){
        // dd('tes');
        $storekb = KomentarKb::create([
        'komentar_kb' => $request-> masukkankomentarkb,
		'id_kb' => $id,
		'id_user' => Auth::id()
        ]);
        return \Redirect::route('halamanhipernimkonten',$id);
    }

    public function showkomentarkb(){
        $komentarkb = KomentarKb::all();
        return view ('komentarkb',compact('komentarkb'));
    }

    public function storekomentarkk(Request $request, $id){
        // dd('tes');
        $storekk = KomentarKk::create([
        'komentar_kk' => $request-> masukkankomentarkk,
		'id_kk' => $id,
		'id_user' => Auth::id()
        ]);
        return \Redirect::route('halamanhipernimkontenkk',$id);
    }

    public function showkomentarkk(){
        $komentarkk = KomentarKk::all();
        return view ('komentarkk',compact('komentarkk'));
    }

}