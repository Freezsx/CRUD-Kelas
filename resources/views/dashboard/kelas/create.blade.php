@extends('layouts.partial.dashboard')

@section('container')

  <div class="container mt-4">
    <h1 class="mb-4">Add Data Kelas</h1>

    <form method="POST" action="/dashboard/kelas/add">
      @csrf
      <div class="mb-3">
        <label for="kelas" class="form-label">Kelas:</label>
        <input type="text" class="form-control" id="kelas" name="kelas_siswa" value="{{ old('kelas_siswa')}}" required>
      </div>
      <button type="submit" class="btn btn-primary">Tambah</button>
      <a href="/dashboard/kelas/all" class="btn btn-secondary">Kembali</a>
    </form>
  </div>

@endsection
