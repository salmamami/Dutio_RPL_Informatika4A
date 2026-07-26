@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h4>Tambah Akun</h4>
        </div>

        <div class="card-body">
            
            <form method="POST" action="/koordinator/user">
                @csrf

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input
                        name="name"
                        class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input
                        name="email"
                        type="email"
                        class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Kamar</label>
                    <input
                        name="kamar"
                        class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input
                        name="password"
                        type="password"
                        class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Role</label>
                    <select name="role" class="form-control">
                        <option value="penghuni">
                            Penghuni
                        </option>

                        <option value="koordinator">
                            Koordinator
                        </option>
                    </select>
                </div>

                <button type="submit" class="btn btn-success">
                    Simpan
                </button>
            </form>
        </div>
    </div>
</div>
@endsection