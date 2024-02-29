@extends('layouts.partial.dashboard')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Welcome👋, {{ Auth::user()->name }}</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
        </div>
        <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle d-flex align-items-center gap-1">
            <svg class="bi"><use xlink:href="#calendar3"/></svg>
            This week
        </button>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="card mt-3">
            <div class="card-header">
                Informasi Guru
            </div>
            <div class="card-body">
                <ul>
                    <li>Jumlah Guru: 65</li>
                    <li>Rata-rata Absensi: 95%</li>
                    <li>Acara Mendatang: Pelatihan Guru (28 Februari 2024)</li>
                </ul>
            </div>
        </div>
        <div class="card mt-3">
            <div class="card-header">
                Informasi Siswa
            </div>
            <div class="card-body">
                <ul>
                    <li>Jumlah Siswa: 500</li>
                    <li>Rata-rata Nilai: 100</li>
                    <li>Acara Mendatang: Ujian Tengah Semester</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const ctx = document.getElementById('myChart');
    const myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'],
            datasets: [{
                data: [15339, 21345, 18483, 24003, 23489, 24092, 12034],
                lineTension: 0,
                backgroundColor: 'transparent',
                borderColor: '#007bff',
                borderWidth: 4,
                pointBackgroundColor: '#007bff'
            }]
        },
        options: {
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    boxPadding: 3
                }
            }
        }
    });
});
</script>
@endsection