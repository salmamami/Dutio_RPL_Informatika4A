@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="card shadow-sm">
        <div class="card-header">
            <h4>Detail Laporan</h4>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <img
                        src="{{ asset('storage/' . $laporan->foto) }}"
                        class="img-fluid rounded border"
                        alt="Foto Laporan">
                </div>

                <div class="col-md-6">
                    <table class="table">
                        <tr>
                            <th>Kamar</th>
                            <td>{{ $laporan->user->kamar }}</td>
                        </tr>

                        <tr>
                            <th>Area</th>
                            <td>{{ $laporan->jadwal->areaPiket->nama_area }}</td>
                        </tr>

                        <tr>
                            <th>Tanggal</th>
                            <td>{{ $laporan->created_at->format('d M Y') }}</td>
                        </tr>

                        <tr>
                            <th>Keterangan</th>
                            <td>{{ $laporan->keterangan }}</td>
                        </tr>

                        <tr>
                            <th>Status</th>
                            <td>{{ $laporan->status }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <hr>

            <form method="POST" action="/koordinator/laporan/{{ $laporan->id }}">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-control">
                        <option value="Disetujui">Disetujui</option>
                        <option value="Ditolak">Ditolak</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Poin</label>
                    <input
                        type="number"
                        name="poin"
                        class="form-control"
                        value="100">
                </div>

                <div class="mb-3">
                    <label class="form-label">Evaluasi</label>
                    <textarea
                        name="evaluasi"
                        rows="4"
                        class="form-control"></textarea>
                </div>

                <button type="submit" class="btn btn-success">
                    Simpan Penilaian
                </button>

                <a href="/koordinator/laporan" class="btn btn-secondary">
                    Kembali
                </a>
            </form>
        </div>
    </div>
</div>
@endsection