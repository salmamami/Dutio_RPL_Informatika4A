@extends('layouts.app')

@section('content')

<div class="dutio-page-header">
    <h1>Dashboard Koordinator 👋</h1>
    <p class="text-muted">
        Selamat datang kembali. Kelola aktivitas asrama dengan mudah.
    </p>
</div>

{{-- Statistik --}}
<div class="dutio-admin-grid">

    <div class="dutio-admin-card">
        <div>
            <div class="dutio-admin-title">Total Penghuni</div>
            <div class="dutio-admin-value">128</div>
        </div>

        <div class="dutio-admin-icon">
            <i class="bi bi-people-fill"></i>
        </div>
    </div>

    <div class="dutio-admin-card">
        <div>
            <div class="dutio-admin-title">Jadwal Hari Ini</div>
            <div class="dutio-admin-value">12</div>
        </div>

        <div class="dutio-admin-icon">
            <i class="bi bi-calendar-check"></i>
        </div>
    </div>

    <div class="dutio-admin-card">
        <div>
            <div class="dutio-admin-title">Laporan Masuk</div>
            <div class="dutio-admin-value">8</div>
        </div>

        <div class="dutio-admin-icon">
            <i class="bi bi-file-earmark-text"></i>
        </div>
    </div>

    <div class="dutio-admin-card">
        <div>
            <div class="dutio-admin-title">Crew Point</div>
            <div class="dutio-admin-value">94%</div>
        </div>

        <div class="dutio-admin-icon">
            <i class="bi bi-star-fill"></i>
        </div>
    </div>

</div>

<div class="row">

    {{-- Jadwal --}}
    <div class="col-lg-7">

        <div class="dutio-card">

            <div class="dutio-card-header">
                <h3>Jadwal Hari Ini</h3>
            </div>

            <div class="dutio-card-body">

                <div class="dutio-timeline">

                    <div class="dutio-timeline-item">

                        <div class="dutio-timeline-card">

                            <div class="dutio-timeline-icon">
                                🧹
                            </div>

                            <div class="dutio-timeline-body">
                                <strong>Koridor Lantai 1</strong>
                                <span>08.00 - 09.00 WIB</span>
                            </div>

                            <span class="dutio-pill dutio-pill--success">
                                Berjalan
                            </span>

                        </div>

                    </div>

                    <div class="dutio-timeline-item">

                        <div class="dutio-timeline-card">

                            <div class="dutio-timeline-icon">
                                🕌
                            </div>

                            <div class="dutio-timeline-body">
                                <strong>Mushola</strong>
                                <span>09.00 - 10.00 WIB</span>
                            </div>

                            <span class="dutio-pill dutio-pill--warning">
                                Menunggu
                            </span>

                        </div>

                    </div>

                    <div class="dutio-timeline-item">

                        <div class="dutio-timeline-card">

                            <div class="dutio-timeline-icon">
                                🌳
                            </div>

                            <div class="dutio-timeline-body">
                                <strong>Taman</strong>
                                <span>10.00 - 11.00 WIB</span>
                            </div>

                            <span class="dutio-pill dutio-pill--primary">
                                Terjadwal
                            </span>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    {{-- Aktivitas --}}
    <div class="col-lg-5">

        <div class="dutio-card">

            <div class="dutio-card-header">
                <h3>Aktivitas Terbaru</h3>
            </div>

            <div class="dutio-card-body">

                <div class="dutio-activity">

                    <div class="dutio-activity-icon">
                        ✅
                    </div>

                    <div>
                        <strong>Kamar A mengirim laporan</strong>
                        <span>5 menit yang lalu</span>
                    </div>

                </div>

                <div class="dutio-activity">

                    <div class="dutio-activity-icon">
                        ⭐
                    </div>

                    <div>
                        <strong>Crew Point berhasil ditambahkan</strong>
                        <span>15 menit yang lalu</span>
                    </div>

                </div>

                <div class="dutio-activity">

                    <div class="dutio-activity-icon">
                        📅
                    </div>

                    <div>
                        <strong>Jadwal baru dibuat</strong>
                        <span>30 menit yang lalu</span>
                    </div>

                </div>

                <div class="dutio-activity">

                    <div class="dutio-activity-icon">
                        👤
                    </div>

                    <div>
                        <strong>Penghuni baru ditambahkan</strong>
                        <span>1 jam yang lalu</span>
                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<div class="row mt-4">

    {{-- Progress --}}
    <div class="col-lg-6">

        <div class="dutio-card">

            <div class="dutio-card-header">
                <h3>Progress Minggu Ini</h3>
            </div>

            <div class="dutio-card-body">

                <div class="dutio-progress-circle"></div>

                <p class="text-center mt-3 text-muted">
                    Penyelesaian seluruh tugas minggu ini.
                </p>

            </div>

        </div>

    </div>

    {{-- Quick Action --}}
    <div class="col-lg-6">

        <div class="dutio-card">

            <div class="dutio-card-header">
                <h3>Quick Action</h3>
            </div>

            <div class="dutio-card-body">

                <div class="dutio-quick-grid">

                    <a href="/jadwal" class="dutio-quick-btn">
                        <i class="bi bi-calendar-week"></i>
                        Kelola Jadwal
                    </a>

                    <a href="/checklist" class="dutio-quick-btn">
                        <i class="bi bi-list-check"></i>
                        Checklist
                    </a>

                    <a href="/laporan" class="dutio-quick-btn">
                        <i class="bi bi-file-earmark-text"></i>
                        Laporan
                    </a>

                    <a href="/crewpoints" class="dutio-quick-btn">
                        <i class="bi bi-star"></i>
                        Crew Point
                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection