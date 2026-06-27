@extends('layouts.app')

@section('content')

<div class="dutio-page-header">
    <h1>Crew Points</h1>
    <p class="text-muted">Poin dan evaluasi kinerja penghuni asrama</p>
</div>

<div class="dutio-stat-row" style="grid-template-columns: 1fr;">
    <div class="dutio-stat dutio-stat--success" style="max-width: 320px;">
        <div>
            <div class="dutio-stat-value">120</div>
            <div class="dutio-stat-label">Total Poin Saya</div>
        </div>
        <div class="dutio-stat-icon">★</div>
    </div>
</div>

<div class="row g-3">

    <div class="col-md-6">
        <div class="dutio-card mb-0 h-100">
            <div class="dutio-card-header">
                <h3>Riwayat Poin</h3>
            </div>
            <div class="dutio-card-body">

                <div class="dutio-feed-item">
                    <div class="dutio-feed-icon dutio-feed-icon--up">+10</div>
                    <div class="dutio-feed-body">
                        <strong>Piket selesai tepat waktu</strong>
                        <span>+10 Poin</span>
                    </div>
                </div>

                <div class="dutio-feed-item">
                    <div class="dutio-feed-icon dutio-feed-icon--up">+5</div>
                    <div class="dutio-feed-body">
                        <strong>Laporan diterima</strong>
                        <span>+5 Poin</span>
                    </div>
                </div>

                <div class="dutio-feed-item">
                    <div class="dutio-feed-icon dutio-feed-icon--down">−5</div>
                    <div class="dutio-feed-body">
                        <strong>Terlambat mengumpulkan laporan</strong>
                        <span>−5 Poin</span>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="dutio-card mb-0 h-100">
            <div class="dutio-card-header">
                <h3>Evaluasi Terbaru</h3>
            </div>
            <div class="dutio-card-body">

                <div class="dutio-progress-row">
                    <div class="dutio-progress-label">
                        <span>Kebersihan Kamar</span>
                        <span>90%</span>
                    </div>
                    <div class="dutio-progress-track">
                        <div class="dutio-progress-fill" style="width:90%; background: var(--dutio-success);"></div>
                    </div>
                </div>

                <div class="dutio-progress-row">
                    <div class="dutio-progress-label">
                        <span>Kedisiplinan Piket</span>
                        <span>85%</span>
                    </div>
                    <div class="dutio-progress-track">
                        <div class="dutio-progress-fill" style="width:85%; background: var(--dutio-primary);"></div>
                    </div>
                </div>

                <div class="dutio-progress-row">
                    <div class="dutio-progress-label">
                        <span>Kelengkapan Laporan</span>
                        <span>95%</span>
                    </div>
                    <div class="dutio-progress-track">
                        <div class="dutio-progress-fill" style="width:95%; background: var(--dutio-warning);"></div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>

@endsection
