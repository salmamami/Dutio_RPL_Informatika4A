@extends('layouts.admin')

@section('content')

<div class="dutio-page-header d-flex justify-content-between align-items-center flex-wrap gap-2">

    <div>
        <h1>Detail Laporan</h1>
        <p class="text-muted mb-0">
            Verifikasi hasil piket penghuni.
        </p>
    </div>

    <a href="/koordinator/laporan" class="dutio-back-link">
        <i class="fa-solid fa-arrow-left"></i> Kembali
    </a>

</div>

<div class="row g-4">

    <div class="col-lg-7">

        <div class="dutio-card">

            <div class="dutio-card-header">
                <h3>Foto Laporan</h3>
                <span class="dutio-pill dutio-pill--warning">{{ $laporan['status'] }}</span>
            </div>

            <div class="dutio-card-body text-center">

                <a href="{{ $laporan['foto'] }}" target="_blank" class="dutio-photo-frame">
                    <img
                        src="{{ $laporan['foto'] }}"
                        alt="Foto Laporan">

                    <span class="dutio-photo-zoom">
                        <i class="fa-solid fa-magnifying-glass-plus"></i> Lihat ukuran penuh
                    </span>
                </a>

            </div>

        </div>

    </div>

    <div class="col-lg-5">

        <div class="dutio-card">

            <div class="dutio-card-header">
                <h3>Informasi Laporan</h3>
            </div>

            <div class="dutio-card-body">

                <div class="dutio-info-grid mb-3">

                    <div class="dutio-info-item">
                        <label><i class="fa-solid fa-door-open me-1"></i> Kamar</label>
                        <div>{{ $laporan['kamar'] }}</div>
                    </div>

                    <div class="dutio-info-item">
                        <label><i class="fa-solid fa-location-dot me-1"></i> Area</label>
                        <div>{{ $laporan['area'] }}</div>
                    </div>

                    <div class="dutio-info-item">
                        <label><i class="fa-solid fa-calendar-day me-1"></i> Tanggal</label>
                        <div>{{ $laporan['tanggal'] }}</div>
                    </div>

                </div>

                <label class="form-label">
                    <i class="fa-solid fa-quote-left me-1"></i> Catatan Penghuni
                </label>

                <div class="dutio-quote-card">
                    {{ $laporan['catatan'] ?: 'Tidak ada catatan.' }}
                </div>

            </div>

        </div>

        <div class="dutio-card mt-3">

            <div class="dutio-card-header">
                <h3>Keputusan Koordinator</h3>
            </div>

            <div class="dutio-card-body">

                <div class="mb-3">

                    <label class="form-label">
                        Catatan Koordinator
                    </label>

                    <textarea
                        class="form-control"
                        rows="3"
                        placeholder="Tambahkan catatan apabila diperlukan..."></textarea>

                </div>

                <div class="d-flex gap-2">

                    <button class="dutio-decision-btn dutio-decision-btn--reject flex-fill">
                        <i class="fa-solid fa-xmark"></i> Tolak
                    </button>

                    <button class="dutio-decision-btn dutio-decision-btn--approve flex-fill">
                        <i class="fa-solid fa-check"></i> Setujui
                    </button>

                </div>

            </div>

        </div>

    </div>

</div>

@push('styles')
<style>

/* Back link */
.dutio-back-link{
    display:inline-flex;
    align-items:center;
    gap:8px;
    color: var(--dutio-ink-soft);
    font-weight:600;
    font-size:.88rem;
    padding:8px 16px;
    border:1px solid var(--dutio-border);
    border-radius:12px;
    transition: all .2s ease;
}

.dutio-back-link:hover{
    background: var(--dutio-bg);
    color: var(--dutio-ink);
}

/* Foto dengan efek zoom */
.dutio-photo-frame{
    position:relative;
    display:inline-block;
    border-radius:16px;
    overflow:hidden;
    max-width:100%;
}

.dutio-photo-frame img{
    max-width:100%;
    max-height:420px;
    display:block;
    border-radius:16px;
    transition: transform .35s ease;
}

.dutio-photo-frame:hover img{
    transform: scale(1.04);
}

.dutio-photo-zoom{
    position:absolute;
    bottom:12px;
    left:50%;
    transform: translateX(-50%);
    background: rgba(0,0,0,.55);
    color:#fff;
    font-size:.78rem;
    padding:6px 14px;
    border-radius:100px;
    opacity:0;
    transition: opacity .25s ease;
    white-space:nowrap;
}

.dutio-photo-frame:hover .dutio-photo-zoom{
    opacity:1;
}

/* Catatan penghuni jadi kartu kutipan */
.dutio-quote-card{
    background: var(--dutio-bg);
    border-left:3px solid var(--dutio-primary);
    border-radius:12px;
    padding:14px 18px;
    font-size:.9rem;
    color: var(--dutio-ink);
    line-height:1.6;
}

/* Tombol keputusan */
.dutio-decision-btn{
    display:flex;
    align-items:center;
    justify-content:center;
    gap:8px;
    border:none;
    border-radius:14px;
    padding:13px;
    font-weight:700;
    font-size:.92rem;
    transition: all .2s ease;
}

.dutio-decision-btn--reject{
    background: var(--dutio-danger-soft);
    color: var(--dutio-danger);
}

.dutio-decision-btn--reject:hover{
    background: var(--dutio-danger);
    color:#fff;
    transform: translateY(-2px);
}

.dutio-decision-btn--approve{
    background: var(--dutio-success);
    color:#fff;
}

.dutio-decision-btn--approve:hover{
    background: #3A5A34;
    transform: translateY(-2px);
    box-shadow: 0 10px 22px -8px rgba(75,107,69,.4);
}

</style>
@endpush

@endsection