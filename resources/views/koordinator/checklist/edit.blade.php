@extends('layouts.admin')

@section('content')

<div class="dutio-page-header">

    <h1>Edit Checklist</h1>

    <p class="text-muted">
        Perbarui aktivitas checklist.
    </p>

</div>

<div class="dutio-card">

    <div class="dutio-card-body">

        <form
            method="POST"
            action="/koordinator/checklist/{{ $checklist->id }}">

            @csrf
            @method('PUT')

            <div class="mb-3">

                <label class="form-label">
                    Tugas Piket
                </label>

                <select
                    name="tugas_piket_id"
                    class="form-select">

                    @foreach($tugas as $item)

                        <option
                            value="{{ $item->id }}"
                            {{ $checklist->tugas_piket_id == $item->id ? 'selected' : '' }}>

                            {{ $item->areaPiket->nama_area }}
                            -
                            {{ $item->nama_tugas }}

                        </option>

                    @endforeach

                </select>

            </div>

            <div class="mb-4">

                <label class="form-label">
                    Aktivitas Checklist
                </label>

                <input
                    type="text"
                    name="aktivitas"
                    class="form-control"
                    value="{{ old('aktivitas',$checklist->aktivitas) }}"
                    required>

            </div>

            <div class="d-flex justify-content-end gap-2">

                <a
                    href="/koordinator/checklist"
                    class="btn btn-outline-secondary">

                    Batal

                </a>

                <button
                    type="submit"
                    class="btn btn-warning text-white">

                    Update

                </button>

            </div>

        </form>

    </div>

</div>

@endsection