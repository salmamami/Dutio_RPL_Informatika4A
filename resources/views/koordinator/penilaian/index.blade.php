@extends('layouts.admin')

@section('content')

<div class="dutio-page-header d-flex justify-content-between align-items-center">

    <div>
        <h1>Data Penilaian</h1>
        <p class="text-muted mb-0">
            Daftar seluruh penilaian laporan piket penghuni.
        </p>
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
                        <th>Tugas</th>
                        <th>Poin</th>
                        <th>Kategori</th>
                        <th width="180">Aksi</th>

                    </tr>

                </thead>

                <tbody>

                @forelse($penilaians as $penilaian)

                    <tr>

                        <td>{{ $loop->iteration }}</td>

                        <td>
                            {{ $penilaian->laporan->user->name ?? '-' }}
                        </td>

                        <td>
                            {{ $penilaian->laporan->user->kamar ?? '-' }}
                        </td>

                        <td>
                            {{ $penilaian->laporan->jadwal->areaPiket->nama_area ?? '-' }}
                        </td>

                        <td>
                            {{ $penilaian->laporan->jadwal->tugasPiket->nama_tugas ?? '-' }}
                        </td>

                        <td>

                            <span class="badge bg-success">

                                {{ $penilaian->poin }}

                            </span>

                        </td>

                        <td>

                            <span class="badge bg-primary">

                                {{ $penilaian->kategori }}

                            </span>

                        </td>

                        <td>

                            <a
                                href="{{ route('koordinator.penilaian.show',$penilaian->id) }}"
                                class="btn btn-info btn-sm">

                                Detail

                            </a>

                            <a
                                href="{{ route('koordinator.penilaian.edit',$penilaian->id) }}"
                                class="btn btn-warning btn-sm text-white">

                                Edit

                            </a>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="8" class="text-center py-5 text-muted">

                            Belum ada data penilaian.

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection