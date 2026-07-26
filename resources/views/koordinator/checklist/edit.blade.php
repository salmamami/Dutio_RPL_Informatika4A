@extends('layouts.admin')

@section('content')

<div class="dutio-page-header">
    <h1>Edit Checklist</h1>
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
                    Area
                </label>

                <select
                    name="area_piket_id"
                    class="form-select">

                    @foreach($areas as $area)

                        <option
                            value="{{ $area->id }}"
                            {{ $checklist->area_piket_id == $area->id ? 'selected' : '' }}>

                            {{ $area->nama_area }}

                        </option>

                    @endforeach

                </select>

            </div>

            <div class="mb-4">

                <label class="form-label">
                    Tugas
                </label>

                <input
                    type="text"
                    name="aktivitas"
                    class="form-control"
                    value="{{ old('aktivitas', $checklist->aktivitas) }}"
                    required>

            </div>

            <div class="d-flex justify-content-end gap-2">

                <a href="/koordinator/checklist"
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