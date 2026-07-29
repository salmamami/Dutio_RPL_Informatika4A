@extends('layouts.admin')

@section('content')

<div class="dutio-page-header">

    <h1>Tambah Penilaian</h1>

    <p class="text-muted">
        Berikan penilaian kepada penghuni.
    </p>

</div>

<div class="card shadow-sm">

    <div class="card-body">

        <form method="POST"
              action="{{ route('koordinator.penilaian.store') }}">

            @csrf

            <input
                type="hidden"
                name="penghuni_id"
                value="{{ $penghuni->id }}">

            <div class="mb-3">

                <label class="form-label">
                    Nama Penghuni
                </label>

                <input
                    type="text"
                    class="form-control"
                    value="{{ $penghuni->nama_penghuni }}"
                    readonly>

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Kamar
                </label>

                <input
                    type="text"
                    class="form-control"
                    value="{{ $penghuni->kamar }}"
                    readonly>

            </div>

            @if($laporan)

            <div class="mb-3">

                <label class="form-label">
                    Laporan Terakhir
                </label>

                <input
                    type="text"
                    class="form-control"
                    value="{{ $laporan->created_at->format('d M Y') }}"
                    readonly>

            </div>

            @endif

            <div class="mb-3">

                <label class="form-label">
                    Poin
                </label>

                <input
                    type="number"
                    name="poin"
                    class="form-control"
                    min="0"
                    max="100"
                    required>

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Kategori
                </label>

                <select
                    name="kategori"
                    class="form-select">

                    <option value="Sangat Baik">
                        Sangat Baik
                    </option>

                    <option value="Baik">
                        Baik
                    </option>

                    <option value="Cukup">
                        Cukup
                    </option>

                    <option value="Kurang">
                        Kurang
                    </option>

                </select>

            </div>

            <div class="d-flex justify-content-end gap-2">

                <a
                    href="{{ route('koordinator.penilaian.index') }}"
                    class="btn btn-secondary">

                    Batal

                </a>

                <button
                    class="btn btn-success">

                    Simpan

                </button>

            </div>

        </form>

    </div>

</div>

@endsection