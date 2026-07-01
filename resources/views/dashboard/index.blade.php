@extends('layouts.app')

@section('content')

<div class="dutio-page-header">
    <h1>Halo, {{ $user->name }} 👋</h1>
    <p class="text-muted">Selamat datang di DUTIO</p>
</div>

<div class="dutio-stat-row">

    <div class="dutio-stat dutio-stat--primary">
        <div>
            <div class="dutio-stat-value">2</div>
            <div class="dutio-stat-label">Tugas Hari Ini</div>
        </div>
        <div class="dutio-stat-icon">☑</div>
    </div>

    <div class="dutio-stat dutio-stat--success">
        <div>
            <div class="dutio-stat-value">1</div>
            <div class="dutio-stat-label">Jadwal Hari Ini</div>
        </div>
        <div class="dutio-stat-icon">▤</div>
    </div>

    <div class="dutio-stat dutio-stat--warning">
        <div>
            <div class="dutio-stat-value">0</div>
            <div class="dutio-stat-label">Laporan Pending</div>
        </div>
        <div class="dutio-stat-icon">↥</div>
    </div>

</div>

<div class="row g-3 mb-3">

    <div class="col-md-6">
        <div class="dutio-card mb-0 h-100">
            <div class="dutio-card-header">
                <h3>Tugas Hari Ini</h3>
            </div>
            <div class="dutio-card-body">

                <div class="dutio-task is-done">
                    <input class="dutio-task-check" type="checkbox" checked>
                    <span class="dutio-task-label">Menyapu Koridor</span>
                </div>

                <div class="dutio-task">
                    <input class="dutio-task-check" type="checkbox">
                    <span class="dutio-task-label">Buang Sampah</span>
                </div>

                <div class="dutio-task">
                    <input class="dutio-task-check" type="checkbox">
                    <span class="dutio-task-label">Membersihkan Mushola</span>
                </div>

            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="dutio-card mb-0 h-100">
            <div class="dutio-card-header">
                <h3>Jadwal Terdekat</h3>
            </div>
            <div class="dutio-card-body">

                <div class="dutio-timeline-card" style="box-shadow:none; border:none; padding:0;">
                    <div class="dutio-timeline-icon">🕌</div>
                    <div class="dutio-timeline-body">
                        <strong>Jumat</strong>
                        <span>Kerja Bakti Asrama</span>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>

<div class="dutio-card">
    <div class="dutio-card-header">
        <h3>Aksi Cepat</h3>
    </div>
    <div class="dutio-card-body d-flex gap-2">
        <a href="/jadwal" class="btn btn-dutio-primary">Lihat Jadwal</a>
        <a href="/laporan" class="btn btn-dutio-success">Upload Laporan</a>
    </div>
</div>

@endsection
