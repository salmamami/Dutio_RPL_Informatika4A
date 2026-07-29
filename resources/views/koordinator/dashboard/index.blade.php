@extends('layouts.admin')

@section('content')

<div class="dutio-page-header">
    <h1>Dashboard Koordinator 👨‍💼</h1>

    <p class="text-muted">
        Selamat datang, kelola seluruh aktivitas piket penghuni asrama.
    </p>
</div>

<div class="dutio-stat-row">

    {{-- Total Kamar --}}
    <div class="dutio-stat dutio-stat--primary">

        <div>

            <div class="dutio-stat-value">

                {{ $statistik['kamar'] }}

            </div>

            <div class="dutio-stat-label">

                Total Kamar

            </div>

        </div>

        <div class="dutio-stat-icon">
            🏠
        </div>

    </div>

    {{-- Laporan --}}
    <div class="dutio-stat dutio-stat--warning">

        <div>

            <div class="dutio-stat-value">

                {{ $statistik['laporan'] }}

            </div>

            <div class="dutio-stat-label">

                Laporan Masuk

            </div>

        </div>

        <div class="dutio-stat-icon">
            📷
        </div>

    </div>

    {{-- Crew Point --}}
    <div class="dutio-stat dutio-stat--danger">

        <div>

            <div class="dutio-stat-value">

                {{ $statistik['crewpoint'] }}

            </div>

            <div class="dutio-stat-label">

                Total Crew Point

            </div>

        </div>

        <div class="dutio-stat-icon">
            ⭐
        </div>

    </div>

</div>

<div class="row g-3">

    <div class="col-lg-7">

        <div class="dutio-card">

            <div class="dutio-card-header">

                <h3>

                    Laporan Terbaru

                </h3>

            </div>

            <div class="dutio-card-body">

                <table class="table align-middle">

                    <thead>

                        <tr>

                            <th>Penghuni</th>

                            <th>Kamar</th>

                            <th>Area</th>

                            <th>Status</th>

                            <th>Jam</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($laporanTerbaru as $laporan)

                        <tr>

                            <td>

                                {{ $laporan->user->name }}

                            </td>

                            <td>

                                {{ $laporan->user->kamar }}

                            </td>

                            <td>

                                {{ $laporan->jadwal->areaPiket->nama_area ?? '-' }}

                            </td>

                            <td>

                                @if($laporan->status == 'Menunggu')

                                    <span class="badge bg-warning text-dark">

                                        Menunggu

                                    </span>

                                @elseif($laporan->status == 'Disetujui')

                                    <span class="badge bg-success">

                                        Disetujui

                                    </span>

                                @else

                                    <span class="badge bg-danger">

                                        Ditolak

                                    </span>

                                @endif

                            </td>

                            <td>

                                {{ $laporan->created_at->format('H:i') }}

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="5" class="text-center text-muted py-4">

                                Belum ada laporan.

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

    <div class="col-lg-5">

        <div class="dutio-card">

            <div class="dutio-card-header">

                <h3>

                    Aksi Cepat

                </h3>

            </div>

            <div class="dutio-card-body d-grid gap-2">

                <a href="/koordinator/jadwal"
                   class="btn btn-dutio-primary">

                    📅 Kelola Jadwal Piket

                </a>

                <a href="/koordinator/checklist"
                   class="btn btn-dutio-success">

                    ✅ Kelola Checklist

                </a>

                <a href="/koordinator/laporan"
                   class="btn btn-warning text-white">

                    📷 Verifikasi Laporan

                </a>

                <a href="/koordinator/monitoring"
                   class="btn btn-info text-white">

                    📊 Monitoring Piket

                </a>

                <a href="/koordinator/user"
                   class="btn btn-secondary">

                    👥 Kelola Pengguna

                </a>

            </div>

        </div>

    </div>

</div>

@endsection