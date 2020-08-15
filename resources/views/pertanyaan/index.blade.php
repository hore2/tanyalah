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
      
        <table id="list-pertanyaan" class="table table-bordered table-striped text-center">
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
        @foreach($pertanyaan as $key => $tanya)
        <tr>
            <td>{{$key+1}} </td>
            <td> {{$tanya->judul}}</td>
            <td> {{$tanya->isi}}</td>
            <td>{{$tanya->created_at}}</td>
            <td>{{$tanya->updated_at}}</td>
            <td> 
            <a href="/pertanyaan/{{$tanya->id}}" class="btn btn-info btn-sm">show</a> 
            <a  class="btn btn-sm btn-dark" href="/mempertanyakan/{{$tanya->id}}/edit">Edit</a>
              <div class="mt-1">
              <form action="/mempertanyakan/{{$tanya->id}}" method="post">
                  @csrf
                  @method('DELETE')
                <input type="submit" value="Delete" class="btn btn-danger btn-sm">
              </form>
              </div>
            </td>
          </tr>
        @endforeach
        </tbody>

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