@extends('layouts.app')

@section('content')

<div class="dutio-page-header mb-4">
    <h1>Crew Points</h1>
    <p class="text-muted mb-0">
        Pantau perkembangan poin dan evaluasi dari koordinator
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

{{-- HERO --}}
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
                 style="width:{{ $progress }}%; background:{{ $color }};">
            </div>

        </div>

        <div class="d-flex justify-content-between mt-2">

            <small>{{ $badge }} {{ $level }}</small>

            <small>
                {{ number_format($progress,0) }}% menuju Excellent
            </small>

        </div>

    </div>

</div>

<div class="row g-4">

    {{-- RIWAYAT --}}
    <div class="col-lg-7">

        <div class="dutio-card h-100">

            <div class="dutio-card-header">
                <h3>Riwayat Crew Point</h3>
            </div>

            <div class="dutio-card-body">

                @forelse($riwayat as $item)

                    @php
                        $laporan = $item->penilaian->laporan ?? null;
                        $area = $laporan?->jadwal?->areaPiket?->nama_area ?? '-';
                    @endphp

                    <div class="point-item">

                        <div class="point-circle">
                            +{{ $item->poin }}
                        </div>

                        <div class="flex-grow-1">

                            <strong>{{ $area }}</strong>

                            <div class="text-muted small">
                                {{ $item->created_at->format('d F Y') }}
                            </div>

                        </div>

                        <span class="badge bg-success fs-6">
                            +{{ $item->poin }}
                        </span>

                    </div>

                @empty

                    <div class="text-center py-5 text-muted">

                        <i class="fa-regular fa-star fs-1 mb-3"></i>

                        <p>
                            Belum ada crew point.
                        </p>

                    </div>

                @endforelse

            </div>

        </div>

    </div>

    {{-- EVALUASI --}}
    <div class="col-lg-5">

        <div class="dutio-card h-100">

            <div class="dutio-card-header">
                <h3>Evaluasi Terbaru</h3>
            </div>

            <div class="dutio-card-body">

                @if($riwayat->count())

                    @php
                        $terbaru = $riwayat->first();
                    @endphp

                    <div class="text-center mb-4">

                        <div class="score-circle">

                            {{ $terbaru->poin }}

                            <span>%</span>

                        </div>

                    </div>

                    <div class="alert alert-light border">

                        <h6 class="mb-3">

                            <i class="fa-solid fa-message me-2 text-success"></i>

                            Catatan Koordinator

                        </h6>

                        <p class="mb-0 text-muted">

                            {{ $terbaru->penilaian->evaluasi }}

                        </p>

                    </div>

                @else

                    <div class="text-center py-5 text-muted">

                        <i class="fa-regular fa-file-lines fs-1 mb-3"></i>

                        <p>

                            Belum ada evaluasi.

                        </p>

                    </div>

                @endif

            </div>

        </div>

    </div>

</div>

@endsection


@push('styles')

<style>

.dutio-point-banner{

    background:linear-gradient(135deg,#4B6B45,#698D63);

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

}

.point-item{

    display:flex;

    align-items:center;

    gap:16px;

    padding:15px 0;

    border-bottom:1px solid #ececec;

}

.point-item:last-child{

    border-bottom:none;

}

.point-circle{

    width:55px;

    height:55px;

    border-radius:50%;

    background:#4B6B45;

    color:#fff;

    display:flex;

    align-items:center;

    justify-content:center;

    font-weight:700;

}

.score-circle{

    width:150px;

    height:150px;

    margin:auto;

    border-radius:50%;

    background:linear-gradient(135deg,#4B6B45,#7DA46E);

    color:white;

    display:flex;

    align-items:center;

    justify-content:center;

    font-size:42px;

    font-weight:bold;

    box-shadow:0 15px 25px rgba(0,0,0,.15);

}

.score-circle span{

    font-size:18px;

    margin-left:3px;

}

</style>

@endpush