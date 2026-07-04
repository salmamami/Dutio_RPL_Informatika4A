@extends('layouts.admin')

@section('content')

<div class="dutio-page-header">
    <h1>Tambah Checklist</h1>
</div>

<div class="dutio-card">

    <div class="dutio-card-body">

        <form>

            <div class="mb-3">

                <label class="form-label">
                    Area
                </label>

                <select class="form-select">

                    <option>Pilih Area</option>

                    <option>Kamar Mandi</option>

                    <option>Koridor</option>

                    <option>Taman</option>

                    <option>Mushola</option>

                    <option>Dapur</option>

                </select>

            </div>

            <div class="mb-4">

                <label class="form-label">
                    Tugas
                </label>

                <input
                    class="form-control"
                    placeholder="Contoh : Menguras bak mandi">

            </div>

            <div class="d-flex justify-content-end gap-2">

                <a href="/koordinator/checklist"
                    class="btn btn-outline-secondary">

                    Batal

                </a>

                <button
                    class="btn btn-dutio-primary">

                    Simpan

                </button>

            </div>

        </form>

    </div>

</div>

@endsection