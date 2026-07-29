@extends('layouts.admin')

@section('content')

<div class="dutio-page-header">

    <h1>Edit Penilaian</h1>

</div>

<div class="card shadow-sm">

    <div class="card-body">

        <form method="POST"
              action="{{ route('koordinator.penilaian.update',$penilaian->id) }}">

            @csrf
            @method('PUT')

            <div class="mb-3">

                <label class="form-label">
                    Poin
                </label>

                <input
                    type="number"
                    name="poin"
                    class="form-control"
                    value="{{ old('poin',$penilaian->poin) }}"
                    min="0"
                    max="100"
                    required>

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Kategori
                </label>

                <select
                    name="kategori"
                    class="form-select">

                    <option value="Sangat Baik"
                        {{ $penilaian->kategori=='Sangat Baik'?'selected':'' }}>
                        Sangat Baik
                    </option>

                    <option value="Baik"
                        {{ $penilaian->kategori=='Baik'?'selected':'' }}>
                        Baik
                    </option>

                    <option value="Cukup"
                        {{ $penilaian->kategori=='Cukup'?'selected':'' }}>
                        Cukup
                    </option>

                    <option value="Kurang"
                        {{ $penilaian->kategori=='Kurang'?'selected':'' }}>
                        Kurang
                    </option>

                </select>

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Catatan
                </label>

                <textarea
                    name="catatan"
                    rows="4"
                    class="form-control">{{ old('catatan',$penilaian->catatan) }}</textarea>

            </div>

            <div class="d-flex justify-content-end gap-2">

                <a href="{{ route('koordinator.penilaian.index') }}"
                   class="btn btn-secondary">

                    Batal

                </a>

                <button class="btn btn-warning text-white">

                    Update

                </button>

            </div>

        </form>

    </div>

</div>

@endsection