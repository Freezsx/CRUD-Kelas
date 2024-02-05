@extends('layouts.main')

@section('container')
  <div class="text-center">
    <h1>Ini adalah halaman Students</h1>
    <h1>Data Siswa</h1>
    <a class="btn btn-primary btn-block mb-3" href="/student/create">Add Data</a>

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
          <th>NIS</th>
          <th>Nama</th>
          <th>Tanggal Lahir</th>
          <th>Kelas</th>
          <th>Alamat</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($students as $student)
        <tr>
          <td>{{$student->nis}}</td>
          <td>{{$student->nama}}</td>
          <td>{{$student->tanggal_lahir}}</td>
          <td>{{$student->kelas->kelas_siswa}}</td>
          <td>{{$student->alamat}}</td>
          <td>
            <a class="btn btn-primary" href="/student/detail/{{ $student->id }}">Detail</a>
            <a class="btn btn-warning" href="/student/edit/{{ $student->id }}">Edit</a>
            <form action="/student/delete/{{ $student->id }}" method="POST" class="d-inline">
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
