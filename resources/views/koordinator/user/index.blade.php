@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4>Kelola Akun</h4>

            <a href="/koordinator/user/create" class="btn btn-success">
                Tambah Akun
            </a>
        </div>

        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Kamar</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->kamar }}</td>

                        <td>
                            {{ ucfirst($user->role) }}
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
                            <a href="/koordinator/user/{{ $user->id }}/edit" 
                               class="btn btn-warning btn-sm">
                                Edit
                            </a>

                            <form
                                action="/koordinator/user/{{ $user->id }}"
                                method="POST"
                                style="display:inline">

                                @csrf
                                @method('DELETE')

                                <button
                                    onclick="return confirm('Hapus akun ini?')"
                                    class="btn btn-danger btn-sm">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection