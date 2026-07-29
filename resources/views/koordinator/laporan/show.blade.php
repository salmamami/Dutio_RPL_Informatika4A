@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <div class="card shadow-sm">

        <div class="card-header">

            <h4>

                Detail Laporan Piket

            </h4>

        </div>

        <div class="card-body">

            <div class="row">

                <div class="col-md-5">

                    <img
                        src="{{ asset('storage/'.$laporan->foto) }}"
                        class="img-fluid rounded border"
                        alt="Foto Laporan">

                </div>

                <div class="col-md-7">

                    <table class="table">

                        <tr>

                            <th width="170">

                                Nama Penghuni

                            </th>

                            <td>

                                {{ $laporan->user->name }}

                            </td>

                        </tr>

                        <tr>

                            <th>

                                Kamar

                            </th>

                            <td>

                                Kamar {{ $laporan->user->kamar }}

                            </td>

                        </tr>

                        <tr>

                            <th>

                                Area Piket

                            </th>

                            <td>

                                {{ $laporan->jadwal->areaPiket->nama_area ?? '-' }}

                            </td>

                        </tr>

                        <tr>

                            <th>

                                Tugas Piket

                            </th>

                            <td>

                                {{ $laporan->jadwal->tugasPiket->nama_tugas ?? '-' }}

                            </td>

                        </tr>

                        <tr>

                            <th>

                                Tanggal

                            </th>

                            <td>

                                {{ $laporan->jadwal->tanggal }}

                            </td>

                        </tr>

                        <tr>

                            <th>

                                Keterangan

                            </th>

                            <td>

                                {{ $laporan->keterangan }}

                            </td>

                        </tr>

                        <tr>

                            <th>

                                Status

                            </th>

                            <td>

                                @if($laporan->status=='Menunggu')

                                    <span class="badge bg-warning text-dark">

                                        Menunggu

                                    </span>

                                @elseif($laporan->status=='Disetujui')

                                    <span class="badge bg-success">

                                        Disetujui

                                    </span>

                                @else

                                    <span class="badge bg-danger">

                                        Ditolak

                                    </span>

                                @endif

                            </td>

                        </tr>

                    </table>

                </div>

            </div>

            <hr>

            @if(session('success'))

                <div class="alert alert-success">

                    {{ session('success') }}

                </div>

            @endif

            @if($errors->any())

                <div class="alert alert-danger">

                    <ul class="mb-0">

                        @foreach($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            @endif

            @if($laporan->status == 'Menunggu')

            <form
                method="POST"
                action="/koordinator/laporan/{{ $laporan->id }}">

                @csrf
                @method('PUT')

                <div class="mb-3">

                    <label class="form-label">

                        Status Verifikasi

                    </label>

                    <select
                        name="status"
                        class="form-select">

                        <option
                            value="Disetujui"
                            {{ old('status')=='Disetujui' ? 'selected' : '' }}>

                            Disetujui

                        </option>

                        <option
                            value="Ditolak"
                            {{ old('status')=='Ditolak' ? 'selected' : '' }}>

                            Ditolak

                        </option>

                    </select>

                </div>

                <div class="mb-3">

                    <label class="form-label">

                        Poin

                    </label>

                    <input
                        type="number"
                        name="poin"
                        class="form-control @error('poin') is-invalid @enderror"
                        min="0"
                        max="100"
                        value="{{ old('poin',100) }}">

                    @error('poin')

                        <div class="invalid-feedback">

                            {{ $message }}

                        </div>

                    @enderror

                </div>

                <div class="mb-4">

                    <label class="form-label">

                        Evaluasi

                    </label>

                    <textarea
                        name="evaluasi"
                        rows="4"
                        class="form-control @error('evaluasi') is-invalid @enderror"
                        required>{{ old('evaluasi') }}</textarea>

                    @error('evaluasi')

                        <div class="invalid-feedback">

                            {{ $message }}

                        </div>

                    @enderror

                </div>

                <button
                    type="submit"
                    class="btn btn-success">

                    Simpan Penilaian

                </button>

                <a
                    href="/koordinator/laporan"
                    class="btn btn-secondary">

                    Kembali

                </a>

            </form>

            @else

                <div class="alert alert-info">

                    Laporan ini sudah diverifikasi sehingga tidak dapat dinilai kembali.

                </div>

                <a
                    href="/koordinator/laporan"
                    class="btn btn-secondary">

                    Kembali

                </a>

            @endif

        </div>

    </div>

</div>

@endsection