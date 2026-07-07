@extends('layouts.admin')

@section('content')

<div class="dutio-page-header">
    <h1>Tambah Pengguna</h1>
    <p class="text-muted">
        Tambahkan penghuni atau koordinator baru.
    </p>
</div>

<div class="dutio-card">

    <div class="dutio-card-body">

        <form>

            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" class="form-control" placeholder="Masukkan nama">
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" placeholder="Masukkan email">
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" placeholder="Masukkan password">
            </div>

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

            <div class="mb-4">
                <label class="form-label">Role</label>

                <select class="form-select">
                    <option>Penghuni</option>
                    <option>Koordinator</option>
                </select>

            </div>

            <div class="d-flex justify-content-end gap-2">

                <a href="/koordinator/user"
                    class="btn btn-outline-secondary">

                    Batal

                </a>

                <button
                    class="btn btn-dutio-primary">

                    Simpan

                </button>

            </div>

        </form>

    </div>

</div>

@endsection