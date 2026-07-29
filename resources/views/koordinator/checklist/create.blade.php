@extends('layouts.admin')

@section('content')

<div class="dutio-page-header">
    <h1>Tambah Checklist</h1>

    <p class="text-muted">
        Tambahkan aktivitas checklist untuk setiap tugas piket.
    </p>
</div>

<div class="dutio-card">

    <div class="dutio-card-body">

        <form method="POST" action="/koordinator/checklist">

            @csrf

            {{-- Tugas Piket --}}
            <div class="mb-3">

                <label class="form-label">
                    Tugas Piket
                </label>

                <select
                    name="tugas_piket_id"
                    class="form-select"
                    required>

                    <option value="">
                        Pilih Tugas
                    </option>

                    @foreach($tugas as $item)

                        <option
                            value="{{ $item->id }}"
                            {{ old('tugas_piket_id') == $item->id ? 'selected' : '' }}>

                            {{ $item->areaPiket->nama_area }}
                            -
                            {{ $item->nama_tugas }}

                        </option>

                    @endforeach

                </select>

                @error('tugas_piket_id')

                    <small class="text-danger">

                        {{ $message }}

                    </small>

                @enderror

            </div>

            {{-- Aktivitas --}}
            <div class="mb-4">

                <label class="form-label">
                    Aktivitas Checklist
                </label>

                <input
                    type="text"
                    name="aktivitas"
                    class="form-control"
                    value="{{ old('aktivitas') }}"
                    placeholder="Contoh : Mengambil sapu"
                    required>

                @error('aktivitas')

                    <small class="text-danger">

                        {{ $message }}

                    </small>

                @enderror

            </div>

            <div class="d-flex justify-content-end gap-2">

                <a
                    href="/koordinator/checklist"
                    class="btn btn-outline-secondary">

                    Batal

                </a>

                <button
                    type="submit"
                    class="btn btn-dutio-primary">

                    Simpan

                </button>

            </div>

        </form>

    </div>

</div>

@endsection