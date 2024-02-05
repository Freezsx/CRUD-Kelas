@extends('layouts.main')

@section('container')
  <div class="container mt-4">
    <h1 class="mb-3">Detail Kelas</h1>
    
    <div class="card">
      <div class="card-body">
        <p class="card-text">Kelas : {{ $kelas->kelas_siswa }}</p>
        
        <a href="/kelas/all" class="btn btn-primary">Back</a>
      </div>
    </div>
  </div>
@endsection