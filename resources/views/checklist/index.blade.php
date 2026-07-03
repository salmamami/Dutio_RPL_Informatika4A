@extends('layouts.app')

@section('content')

<div class="dutio-page-header">
    <h1>Checklist Piket</h1>
    <p class="text-muted">
        Area hari ini :
        <strong>{{ $area['nama'] }}</strong>
    </p>

    <span class="badge bg-warning text-dark">
        {{ $area['status'] }}
    </span>
</div>

<div class="dutio-card mb-4">

    <div class="dutio-card-header">
        <h3>Progress Pekerjaan</h3>
    </div>

    <div class="dutio-card-body">

        @php
            $total = count($checklists);
            $selesai = collect($checklists)->where('selesai', true)->count();
            $persen = ($selesai / $total) * 100;
        @endphp

        <div class="progress mb-3" style="height:18px;">
            <div class="progress-bar bg-success"
                 style="width: {{ $persen }}%">
            </div>
        </div>

        <strong>{{ $selesai }} / {{ $total }}</strong>
        checklist selesai.

    </div>

</div>

<div class="dutio-card">

    <div class="dutio-card-header">
        <h3>Checklist Area</h3>
    </div>

    <div class="dutio-card-body">

        @foreach($checklists as $item)

            <div class="form-check mb-3">

                <input
                    class="form-check-input"
                    type="checkbox"
                    {{ $item['selesai'] ? 'checked' : '' }}
                >

                <label class="form-check-label">

                    {{ $item['nama'] }}

                </label>

            </div>

        @endforeach

    </div>

</div>

<div class="dutio-card mt-4">

    <div class="dutio-card-header">
        <h3>Langkah Selanjutnya</h3>
    </div>

    <div class="dutio-card-body">

        @if($selesai == $total)

            <a href="/laporan"
               class="btn btn-dutio-success">

                Upload Laporan

            </a>

        @else

            <button
                class="btn btn-secondary"
                disabled>

                Selesaikan Checklist Terlebih Dahulu

            </button>

        @endif

    </div>

</div>

@endsection