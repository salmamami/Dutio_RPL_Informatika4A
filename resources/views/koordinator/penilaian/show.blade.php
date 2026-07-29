@extends('layouts.admin')

@section('content')

<div class="dutio-page-header">

    <h1>Detail Penilaian</h1>

    <p class="text-muted mb-0">
        Detail hasil penilaian laporan piket penghuni.
    </p>

</div>

<div class="dutio-card">

    <div class="dutio-card-header">

        <h3>Informasi Penilaian</h3>

    </div>

    <div class="dutio-card-body">

        <table class="table align-middle">

            <tr>

                <th width="220">
                    Nama Penghuni
                </th>

                <td>

                    {{ $penilaian->laporan->user->name }}

                </td>

            </tr>

            <tr>

                <th>
                    Kamar
                </th>

                <td>

                    {{ $penilaian->laporan->user->kamar }}

                </td>

            </tr>

            <tr>

                <th>
                    Area Piket
                </th>

                <td>

                    {{ optional($penilaian->laporan->jadwal->areaPiket)->nama_area ?? '-' }}

                </td>

            </tr>

            <tr>

                <th>
                    Tugas Piket
                </th>

                <td>

                    {{ optional($penilaian->laporan->jadwal->tugasPiket)->nama_tugas ?? '-' }}

                </td>

            </tr>

            <tr>

                <th>
                    Poin
                </th>

                <td>

                    <span class="badge bg-success">

                        {{ $penilaian->poin }}

                    </span>

                </td>

            </tr>

            <tr>

                <th>
                    Kategori
                </th>

                <td>

                    {{ $penilaian->kategori }}

                </td>

            </tr>

            <tr>

                <th>
                    Evaluasi
                </th>

                <td>

                    {{ $penilaian->evaluasi ?: '-' }}

                </td>

            </tr>

            <tr>

                <th>
                    Tanggal Penilaian
                </th>

                <td>

                    {{ $penilaian->created_at->format('d F Y') }}

                </td>

            </tr>

        </table>

    </div>

</div>

<div class="mt-3 d-flex gap-2">

    <a href="{{ route('koordinator.penilaian.edit',$penilaian->id) }}"
       class="btn btn-warning text-white">

        Edit Penilaian

    </a>

    <a href="{{ route('koordinator.penilaian.index') }}"
       class="btn btn-outline-secondary">

        Kembali

    </a>

</div>

@endsection