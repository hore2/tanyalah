<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class JawabanController extends Controller
{
    // index / halaman awal
    // public function index(){
    //     $jawaban = DB::table('jawaban')->get();
    //     // dd($jawaban);
    //     return view('pertanyaan.index', compact('pertanyaan'));
    // }

    // menambah list pertanyaan
    public function store(Request $request){
        $query = DB::table('jawaban')->insert([
            "isi" => $request["isi"]
        ]);
        // dd($jawaban);     
        return redirect ('/pertanyaan/{id}')->with('success', 'Jawaban berhasil ditambahkan');
    }

    // // menuju halaman create 
    // public function create(){
    //     return view('pertanyaan.create');
    // }

    // menampilkan pertanyaan dengan id tertentu
    // public function show($id){
    //     $pertanyaan = DB::table('pertanyaan')->where('id', $id)->first();
    //     // dd($pertanyaan);
    //     return view('pertanyaan.show', compact('pertanyaan'));
    // }

    // update list pertanyaan / edit
    public function update($id, Request $request){
        $query = DB::table('jawaban')
                    -> where('id', $id)
                    -> update([
                        'isi' => $request['isi'],
                    ]);        
        return redirect ('/pertanyaan.show')->with('success', 'Pertanyaan berhasil diperbaharui');
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
