@extends('layouts.admin')

@section('content')

<div class="dutio-page-header">

    <h1>Edit Pengguna</h1>

    <p class="text-muted mb-0">
        Perbarui informasi akun penghuni maupun koordinator.
    </p>

</div>

@if($errors->any())

<div class="alert alert-danger shadow-sm">

    <strong>
        Terjadi kesalahan.
    </strong>

    <ul class="mb-0 mt-2">

        @foreach($errors->all() as $error)

            <li>{{ $error }}</li>

        @endforeach

    </ul>

</div>

@endif

<div class="row justify-content-center">

    <div class="col-lg-8">

        <div class="dutio-card">

            <div class="dutio-card-header">

                <h3 class="mb-0">

                    Form Edit Pengguna

                </h3>

            </div>

            <div class="dutio-card-body">

                <form
                    action="{{ route('koordinator.user.update',$user->id) }}"
                    method="POST">

                    @csrf
                    @method('PUT')

                    {{-- Nama --}}

                    <div class="mb-3">

                        <label class="form-label">

                            Nama Lengkap

                        </label>

                        <input
                            type="text"
                            name="name"
                            class="form-control"
                            value="{{ old('name',$user->name) }}"
                            required>

                    </div>

                    {{-- Email --}}

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

                    {{-- Role --}}

                    <div class="mb-3">

                        <label class="form-label">

                            Role

                        </label>

                        <select
                            name="role"
                            id="role"
                            class="form-select"
                            onchange="toggleKamar()"
                            required>

                            <option
                                value="penghuni"
                                {{ old('role',$user->role)=='penghuni' ? 'selected' : '' }}>

                                Penghuni

                            </option>

                            <option
                                value="koordinator"
                                {{ old('role',$user->role)=='koordinator' ? 'selected' : '' }}>

                                Koordinator

                            </option>

                        </select>

                    </div>

                    {{-- Kamar --}}

                    <div
                        class="mb-3"
                        id="kamarField">

                        <label class="form-label">

                            Nomor Kamar

                        </label>

                        <input
                            type="text"
                            name="kamar"
                            id="kamar"
                            class="form-control"
                            value="{{ old('kamar',$user->kamar) }}">

                    </div>

                    {{-- Password --}}

                    <div class="mb-3">

                        <label class="form-label">

                            Password Baru

                        </label>

                        <input
                            type="password"
                            name="password"
                            class="form-control"
                            placeholder="Kosongkan jika tidak diubah">

                        <small class="text-muted">

                            Isi hanya jika ingin mengganti password.

                        </small>

                    </div>

                    {{-- Status --}}

                    <div class="mb-4">

                        <label class="form-label">

                            Status Akun

                        </label>

                        <select
                            name="status"
                            class="form-select">

                            <option
                                value="aktif"
                                {{ old('status',$user->status)=='aktif' ? 'selected' : '' }}>

                                Aktif

                            </option>

                            <option
                                value="nonaktif"
                                {{ old('status',$user->status)=='nonaktif' ? 'selected' : '' }}>

                                Nonaktif

                            </option>

                        </select>

                    </div>

                    <div class="d-flex justify-content-end gap-2">

                        <a
                            href="{{ route('koordinator.user.index') }}"
                            class="btn btn-outline-secondary">

                            <i class="fa-solid fa-arrow-left me-1"></i>

                            Kembali

                        </a>

                        <button
                            type="submit"
                            class="btn btn-dutio-primary">

                            <i class="fa-solid fa-floppy-disk me-1"></i>

                            Simpan Perubahan

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

<script>

function toggleKamar(){

    let role=document.getElementById('role').value;

    let kamar=document.getElementById('kamar');

    let field=document.getElementById('kamarField');

    if(role==="koordinator"){

        field.style.display="none";

        kamar.value="";

    }else{

        field.style.display="block";

    }

}

toggleKamar();

</script>

@endsection