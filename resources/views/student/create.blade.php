@extends('layouts.main')

@section('container')
  <div class="container mt-4">
    <h1 class="mb-4">Add Data Student</h1>

    <form method="POST" action="/student/store">
      @csrf
      <div class="mb-3">
        <label for="nis" class="form-label">NIS:</label>
        <input type="number" class="form-control" id="nis" name="nis" value="{{ old('nis')}}" required>
      </div>

      <div class="mb-3">
        <label for="nama" class="form-label">Nama:</label>
        <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama')}}" required>
      </div>

      <div class="mb-3">
        <label for="tanggal_lahir" class="form-label">Tanggal Lahir:</label>
        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir')}}" required>
      </div>

      <div class="mb-3">
        <label for="kelas" style="margin-bottom: 15px; margin-top: 25px;">Kelas</label>
        <select class="form-select" name="kelas_id">
            @foreach ($kelas as $grade)
                <option name="kelas_id" value="{{ $grade->id }}">{{ $grade->kelas_siswa }}</option>
            @endforeach
        </select>
    </div>

      <div class="mb-3">
        <label for="alamat" class="form-label">Alamat:</label>
        <textarea class="form-control" id="alamat" name="alamat" rows="3" value="{{ old('alamat')}}" required></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Tambah</button>
      <a href="/student/all" class="btn btn-secondary">Kembali</a>
    </form>
  </div>
@endsection
