@extends('layouts.app')

@section('content')

<div class="dutio-page-header">
    <h1>Jadwal Piket Saya</h1>
    <p class="text-muted">Jadwal kegiatan piket penghuni asrama</p>
</div>

<div class="dutio-timeline">

    <div class="dutio-timeline-item">
        <div class="dutio-timeline-card">
            <div class="dutio-timeline-day">Senin</div>
            <div class="dutio-timeline-icon">🧹</div>
            <div class="dutio-timeline-body">
                <strong>Menyapu Koridor</strong>
                <span>07.00 - 08.00 WIB</span>
            </div>
        </div>
    </div>

    <div class="dutio-timeline-item">
        <div class="dutio-timeline-card">
            <div class="dutio-timeline-day">Rabu</div>
            <div class="dutio-timeline-icon">🗑️</div>
            <div class="dutio-timeline-body">
                <strong>Buang Sampah</strong>
                <span>07.00 - 08.00 WIB</span>
            </div>
        </div>
    </div>

    <div class="dutio-timeline-item">
        <div class="dutio-timeline-card">
            <div class="dutio-timeline-day">Jumat</div>
            <div class="dutio-timeline-icon">🕌</div>
            <div class="dutio-timeline-body">
                <strong>Membersihkan Mushola</strong>
                <span>06.30 - 08.00 WIB</span>
            </div>
        </div>
    </div>

</div>

@endsection
