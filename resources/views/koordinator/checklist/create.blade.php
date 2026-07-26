@extends('layouts.admin')

@section('content')
<div class="dutio-page-header">
    <h1>Tambah Checklist</h1>
</div>

<div class="dutio-card">
    <div class="dutio-card-body">
        <form method="POST" action="/koordinator/checklist">
            @csrf

            <div class="mb-3">
                <label class="form-label">
                    Area
                </label>

                <select
                    name="area_piket_id"
                    class="form-select"
                    required>
                    @foreach($areas as $area)
                        <option
                            value="{{ $area->id }}"
                            {{ old('area_piket_id') == $area->id ? 'selected' : '' }}>
                            {{ $area->nama_area }}
                        </option>
                    @endforeach
                </select>

                @error('area_piket_id')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                @enderror
            </div>

            <div class="mb-4">
                <label class="form-label">
                    Tugas
                </label>

                <input
                    type="text"
                    name="aktivitas"
                    class="form-control"
                    value="{{ old('aktivitas') }}"
                    placeholder="Contoh: Menyapu lantai"
                    required>

                @error('aktivitas')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                @enderror
            </div>

            <div class="d-flex justify-content-end gap-2">
                <a href="/koordinator/checklist" class="btn btn-outline-secondary">
                    Batal
                </a>

                <button type="submit" class="btn btn-dutio-primary">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection