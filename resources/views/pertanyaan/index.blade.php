@extends('layouts.master')
@section('content')

<div class="card mt-2">
  <div class="card">
      <div class="card-header">
      <td style="display: flex;">
          <h3 class="card-title">Data Pertanyaan</h3>
          <a class="form-inline my-2 my-lg-0 btn btn-primary mb-2" href="/pertanyaan/create">Buat pertanyaan baru</a>
      </td>
          
      </div>
      <!-- /.card-header -->
      <div class="card-body">
      @if(session('success'))
          <div class="alert alert-success">
          {{ session('success')}}
          </div>
      @endif
<<<<<<< HEAD
      <a class="btn btn-primary mb-2" href="/pertanyaan/create">Buat pertanyaan baru</a>
        <table id="list-pertanyaan" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Isi</th>
            <th>Tanggal Dibuat</th>
            <th>Tanggal Diperbarui</th>
            <th>Aksi</th>
          </tr>
          </thead>
          <tbody>
         @foreach($pertanyaan as $key => $pertanyaan)
         <tr>
            <td>{{$key+1}} </td>
            <td> {{$pertanyaan->judul}}</td>
            <td> {{$pertanyaan->isi}}</td>
            <td>{{$pertanyaan->created_at}}</td>
            <td>{{$pertanyaan->updated_at}}</td>
            <td> <a href="/pertanyaan/{{$pertanyaan->tanya_id}}" class="btn btn-info btn-sm">show</a> </td>
          </tr>
         @endforeach
        </tbody>
=======
>>>>>>> f684de98008e2818a55c63c20b30eb1d761240fb

      @foreach($pertanyaan as $key => $pertanyaan)
          <h5 class="card-title"> <a href="/pertanyaan/{{$pertanyaan->id}}">{{$pertanyaan->judul}}</a> </h5>
          <p class="card-text">{{$pertanyaan->isi}}</p>
          <!-- <a href="/pertanyaan/{{$pertanyaan->id}}" class="btn btn-info btn-sm">show</a> -->
      @endforeach
      </div>
      
  </div>
</div>


@endsection
@push('scripts')
<script src="{{ asset('/adminlte/plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{ asset('/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
<script>
  $(function () {
    $("#example1").DataTable();
  });
</script>
@endpush