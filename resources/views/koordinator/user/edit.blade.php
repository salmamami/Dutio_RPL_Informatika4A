@extends('layouts.admin')

@section('content')

<div class="dutio-page-header">
    <h1>Edit Pengguna</h1>
    <p class="text-muted">
        Perbarui data akun pengguna DUTIO.
    </p>
</div>


<div class="dutio-card">

    <div class="dutio-card-body">


        <form method="POST"
              action="/koordinator/user/{{ $user->id }}">

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
                    value="{{ $user->name }}">

            </div>



            <div class="mb-3">

                <label class="form-label">
                    Email
                </label>

                <input
                    type="email"
                    name="email"
                    class="form-control"
                    value="{{ $user->email }}">

            </div>



            <div class="mb-3">

                <label class="form-label">
                    Kamar
                </label>


                <select 
                    name="kamar"
                    class="form-select">


                    <option value="Kamar A"
                    {{ $user->kamar == 'Kamar A' ? 'selected':'' }}>
                        Kamar A
                    </option>


                    <option value="Kamar B"
                    {{ $user->kamar == 'Kamar B' ? 'selected':'' }}>
                        Kamar B
                    </option>


                    <option value="Kamar C"
                    {{ $user->kamar == 'Kamar C' ? 'selected':'' }}>
                        Kamar C
                    </option>


                    <option value="Kamar D"
                    {{ $user->kamar == 'Kamar D' ? 'selected':'' }}>
                        Kamar D
                    </option>


                </select>


            </div>




            <div class="mb-3">

                <label class="form-label">
                    Role
                </label>


                <select
                    name="role"
                    class="form-select">


                    <option value="penghuni"
                    {{ $user->role == 'penghuni' ? 'selected':'' }}>

                        Penghuni

                    </option>


                    <option value="koordinator"
                    {{ $user->role == 'koordinator' ? 'selected':'' }}>

                        Koordinator

                    </option>


                </select>


            </div>




            <div class="mb-3">

                <label class="form-label">
                    Status Akun
                </label>


                <select
                    name="status"
                    class="form-select">


                    <option value="aktif"
                    {{ $user->status == 'aktif' ? 'selected':'' }}>

                        Aktif

                    </option>


                    <option value="nonaktif"
                    {{ $user->status == 'nonaktif' ? 'selected':'' }}>

                        Nonaktif

                    </option>


                </select>


            </div>




            <div class="mb-3">

                <label class="form-label">
                    Password Baru
                    <small class="text-muted">
                        (opsional)
                    </small>
                </label>


                <input
                    type="password"
                    name="password"
                    class="form-control"
                    placeholder="Kosongkan jika tidak diganti">


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