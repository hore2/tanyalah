@extends('layouts.master')
@section('content')
<div class="card">
      <div class="card-header">
        <h3 class="card-title">Data Pertanyaan</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
      @if(session('success'))
        <div class="alert alert-success">
        {{ session('success')}}
        </div>
      @endif
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
            <td>{{$pertanyaan->tgl_dibuat}}</td>
            <td>{{$pertanyaan->tgl_diperbarui}}</td>
            <td> <a href="/pertanyaan/{{$pertanyaan->tanya_id}}" class="btn btn-info btn-sm">show</a> </td>
          </tr>
         @endforeach
        </tbody>

        </table>
      </div>
      <!-- /.card-body -->
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