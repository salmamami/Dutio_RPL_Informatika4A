@extends('layouts.app')

@section('content')

<div class="dutio-page-header">
    <h1>Profil Saya</h1>
    <p class="text-muted">Informasi akun penghuni asrama</p>
</div>

<div class="row justify-content-center">
    <div class="col-lg-8">

        <div class="dutio-profile-hero-v2">

            <div class="dutio-profile-cover"></div>

            <div class="dutio-profile-hero-body">

                <div class="dutio-avatar-v2">
                    <span>AM</span>
                </div>

                <h4>Salma Amirah Balqis</h4>
                <p class="text-muted mb-3">Penghuni Asrama — Kamar A-12</p>

                <div class="dutio-profile-points-badge">
                    <i class="fa-solid fa-star"></i>
                    <div>
                        <strong>120</strong>
                        <span>Crew Points</span>
                    </div>
                </div>

            </div>

        </div>

        <div class="dutio-card">
            <div class="dutio-card-header">
                <h3>Informasi Akun</h3>
            </div>
            <div class="dutio-card-body">
                <div class="dutio-info-grid">

                    <div class="dutio-info-item">
                        <label><i class="fa-solid fa-user me-1"></i> Nama</label>
                        <div>Salma Amirah Balqis</div>
                    </div>

                    <div class="dutio-info-item">
                        <label><i class="fa-solid fa-envelope me-1"></i> Email</label>
                        <div>ami@email.com</div>
                    </div>

                    <div class="dutio-info-item">
                        <label><i class="fa-solid fa-door-open me-1"></i> Nomor Kamar</label>
                        <div>A-12</div>
                    </div>

                    <div class="dutio-info-item">
                        <label><i class="fa-solid fa-star me-1"></i> Crew Points</label>
                        <div>120 Poin</div>
                    </div>

                </div>
            </div>
        </div>

        <div class="dutio-profile-actions">
            <button class="dutio-profile-btn dutio-profile-btn--primary">
                <i class="fa-solid fa-pen"></i> Edit Profil
            </button>
            <button class="dutio-profile-btn dutio-profile-btn--danger">
                <i class="fa-solid fa-right-from-bracket"></i> Logout
            </button>
        </div>

    </div>
</div>

@push('styles')
<style>

/* ===== PROFILE HERO V2 ===== */
.dutio-profile-hero-v2{
    background: var(--dutio-surface);
    border: 1px solid var(--dutio-border);
    border-radius: var(--dutio-radius);
    box-shadow: var(--dutio-shadow);
    overflow:hidden;
    margin-bottom:20px;
}

.dutio-profile-cover{
    height:100px;
    background: linear-gradient(135deg, var(--dutio-sidebar-bg), var(--dutio-primary));
    position:relative;
}

.dutio-profile-cover::after{
    content:'';
    position:absolute;
    width:180px;
    height:180px;
    background: rgba(255,255,255,.08);
    border-radius:50%;
    top:-70px;
    right:-40px;
}

.dutio-profile-hero-body{
    text-align:center;
    padding:0 32px 32px;
}

.dutio-avatar-v2{
    width:96px;
    height:96px;
    border-radius:50%;
    background: linear-gradient(135deg, #3A4A32, var(--dutio-primary));
    border:5px solid var(--dutio-surface);
    margin:-48px auto 14px;
    display:grid;
    place-items:center;
    box-shadow: var(--dutio-shadow-hover);
    position:relative;
}

.dutio-avatar-v2 span{
    font-family:'Sora', sans-serif;
    font-weight:700;
    font-size:1.7rem;
    color:#fff;
}

.dutio-profile-hero-body h4{
    margin-bottom:2px;
    font-size:1.25rem;
}

.dutio-profile-points-badge{
    display:inline-flex;
    align-items:center;
    gap:12px;
    background: var(--dutio-primary-soft);
    border-radius:16px;
    padding:10px 20px;
}

.dutio-profile-points-badge i{
    color: var(--dutio-warning);
    font-size:1.3rem;
}

.dutio-profile-points-badge div{
    text-align:left;
    line-height:1.2;
}

.dutio-profile-points-badge strong{
    display:block;
    font-family:'Sora', sans-serif;
    font-size:1.15rem;
    color: var(--dutio-primary);
}

.dutio-profile-points-badge span{
    font-size:.76rem;
    color: var(--dutio-ink-soft);
}

/* ===== ACTION BUTTONS ===== */
.dutio-profile-actions{
    display:flex;
    gap:12px;
    margin-top:20px;
}

.dutio-profile-btn{
    flex:1;
    display:flex;
    align-items:center;
    justify-content:center;
    gap:8px;
    border:none;
    border-radius:14px;
    padding:13px;
    font-weight:700;
    font-size:.9rem;
    transition: all .25s ease;
}

.dutio-profile-btn--primary{
    background: var(--dutio-primary);
    color:#fff;
}

.dutio-profile-btn--primary:hover{
    background:#24502D;
    transform: translateY(-2px);
    box-shadow: 0 12px 24px -10px rgba(53,100,63,.4);
}

.dutio-profile-btn--danger{
    background: var(--dutio-danger-soft);
    color: var(--dutio-danger);
}

.dutio-profile-btn--danger:hover{
    background: var(--dutio-danger);
    color:#fff;
    transform: translateY(-2px);
}

@media (max-width:480px){
    .dutio-profile-actions{
        flex-direction:column;
    }
}

</style>
@endpush

@endsection