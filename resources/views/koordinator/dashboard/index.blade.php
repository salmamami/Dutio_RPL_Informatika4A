@extends('layouts.admin')

@section('content')

<div class="dutio-page-header mb-4">
    <h1 class="fw-bold">
        Dashboard Koordinator 👨‍💼
    </h1>

    <p class="text-muted mb-0">
        Selamat datang, kelola seluruh aktivitas piket penghuni asrama.
    </p>
</div>

{{-- Statistik --}}
<div class="row g-4 mb-4">

    <div class="col-md-4">
        <div class="card border-0 shadow-sm h-100 stat-card stat-blue">

            <div class="card-body d-flex justify-content-between align-items-center">

                <div>
                    <small class="text-muted">Total Kamar</small>

                    <h2 class="fw-bold mb-1">
                        {{ $statistik['kamar'] }}
                    </h2>

                    <span class="text-success small">
                        Data kamar aktif
                    </span>
                </div>

                <div class="stat-icon">
                    🏠
                </div>

            </div>

        </div>
    </div>

    <div class="col-md-4">
        <div class="card border-0 shadow-sm h-100 stat-card stat-orange">

            <div class="card-body d-flex justify-content-between align-items-center">

                <div>

                    <small class="text-muted">
                        Laporan Masuk
                    </small>

                    <h2 class="fw-bold mb-1">
                        {{ $statistik['laporan'] }}
                    </h2>

                    <span class="text-warning small">
                        Menunggu verifikasi
                    </span>

                </div>

                <div class="stat-icon">
                    📷
                </div>

            </div>

        </div>
    </div>

    <div class="col-md-4">

        <div class="card border-0 shadow-sm h-100 stat-card stat-red">

            <div class="card-body d-flex justify-content-between align-items-center">

                <div>

                    <small class="text-muted">
                        Total Crew Point
                    </small>

                    <h2 class="fw-bold mb-1">
                        {{ $statistik['crewpoint'] }}
                    </h2>

                    <span class="text-danger small">
                        Akumulasi seluruh kamar
                    </span>

                </div>

                <div class="stat-icon">
                    ⭐
                </div>

            </div>

        </div>

    </div>

</div>


{{-- Laporan Terbaru --}}
<div class="card border-0 shadow-sm laporan-card">

    <div class="card-header laporan-header d-flex justify-content-between align-items-center">

        <div>

            <h5 class="fw-bold mb-1">
                <i class="fa-solid fa-clipboard-list text-success me-2"></i>
                Laporan Terbaru
            </h5>

            <small class="text-muted">
                Aktivitas piket penghuni terbaru yang masuk ke sistem.
            </small>

        </div>

        <span class="badge bg-success rounded-pill px-3 py-2">

            {{ $laporanTerbaru->count() }} Laporan

        </span>

    </div>

    <div class="table-responsive">

        <table class="table align-middle mb-0">

            <thead>

                <tr>

                    <th width="60">#</th>
                    <th>Penghuni</th>
                    <th>Kamar</th>
                    <th>Area</th>
                    <th>Status</th>
                    <th>Jam</th>

                </tr>

            </thead>

            <tbody>

            @forelse($laporanTerbaru as $laporan)

            <tr>

                <td>

                    <div class="nomor">

                        {{ $loop->iteration }}

                    </div>

                </td>

                <td>

                    <div class="d-flex align-items-center">

                        <div class="avatar-mini">

                            {{ strtoupper(substr($laporan->user->name,0,1)) }}

                        </div>

                        <div class="ms-3">

                            <strong>

                                {{ $laporan->user->name }}

                            </strong>

                        </div>

                    </div>

                </td>

                <td>

                    <span class="badge bg-light text-dark border">

                        {{ $laporan->user->kamar }}

                    </span>

                </td>

                <td>

                    <i class="fa-solid fa-location-dot text-success me-1"></i>

                    {{ $laporan->jadwal->areaPiket->nama_area ?? '-' }}

                </td>

                <td>

                    @if($laporan->status=='Menunggu')

                        <span class="badge rounded-pill bg-warning text-dark px-3">

                            ⏳ Menunggu

                        </span>

                    @elseif($laporan->status=='Disetujui')

                        <span class="badge rounded-pill bg-success px-3">

                            ✔ Disetujui

                        </span>

                    @else

                        <span class="badge rounded-pill bg-danger px-3">

                            ✖ Ditolak

                        </span>

                    @endif

                </td>

                <td>

                    <i class="fa-regular fa-clock me-1 text-muted"></i>

                    {{ $laporan->created_at->format('H:i') }}

                </td>

            </tr>

            @empty

            <tr>

                <td colspan="6" class="text-center py-5">

                    <img src="https://cdn-icons-png.flaticon.com/512/7486/7486740.png"
                         width="90"
                         class="mb-3">

                    <p class="text-muted mb-0">

                        Belum ada laporan terbaru.

                    </p>

                </td>

            </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>

@push('styles')

<style>

.stat-card{
    border-radius:18px;
    transition:.3s;
}

.stat-card:hover{
    transform:translateY(-5px);
    box-shadow:0 15px 35px rgba(0,0,0,.08)!important;
}

.stat-icon{
    width:70px;
    height:70px;
    border-radius:18px;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:30px;
}

.stat-blue .stat-icon{
    background:#e9f2ff;
}

.stat-orange .stat-icon{
    background:#fff4df;
}

.stat-red .stat-icon{
    background:#ffe7e7;
}

.table tbody tr:hover{
    background:#fafafa;
}

.card{
    border-radius:18px;
}

.card-header{
    padding:20px 24px;
}

.table th{
    font-weight:600;
}

.badge{
    font-size:.8rem;
}

</style>

@endpush

@endsection