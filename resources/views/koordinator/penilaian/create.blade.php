@extends('layouts.admin')

@section('content')

<div class="container mt-4">

    <div class="card shadow">

        <div class="card-header">
            <h4>Penilaian {{ $penghuni->nama_penghuni }}</h4>
        </div>

        <div class="card-body">

            {{-- Error --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="mb-3">
                <label>Nama Anak</label>
                <input type="text"
                       class="form-control"
                       value="{{ $penghuni->nama_penghuni }}"
                       readonly>
            </div>

            <div class="mb-3">
                <label>Kamar</label>
                <input type="text"
                       class="form-control"
                       value="{{ $penghuni->kamar }}"
                       readonly>
            </div>

            <form action="{{ route('koordinator.penilaian.store') }}" method="POST">

                @csrf

                <input type="hidden"
                       name="penghuni_id"
                       value="{{ $penghuni->id }}">

                <div class="mb-3">
                    <label>Nilai</label>

                    <input type="number"
                           name="poin"
                           class="form-control"
                           min="0"
                           max="100"
                           required>
                </div>

                <div class="mb-3">
                    <label>Penghargaan</label>

                    <select name="kategori"
                            class="form-control"
                            required>

                        <option value="">-- Pilih Penghargaan --</option>

                        <option value="🏆 Best Crew">🏆 Best Crew</option>
                        <option value="🌟 Penghuni Teladan">🌟 Penghuni Teladan</option>
                        <option value="🧹 Rajin Piket">🧹 Rajin Piket</option>
                        <option value="⭐ Good Performance">⭐ Good Performance</option>
                        <option value="💪 Semangat Piket">💪 Semangat Piket</option>

                    </select>
                </div>

                <button type="submit" class="btn btn-success">
                    Simpan Penilaian
                </button>

                <a href="{{ route('koordinator.penilaian.index') }}"
                   class="btn btn-secondary">
                    Kembali
                </a>

            </form>

        </div>

    </div>

</div>

@endsection