@extends('layouts.app')

@section('content')

<div class="dutio-page-header d-flex align-items-center justify-content-between flex-wrap gap-2">
    <div>
        <h1>Halo, {{ $user->name }} 👋</h1>
        <p class="text-muted mb-0">
            Hari ini kamu bertugas di <strong>{{ $area['nama'] }}</strong>
        </p>
    </div>

    <span class="dutio-pill dutio-pill--warning">
        {{ $area['status'] }}
    </span>
</div>

<div class="dutio-stat-row">

    <div class="dutio-stat dutio-stat--primary">
        <div>
            <div class="dutio-stat-value">
                {{ $selesaiChecklist }} / {{ $totalChecklist }}
            </div>
            <div class="dutio-stat-label">
                Checklist
            </div>
        </div>

        <div class="dutio-stat-icon">
            <i class="fa-solid fa-list-check"></i>
        </div>
    </div>

    <div class="dutio-stat dutio-stat--warning">
        <div>
            <div class="dutio-stat-value">
                {{ $laporan ? 'Sudah' : 'Belum' }}
            </div>

            <div class="dutio-stat-label">
                Laporan
            </div>
        </div>

        <div class="dutio-stat-icon">
            <i class="fa-solid fa-file-arrow-up"></i>
        </div>
    </div>

    <div class="dutio-stat dutio-stat--success">
        <div>
            <div class="dutio-stat-value">
                {{ $crewPoint }}
            </div>

            <div class="dutio-stat-label">
                Crew Point
            </div>
        </div>

        <div class="dutio-stat-icon">
            <i class="fa-solid fa-star"></i>
        </div>
    </div>

</div>

<div class="row g-3 mb-3">

    <div class="col-lg-6">

        <div class="dutio-card h-100">

            <div class="dutio-card-header">
                <h3>Progress Hari Ini</h3>
            </div>

            <div class="dutio-card-body">

                <div class="dutio-progress-row">
                    <div class="dutio-progress-label">
                        <span>Checklist selesai</span>
                        <span>{{ $selesaiChecklist }} / {{ $totalChecklist }}</span>
                    </div>

                    <div class="dutio-progress-track">
                        <div class="dutio-progress-fill"
                            style="width: {{ $totalChecklist > 0 ? ($selesaiChecklist / $totalChecklist) * 100 : 0 }}%">
                        </div>
                    </div>
                </div>

                <p class="mb-0 mt-3 text-muted">
                    Selesaikan semua checklist buat unlock upload laporan 🚀
                </p>

            </div>

        </div>

    </div>

    <div class="col-lg-6">

        <div class="dutio-card h-100">

            <div class="dutio-card-header">
                <h3>Area Piket Hari Ini</h3>
            </div>

            <div class="dutio-card-body">

                <h4>{{ $area['nama'] }}</h4>

                <p class="text-muted mb-0">
                    Selesaikan seluruh checklist sebelum mengirim laporan.
                </p>

            </div>

        </div>

    </div>

</div>

<div class="dutio-card mb-3">

    <div class="dutio-card-header">
        <h3>Status Hari Ini</h3>
    </div>

    <div class="dutio-card-body">

        <div class="dutio-info-grid">

            <div class="dutio-info-item">
                <label>Area</label>
                <div>{{ $area['nama'] }}</div>
            </div>

            <div class="dutio-info-item">
                <label>Checklist</label>
                <div>{{ $selesaiChecklist }} / {{ $totalChecklist }} selesai</div>
            </div>

            <div class="dutio-info-item">
                <label>Laporan</label>
                <div>
                    @if($laporan)
                        <span class="dutio-pill dutio-pill--success">
                            <i class="fa-solid fa-check"></i> Sudah Dikirim
                        </span>
                    @else
                        <span class="dutio-pill dutio-pill--danger">
                            Belum Dikirim
                        </span>
                    @endif
                </div>
            </div>

            <div class="dutio-info-item">
                <label>Status</label>
                <div>
                    @if($selesaiChecklist == $totalChecklist)
                        <span class="dutio-pill dutio-pill--success">
                            <i class="fa-solid fa-check"></i> Selesai
                        </span>
                    @else
                        <span class="dutio-pill dutio-pill--warning">
                            Sedang Dikerjakan
                        </span>
                    @endif
                </div>
            </div>

        </div>

    </div>

</div>

<div class="dutio-card">

    <div class="dutio-card-header">
        <h3>Aksi Cepat</h3>
    </div>

    <div class="dutio-card-body d-flex gap-2 flex-wrap">

        <a href="/checklist" class="btn btn-dutio-primary">
            <i class="fa-solid fa-list-check me-1"></i> Kerjakan Checklist
        </a>

        @if($selesaiChecklist == $totalChecklist)

            <a href="/laporan" class="btn btn-dutio-success">
                <i class="fa-solid fa-file-arrow-up me-1"></i> Upload Laporan
            </a>

        @else

            <button class="btn btn-secondary" disabled>
                <i class="fa-solid fa-lock me-1"></i> Selesaikan Checklist Dulu
            </button>

        @endif

        <a href="/jadwal" class="btn btn-dutio-outline">
            <i class="fa-solid fa-calendar-days me-1"></i> Lihat Pembagian Piket
        </a>

    </div>

</div>

@endsection