@extends('layouts.admin')

@section('content')

<div class="dutio-page-header">
    <h1>Profil Koordinator</h1>
    <p class="text-muted">
        Informasi akun dan ringkasan pengelolaan asrama.
    </p>
</div>

<div class="row justify-content-center">

    <div class="col-lg-8">

        {{-- Hero Profile --}}
        <div class="dutio-profile-hero-v2">

            <div class="dutio-profile-cover"></div>

            <div class="dutio-profile-hero-body">

                <div class="dutio-avatar-v2">
                    <span>{{ strtoupper(substr($user->name, 0, 2)) }}</span>
                </div>

                <h4>{{ $user->name }}</h4>

                <p>
                    Koordinator Asrama
                </p>

                <div class="dutio-profile-points-badge">
                    <i class="fa-solid fa-user-shield"></i>

                    <div>
                        <strong>{{ ucfirst($user->role) }}</strong>
                        <span>Role Aktif</span>
                    </div>
                </div>

            </div>

        </div>

        {{-- Informasi Akun --}}
        <div class="dutio-card">

            <div class="dutio-card-header">
                <h3>Informasi Akun</h3>
            </div>

            <div class="dutio-card-body">

                <div class="dutio-info-grid">

                    <div class="dutio-info-item">
                        <label>
                            <i class="fa-solid fa-user me-1"></i>
                            Nama
                        </label>

                        <div>{{ $user->name }}</div>
                    </div>

                    <div class="dutio-info-item">
                        <label>
                            <i class="fa-solid fa-envelope me-1"></i>
                            Email
                        </label>

                        <div>{{ $user->email }}</div>
                    </div>

                    <div class="dutio-info-item">
                        <label>
                            <i class="fa-solid fa-door-open me-1"></i>
                            Kamar
                        </label>

                        <div>{{ $user->kamar }}</div>
                    </div>

                    <div class="dutio-info-item">
                        <label>
                            <i class="fa-solid fa-user-shield me-1"></i>
                            Role
                        </label>

                        <div>{{ ucfirst($user->role) }}</div>
                    </div>

                </div>

            </div>

        </div>

        {{-- Ringkasan --}}
        <div class="dutio-card mt-3">

            <div class="dutio-card-header">
                <h3>Ringkasan Asrama</h3>
            </div>

            <div class="dutio-card-body">

                <div class="dutio-stat-row">

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

                    <div class="dutio-stat dutio-stat--success">
                        <div>
                            <div class="dutio-stat-value">
                                {{ $statistik['penghuni'] }}
                            </div>

                            <div class="dutio-stat-label">
                                Penghuni
                            </div>
                        </div>

                        <div class="dutio-stat-icon">
                            👥
                        </div>
                    </div>

                    <div class="dutio-stat dutio-stat--warning">
                        <div>
                            <div class="dutio-stat-value">
                                {{ $statistik['laporan'] }}
                            </div>

                            <div class="dutio-stat-label">
                                Laporan
                            </div>
                        </div>

                        <div class="dutio-stat-icon">
                            📷
                        </div>
                    </div>

                    <div class="dutio-stat dutio-stat--danger">
                        <div>
                            <div class="dutio-stat-value">
                                {{ $statistik['crewpoint'] }}
                            </div>

                            <div class="dutio-stat-label">
                                Crew Point
                            </div>
                        </div>

                        <div class="dutio-stat-icon">
                            ⭐
                        </div>
                    </div>

                </div>

            </div>

        </div>

        {{-- Action --}}
        <div class="dutio-profile-actions">

            <a href="{{ route('koordinator.profile.edit') }}"
                class="dutio-profile-btn dutio-profile-btn--primary">
                <i class="fa-solid fa-pen"></i>
                Edit Profil
            </a>

            <form action="/logout" method="POST" style="flex:1;">
                @csrf

                <button
                    type="submit"
                    class="dutio-profile-btn dutio-profile-btn--danger w-100">

                    <i class="fa-solid fa-right-from-bracket"></i>
                    Logout

                </button>

            </form>

        </div>

    </div>

</div>

@push('styles')
<style>

/* ===== PROFILE HERO ===== */

.dutio-profile-hero-v2{
    background:var(--dutio-surface);
    border:1px solid var(--dutio-border);
    border-radius:var(--dutio-radius);
    box-shadow:var(--dutio-shadow);
    overflow:hidden;
    margin-bottom:20px;
}

.dutio-profile-cover{
    height:100px;
    background:linear-gradient(
        135deg,
        var(--dutio-sidebar-bg),
        var(--dutio-primary)
    );
    position:relative;
}

.dutio-profile-cover::after{
    content:'';
    position:absolute;
    width:180px;
    height:180px;
    background:rgba(255,255,255,.08);
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
    background:linear-gradient(
        135deg,
        #3A4A32,
        var(--dutio-primary)
    );
    border:5px solid var(--dutio-surface);
    margin:-48px auto 14px;
    display:grid;
    place-items:center;
    box-shadow:var(--dutio-shadow-hover);
}

.dutio-avatar-v2 span{
    color:#fff;
    font-size:1.7rem;
    font-weight:700;
    font-family:'Sora',sans-serif;
}

.dutio-profile-points-badge{
    display:inline-flex;
    align-items:center;
    gap:12px;
    background:var(--dutio-primary-soft);
    border-radius:16px;
    padding:10px 20px;
}

.dutio-profile-points-badge i{
    color:var(--dutio-primary);
    font-size:1.25rem;
}

.dutio-profile-points-badge strong{
    display:block;
    color:var(--dutio-primary);
}

.dutio-profile-points-badge span{
    font-size:.8rem;
    color:var(--dutio-ink-soft);
}

.dutio-profile-actions{
    display:flex;
    gap:12px;
    margin-top:20px;
}

.dutio-profile-btn{
    flex:1;
    border:none;
    border-radius:14px;
    padding:13px;
    display:flex;
    align-items:center;
    justify-content:center;
    gap:8px;
    font-weight:700;
    transition:.25s;
}

.dutio-profile-btn--primary{
    background:var(--dutio-primary);
    color:#fff;
}

.dutio-profile-btn--primary:hover{
    transform:translateY(-2px);
}

.dutio-profile-btn--danger{
    background:var(--dutio-danger-soft);
    color:var(--dutio-danger);
}

.dutio-profile-btn--danger:hover{
    background:var(--dutio-danger);
    color:#fff;
}

@media(max-width:768px){

    .dutio-profile-actions{
        flex-direction:column;
    }

}

</style>
@endpush

@endsection