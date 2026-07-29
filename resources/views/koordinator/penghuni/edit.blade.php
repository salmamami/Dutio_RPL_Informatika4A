@extends('layouts.admin')

@section('content')

<div class="dutio-page-header">

    <h1>Edit Penghuni</h1>

    <p class="text-muted">

        Perbarui data penghuni.

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

        <h3>Form Edit Penghuni</h3>

    </div>

    <div class="dutio-card-body">

        <form
            action="{{ route('koordinator.penghuni.update',$penghuni->id) }}"
            method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">

                <label class="form-label">

                    Pengguna

                </label>

                <select
                    name="user_id"
                    id="user_id"
                    class="form-select">

                    @foreach($users as $user)

                    <option
                        value="{{ $user->id }}"
                        data-kamar="{{ $user->kamar }}"
                        {{ old('user_id',$penghuni->user_id)==$user->id ? 'selected':'' }}>

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
                    value="{{ old('nama_penghuni',$penghuni->nama_penghuni) }}"
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
                    value="{{ $penghuni->kamar }}"
                    readonly>

            </div>

            <div class="d-flex justify-content-end gap-2">

                <a href="{{ route('koordinator.penghuni.index') }}"
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

<script>

function updateKamar(){

    let select=document.getElementById('user_id');

    let kamar=select.options[select.selectedIndex].dataset.kamar;

    document.getElementById('kamar').value=kamar ?? '';

}

updateKamar();

document.getElementById('user_id').addEventListener('change',updateKamar);

</script>

@endsection