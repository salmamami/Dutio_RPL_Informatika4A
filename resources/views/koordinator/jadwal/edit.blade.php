@extends('layouts.admin')

@section('content')

<div class="dutio-page-header">
    <h1>Edit Jadwal Piket</h1>

    <p class="text-muted">
        Perbarui tanggal pelaksanaan jadwal piket.
    </p>
</div>

<div class="dutio-card">

    <div class="dutio-card-header">
        <h3>Informasi Jadwal</h3>
    </div>

    <div class="dutio-card-body">

        <form action="/koordinator/jadwal/{{ $jadwal->id }}" method="POST">

            @csrf
            @method('PUT')

            @if($errors->any())

                <div class="alert alert-danger">

                    <ul class="mb-0">

                        @foreach($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            @endif

            {{-- Penghuni --}}
            <div class="mb-3">

                <label class="form-label">
                    Penghuni
                </label>

                <input
                    type="text"
                    class="form-control"
                    value="{{ $jadwal->user->name }}"
                    readonly>

            </div>

            {{-- Kamar --}}
            <div class="mb-3">

                <label class="form-label">
                    Kamar
                </label>

                <input
                    type="text"
                    class="form-control"
                    value="Kamar {{ $jadwal->user->kamar }}"
                    readonly>

            </div>

            {{-- Area --}}
            <div class="mb-3">

                <label class="form-label">
                    Area Piket
                </label>

                <input
                    type="text"
                    class="form-control"
                    value="{{ optional($jadwal->areaPiket)->nama_area ?? '-' }}"
                    readonly>

            </div>

            {{-- Status --}}
            <div class="mb-3">

                <label class="form-label">
                    Status
                </label>

                <input
                    type="text"
                    class="form-control"
                    value="{{ $jadwal->status }}"
                    readonly>

            </div>

            {{-- Tanggal --}}
            <div class="mb-4">

                <label class="form-label">
                    Tanggal Piket
                </label>

                <input
                    type="date"
                    name="tanggal"
                    class="form-control"
                    value="{{ old('tanggal', $jadwal->tanggal) }}"
                    required>

            </div>

            <div class="d-flex justify-content-end gap-2">

                <a
                    href="/koordinator/jadwal"
                    class="btn btn-outline-secondary">

                    Kembali

                </a>

                <button
                    type="submit"
                    class="btn btn-warning text-white">

                    Simpan Perubahan

                </button>

            </div>

        </form>

    </div>

</div>

@endsection