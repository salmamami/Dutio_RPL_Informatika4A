@extends('layouts.app')

@section('content')

<div class="dutio-page-header">
    <h1>Pembagian Piket</h1>
    <p class="text-muted">
        Jadwal pembagian piket seluruh kamar asrama
    </p>
</div>

@php

$grouped = collect($jadwals)->groupBy('hari');

$mySchedule = collect($jadwals)->firstWhere('kamar', auth()->user()->kamar);

@endphp


@if($mySchedule)

<div class="dutio-my-duty">

    <div class="dutio-my-duty-icon">
        <i class="fa-solid fa-star"></i>
    </div>

    <div>

        <small>Tugasmu Hari Ini</small>

        <h2>{{ auth()->user()->kamar }}</h2>

        <p>
            Area piket :
            <strong>{{ $mySchedule['area'] }}</strong>
        </p>

    </div>

</div>

@endif


@foreach($grouped as $hari => $items)

<div class="dutio-day-section">

    <div class="dutio-day-header">

        <div class="dutio-day-badge">
            <i class="fa-solid fa-calendar-day"></i>
        </div>

        <div>

            <h3>{{ $hari }}</h3>

            <span>{{ $items->count() }} kamar bertugas</span>

        </div>

    </div>

    <div class="dutio-day-grid">

        @foreach($items as $jadwal)

        @php

        $isMine = auth()->user()->kamar == $jadwal['kamar'];

        switch($jadwal['area']){

            case 'Koridor':
                $icon='fa-road';
                break;

            case 'Mushola':
                $icon='fa-mosque';
                break;

            case 'Taman':
                $icon='fa-seedling';
                break;

            case 'Dapur':
                $icon='fa-utensils';
                break;

            case 'Kamar Mandi':
                $icon='fa-shower';
                break;

            default:
                $icon='fa-location-dot';
        }

        @endphp

        <div class="dutio-schedule-tile
            {{ $jadwal['status']=='Hari Ini' ? 'is-active' : '' }}
            {{ $isMine ? 'is-mine' : '' }}">

            <div class="dutio-schedule-tile-icon">
                <i class="fa-solid {{ $icon }}"></i>
            </div>

            <div class="dutio-schedule-tile-body">

                <strong>{{ $jadwal['kamar'] }}</strong>

                <span>{{ $jadwal['area'] }}</span>

            </div>

            @if($jadwal['status']=="Hari Ini")
                <span class="dutio-schedule-tile-badge">
                    Hari Ini
                </span>
            @endif

        </div>

        @endforeach

    </div>

</div>

@endforeach

@endsection


@push('styles')

<style>

/* ==========================
CARD TUGASKU
===========================*/

.dutio-my-duty{

display:flex;
align-items:center;
gap:20px;

padding:26px;

margin-bottom:30px;

background:linear-gradient(
135deg,
var(--dutio-primary-soft),
#F4F7F8);

border:1px solid var(--dutio-border);

border-radius:22px;

box-shadow:var(--dutio-shadow);

}


.dutio-my-duty-icon{

width:68px;
height:68px;

border-radius:18px;

background:var(--dutio-primary);

display:flex;
justify-content:center;
align-items:center;

color:white;

font-size:26px;

box-shadow:0 10px 20px rgba(61,90,108,.18);

}

.dutio-my-duty small{

display:block;

font-size:.82rem;

color:var(--dutio-ink-soft);

margin-bottom:5px;

}

.dutio-my-duty h2{

font-size:1.45rem;

margin-bottom:4px;

color:var(--dutio-primary);

}


.dutio-my-duty p{

margin:0;

color:var(--dutio-ink-soft);

}

.dutio-my-duty strong{

color:var(--dutio-success);

font-weight:700;

}


/* ==========================
DAY
==========================*/

.dutio-day-section{

margin-bottom:32px;

}

.dutio-day-header{

display:flex;

align-items:center;

gap:14px;

margin-bottom:18px;

}

.dutio-day-badge{

width:46px;

height:46px;

border-radius:14px;

background:var(--dutio-primary-soft);

display:flex;

justify-content:center;

align-items:center;

color:var(--dutio-primary);

font-size:18px;

}


/* ==========================
GRID
==========================*/

.dutio-day-grid{

display:grid;

grid-template-columns:repeat(auto-fill,minmax(260px,1fr));

gap:18px;

}


/* ==========================
CARD
==========================*/

.dutio-schedule-tile{

position:relative;

display:flex;

align-items:center;

gap:16px;

padding:18px;

background:white;

border-radius:18px;

border:1px solid #ECECEC;

transition:.3s;

box-shadow:0 8px 22px rgba(0,0,0,.05);

}

.dutio-schedule-tile:hover{

transform:translateY(-6px);

box-shadow:0 16px 35px rgba(0,0,0,.09);

}

.dutio-schedule-tile-icon{

width:50px;

height:50px;

border-radius:14px;

background:#EEF3F6;

display:flex;

justify-content:center;

align-items:center;

font-size:20px;

color:var(--dutio-primary);

}

.dutio-schedule-tile-body strong{

display:block;

font-size:1rem;

margin-bottom:4px;

}

.dutio-schedule-tile-body span{

color:#777;

font-size:.82rem;

}


/* ==========================
PUNYA USER LOGIN
==========================*/

.dutio-schedule-tile.is-mine{

border:2px solid #3D5A6C;

background:linear-gradient(135deg,#EDF5FF,#FFFFFF);

}

.dutio-schedule-tile.is-mine::before{

content:"PUNYAMU";

position:absolute;

top:14px;

right:14px;

background:#3D5A6C;

color:white;

padding:4px 10px;

font-size:.65rem;

border-radius:999px;

font-weight:700;

letter-spacing:.5px;

}


/* ==========================
HARI INI
==========================*/

.dutio-schedule-tile.is-active{

border-color:#5B8A72;

}

.dutio-schedule-tile-badge{

position:absolute;

bottom:14px;

right:14px;

padding:5px 10px;

background:#5B8A72;

color:white;

border-radius:999px;

font-size:.7rem;

font-weight:600;

}

</style>

@endpush