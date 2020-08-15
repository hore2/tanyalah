@extends('layouts.master')

@section('content')

<div class="card mt-2">

    <div class="card-body ">
        <h4 class="card-title">{{ $pertanyaan->judul }}</h4>
        <p> {{ $pertanyaan->isi }}</p>

        <hr>

        <div class="button mb-1" style="display:flex;" > 
            <a href="/pertanyaan/{{$pertanyaan->id}}/edit" class="btn btn-outline-info btn-sm">edit</a>
            <form action="/pertanyaan/{{$pertanyaan->id}}" method="post">
            @csrf
            @method('DELETE')
                <input type="submit" value="delete" class="btn btn-outline-danger btn-sm">
            </form>
        </div>
    </div>

    <h5 class="ml-3">Jawaban kamu</h5>
    <div class="card-body jawaban">
        <form role="form" action="/pertanyaan/{{$pertanyaan->id}}" method="POST" accept-charset="utf-8">
            @csrf
            @method('POST')
            <div class="form-group">
                <textarea class="form-control" rows="5" value="{{ old('isi'),'' }}" placeholder="tulis jawabanmu disini ya ..." id="isi" name="isi"></textarea>
            </div>
            <div class="box-footer" >
                <button type="submit" class="btn btn-outline-info">Simpan ya</button>
            </div>
        </form>
    </div>
    

    <h5 class="ml-1">Semua Jawaban<h5>

    <div class="card-body" >
        <h5>coba h5</h5>
        <p> jawaban kedua dari akun lain alsjw adskjnwail wuabilc cwicBKAB DAIBCWIA wbcaoivb suadbiisb uabdsciudwaheiu ciabdciuw bfiubwiua wiovbafh ifewgfeiwu  iwefiewgf idadiweurho oqewrypy</p>   
    </div>


</div>

@endsection