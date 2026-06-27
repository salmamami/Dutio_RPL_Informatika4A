@extends('layouts.app')

@section('content')

<div class="dutio-page-header">
    <h1>Laporan Kegiatan</h1>
    <p class="text-muted">Upload bukti kegiatan piket yang telah diselesaikan</p>
</div>

<div class="row g-3">

    <div class="col-md-5">
        <div class="dutio-card mb-0 h-100">
            <div class="dutio-card-header">
                <h3>Upload Laporan</h3>
            </div>
            <div class="dutio-card-body">

                <div class="mb-3">
                    <label class="form-label">Tugas Piket</label>
                    <select class="form-select">
                        <option>Menyapu Koridor</option>
                        <option>Buang Sampah</option>
                        <option>Membersihkan Mushola</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Foto Bukti</label>
                    <label class="dutio-dropzone">
                        <input type="file">
                        <span class="dutio-dropzone-icon">📷</span>
                        <span class="dutio-dropzone-text">
                            <strong>Klik untuk pilih foto</strong><br>
                            atau seret file ke sini
                        </span>
                    </label>
                </div>

                <div class="mb-3">
                    <label class="form-label">Keterangan</label>
                    <textarea class="form-control" rows="4" placeholder="Tulis keterangan kegiatan..."></textarea>
                </div>

                <button class="btn btn-dutio-primary w-100">Kirim Laporan</button>

            </div>
        </div>
    </div>

    <div class="col-md-7">
        <div class="dutio-card mb-0 h-100">
            <div class="dutio-card-header">
                <h3>Riwayat Laporan</h3>
            </div>
            <div class="dutio-card-body">

                <div class="dutio-task-card mb-3" style="border-left-color: var(--dutio-warning);">
                    <h5>Menyapu Koridor</h5>
                    <p class="text-muted">Laporan dikirim hari ini</p>
                    <span class="dutio-pill dutio-pill--warning">Menunggu Verifikasi</span>
                </div>

                <div class="dutio-task-card" style="border-left-color: var(--dutio-success);">
                    <h5>Buang Sampah</h5>
                    <p class="text-muted">Laporan dikirim kemarin</p>
                    <span class="dutio-pill dutio-pill--success">Diterima</span>
                </div>

            </div>
        </div>
    </div>

</div>

@endsection
