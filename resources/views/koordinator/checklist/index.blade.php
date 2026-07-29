@extends('layouts.admin')

@section('content')

<div class="dutio-page-header d-flex justify-content-between align-items-center">

    <div>

        <h1>Kelola Checklist</h1>

        <p class="text-muted">
            Atur aktivitas checklist untuk setiap tugas piket.
        </p>

    </div>

    <a
        href="/koordinator/checklist/create"
        class="btn btn-dutio-primary">

        + Tambah Checklist

    </a>

</div>

<div class="dutio-card">

    <div class="dutio-card-header">

        <h3>Daftar Checklist</h3>

    </div>

    <div class="dutio-card-body">

        <div class="table-responsive">

            <table class="table table-hover align-middle">

                <thead>

                    <tr>

                        <th>Area</th>

                        <th>Tugas Piket</th>

                        <th>Checklist</th>

                        <th width="180">
                            Aksi
                        </th>

                    </tr>

                </thead>

                <tbody>

                @forelse($checklists as $checklist)

                    <tr>

                        <td>

                            {{ optional(optional($checklist->tugasPiket)->areaPiket)->nama_area ?? '-' }}

                        </td>

                        <td>

                            {{ optional($checklist->tugasPiket)->nama_tugas ?? '-' }}

                        </td>

                        <td>

                            {{ $checklist->aktivitas }}

                        </td>

                        <td>

                            <a
                                href="/koordinator/checklist/{{ $checklist->id }}/edit"
                                class="btn btn-warning btn-sm text-white">

                                Edit

                            </a>

                            <form
                                action="/koordinator/checklist/{{ $checklist->id }}"
                                method="POST"
                                class="d-inline">

                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin ingin menghapus checklist ini?')">

                                    Hapus

                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td
                            colspan="4"
                            class="text-center text-muted py-4">

                            Belum ada data checklist.

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection