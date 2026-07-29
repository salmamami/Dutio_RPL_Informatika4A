@extends('layouts.admin')

@section('content')

<div class="container mt-4">

    <div class="card shadow">

        <div class="card-header d-flex justify-content-between align-items-center">
            <h4>Detail Penilaian Penghuni</h4>

            <a href="{{ route('koordinator.penilaian.index') }}"
               class="btn btn-secondary">
                Kembali
            </a>
        </div>

        <div class="card-body">

            <table class="table table-bordered">

                <tr>
                    <th width="30%">Nama Penghuni</th>
                    <td>{{ $penilaian->penghuni->nama_penghuni }}</td>
                </tr>

                <tr>
                    <th>Kamar</th>
                    <td>{{ $penilaian->penghuni->kamar }}</td>
                </tr>

                <tr>
                    <th>Nilai</th>
                    <td>
                        <span class="badge bg-primary fs-6">
                            {{ $penilaian->poin }}
                        </span>
                    </td>
                </tr>

                <tr>
                    <th>Penghargaan</th>
                    <td>{{ $penilaian->kategori }}</td>
                </tr>

                <tr>
                    <th>Tanggal Penilaian</th>
                    <td>{{ $penilaian->created_at->format('d M Y H:i') }}</td>
                </tr>

            </table>

            <div class="mt-3">

                <a href="{{ route('koordinator.penilaian.edit', $penilaian->id) }}"
                   class="btn btn-warning">
                    Edit Penilaian
                </a>

                <p>ID Penilaian: {{ $penilaian->id }}</p>
                <p>Nama: {{ $penilaian->penghuni->nama_penghuni }}</p>
                
                <form action="{{ route('koordinator.penilaian.destroy', $penilaian->id) }}"
                      method="POST"
                      class="d-inline">

                    @csrf
                    @method('DELETE')

                    <button class="btn btn-danger"
                            onclick="return confirm('Hapus penilaian?')">
                        Hapus
                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

@endsection