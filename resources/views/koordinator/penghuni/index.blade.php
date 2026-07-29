@extends('layouts.admin')

@section('content')

<div class="dutio-page-header d-flex justify-content-between align-items-center">

    <div>
        <h1>Data Penghuni</h1>
        <p class="text-muted mb-0">
            Kelola data seluruh penghuni asrama.
        </p>
    </div>

    <a href="{{ route('koordinator.penghuni.create') }}"
        class="btn btn-dutio-primary">

        + Tambah Penghuni

    </a>

</div>


@if(session('success'))

<div class="alert alert-success">

    {{ session('success') }}

</div>

@endif


<div class="dutio-card">

    <div class="dutio-card-header">

        <h3>Daftar Penghuni</h3>

    </div>

    <div class="dutio-card-body">

        <div class="table-responsive">

            <table class="table table-hover align-middle">

                <thead>

                    <tr>

                        <th width="70">No</th>

                        <th>Nama Penghuni</th>

                        <th>Kamar</th>

                        <th>Akun Login</th>

                        <th width="180">Aksi</th>

                    </tr>

                </thead>

                <tbody>

                @forelse($penghunis as $item)

                    <tr>

                        <td>

                            {{ $loop->iteration }}

                        </td>

                        <td>

                            <strong>

                                {{ $item->nama_penghuni }}

                            </strong>

                        </td>

                        <td>

                            Kamar {{ $item->kamar }}

                        </td>

                        <td>

                            {{ $item->user->name }}

                        </td>

                        <td>

                            <a href="{{ route('koordinator.penghuni.edit',$item->id) }}"
                                class="btn btn-warning btn-sm text-white">

                                Edit

                            </a>

                            <form action="{{ route('koordinator.penghuni.destroy',$item->id) }}"
                                method="POST"
                                class="d-inline">

                                @csrf
                                @method('DELETE')

                                <button
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin ingin menghapus penghuni ini?')">

                                    Hapus

                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="5"
                            class="text-center py-5 text-muted">

                            Belum ada data penghuni.

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection