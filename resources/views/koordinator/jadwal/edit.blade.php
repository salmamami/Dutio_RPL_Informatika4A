@extends('layouts.admin')

@section('content')

<div class="dutio-page-header">
    <h1>Edit Jadwal Piket</h1>
    <p class="text-muted">
        Ubah pembagian piket penghuni.
    </p>
</div>

<div class="dutio-card">

    <div class="dutio-card-header">
        <h3>Form Edit Jadwal</h3>
    </div>

    <div class="dutio-card-body">

        <form>

            <div class="mb-3">
                <label class="form-label">Kamar</label>

                <select class="form-select">

                    <option {{ $jadwal['kamar']=='Kamar A' ? 'selected' : '' }}>Kamar A</option>
                    <option {{ $jadwal['kamar']=='Kamar B' ? 'selected' : '' }}>Kamar B</option>
                    <option {{ $jadwal['kamar']=='Kamar C' ? 'selected' : '' }}>Kamar C</option>
                    <option {{ $jadwal['kamar']=='Kamar D' ? 'selected' : '' }}>Kamar D</option>

                </select>

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Area Piket
                </label>

                <select class="form-select">

                    <option {{ $jadwal['area']=='Kamar Mandi' ? 'selected' : '' }}>Kamar Mandi</option>
                    <option>Koridor</option>
                    <option>Taman</option>
                    <option>Mushola</option>
                    <option>Dapur</option>

                </select>

            </div>

            <div class="mb-4">

                <label class="form-label">
                    Hari
                </label>

                <select class="form-select">

                    <option {{ $jadwal['hari']=='Senin' ? 'selected' : '' }}>Senin</option>
                    <option>Selasa</option>
                    <option>Rabu</option>
                    <option>Kamis</option>
                    <option>Jumat</option>

                </select>

            </div>

            <div class="d-flex justify-content-end gap-2">

                <a href="/koordinator/jadwal"
                   class="btn btn-outline-secondary">

                    Batal

                </a>

                <button
                    class="btn btn-warning text-white">

                    Update Jadwal

                </button>

            </div>

        </form>

    </div>

</div>

@endsection