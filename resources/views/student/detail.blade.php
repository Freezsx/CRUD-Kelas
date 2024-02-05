@extends('layouts.main')

@section('container')
  <div class="container mt-4">
    <h1 class="mb-3">Detail Siswa</h1>
    
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">NIS: {{ $students->nis }}</h5>
        <p class="card-text">Nama: {{ $students->nama }}</p>
        <p class="card-text">Tanggal Lahir: {{ $students->tanggal_lahir }}</p>
        <p class="card-text">Kelas: {{ $students->kelas->kelas_siswa }}</p>
        <p class="card-text">Alamat: {{ $students->alamat }}</p>
        
        <a href="/student/all" class="btn btn-primary">Back</a>
      </div>
    </div>
  </div>
@endsection
