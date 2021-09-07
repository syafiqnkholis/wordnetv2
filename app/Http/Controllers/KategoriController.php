<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\KataBenda;
use App\Models\KataKerja;
use Redirect;


class KategoriController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function createKategori(Request $request){
        $kategori = Kategori::create([
            'nama_kategori' => $request -> kategori 
        ]);

        return \Redirect::route('kategori');

    }

    public function showKategori(){
        $kategori = Kategori::get();
        return view('kategoritable', compact('kategori'));
    }

    //Menghapus Kategori
    public function delete($id){
        $kataBenda = KataBenda::where("id_kategori", $id)->count();
        $kataKerja = KataKerja::where("id_kategori", $id)->count();

        if($kataBenda < 1 && $kataKerja < 1){
            Kategori::find($id)->delete();
            $data["code"] = 200;
            return response()->json($data);
        } else {
            $data["code"] = 500;
            return response()->json($data);
        }
    }

    public function edit(Request $request, $id){
        $kategori = Kategori::find($id);
        $kategori->update([
            'nama_kategori' => $request->category_name
        ]);
        if($kategori){
            $data["code"] = 200;
            return response()->json($data);
        } else {
            $data["code"] = 500;
            return response()->json($data);
        }
    }

}
