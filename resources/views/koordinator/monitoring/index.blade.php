@extends('layouts.admin')

@section('content')

<div class="dutio-page-header">

    <h1>Monitoring Piket</h1>

    <p class="text-muted">
        Pantau progres pelaksanaan piket setiap kamar.
    </p>

</div>

<div class="row">

@forelse($monitoring as $group => $items)

@php

    $total = $items->count();

    $selesai = $items->where('status','Selesai')->count();

    $persen = $total ? round(($selesai / $total) * 100) : 0;

    $first = $items->first();

@endphp

<div class="col-lg-4 col-md-6 mb-4">

    <div class="card shadow-sm border-0 h-100">

        <div class="card-body">

            <div class="d-flex justify-content-between align-items-center mb-3">

                <h4 class="mb-0">

                    🏠 Kamar {{ $first->user->kamar }}

                </h4>

                @if($persen == 100)

                    <span class="badge bg-success">

                        Selesai

                    </span>

                @else

                    <span class="badge bg-warning text-dark">

                        Berjalan

                    </span>

                @endif

            </div>

            <p class="mb-2">

                <strong>Area:</strong>

                {{ optional($first->areaPiket)->nama_area ?? '-' }}

            </p>

            <p class="mb-3">

                <strong>Tanggal:</strong>

                {{ \Carbon\Carbon::parse($first->tanggal)->format('d M Y') }}

            </p>

            <div class="progress mb-3" style="height:20px;">

                <div
                    class="progress-bar"
                    role="progressbar"
                    style="width: {{ $persen }}%;"
                    aria-valuenow="{{ $persen }}"
                    aria-valuemin="0"
                    aria-valuemax="100">

                    {{ $persen }}%

                </div>

            </div>

            <div class="d-flex justify-content-between mb-3">

                <span>

                    Progress

                </span>

                <strong>

                    {{ $selesai }} / {{ $total }}

                </strong>

            </div>

            <a
                href="/koordinator/monitoring/{{ $group }}"
                class="btn btn-dutio-primary w-100">

                Lihat Detail

            </a>

        </div>

    </div>

</div>

@empty

<div class="col-12">

    <div class="card shadow-sm">

        <div class="card-body text-center py-5 text-muted">

            Belum ada data monitoring.

        </div>

    </div>

</div>

@endforelse

</div>

@endsection