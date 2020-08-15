@extends('layouts.master')
@section('content')
<div class="card mt-2">
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
            <td>{{$pertanyaan->created_at}}</td>
            <td>{{$pertanyaan->updated_at}}</td>
            
            <td style="display: flex;"> 
              <a href="/pertanyaan/{{$pertanyaan->id}}" class="btn btn-info btn-sm">show</a>
              <a href="/pertanyaan/{{$pertanyaan->id}}/edit" class="btn btn-default btn-sm">Edit</a>
                  <form action="/pertanyaan/{{$pertanyaan->id}}" method="post">
                  @csrf
                  @method('DELETE')
                      <input type="submit" value="delete" class="btn btn-danger btn-sm">
                  </form>
            </td>
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