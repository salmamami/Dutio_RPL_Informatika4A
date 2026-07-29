@extends('layouts.app')

@section('content')

<div class="dutio-page-header mb-4">
    <h1>Crew Points</h1>
    <p class="text-muted mb-0">
        Pantau perkembangan Crew Point setiap kamar.
    </p>
</div>

@php
    $progress = min(($totalPoint / 250) * 100, 100);

    if($totalPoint >= 250){
        $level = 'Excellent';
        $badge = '👑';
        $color = '#FFD54A';
    }elseif($totalPoint >= 150){
        $level = 'Performa Baik';
        $badge = '🚀';
        $color = '#A5D6A7';
    }elseif($totalPoint >= 80){
        $level = 'Berkembang';
        $badge = '🌱';
        $color = '#FFE082';
    }else{
        $level = 'Beginner';
        $badge = '📘';
        $color = '#E0E0E0';
    }
@endphp

<div class="dutio-point-banner mb-4">

    <div class="dutio-point-icon">
        <i class="fa-solid fa-award"></i>
    </div>

    <div class="dutio-point-content">

        <small>TOTAL CREW POINT</small>

        <h2>
            {{ $totalPoint }}
            <span>Poin</span>
        </h2>

        <div class="progress mt-3">
            <div class="progress-bar"
                style="width: {{ $progress }}%; background: {{ $color }};">
            </div>
        </div>

        <div class="d-flex justify-content-between mt-2">
            <small>{{ $badge }} {{ $level }}</small>
            <small>{{ number_format($progress,0) }}% menuju Excellent</small>
        </div>

    </div>

</div>

<div class="row">

    <div class="col-lg-8">

        <div class="dutio-card">

            <div class="dutio-card-header">
                <h3>Data Crew Point</h3>
            </div>

            <div class="dutio-card-body">

                <div class="table-responsive">

                    <table class="table table-hover align-middle">

                        <thead class="table-light">

                            <tr>
                                <th>Kamar</th>
                                <th>Periode</th>
                                <th>Penghuni</th>
                                <th>Selesai</th>
                                <th>Ditolak</th>
                                <th>Belum</th>
                                <th>Crew Point</th>
                            </tr>

                        </thead>

                        <tbody>

                        @forelse($riwayat as $item)

                            <tr>

                                <td>
                                    <strong>{{ $item->kamar }}</strong>
                                </td>

                                <td>
                                    {{ \Carbon\Carbon::parse($item->periode)->translatedFormat('F Y') }}
                                </td>

                                <td>
                                    {{ $item->jumlah_penghuni }}
                                </td>

                                <td>
                                    <span class="badge bg-success">
                                        {{ $item->jumlah_selesai }}
                                    </span>
                                </td>

                                <td>
                                    <span class="badge bg-danger">
                                        {{ $item->jumlah_ditolak }}
                                    </span>
                                </td>

                                <td>
                                    <span class="badge bg-warning text-dark">
                                        {{ $item->jumlah_belum }}
                                    </span>
                                </td>

                                <td>

                                    <span class="badge bg-primary fs-6">
                                        {{ $item->crew_point }}
                                    </span>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="7" class="text-center py-5">

                                    <i class="fa-regular fa-folder-open fs-2 mb-3"></i>

                                    <p class="mb-0">
                                        Belum ada data Crew Point.
                                    </p>

                                </td>

                            </tr>

                        @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

    <div class="col-lg-4">

        <div class="dutio-card mb-4">

            <div class="dutio-card-header">
                <h3>Ringkasan</h3>
            </div>

            <div class="dutio-card-body">

                <div class="text-center">

                    <div class="score-circle">
                        {{ $totalPoint }}
                    </div>

                    <h5 class="mt-3">
                        {{ $level }}
                    </h5>

                    <p class="text-muted">
                        Total Crew Point seluruh data.
                    </p>

                </div>

                <hr>

                <table class="table table-borderless mb-0">

                    <tr>
                        <td>Total Data</td>
                        <td class="text-end">
                            {{ $riwayat->count() }}
                        </td>
                    </tr>

                    <tr>
                        <td>Total Point</td>
                        <td class="text-end">
                            {{ $totalPoint }}
                        </td>
                    </tr>

                    <tr>
                        <td>Rata-rata</td>
                        <td class="text-end">
                            {{ $rataRata }}
                        </td>
                    </tr>

                </table>

            </div>

        </div>

    </div>

</div>

@endsection

@push('styles')

<style>

.dutio-point-banner{
    background: linear-gradient(135deg,#4B6B45,#698D63);
    border-radius:24px;
    padding:35px;
    color:#fff;
    display:flex;
    align-items:center;
    gap:30px;
    box-shadow:0 20px 35px rgba(0,0,0,.12);
}

.dutio-point-icon{
    width:95px;
    height:95px;
    border-radius:50%;
    background:rgba(255,255,255,.15);
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:42px;
}

.dutio-point-content{
    flex:1;
}

.dutio-point-content small{
    letter-spacing:2px;
    opacity:.8;
}

.dutio-point-content h2{
    font-size:56px;
    margin:8px 0;
    font-weight:700;
}

.dutio-point-content h2 span{
    font-size:22px;
    font-weight:400;
}

.progress{
    height:12px;
    border-radius:100px;
    background:rgba(255,255,255,.2);
    overflow:hidden;
}

.progress-bar{
    height:100%;
    border-radius:100px;
}

.dutio-card{
    background:#fff;
    border-radius:20px;
    box-shadow:0 8px 25px rgba(0,0,0,.08);
    overflow:hidden;
}

.dutio-card-header{
    padding:20px 24px;
    border-bottom:1px solid #ececec;
}

.dutio-card-header h3{
    margin:0;
    font-size:20px;
    font-weight:600;
}

.dutio-card-body{
    padding:24px;
}

.table th{
    font-weight:600;
    white-space:nowrap;
}

.table td{
    vertical-align:middle;
}

.score-circle{
    width:150px;
    height:150px;
    margin:auto;
    border-radius:50%;
    background:linear-gradient(135deg,#4B6B45,#7DA46E);
    color:#fff;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:42px;
    font-weight:bold;
    box-shadow:0 15px 25px rgba(0,0,0,.15);
}

.badge{
    padding:.55rem .8rem;
    border-radius:10px;
}

@media (max-width:768px){

    .dutio-point-banner{
        flex-direction:column;
        text-align:center;
        padding:25px;
    }

    .dutio-point-content h2{
        font-size:42px;
    }

    .score-circle{
        width:120px;
        height:120px;
        font-size:32px;
    }

}

</style>

@endpush