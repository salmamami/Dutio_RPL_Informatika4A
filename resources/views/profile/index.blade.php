@extends('layouts.app')

@section('content')

<div class="dutio-page-header">
    <h1>Profil Saya</h1>
    <p class="text-muted">Informasi akun penghuni asrama</p>
</div>

<div class="row justify-content-center">
    <div class="col-lg-8">

        <div class="dutio-profile-hero">
            <div class="dutio-avatar">AM</div>
            <h4>Salma Amirah Balqis</h4>
            <p class="text-muted mb-0">Penghuni Asrama</p>
        </div>

        <div class="dutio-card">
            <div class="dutio-card-body">
                <div class="dutio-info-grid">

                    <div class="dutio-info-item">
                        <label>Nama</label>
                        <div>Salma Amirah Balqis</div>
                    </div>

                    <div class="dutio-info-item">
                        <label>Email</label>
                        <div>ami@email.com</div>
                    </div>

                    <div class="dutio-info-item">
                        <label>Nomor Kamar</label>
                        <div>A-12</div>
                    </div>

                    <div class="dutio-info-item">
                        <label>Crew Points</label>
                        <div>120 Poin</div>
                    </div>

                </div>
            </div>
        </div>

        <div class="d-flex gap-2">
            <button class="btn btn-dutio-primary">Edit Profil</button>
            <button class="btn btn-dutio-danger">Logout</button>
        </div>

    </div>
</div>

@endsection
