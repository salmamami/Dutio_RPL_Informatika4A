@extends('layouts.admin')

@section('content')

<div class="dutio-page-header d-flex justify-content-between align-items-center">

    <div>
        <h1>Kelola Jadwal Piket</h1>
        <p class="text-muted">
            Atur pembagian piket setiap kamar asrama.
        </p>
    </div>

    <a href="/koordinator/jadwal/create"
       class="btn btn-dutio-primary">
        + Tambah Jadwal
    </a>

</div>


<div class="dutio-card">

    <div class="dutio-card-header">

        <h3>Daftar Pembagian Piket</h3>

    </div>

    <div class="dutio-card-body">

        <div class="mb-3">

            <input
                type="text"
                class="form-control"
                placeholder="Cari kamar atau area piket...">

        </div>

        <table class="table align-middle">

            <thead>

                <tr>

                    <th>Kamar</th>

                    <th>Area Piket</th>

                    <th>Hari</th>

                    <th width="180">Aksi</th>

                </tr>

            </thead>

            <tbody>

                @foreach($jadwals as $jadwal)

                <tr>

                    <td>
                        <strong>{{ $jadwal['kamar'] }}</strong>
                    </td>

                    <td>
                        {{ $jadwal['area'] }}
                    </td>

                    <td>
                        {{ $jadwal['hari'] }}
                    </td>

                    <td>

                        <a href="/koordinator/jadwal/{{ $jadwal['id'] }}/edit"
                           class="btn btn-sm btn-warning text-white">

                            Edit

                        </a>

                        <button
                            class="btn btn-sm btn-danger">

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