@extends('layouts.app')

@section('content')

<div class="mb-4">
    <h2>Laporan Kegiatan</h2>
    <p class="text-muted">
        Upload bukti kegiatan piket yang telah diselesaikan
    </p>
</div>

<div class="row">

    <div class="col-md-5">

        <div class="card">

            <div class="card-header">
                <h3 class="card-title">
                    Upload Laporan
                </h3>
            </div>

            <div class="card-body">

                <div class="form-group">
                    <label>Tugas Piket</label>

                    <select class="form-control">
                        <option>Menyapu Koridor</option>
                        <option>Buang Sampah</option>
                        <option>Membersihkan Mushola</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Foto Bukti</label>

                    <input
                        type="file"
                        class="form-control">
                </div>

                <div class="form-group">
                    <label>Keterangan</label>

                    <textarea
                        class="form-control"
                        rows="4"
                        placeholder="Tulis keterangan kegiatan..."></textarea>
                </div>

                <button class="btn btn-primary btn-block">
                    Kirim Laporan
                </button>

            </div>

        </div>

    </div>

    <div class="col-md-7">

        <div class="card">

            <div class="card-header">
                <h3 class="card-title">
                    Riwayat Laporan
                </h3>
            </div>

            <div class="card-body">

                <div class="border rounded p-3 mb-3">

                    <h5>Menyapu Koridor</h5>

                    <p class="text-muted mb-2">
                        Laporan dikirim hari ini
                    </p>

                    <span class="badge badge-warning">
                        Menunggu Verifikasi
                    </span>

                </div>

                <div class="border rounded p-3">

                    <h5>Buang Sampah</h5>

                    <p class="text-muted mb-2">
                        Laporan dikirim kemarin
                    </p>

                    <span class="badge badge-success">
                        Diterima
                    </span>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection