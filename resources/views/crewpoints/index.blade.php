@extends('layouts.app')

@section('content')

<div class="dutio-page-header">
    <h1>Crew Points</h1>
    <p class="text-muted">Poin dan evaluasi kinerja penghuni asrama</p>
</div>

<div class="dutio-points-hero mb-4">

```
<div class="dutio-points-hero-icon">
    <i class="fa-solid fa-trophy"></i>
</div>

<div class="dutio-points-hero-body">
    <span class="dutio-points-hero-label">Total Poin Saya</span>

    <div class="dutio-points-hero-value">
        <span id="pointCounter">{{ $totalPoint }}</span>
    </div>

    @if($totalPoint >= 250)

        <span class="dutio-pill dutio-pill--success">
            <i class="fa-solid fa-crown"></i> Excellent
        </span>

    @elseif($totalPoint >= 150)

        <span class="dutio-pill dutio-pill--success">
            <i class="fa-solid fa-arrow-trend-up"></i> Performa Baik
        </span>

    @else

        <span class="dutio-pill dutio-pill--warning">
            <i class="fa-solid fa-seedling"></i> Terus Tingkatkan
        </span>

    @endif

</div>
```

</div>

<div class="row g-3">

```
{{-- RIWAYAT POIN --}}
<div class="col-lg-7">

    <div class="dutio-card h-100">

        <div class="dutio-card-header">
            <h3>Riwayat Poin</h3>
        </div>

        <div class="dutio-card-body">

            @forelse($riwayat as $item)

                @php
                    $laporan = $item->penilaian->laporan ?? null;
                    $area = $laporan?->jadwal?->areaPiket?->nama_area ?? 'Area';
                @endphp

                <div class="dutio-feed-item">

                    <div class="dutio-feed-icon dutio-feed-icon--up">
                        +{{ $item->poin }}
                    </div>

                    <div class="dutio-feed-body">

                        <strong>{{ $area }}</strong>

                        <span>
                            <i class="fa-regular fa-calendar"></i>
                            {{ $item->created_at->format('d M Y') }}
                        </span>

                    </div>

                    <span class="dutio-feed-value dutio-feed-value--up">
                        +{{ $item->poin }}
                    </span>

                </div>

            @empty

                <div class="text-center py-4 text-muted">

                    <i class="fa-regular fa-star fs-1 mb-3 d-block"></i>
                    Belum ada poin yang diterima.

                </div>

            @endforelse

        </div>

    </div>

</div>

{{-- EVALUASI TERBARU --}}
<div class="col-lg-5">

    <div class="dutio-card h-100">

        <div class="dutio-card-header">
            <h3>Evaluasi Terbaru</h3>
        </div>

        <div class="dutio-card-body">

            @if($riwayat->count() > 0)

                @php
                    $terbaru = $riwayat->first();
                    $penilaian = $terbaru->penilaian;
                @endphp

                <div class="mb-3">

                    <div class="d-flex justify-content-between mb-2">
                        <span class="fw-semibold">Nilai Kinerja</span>
                        <span>{{ $terbaru->poin }}%</span>
                    </div>

                    <div class="dutio-progress-track">

                        <div class="dutio-progress-fill"
                             style="width: {{ $terbaru->poin }}%; background: var(--dutio-success);">

                        </div>

                    </div>

                </div>

                <div class="p-3 rounded-3 bg-light border">

                    <div class="d-flex align-items-center gap-2 mb-2">
                        <i class="fa-solid fa-message text-success"></i>
                        <strong>Catatan Koordinator</strong>
                    </div>

                    <p class="mb-0 text-muted">
                        {{ $penilaian->evaluasi }}
                    </p>

                </div>

            @else

                <div class="text-center py-4 text-muted">

                    <i class="fa-regular fa-file-lines fs-1 mb-3 d-block"></i>
                    Belum ada evaluasi dari koordinator.

                </div>

            @endif

        </div>

    </div>

</div>
```

</div>

@endsection
