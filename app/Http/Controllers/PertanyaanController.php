<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PertanyaanController extends Controller
{
    //Auth
    public function __construct(){
        $this->middleware('auth');
    }

    // index / halaman awal
    public function index(){
        $pertanyaan = DB::table('pertanyaan')->get();
        // dd($pertanyaan);
        return view('pertanyaan.index', compact('pertanyaan'));
    }

    // menambah list pertanyaan
    public function store(Request $request){
        $pertanyaan = Pertanyaan::create([
            "judul" => $request["judul"],
            "isi" => $request["isi"]
        ]);
        // dd($pertanyaan);     
        return redirect ('/pertanyaan')->with('success', 'Pertanyaan berhasil ditambahkan');
    }

    // menuju halaman create 
    public function create(){
        return view('pertanyaan.create');
    }

    // menampilkan pertanyaan dengan id tertentu
    public function show($id){
        $pertanyaan = DB::table('pertanyaan')->where('id', $id)->first();
        // dd($pertanyaan);
        return view('pertanyaan.show', compact('pertanyaan'));
    }

    // update list pertanyaan
    public function update($id, Request $request){
        $query = DB::table('pertanyaan')
                    -> where('id', $id)
                    -> update([
                        'judul' => $request['judul'],
                        'isi' => $request['isi'],
                    ]);        
        return redirect ('/pertanyaan')->with('success', 'Pertanyaan berhasil diperbaharui');
    }

    // hapus list pertanyaan
    public function destroy($id){
        $query = DB::table('pertanyaan')->where('id', $id)->delete();

        return redirect ('/pertanyaan')->with('success', 'Berhasil dihapus');
    }

    public function edit($id){
        $pertanyaan = DB::table('pertanyaan')->where('id', $id)->first();
        // dd($pertanyaan);

        return view('pertanyaan.edit', compact('pertanyaan'));
    }
}
