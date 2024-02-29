@extends('layouts.partial.dashboard')

@section('container')
  <div class="text-center">
    <h1>Ini adalah halaman Students</h1>
    <h1>Data Siswa</h1>
    <a class="btn btn-primary btn-lg mb-3" href="/dashboard/student/create">Tambah Data</a>

    @if(session('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert" style="max-width: 400px; text-align: center; margin: 10px auto;">
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
          <td class="d-flex">
            <a class="btn btn-primary btn-sm me-1 d-flex align-items-center justify-content-center" href="/dashboard/student/detail/{{ $student->id }}"><i class="bi bi-info-circle me-1"></i> Detail</a>
            <a class="btn btn-warning btn-sm me-1 d-flex align-items-center justify-content-center" href="/dashboard/student/edit/{{ $student->id }}"><i class="bi bi-pencil-square me-1"></i> Edit</a>
            <form action="/dashboard/student/delete/{{ $student->id }}" method="POST" class="d-inline">
              @method('delete')
              @csrf
              <button onclick="return confirm('Apakah kamu ingin menghapus data siswa ini ? ')" class="btn btn-danger btn-sm d-flex align-items-center justify-content-center"><i class="bi bi-trash me-1"></i> Delete</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection
