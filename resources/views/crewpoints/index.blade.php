@extends('layouts.app')

@section('content')

<div class="mb-4">
    <h2>Crew Points</h2>
    <p class="text-muted">
        Poin dan evaluasi kinerja penghuni asrama
    </p>
</div>

<div class="row">

    {{-- Total Poin --}}
    <div class="col-md-4">

        <div class="small-box bg-success">

            <div class="inner">
                <h3>120</h3>
                <p>Total Poin Saya</p>
            </div>

        </div>

    </div>

</div>

<div class="row">

    {{-- Riwayat Poin --}}
    <div class="col-md-6">

        <div class="card">

            <div class="card-header">
                <h3 class="card-title">
                    Riwayat Poin
                </h3>
            </div>

            <div class="card-body">

                <div class="mb-3">
                    <strong class="text-success">
                        +10 Poin
                    </strong>
                    <br>
                    Piket selesai tepat waktu
                </div>

                <div class="mb-3">
                    <strong class="text-success">
                        +5 Poin
                    </strong>
                    <br>
                    Laporan diterima
                </div>

                <div>
                    <strong class="text-danger">
                        -5 Poin
                    </strong>
                    <br>
                    Terlambat mengumpulkan laporan
                </div>

            </div>

        </div>

    </div>

    {{-- Evaluasi --}}
    <div class="col-md-6">

        <div class="card">

            <div class="card-header">
                <h3 class="card-title">
                    Evaluasi Terbaru
                </h3>
            </div>

            <div class="card-body">

                <div class="mb-3">
                    Kebersihan Kamar
                    <div class="progress">
                        <div class="progress-bar bg-success"
                            style="width:90%">
                            90%
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    Kedisiplinan Piket
                    <div class="progress">
                        <div class="progress-bar bg-info"
                            style="width:85%">
                            85%
                        </div>
                    </div>
                </div>

                <div>
                    Kelengkapan Laporan
                    <div class="progress">
                        <div class="progress-bar bg-warning"
                            style="width:95%">
                            95%
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

</div>

@endsection