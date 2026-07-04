@extends('layouts.admin')

@section('content')

<div class="dutio-page-header">
    <h1>Tambah Jadwal Piket</h1>
    <p class="text-muted">
        Tambahkan pembagian piket untuk penghuni asrama.
    </p>
</div>

<div class="dutio-card">

    <div class="dutio-card-header">
        <h3>Form Jadwal Piket</h3>
    </div>

    <div class="dutio-card-body">

        <form>

            <div class="mb-3">
                <label class="form-label">Kamar</label>

                <select class="form-select">
                    <option>Pilih Kamar</option>
                    <option>Kamar A</option>
                    <option>Kamar B</option>
                    <option>Kamar C</option>
                    <option>Kamar D</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Area Piket</label>

                <select class="form-select">
                    <option>Pilih Area</option>
                    <option>Kamar Mandi</option>
                    <option>Koridor</option>
                    <option>Taman</option>
                    <option>Mushola</option>
                    <option>Dapur</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Hari</label>

                <select class="form-select">
                    <option>Pilih Hari</option>
                    <option>Senin</option>
                    <option>Selasa</option>
                    <option>Rabu</option>
                    <option>Kamis</option>
                    <option>Jumat</option>
                    <option>Sabtu</option>
                    <option>Minggu</option>
                </select>
            </div>

            <div class="d-flex justify-content-end gap-2">

                <a href="/koordinator/jadwal"
                   class="btn btn-outline-secondary">
                    Batal
                </a>

                <button type="submit"
                        class="btn btn-dutio-primary">
                    Simpan Jadwal
                </button>

            </div>

        </form>

    </div>

</div>

@endsection