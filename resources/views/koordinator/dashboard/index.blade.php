@extends('layouts.admin')

@section('content')

<div class="dutio-page-header">
    <h1>Dashboard Koordinator 👨‍💼</h1>
    <p class="text-muted">
        Selamat datang, kelola seluruh aktivitas piket penghuni asrama.
    </p>
</div>

<div class="dutio-stat-row">

    <div class="dutio-stat dutio-stat--primary">
        <div>
            <div class="dutio-stat-value">{{ $statistik['kamar'] }}</div>
            <div class="dutio-stat-label">Total Kamar</div>
        </div>
        <div class="dutio-stat-icon">🏠</div>
    </div>

    <div class="dutio-stat dutio-stat--success">
        <div>
            <div class="dutio-stat-value">{{ $statistik['penghuni'] }}</div>
            <div class="dutio-stat-label">Penghuni</div>
        </div>
        <div class="dutio-stat-icon">👥</div>
    </div>

    <div class="dutio-stat dutio-stat--warning">
        <div>
            <div class="dutio-stat-value">{{ $statistik['laporan'] }}</div>
            <div class="dutio-stat-label">Laporan Masuk</div>
        </div>
        <div class="dutio-stat-icon">📷</div>
    </div>

    <div class="dutio-stat dutio-stat--danger">
        <div>
            <div class="dutio-stat-value">{{ $statistik['crewpoint'] }}</div>
            <div class="dutio-stat-label">Crew Point</div>
        </div>
        <div class="dutio-stat-icon">⭐</div>
    </div>

</div>

<div class="row g-3">

    <div class="col-lg-7">

        <div class="dutio-card">

            <div class="dutio-card-header">
                <h3>Laporan Terbaru</h3>
            </div>

            <div class="dutio-card-body">

                <table class="table align-middle">

                    <thead>

                        <tr>
                            <th>Kamar</th>
                            <th>Area</th>
                            <th>Jam</th>
                        </tr>

                    </thead>

                    <tbody>

                        @foreach($laporanTerbaru as $laporan)

                        <tr>

                            <td>
                                <strong>{{ $laporan['kamar'] }}</strong>
                            </td>

                            <td>
                                {{ $laporan['area'] }}
                            </td>

                            <td>
                                {{ $laporan['jam'] }}
                            </td>

                        </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        </div>

    </div>

    <div class="col-lg-5">

        <div class="dutio-card">

            <div class="dutio-card-header">
                <h3>Aksi Cepat</h3>
            </div>

            <div class="dutio-card-body d-grid gap-2">

                <a href="#" class="btn btn-dutio-primary">
                    📅 Kelola Pembagian Piket
                </a>

                <a href="#" class="btn btn-dutio-success">
                    ✅ Kelola Checklist
                </a>

                <a href="#" class="btn btn-warning text-white">
                    📷 Verifikasi Laporan
                </a>

                <a href="#" class="btn btn-info text-white">
                    👥 Kelola Pengguna
                </a>

            </div>

        </div>

    </div>

</div>

@endsection