@extends('layouts.admin')

@section('content')

<div class="dutio-page-header d-flex justify-content-between align-items-center">

    <div>
        <h1>Kelola Pengguna</h1>
        <p class="text-muted">
            Data penghuni dan koordinator.
        </p>
    </div>

    <a href="/koordinator/user/create"
        class="btn btn-dutio-primary">

        + Tambah Pengguna

    </a>

</div>

<div class="dutio-card">

    <div class="dutio-card-header">
        <h3>Daftar Pengguna</h3>
    </div>

    <div class="dutio-card-body">

        <table class="table align-middle">

            <thead>

            <tr>

                <th>Nama</th>
                <th>Email</th>
                <th>Kamar</th>
                <th>Role</th>
                <th width="180">Aksi</th>

            </tr>

            </thead>

            <tbody>

            @foreach($users as $user)

                <tr>

                    <td>{{ $user['nama'] }}</td>

                    <td>{{ $user['email'] }}</td>

                    <td>{{ $user['kamar'] }}</td>

                    <td>

                        <span class="badge bg-primary">

                            {{ $user['role'] }}

                        </span>

                    </td>

                    <td>

                        <a
                            href="/koordinator/user/{{ $user['id'] }}/edit"
                            class="btn btn-warning btn-sm text-white">

                            Edit

                        </a>

                        <button
                            class="btn btn-danger btn-sm">

                            Hapus

                        </button>

                    </td>

                </tr>

            @endforeach

            </tbody>

        </table>

    </div>

</div>

@endsection