@extends('layouts.main')

@section('container')
    <h1>Ini adalah halaman about</h1>
    <table>
    <h2>{{ $nama}}</h2>
    <h2>{{ $kelas}}</h2>
    <img src="/img/bbb.jpg" width="200">
    </table>
@endsection