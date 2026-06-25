@extends('layouts.app')

@section('content')

<div class="dutio-page-header">
    <h1>Checklist Tugas</h1>
    <p class="text-muted">Daftar tugas yang harus diselesaikan hari ini</p>
</div>

<div class="row g-3">

    <div class="col-md-6">
        <div class="dutio-task-card is-done">
            <h5>Menyapu Koridor</h5>
            <p class="text-muted">Area lantai 1 asrama</p>
            <span class="dutio-pill dutio-pill--success">Selesai</span>
        </div>
    </div>

    <div class="col-md-6">
        <div class="dutio-task-card is-pending">
            <h5>Buang Sampah</h5>
            <p class="text-muted">Tempat sampah belakang asrama</p>
            <span class="dutio-pill dutio-pill--warning">Belum Dikerjakan</span>
        </div>
    </div>

    <div class="col-md-6">
        <div class="dutio-task-card is-pending">
            <h5>Membersihkan Mushola</h5>
            <p class="text-muted">Mushola Asrama</p>
            <span class="dutio-pill dutio-pill--warning">Belum Dikerjakan</span>
        </div>
    </div>

</div>

@endsection
