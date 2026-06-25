@extends('layouts.app')

@section('content')

<div class="mb-4">
    <h2>Tugas Piket Saya</h2>
    <p class="text-muted">
        Daftar tugas yang harus diselesaikan hari ini
    </p>
</div>

<div class="row">

    <div class="col-md-6">

        <div class="card">
            <div class="card-body">

                <h5>Menyapu Koridor</h5>

                <p class="text-muted">
                    Area lantai 1 asrama
                </p>

                <span class="badge badge-success">
                    Selesai
                </span>

            </div>
        </div>

    </div>

    <div class="col-md-6">

        <div class="card">
            <div class="card-body">

                <h5>Buang Sampah</h5>

                <p class="text-muted">
                    Tempat sampah belakang asrama
                </p>

                <span class="badge badge-warning">
                    Belum Dikerjakan
                </span>

            </div>
        </div>

    </div>

    <div class="col-md-6">

        <div class="card">
            <div class="card-body">

                <h5>Membersihkan Mushola</h5>

                <p class="text-muted">
                    Mushola Asrama
                </p>

                <span class="badge badge-warning">
                    Belum Dikerjakan
                </span>

            </div>
        </div>

    </div>

</div>

@endsection