@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h3 class="mb-1">

                Laporan Piket

            </h3>

            <small class="text-muted">

                Daftar laporan yang dikirim penghuni.

            </small>

        </div>

    </div>

    @if(session('success'))

        <div class="alert alert-success">

            {{ session('success') }}

        </div>

    @endif

    <div class="card shadow-sm border-0">

        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table table-hover align-middle mb-0">

                    <thead class="table-light">

                        <tr>

                            <th width="60">No</th>

                            <th>Penghuni</th>

                            <th>Kamar</th>

                            <th>Area</th>

                            <th>Tanggal</th>

                            <th>Status</th>

                            <th width="120">

                                Aksi

                            </th>

                        </tr>

                    </thead>

                    <tbody>

                    @forelse($laporans as $laporan)

                        <tr>

                            <td>

                                {{ $loop->iteration }}

                            </td>

                            <td>

                                {{ $laporan->user->name }}

                            </td>

                            <td>

                                Kamar {{ $laporan->user->kamar }}

                            </td>

                            <td>

                                {{ $laporan->jadwal->areaPiket->nama_area ?? '-' }}

                            </td>

                            <td>

                                {{ $laporan->created_at->format('d M Y') }}

                            </td>

                            <td>

                                @if($laporan->status == 'Menunggu')

                                    <span class="badge bg-warning text-dark">

                                        Menunggu

                                    </span>

                                @elseif($laporan->status == 'Disetujui')

                                    <span class="badge bg-success">

                                        Disetujui

                                    </span>

                                @else

                                    <span class="badge bg-danger">

                                        Ditolak

                                    </span>

                                @endif

                            </td>

                            <td>

                                <a
                                    href="{{ url('/koordinator/laporan/'.$laporan->id) }}"
                                    class="btn btn-primary btn-sm">

                                    Detail

                                </a>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td
                                colspan="7"
                                class="text-center py-5 text-muted">

                                Belum ada laporan.

                            </td>

                        </tr>

                    @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

@endsection