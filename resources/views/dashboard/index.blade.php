@extends('layouts.app')

@section('content')

<div class="mb-4">

    <h2>
        Halo, Ami 👋
    </h2>

    <p class="text-muted">
        Selamat datang di DUTIO
    </p>

</div>

<div class="row">

    <div class="col-md-4">

        <div class="small-box bg-primary">
            <div class="inner">
                <h3>2</h3>
                <p>Tugas Hari Ini</p>
            </div>
        </div>

    </div>

    <div class="col-md-4">

        <div class="small-box bg-success">
            <div class="inner">
                <h3>1</h3>
                <p>Jadwal Hari Ini</p>
            </div>
        </div>

    </div>

    <div class="col-md-4">

        <div class="small-box bg-warning">
            <div class="inner">
                <h3>0</h3>
                <p>Laporan Pending</p>
            </div>
        </div>

    </div>

</div>

<div class="row">

    <div class="col-md-6">

        <div class="card">

            <div class="card-header">
                <h3 class="card-title">
                    Tugas Hari Ini
                </h3>
            </div>

            <div class="card-body">

                <div class="form-check">
                    <input class="form-check-input"
                        type="checkbox"
                        checked>

                    <label class="form-check-label">
                        Menyapu Koridor
                    </label>
                </div>

                <div class="form-check">
                    <input class="form-check-input"
                        type="checkbox">

                    <label class="form-check-label">
                        Buang Sampah
                    </label>
                </div>

                <div class="form-check">
                    <input class="form-check-input"
                        type="checkbox">

                    <label class="form-check-label">
                        Membersihkan Mushola
                    </label>
                </div>

            </div>

        </div>

    </div>

    <div class="col-md-6">

        <div class="card">

            <div class="card-header">
                <h3 class="card-title">
                    Jadwal Terdekat
                </h3>
            </div>

            <div class="card-body">

                <h5>Jumat</h5>

                <p>
                    Kerja Bakti Asrama
                </p>

            </div>

        </div>

    </div>

</div>

<div class="card">

    <div class="card-header">
        <h3 class="card-title">
            Aksi Cepat
        </h3>
    </div>

    <div class="card-body">

        <a href="/jadwal"
            class="btn btn-primary">
            Lihat Jadwal
        </a>

        <a href="/laporan"
            class="btn btn-success">
            Upload Laporan
        </a>

    </div>

</div>

@endsection