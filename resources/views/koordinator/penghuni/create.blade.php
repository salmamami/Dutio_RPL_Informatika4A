@extends('layouts.admin')

@section('content')

<div class="dutio-page-header">

    <h1>Tambah Penghuni</h1>

    <p class="text-muted">

        Tambahkan penghuni baru ke dalam sistem.

    </p>

</div>


@if($errors->any())

<div class="alert alert-danger">

    <ul class="mb-0">

        @foreach($errors->all() as $error)

        <li>{{ $error }}</li>

        @endforeach

    </ul>

</div>

@endif


<div class="dutio-card">

    <div class="dutio-card-header">

        <h3>Form Penghuni</h3>

    </div>

    <div class="dutio-card-body">

        <form action="{{ route('koordinator.penghuni.store') }}"
            method="POST">

            @csrf

            <div class="mb-3">

                <label class="form-label">

                    Pilih Pengguna

                </label>

                <select
                    name="user_id"
                    id="user_id"
                    class="form-select"
                    required>

                    <option value="">

                        Pilih Pengguna

                    </option>

                    @foreach($users as $user)

                    <option
                        value="{{ $user->id }}"
                        data-kamar="{{ $user->kamar }}">

                        {{ $user->kamar }} - {{ $user->name }}

                    </option>

                    @endforeach

                </select>

            </div>

            <div class="mb-3">

                <label class="form-label">

                    Nama Penghuni

                </label>

                <input
                    type="text"
                    name="nama_penghuni"
                    class="form-control"
                    value="{{ old('nama_penghuni') }}"
                    required>

            </div>

            <div class="mb-4">

                <label class="form-label">

                    Kamar

                </label>

                <input
                    type="text"
                    id="kamar"
                    class="form-control"
                    readonly>

            </div>

            <div class="d-flex justify-content-end gap-2">

                <a href="{{ route('koordinator.penghuni.index') }}"
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

<script>

document.getElementById('user_id').addEventListener('change',function(){

    let kamar=this.options[this.selectedIndex].dataset.kamar;

    document.getElementById('kamar').value=kamar ?? '';

});

</script>

@endsection