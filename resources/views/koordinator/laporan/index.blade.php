@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h3 class="mb-1">Laporan Piket</h3>
            <small class="text-muted">
                Daftar laporan yang dikirim penghuni
            </small>
        </div>

    </div>

    <div class="card shadow-sm border-0">

        <div class="card-body p-0">

            <table class="table table-hover align-middle mb-0">

                <thead class="table-light">

                    <tr>

                        <th width="60">#</th>
                        <th>Kamar</th>
                        <th>Area</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th width="120">Aksi</th>

                    </tr>

                </thead>

                <tbody>

                @forelse($laporans as $laporan)

                    <tr>

                        <td>{{ $loop->iteration }}</td>

                        <td>{{ $laporan->user->kamar }}</td>

                        <td>{{ $laporan->jadwal->areaPiket->nama_area }}</td>

                        <td>{{ $laporan->created_at->format('d M Y') }}</td>

                        <td>

                            @switch($laporan->status)

                                @case('Menunggu Verifikasi')

                                    <span class="badge bg-warning text-dark">
                                        Menunggu Verifikasi
                                    </span>

                                    @break

                                @case('Disetujui')

                                    <span class="badge bg-success">
                                        Disetujui
                                    </span>

                                    @break

                                @case('Ditolak')

                                    <span class="badge bg-danger">
                                        Ditolak
                                    </span>

                                    @break

                                @default

                                    <span class="badge bg-secondary">
                                        {{ $laporan->status }}
                                    </span>

                            @endswitch

                        </td>

                        <td>

                            <a href="{{ url('/koordinator/laporan/'.$laporan->id) }}"
                               class="btn btn-primary btn-sm">

                                Detail

                            </a>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="6" class="text-center py-5 text-muted">

                            Belum ada laporan.

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection