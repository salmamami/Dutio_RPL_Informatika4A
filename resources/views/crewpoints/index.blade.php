@extends('layouts.app')

@section('content')

<div class="dutio-page-header">
    <h1>Crew Points</h1>
    <p class="text-muted">Poin dan evaluasi kinerja penghuni asrama</p>
</div>

<div class="dutio-points-hero mb-4">

    <div class="dutio-points-hero-icon">
        <i class="fa-solid fa-trophy"></i>
    </div>

    <div class="dutio-points-hero-body">
        <span class="dutio-points-hero-label">Total Poin Saya</span>
        <div class="dutio-points-hero-value">
            <span id="pointCounter">0</span>
        </div>
        <span class="dutio-pill dutio-pill--success">
            <i class="fa-solid fa-arrow-trend-up"></i> Performa Baik
        </span>
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
                        <span><i class="fa-regular fa-clock"></i> Hari ini</span>
                    </div>
                    <span class="dutio-feed-value dutio-feed-value--up">+10</span>
                </div>

                <div class="dutio-feed-item">
                    <div class="dutio-feed-icon dutio-feed-icon--up">+5</div>
                    <div class="dutio-feed-body">
                        <strong>Laporan diterima</strong>
                        <span><i class="fa-regular fa-clock"></i> Kemarin</span>
                    </div>
                    <span class="dutio-feed-value dutio-feed-value--up">+5</span>
                </div>

                <div class="dutio-feed-item">
                    <div class="dutio-feed-icon dutio-feed-icon--down">−5</div>
                    <div class="dutio-feed-body">
                        <strong>Terlambat mengumpulkan laporan</strong>
                        <span><i class="fa-regular fa-clock"></i> 2 hari lalu</span>
                    </div>
                    <span class="dutio-feed-value dutio-feed-value--down">−5</span>
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
                        <span><i class="fa-solid fa-broom me-1"></i> Kebersihan Kamar</span>
                        <span>90%</span>
                    </div>
                    <div class="dutio-progress-track">
                        <div class="dutio-progress-fill dutio-progress-fill--animated"
                             data-width="90"
                             style="width:0%; background: var(--dutio-success);"></div>
                    </div>
                </div>

                <div class="dutio-progress-row">
                    <div class="dutio-progress-label">
                        <span><i class="fa-solid fa-calendar-check me-1"></i> Kedisiplinan Piket</span>
                        <span>85%</span>
                    </div>
                    <div class="dutio-progress-track">
                        <div class="dutio-progress-fill dutio-progress-fill--animated"
                             data-width="85"
                             style="width:0%; background: var(--dutio-primary);"></div>
                    </div>
                </div>

                <div class="dutio-progress-row">
                    <div class="dutio-progress-label">
                        <span><i class="fa-solid fa-file-lines me-1"></i> Kelengkapan Laporan</span>
                        <span>95%</span>
                    </div>
                    <div class="dutio-progress-track">
                        <div class="dutio-progress-fill dutio-progress-fill--animated"
                             data-width="95"
                             style="width:0%; background: var(--dutio-warning);"></div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>

@push('styles')
<style>

/* ===== POINTS HERO ===== */
.dutio-points-hero{
    background: linear-gradient(135deg, var(--dutio-sidebar-bg), var(--dutio-primary));
    border-radius: 22px;
    padding: 28px 32px;
    display:flex;
    align-items:center;
    gap:22px;
    box-shadow: var(--dutio-shadow-hover);
    position:relative;
    overflow:hidden;
}

.dutio-points-hero::after{
    content:'';
    position:absolute;
    width:220px;
    height:220px;
    background: rgba(255,255,255,.08);
    border-radius:50%;
    top:-90px;
    right:-60px;
}

.dutio-points-hero-icon{
    width:70px;
    height:70px;
    border-radius:20px;
    background: rgba(255,255,255,.18);
    backdrop-filter: blur(6px);
    display:grid;
    place-items:center;
    font-size:1.7rem;
    color:#FFD98A;
    flex-shrink:0;
    position:relative;
    z-index:1;
}

.dutio-points-hero-body{
    position:relative;
    z-index:1;
}

.dutio-points-hero-label{
    display:block;
    color: rgba(255,255,255,.8);
    font-size:.82rem;
    font-weight:600;
    text-transform:uppercase;
    letter-spacing:.04em;
    margin-bottom:2px;
}

.dutio-points-hero-value{
    font-family:'Sora', sans-serif;
    font-size:2.6rem;
    font-weight:800;
    color:#fff;
    line-height:1.1;
    margin-bottom:10px;
}

.dutio-points-hero-body .dutio-pill{
    background: rgba(255,255,255,.18);
    color:#fff;
}

.dutio-points-hero-body .dutio-pill::before{
    display:none;
}

@media (max-width:480px){
    .dutio-points-hero{
        flex-direction:column;
        text-align:center;
        padding:24px;
    }
}

/* ===== FEED ITEM POLISH ===== */
.dutio-feed-item{
    align-items:center;
}

.dutio-feed-body span{
    display:flex;
    align-items:center;
    gap:5px;
}

.dutio-feed-value{
    margin-left:auto;
    font-family:'Sora', sans-serif;
    font-weight:700;
    font-size:.95rem;
    flex-shrink:0;
}

.dutio-feed-value--up{ color: var(--dutio-success); }
.dutio-feed-value--down{ color: var(--dutio-danger); }

/* ===== PROGRESS ANIMATED ===== */
.dutio-progress-fill--animated{
    transition: width 1.1s cubic-bezier(.25,.8,.25,1);
}

</style>
@endpush

@push('scripts')
<script>
// Animasi hitung angka poin
(function(){
    const el = document.getElementById('pointCounter');
    const target = 120; // nanti diganti data asli dari controller
    let current = 0;
    const duration = 900;
    const stepTime = 16;
    const steps = duration / stepTime;
    const increment = target / steps;

    const timer = setInterval(function(){
        current += increment;
        if (current >= target){
            current = target;
            clearInterval(timer);
        }
        el.textContent = Math.round(current);
    }, stepTime);
})();

// Animasi progress bar jalan begitu halaman dimuat
document.addEventListener('DOMContentLoaded', function(){
    document.querySelectorAll('.dutio-progress-fill--animated').forEach(function(bar){
        setTimeout(function(){
            bar.style.width = bar.dataset.width + '%';
        }, 150);
    });
});
</script>
@endpush

@endsection