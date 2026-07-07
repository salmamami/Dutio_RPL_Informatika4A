@extends('layouts.app')

@section('content')

<div class="dutio-page-header">
    <h1>Halo, {{ $user->name }} 👋</h1>

    <p class="text-muted">
        Hari ini kamu bertugas di
        <strong>{{ $area['nama'] }}</strong>
    </p>

    <span class="badge bg-warning text-dark px-3 py-2">
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
            ☑
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
            ↥
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
            ★
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

                <div class="progress mb-3" style="height:18px;">

                    <div class="progress-bar bg-success"
                        style="width: {{ ($selesaiChecklist / $totalChecklist) * 100 }}%">
                    </div>

                </div>

                <p class="mb-0">

                    <strong>

                        {{ $selesaiChecklist }}
                        dari
                        {{ $totalChecklist }}

                    </strong>

                    checklist telah diselesaikan.

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

                <h4>
                    {{ $area['nama'] }}
                </h4>

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

        <table class="table table-borderless mb-0">

            <tr>
                <td width="180">
                    <strong>Area</strong>
                </td>

                <td>
                    {{ $area['nama'] }}
                </td>
            </tr>

            <tr>
                <td>
                    <strong>Checklist</strong>
                </td>

                <td>
                    {{ $selesaiChecklist }} / {{ $totalChecklist }} selesai
                </td>
            </tr>

            <tr>
                <td>
                    <strong>Laporan</strong>
                </td>

                <td>

                    @if($laporan)

                        <span class="badge bg-success">
                            Sudah Dikirim
                        </span>

                    @else

                        <span class="badge bg-secondary">
                            Belum Dikirim
                        </span>

                    @endif

                </td>
            </tr>

            <tr>

                <td>
                    <strong>Status</strong>
                </td>

                <td>

                    @if($selesaiChecklist == $totalChecklist)

                        <span class="badge bg-success">
                            Selesai
                        </span>

                    @else

                        <span class="badge bg-warning text-dark">
                            Sedang Dikerjakan
                        </span>

                    @endif

                </td>

            </tr>

        </table>

    </div>

</div>

<div class="dutio-card">

    <div class="dutio-card-header">
        <h3>Aksi Cepat</h3>
    </div>

    <div class="dutio-card-body d-flex gap-2 flex-wrap">

        <a href="/checklist"
            class="btn btn-dutio-primary">

            Kerjakan Checklist

        </a>

        @if($selesaiChecklist == $totalChecklist)

            <a href="/laporan"
                class="btn btn-dutio-success">

                Upload Laporan

            </a>

        @else

            <button
                class="btn btn-secondary"
                disabled>

                Selesaikan Checklist Dulu

            </button>

        @endif

        <a href="/jadwal"
            class="btn btn-outline-secondary">

            Lihat Pembagian Piket

        </a>

    </div>

</div>

@endsection