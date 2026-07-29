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

        {{-- HERO --}}
        <div class="dutio-profile-hero-v2">

            <div class="dutio-profile-cover"></div>

            <div class="dutio-profile-hero-body">

                <div class="dutio-avatar-v2">
                    <span>
                        {{ strtoupper(substr($user->name ?? 'K',0,2)) }}
                    </span>
                </div>

                <h4 class="mb-1">
                    {{ $user->name }}
                </h4>

                <p class="text-muted mb-3">
                    Koordinator Asrama
                </p>

                <div class="dutio-profile-points-badge">

                    <i class="fa-solid fa-user-shield"></i>

                    <div>

                        <strong>
                            {{ ucfirst($user->role) }}
                        </strong>

                        <span>
                            Akses Sistem DUTIO
                        </span>

                    </div>

                </div>

            </div>

        </div>


        {{-- INFORMASI AKUN --}}
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

                        <div>
                            {{ $user->kamar ?? '-' }}
                        </div>

                    </div>

                    <div class="dutio-info-item">

                        <label>
                            <i class="fa-solid fa-user-shield me-1"></i>
                            Role
                        </label>

                        <div>
                            {{ ucfirst($user->role) }}
                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- RINGKASAN --}}
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


        {{-- ACTION --}}
        <div class="dutio-profile-actions">

            <a
                href="{{ route('koordinator.profile.edit') }}"
                class="dutio-profile-btn dutio-profile-btn--primary">

                <i class="fa-solid fa-user-pen"></i>

                Edit Profil

            </a>


            <form
                action="{{ route('logout') }}"
                method="POST"
                style="flex:1;">

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

.dutio-profile-hero-v2{
    background:var(--dutio-surface);
    border:1px solid var(--dutio-border);
    border-radius:var(--dutio-radius);
    overflow:hidden;
    box-shadow:var(--dutio-shadow);
    margin-bottom:20px;
}

.dutio-profile-cover{
    height:100px;
    background:linear-gradient(135deg,var(--dutio-sidebar-bg),var(--dutio-primary));
}

.dutio-profile-hero-body{
    text-align:center;
    padding:0 32px 32px;
}

.dutio-avatar-v2{
    width:96px;
    height:96px;
    border-radius:50%;
    margin:-48px auto 14px;
    display:grid;
    place-items:center;
    background:linear-gradient(135deg,#3A4A32,var(--dutio-primary));
    color:#fff;
    font-size:1.7rem;
    font-weight:700;
    border:5px solid #fff;
}

.dutio-profile-points-badge{
    display:inline-flex;
    gap:12px;
    align-items:center;
    padding:12px 20px;
    background:var(--dutio-primary-soft);
    border-radius:14px;
}

.dutio-profile-actions{
    display:flex;
    gap:12px;
    margin-top:20px;
}

.dutio-profile-btn{
    flex:1;
    border:none;
    padding:14px;
    border-radius:12px;
    display:flex;
    justify-content:center;
    align-items:center;
    gap:10px;
    font-weight:600;
    transition:.25s;
    text-decoration:none;
}

.dutio-profile-btn--primary{
    background:var(--dutio-primary);
    color:white;
}

.dutio-profile-btn--primary:hover{
    color:white;
    transform:translateY(-2px);
    box-shadow:var(--dutio-shadow-hover);
}

.dutio-profile-btn--danger{
    background:var(--dutio-danger-soft);
    color:var(--dutio-danger);
}

.dutio-profile-btn--danger:hover{
    background:var(--dutio-danger);
    color:white;
    transform:translateY(-2px);
}

@media(max-width:768px){

.dutio-profile-actions{
    flex-direction:column;
}

}

</style>

@endpush

@endsection