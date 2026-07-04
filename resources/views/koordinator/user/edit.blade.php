@extends('layouts.admin')

@section('content')

<div class="dutio-page-header">
    <h1>Edit Pengguna</h1>
    <p class="text-muted">
        Perbarui data pengguna.
    </p>
</div>

<div class="dutio-card">

    <div class="dutio-card-body">

        <form>

            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input
                    type="text"
                    class="form-control"
                    value="{{ $user['nama'] }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input
                    type="email"
                    class="form-control"
                    value="{{ $user['email'] }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Kamar</label>

                <select class="form-select">

                    <option {{ $user['kamar']=='Kamar A' ? 'selected' : '' }}>Kamar A</option>
                    <option {{ $user['kamar']=='Kamar B' ? 'selected' : '' }}>Kamar B</option>
                    <option>Kamar C</option>
                    <option>Kamar D</option>

                </select>

            </div>

            <div class="mb-4">
                <label class="form-label">Role</label>

                <select class="form-select">

                    <option {{ $user['role']=='Penghuni' ? 'selected' : '' }}>
                        Penghuni
                    </option>

                    <option {{ $user['role']=='Koordinator' ? 'selected' : '' }}>
                        Koordinator
                    </option>

                </select>

            </div>

            <div class="d-flex justify-content-end gap-2">

                <a href="/koordinator/user"
                    class="btn btn-outline-secondary">

                    Batal

                </a>

                <button
                    class="btn btn-warning text-white">

                    Update

                </button>

            </div>

        </form>

    </div>

</div>

@endsection