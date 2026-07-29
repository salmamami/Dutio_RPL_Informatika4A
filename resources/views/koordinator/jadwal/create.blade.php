@extends('layouts.admin')

@section('content')

<div class="dutio-page-header">
    <h1>Tambah Jadwal Piket</h1>

    <p class="text-muted">
        Buat jadwal piket untuk satu kamar. Tugas akan dibagikan otomatis kepada seluruh penghuni sesuai area yang dipilih.
    </p>
</div>

<div class="dutio-card">

    <div class="dutio-card-header">
        <h3>Form Jadwal Piket</h3>
    </div>

    <div class="dutio-card-body">

        <form method="POST" action="/koordinator/jadwal">

            @csrf

            {{-- Kamar --}}
            <div class="mb-3">

                <label class="form-label">
                    Kamar
                </label>

                <select
                    name="kamar"
                    class="form-select @error('kamar') is-invalid @enderror"
                    required>

                    <option value="">
                        Pilih Kamar
                    </option>

                    @foreach($kamars as $kamar)

                        <option
                            value="{{ $kamar->kamar }}"
                            {{ old('kamar') == $kamar->kamar ? 'selected' : '' }}>

                            Kamar {{ $kamar->kamar }}

                        </option>

                    @endforeach

                </select>

                @error('kamar')

                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>

                @enderror

            </div>

            {{-- Area --}}
            <div class="mb-3">

                <label class="form-label">
                    Area Piket
                </label>

                <select
                    name="area_piket_id"
                    class="form-select @error('area_piket_id') is-invalid @enderror"
                    required>

                    <option value="">
                        Pilih Area
                    </option>

                    @foreach($areas as $area)

                        <option
                            value="{{ $area->id }}"
                            {{ old('area_piket_id') == $area->id ? 'selected' : '' }}>

                            {{ $area->nama_area }}

                        </option>

                    @endforeach

                </select>

                @error('area_piket_id')

                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>

                @enderror

            </div>

            {{-- Tanggal --}}
            <div class="mb-4">

                <label class="form-label">
                    Tanggal
                </label>

                <input
                    type="date"
                    name="tanggal"
                    class="form-control @error('tanggal') is-invalid @enderror"
                    value="{{ old('tanggal') }}"
                    min="{{ date('Y-m-d') }}"
                    required>

                @error('tanggal')

                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>

                @enderror

            </div>

            <div class="alert alert-info">

                <strong>Informasi :</strong>

                Setelah jadwal dibuat, sistem akan otomatis membagikan
                tugas piket kepada seluruh penghuni pada kamar yang dipilih
                berdasarkan daftar tugas di area tersebut.

            </div>

            <div class="d-flex justify-content-end gap-2">

                <a
                    href="/koordinator/jadwal"
                    class="btn btn-outline-secondary">

                    Batal

                </a>

                <button
                    type="submit"
                    class="btn btn-dutio-primary">

                    Simpan Jadwal

                </button>

            </div>

        </form>

    </div>

</div>

@endsection