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
@endphp

@foreach($grouped as $hari => $items)

    @php
        $isToday = $items->contains('status', 'Hari Ini');
    @endphp

    <div class="dutio-day-section {{ $isToday ? 'is-today' : '' }}">

        <div class="dutio-day-header">
            <div class="dutio-day-badge">
                <i class="fa-solid fa-calendar-day"></i>
            </div>
            <div>
                <h3>{{ $hari }}</h3>
                <span>{{ $items->count() }} kamar bertugas</span>
            </div>

            @if($isToday)
                <span class="dutio-pill dutio-pill--success ms-auto">
                    <i class="fa-solid fa-bolt"></i> Sedang Berjalan
                </span>
            @endif
        </div>

        <div class="dutio-day-grid">

            @foreach($items as $jadwal)

                <div class="dutio-schedule-tile {{ $jadwal['status'] == 'Hari Ini' ? 'is-active' : '' }}">

                    <div class="dutio-schedule-tile-icon">
                        <i class="fa-solid fa-door-open"></i>
                    </div>

                    <div class="dutio-schedule-tile-body">
                        <strong>{{ $jadwal['kamar'] }}</strong>
                        <span><i class="fa-solid fa-location-dot"></i> {{ $jadwal['area'] }}</span>
                    </div>

                    @if($jadwal['status'] == 'Hari Ini')
                        <span class="dutio-schedule-tile-badge">
                            <i class="fa-solid fa-check"></i>
                        </span>
                    @endif

                </div>

            @endforeach

        </div>

    </div>

@endforeach

@push('styles')
<style>

/* ===== DAY SECTION ===== */
.dutio-day-section{
    margin-bottom: 26px;
}

.dutio-day-header{
    display:flex;
    align-items:center;
    gap:14px;
    margin-bottom:14px;
}

.dutio-day-header h3{
    font-size:1.1rem;
    margin-bottom:2px;
}

.dutio-day-header span{
    font-size:.8rem;
    color: var(--dutio-ink-soft);
}

.dutio-day-badge{
    width:44px;
    height:44px;
    border-radius:13px;
    background: var(--dutio-primary-soft);
    color: var(--dutio-primary);
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:1.1rem;
    flex-shrink:0;
    transition: background .25s ease, color .25s ease;
}

.dutio-day-section.is-today .dutio-day-badge{
    background: var(--dutio-primary);
    color:#fff;
}

.dutio-day-section.is-today .dutio-day-header h3{
    color: var(--dutio-primary);
}

/* ===== GRID OF TILES ===== */
.dutio-day-grid{
    display:grid;
    grid-template-columns:repeat(auto-fill,minmax(240px,1fr));
    gap:14px;
}

.dutio-schedule-tile{
    position:relative;
    display:flex;
    align-items:center;
    gap:14px;
    background: var(--dutio-surface);
    border:1px solid var(--dutio-border);
    border-radius:16px;
    padding:16px;
    box-shadow: var(--dutio-shadow);
    transition: transform .2s ease, box-shadow .2s ease, border-color .2s ease;
    overflow:hidden;
}

.dutio-schedule-tile:hover{
    transform: translateY(-3px);
    box-shadow: var(--dutio-shadow-hover);
}

.dutio-schedule-tile-icon{
    width:42px;
    height:42px;
    border-radius:12px;
    background: var(--dutio-bg);
    color: var(--dutio-ink-soft);
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:1.05rem;
    flex-shrink:0;
    transition: background .25s ease, color .25s ease;
}

.dutio-schedule-tile-body{
    flex:1;
    min-width:0;
}

.dutio-schedule-tile-body strong{
    display:block;
    font-size:.95rem;
    margin-bottom:2px;
}

.dutio-schedule-tile-body span{
    display:block;
    font-size:.78rem;
    color: var(--dutio-ink-soft);
    white-space:nowrap;
    overflow:hidden;
    text-overflow:ellipsis;
}

.dutio-schedule-tile-body span i{
    font-size:.7rem;
    margin-right:3px;
}

/* Kamar yg lagi tugas hari ini */
.dutio-schedule-tile.is-active{
    border-color: var(--dutio-primary);
    background: linear-gradient(135deg, var(--dutio-primary-soft), var(--dutio-surface));
}

.dutio-schedule-tile.is-active .dutio-schedule-tile-icon{
    background: var(--dutio-primary);
    color:#fff;
}

.dutio-schedule-tile-badge{
    position:absolute;
    top:12px;
    right:12px;
    width:22px;
    height:22px;
    border-radius:50%;
    background: var(--dutio-primary);
    color:#fff;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:.65rem;
}

</style>
@endpush

@endsection