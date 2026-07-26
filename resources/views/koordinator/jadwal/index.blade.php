@extends('layouts.admin')

@section('content')
<div class="dutio-page-header d-flex justify-content-between align-items-center">
    <div>
        <h1>Kelola Jadwal Piket</h1>
        <p class="text-muted">
            Atur pembagian piket penghuni asrama.
        </p>
    </div>

    <a href="/koordinator/jadwal/create" class="btn btn-dutio-primary">
        + Tambah Jadwal
    </a>
</div>

<div class="dutio-card">
    <div class="dutio-card-header">
        <h3>Daftar Jadwal Piket</h3>
    </div>

    <div class="dutio-card-body">
        <table class="table align-middle">
            <thead>
                <tr>
                    <th>Penghuni</th>
                    <th>Kamar</th>
                    <th>Area Piket</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th width="180">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach($jadwals as $jadwal)
                <tr>
                    <td>
                        <strong>
                            {{ $jadwal->user->name }}
                        </strong>
                    </td>

                    <td>
                        {{ $jadwal->user->kamar }}
                    </td>

                    <td>
                        {{ $jadwal->areaPiket->nama_area }}
                    </td>

                    <td>
                        {{ \Carbon\Carbon::parse($jadwal->tanggal)->format('d M Y') }}
                    </td>

                    <td>
                        @if($jadwal->status == 'Selesai')
                            <span class="badge bg-success">
                                Selesai
                            </span>
                        @else
                            <span class="badge bg-warning">
                                Belum Dikerjakan
                            </span>
                        @endif
                    </td>

                    <td>
                        <a href="/koordinator/jadwal/{{ $jadwal->id }}/edit"
                           class="btn btn-sm btn-warning text-white">
                            Edit
                        </a>

                        <form
                            action="/koordinator/jadwal/{{ $jadwal->id }}"
                            method="POST"
                            style="display:inline">

                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                onclick="return confirm('Hapus jadwal ini?')"
                                class="btn btn-sm btn-danger">
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
@endsection