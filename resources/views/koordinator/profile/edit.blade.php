@extends('layouts.admin')

@section('content')

<div class="dutio-page-header">

    <h1>Edit Profil</h1>

    <p class="text-muted mb-0">
        Perbarui informasi akun koordinator.
    </p>

</div>

<div class="row justify-content-center">

    <div class="col-lg-8">

        <div class="dutio-card">

            <div class="dutio-card-header">

                <h3>Edit Informasi Profil</h3>

            </div>

            <div class="dutio-card-body">

                @if(session('success'))

                    <div class="alert alert-success">

                        {{ session('success') }}

                    </div>

                @endif

                @if($errors->any())

                    <div class="alert alert-danger">

                        <ul class="mb-0">

                            @foreach($errors->all() as $error)

                                <li>{{ $error }}</li>

                            @endforeach

                        </ul>

                    </div>

                @endif

                <form action="{{ route('koordinator.profile.update') }}"
                      method="POST">

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
                            value="{{ old('name', $user->name) }}"
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
                            value="{{ old('email', $user->email) }}"
                            required>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">

                            Kamar

                        </label>

                        <input
                            type="text"
                            class="form-control"
                            value="{{ $user->kamar ?? '-' }}"
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

                    <div class="d-flex justify-content-end gap-2">

                        <a href="{{ route('koordinator.profile.index') }}"
                           class="btn btn-outline-secondary">

                            Kembali

                        </a>

                        <button
                            type="submit"
                            class="btn btn-dutio-primary">

                            Simpan Perubahan

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

@endsection