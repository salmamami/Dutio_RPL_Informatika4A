@extends('layouts.admin')

@section('content')

<div class="dutio-page-header d-flex justify-content-between align-items-center flex-wrap gap-2">

    <div>

        <h1>Monitoring Kamar {{ $kamar }}</h1>

        <p class="text-muted mb-0">

            Tanggal
            {{ \Carbon\Carbon::parse($tanggal)->format('d F Y') }}

        </p>

    </div>

    <a
        href="/koordinator/monitoring"
        class="btn btn-outline-secondary">

        ← Kembali

    </a>

</div>

<div class="dutio-card">

    <div class="dutio-card-header">

        <h3 class="mb-0">

            Progress Penghuni

        </h3>

    </div>

    <div class="dutio-card-body p-0">

        <div class="table-responsive">

            <table class="table table-hover align-middle mb-0">

                <thead>

                    <tr>

                        <th width="60">No</th>

                        <th>Penghuni</th>

                        <th>Tugas</th>

                        <th>Laporan</th>

                        <th>Status</th>

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

                            {{ optional($jadwal->tugasPiket)->nama_tugas ?? '-' }}

                        </td>

                        <td>

                            @if($jadwal->laporan)

                                <a
                                    href="/koordinator/laporan/{{ $jadwal->laporan->id }}"
                                    class="btn btn-success btn-sm">

                                    Lihat

                                </a>

                            @else

                                <span class="badge bg-secondary">

                                    Belum Upload

                                </span>

                            @endif

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

                    </tr>

                @empty

                    <tr>

                        <td colspan="5" class="text-center py-5 text-muted">

                            Tidak ada data monitoring.

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection