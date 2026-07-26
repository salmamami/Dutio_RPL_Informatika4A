@extends('layouts.admin')

@section('content')
<div class="dutio-page-header">
    <h1>Tambah Jadwal Piket</h1>

    <p class="text-muted">
        Tambahkan jadwal piket penghuni.
    </p>
</div>

<div class="dutio-card">
    <div class="dutio-card-header">
        <h3>Form Jadwal Piket</h3>
    </div>

    <div class="dutio-card-body">
        <form method="POST" action="/koordinator/jadwal">
            @csrf

            <div class="mb-3">
                <label class="form-label">
                    Penghuni
                </label>

                <select name="user_id" class="form-select">
                    <option>
                        Pilih Penghuni
                    </option>

                    @foreach($users as $user)
                        <option value="{{ $user->id }}">
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
                    <option>
                        Pilih Area
                    </option>

                    @foreach($areas as $area)
                        <option value="{{ $area->id }}">
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
                    class="form-control">
            </div>

            <div class="d-flex justify-content-end gap-2">
                <a href="/koordinator/jadwal" class="btn btn-outline-secondary">
                    Batal
                </a>

                <button type="submit" class="btn btn-dutio-primary">
                    Simpan Jadwal
                </button>
            </div>
        </form>
    </div>
</div>
@endsection