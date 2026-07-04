@extends('layouts.admin')

@section('content')

<div class="dutio-page-header">
    <h1>Edit Checklist</h1>
</div>

<div class="dutio-card">

    <div class="dutio-card-body">

        <form>

            <div class="mb-3">

                <label class="form-label">

                    Area

                </label>

                <input
                    class="form-control"
                    value="{{ $checklist['area'] }}">

            </div>

            <div class="mb-4">

                <label class="form-label">

                    Tugas

                </label>

                <input
                    class="form-control"
                    value="{{ $checklist['tugas'] }}">

            </div>

            <div class="d-flex justify-content-end gap-2">

                <a href="/koordinator/checklist"
                    class="btn btn-outline-secondary">

                    Batal

                </a>

                <button
                    class="btn btn-warning text-white">

                    Update

                </button>

            </div>

        </form>

    </div>

</div>

@endsection