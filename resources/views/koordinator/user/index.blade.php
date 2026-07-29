@extends('layouts.admin')

@section('content')

<div class="dutio-page-header d-flex justify-content-between align-items-center flex-wrap gap-2">

    <div>

        <h1>Kelola Pengguna</h1>

        <p class="text-muted mb-0">
            Kelola akun penghuni dan koordinator asrama.
        </p>

    </div>

    <a
        href="{{ route('koordinator.user.create') }}"
        class="btn btn-dutio-primary">

        <i class="fa-solid fa-plus me-1"></i>
        Tambah Pengguna

    </a>

</div>

@if(session('success'))

<div class="alert alert-success shadow-sm">

    <i class="fa-solid fa-circle-check me-2"></i>

    {{ session('success') }}

</div>

@endif

<div class="dutio-card">

    <div class="dutio-card-header d-flex justify-content-between align-items-center">

        <h3 class="mb-0">

            Daftar Pengguna

        </h3>

        <span class="badge bg-primary">

            {{ $users->count() }} Akun

        </span>

    </div>

    <div class="dutio-card-body p-0">

        <div class="table-responsive">

            <table class="table table-hover align-middle mb-0">

                <thead>

                    <tr>

                        <th width="60">
                            No
                        </th>

                        <th>
                            Nama
                        </th>

                        <th>
                            Email
                        </th>

                        <th>
                            Kamar
                        </th>

                        <th>
                            Role
                        </th>

                        <th>
                            Status
                        </th>

                        <th width="180">
                            Aksi
                        </th>

                    </tr>

                </thead>

                <tbody>

                @forelse($users as $user)

                    <tr>

                        <td>

                            {{ $loop->iteration }}

                        </td>

                        <td>

                            <strong>

                                {{ $user->name }}

                            </strong>

                        </td>

                        <td>

                            {{ $user->email }}

                        </td>

                        <td>

                            @if($user->role == 'penghuni')

                                Kamar {{ $user->kamar }}

                            @else

                                <span class="text-muted">

                                    -

                                </span>

                            @endif

                        </td>

                        <td>

                            @if($user->role == 'koordinator')

                                <span class="badge bg-primary">

                                    Koordinator

                                </span>

                            @else

                                <span class="badge bg-success">

                                    Penghuni

                                </span>

                            @endif

                        </td>

                        <td>

                            @if($user->status == 'aktif')

                                <span class="badge bg-success">

                                    Aktif

                                </span>

                            @else

                                <span class="badge bg-danger">

                                    Nonaktif

                                </span>

                            @endif

                        </td>

                        <td>

                            <div class="d-flex gap-2">

                                <a
                                    href="{{ route('koordinator.user.edit',$user->id) }}"
                                    class="btn btn-warning btn-sm text-white">

                                    <i class="fa-solid fa-pen"></i>

                                </a>

                                <form
                                    action="{{ route('koordinator.user.destroy',$user->id) }}"
                                    method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus akun ini?')">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn btn-danger btn-sm">

                                        <i class="fa-solid fa-trash"></i>

                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td
                            colspan="7"
                            class="text-center text-muted py-5">

                            <i class="fa-solid fa-users fa-2x mb-3 d-block"></i>

                            Belum ada data pengguna.

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection