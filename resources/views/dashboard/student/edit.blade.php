@extends('layouts.partial.dashboard')

@section('container')
  <div class="container mt-4">
    <h1 class="mb-4">Edit Data Student</h1>

    <form method="POST" action="/dashboard/student/update/{{$student->id}}">
      @csrf
      <div class="mb-3">
        <label for="nis" class="form-label">NIS:</label>
        <input type="number" class="form-control" id="nis" name="nis" value="{{ old('nis', $student->nis)}}" readonly required>
      </div>

      <div class="mb-3">
        <label for="nama" class="form-label">Nama:</label>
        <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama', $student->nama)}}"required>
      </div>

      <div class="mb-3">
        <label for="tanggal_lahir" class="form-label">Tanggal Lahir:</label>
        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir', $student->tanggal_lahir)}}" required>
      </div>

      <div class="mb-3">
        <label for="kelas" style="margin-bottom: 15px; margin-top: 25px;">Kelas</label>
        <select class="form-select" name="kelas_id">
          @foreach ($kelas as $grade)
              <option value="{{ $grade->id }}" {{ $grade->id == $student->kelas_id ? 'selected' : '' }}>{{ $grade->kelas_siswa }}</option>
          @endforeach
      </select>
    </div>

      <div class="mb-3">
        <label for="alamat" class="form-label">Alamat:</label>
        <textarea class="form-control" id="alamat" name="alamat" rows="3">{{old('alamat', $student->alamat)}}</textarea>
      </div>
      <button type="submit" class="btn btn-primary">Edit Data</button>
      <a href="/dashboard/student/all" class="btn btn-secondary">Kembali</a>
    </form>
  </div>
@endsection
