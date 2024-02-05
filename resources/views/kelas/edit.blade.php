@extends('layouts.main')

@section('container')
  <div class="container mt-4">
    <h1 class="mb-4">Edit Data Kelas</h1>

    <form method="POST" action="/kelas/update/{{$kelas->id}}">
      @csrf
      <div class="mb-3">
        <label for="kelas" class="form-label">Kelas:</label>
        <input type="text" class="form-control" id="kelas" name="kelas_siswa" value="{{ old('kelas_siswa', $kelas->kelas_siswa)}}" required>
    </div>
      <button type="submit" class="btn btn-primary">Tambah</button>
      <a href="/kelas/all" class="btn btn-secondary">Kembali</a>
    </form>
  </div>
@endsection
