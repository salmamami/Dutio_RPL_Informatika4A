@extends('layouts.admin')

@section('content')
<div class="dutio-page-header">
    <h1>Edit Jadwal Piket</h1>

    <p class="text-muted">
        Perbarui pembagian piket penghuni.
    </p>
</div>

<div class="dutio-card">
    <div class="dutio-card-body">
        <form method="POST" action="/koordinator/jadwal/{{ $jadwal->id }}">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">
                    Penghuni
                </label>

                <select name="user_id" class="form-select">
                    @foreach($users as $user)
                        <option value="{{ $user->id }}"
                            {{ $jadwal->user_id == $user->id ? 'selected' : '' }}>
                            {{ $user->name }} - {{ $user->kamar }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">
                    Area Piket
                </label>

                <select name="area_piket_id" class="form-select">
                    @foreach($areas as $area)
                        <option value="{{ $area->id }}"
                            {{ $jadwal->area_piket_id == $area->id ? 'selected' : '' }}>
                            {{ $area->nama_area }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">
                    Tanggal
                </label>

                <input
                    type="date"
                    name="tanggal"
                    class="form-control"
                    value="{{ $jadwal->tanggal }}">
            </div>

            <div class="d-flex justify-content-end gap-2">
                <a href="/koordinator/jadwal" class="btn btn-outline-secondary">
                    Batal
                </a>

                <button type="submit" class="btn btn-warning text-white">
                    Update Jadwal
                </button>
            </div>
        </form>
    </div>
</div>
@endsection