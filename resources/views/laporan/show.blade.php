@extends('layouts.admin')

@section('content')

<div class="dutio-page-header d-flex justify-content-between align-items-center">

    <div>
        <h1>Detail Laporan</h1>
        <p class="text-muted">
            Verifikasi hasil piket penghuni.
        </p>
    </div>

    <a href="/koordinator/laporan"
        class="btn btn-outline-secondary">

        ← Kembali

    </a>

</div>

<div class="row g-4">

    <div class="col-lg-7">

        <div class="dutio-card">

            <div class="dutio-card-header">
                <h3>Foto Laporan</h3>
            </div>

            <div class="dutio-card-body text-center">

                <img
                    src="{{ $laporan['foto'] }}"
                    class="img-fluid rounded"
                    alt="Foto Laporan">

            </div>

        </div>

    </div>

    <div class="col-lg-5">

        <div class="dutio-card">

            <div class="dutio-card-header">
                <h3>Informasi Laporan</h3>
            </div>

            <div class="dutio-card-body">

                <table class="table table-borderless">

                    <tr>
                        <td width="120"><strong>Kamar</strong></td>
                        <td>{{ $laporan['kamar'] }}</td>
                    </tr>

                    <tr>
                        <td><strong>Area</strong></td>
                        <td>{{ $laporan['area'] }}</td>
                    </tr>

                    <tr>
                        <td><strong>Tanggal</strong></td>
                        <td>{{ $laporan['tanggal'] }}</td>
                    </tr>

                    <tr>
                        <td><strong>Status</strong></td>
                        <td>

                            <span class="badge bg-warning text-dark">
                                {{ $laporan['status'] }}
                            </span>

                        </td>
                    </tr>

                </table>

                <hr>

                <label class="form-label">
                    Catatan Penghuni
                </label>

                <textarea
                    class="form-control"
                    rows="4"
                    readonly>{{ $laporan['catatan'] }}</textarea>

            </div>

        </div>

        <div class="dutio-card mt-3">

            <div class="dutio-card-header">
                <h3>Keputusan Koordinator</h3>
            </div>

            <div class="dutio-card-body">

                <div class="mb-3">

                    <label class="form-label">
                        Catatan Koordinator
                    </label>

                    <textarea
                        class="form-control"
                        rows="4"
                        placeholder="Tambahkan catatan apabila diperlukan..."></textarea>

                </div>

                <div class="d-flex gap-2">

                    <button class="btn btn-danger flex-fill">

                        Tolak

                    </button>

                    <button class="btn btn-success flex-fill">

                        Setujui

                    </button>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection