@extends('layouts.admin')

@section('content')

<div class="dutio-page-header">
    <h1>Crew Points</h1>
    <p class="text-muted">
        Riwayat poin seluruh penghuni.
    </p>
</div>

<div class="row mb-4">

    <div class="col-md-6">

        <div class="card shadow-sm">

            <div class="card-body">

                <small class="text-muted">
                    Total Poin
                </small>

                <h2 class="mb-0">
                    {{ $totalPoin }}
                </h2>

            </div>

        </div>

    </div>

    <div class="col-md-6">

        <div class="card shadow-sm">

            <div class="card-body">

                <small class="text-muted">
                    Rata-rata Poin
                </small>

                <h2 class="mb-0">
                    {{ $rataRata }}
                </h2>

            </div>

        </div>

    </div>

</div>

<div class="card shadow-sm">

    <div class="card-header">

        <h5 class="mb-0">
            Riwayat Crew Points
        </h5>

    </div>

    <div class="card-body p-0">

        <table class="table table-hover mb-0 align-middle">

            <thead>

                <tr>

                    <th>No</th>

                    <th>Nama</th>

                    <th>Kamar</th>

                    <th>Area</th>

                    <th>Tanggal</th>

                    <th>Poin</th>

                    <th>Evaluasi</th>

                </tr>

            </thead>

            <tbody>

            @forelse($crewpoints as $point)

                <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>
                        {{ $point->user->name }}
                    </td>

                    <td>
                        {{ $point->user->kamar }}
                    </td>

                    <td>
                        {{ $point->penilaian->laporan->jadwal->areaPiket->nama_area }}
                    </td>

                    <td>
                        {{ $point->created_at->format('d M Y') }}
                    </td>

                    <td>

                        <span class="badge bg-success">

                            {{ $point->poin }}

                        </span>

                    </td>

                    <td>

                        {{ $point->penilaian->evaluasi }}

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="7"
                        class="text-center py-5 text-muted">

                        Belum ada crew point.

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection