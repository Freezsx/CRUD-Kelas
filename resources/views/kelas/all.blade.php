@extends('layouts.main')

@section('container')
  <div class="text-center">
    <h1>Ini adalah halaman Kelas</h1>
    <h1>Data Kelas</h1>
    <a class="btn btn-primary btn-block mb-3" href="/kelas/create">Add Data Kelas</a>

    @if(session('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert" style="max-width: 400px; text-align: center; margin: 10px; margin-left: 37%;">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif
  </div>

  <div class="table-responsive px-5"> 
    <table class="table table-bordered table-striped mx-auto mb-3">
      <thead class="table-primary">
        <tr>
          <th>Kelas</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($kelas as $kelass)
        <tr>
          <td>{{$kelass["kelas_siswa"]}}</td>
          <td>
            <a class="btn btn-primary" href="/kelas/detail/{{ $kelass->id }}">Detail</a>
            <a class="btn btn-warning" href="/kelas/edit/{{ $kelass->id }}">Edit</a>
            <form action="/kelas/delete/{{ $kelass->id }}" method="POST" class="d-inline">
              @method('delete')
              @csrf
              <button onclick="return confirm('Apakah kamu ingin menghapus data siswa ini ? ')" class="btn btn-danger">Delete</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection
