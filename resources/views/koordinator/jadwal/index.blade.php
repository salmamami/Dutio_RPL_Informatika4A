@extends('layouts.admin')

@section('content')

<div class="dutio-page-header d-flex justify-content-between align-items-center">

    <div>

        <h1>Kelola Jadwal Piket</h1>

        <p class="text-muted">
            Atur pembagian jadwal piket penghuni.
        </p>

    </div>

    <a
        href="/koordinator/jadwal/create"
        class="btn btn-dutio-primary">

        + Tambah Jadwal

    </a>

</div>

@if(session('success'))

<div class="alert alert-success">

    {{ session('success') }}

</div>

@endif

<div class="dutio-card">

    <div class="dutio-card-header">

        <h3>Daftar Jadwal Piket</h3>

    </div>

    <div class="dutio-card-body">

        <div class="table-responsive">

            <table class="table table-hover align-middle">

                <thead>

                    <tr>

                        <th width="60">No</th>

                        <th>Penghuni</th>

                        <th>Kamar</th>

                        <th>Area</th>

                        <th>Tugas</th>

                        <th>Tanggal</th>

                        <th>Status</th>

                        <th width="170">Aksi</th>

                    </tr>

                </thead>

                <tbody>

                @forelse($jadwals as $jadwal)

                    <tr>

                        <td>

                            {{ $loop->iteration }}

                        </td>

                        <td>

                            <strong>

                                {{ $jadwal->user->name }}

                            </strong>

                        </td>

                        <td>

                            Kamar {{ $jadwal->user->kamar }}

                        </td>

                        <td>

                            {{ $jadwal->areaPiket->nama_area ?? '-' }}

                        </td>

                        <td>

                            <span class="badge bg-info text-dark">

                                {{ $jadwal->tugasPiket->nama_tugas ?? '-' }}

                            </span>

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

                                <span class="badge bg-warning text-dark">

                                    Belum Dikerjakan

                                </span>

                            @endif

                        </td>

                        <td>

                            <a
                                href="/koordinator/jadwal/{{ $jadwal->id }}/edit"
                                class="btn btn-warning btn-sm text-white">

                                Edit

                            </a>

                            <form
                                action="/koordinator/jadwal/{{ $jadwal->id }}"
                                method="POST"
                                class="d-inline">

                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin ingin menghapus jadwal ini?')">

                                    Hapus

                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="8" class="text-center text-muted py-4">

                            Belum ada jadwal piket.

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection