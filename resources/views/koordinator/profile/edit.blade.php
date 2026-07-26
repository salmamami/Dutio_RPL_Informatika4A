@extends('layouts.admin')

@section('content')

<div class="dutio-page-header">
    <h1>Edit Profil</h1>
    <p class="text-muted">
        Ubah informasi akun koordinator.
    </p>
</div>

<div class="row justify-content-center">

    <div class="col-lg-8">

        <div class="dutio-card">

            <div class="dutio-card-header">
                <h3>Edit Informasi</h3>
            </div>

            <div class="dutio-card-body">

                <form action="{{ route('koordinator.profile.update') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">
                            Nama
                        </label>

                        <input
                            type="text"
                            name="name"
                            class="form-control"
                            value="{{ old('name',$user->name) }}"
                            required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">
                            Email
                        </label>

                        <input
                            type="email"
                            name="email"
                            class="form-control"
                            value="{{ old('email',$user->email) }}"
                            required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">
                            Kamar
                        </label>

                        <input
                            type="text"
                            class="form-control"
                            value="{{ $user->kamar }}"
                            readonly>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">
                            Role
                        </label>

                        <input
                            type="text"
                            class="form-control"
                            value="{{ ucfirst($user->role) }}"
                            readonly>
                    </div>

                    <div class="d-flex gap-2">

                        <button
                            type="submit"
                            class="btn btn-dutio-success">

                            <i class="fa-solid fa-floppy-disk"></i>
                            Simpan

                        </button>

                        <a href="/koordinator/profile"
                           class="btn btn-dutio-outline">

                            <i class="fa-solid fa-arrow-left"></i>
                            Kembali

                        </a>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

@endsection