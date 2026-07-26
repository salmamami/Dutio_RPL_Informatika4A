@extends('layouts.admin')

@section('content')
<div class="dutio-page-header d-flex justify-content-between align-items-center">
    <div>
        <h1>Kelola Checklist</h1>
        <p class="text-muted">
            Atur daftar tugas untuk setiap area piket.
        </p>
    </div>

    <a href="/koordinator/checklist/create" class="btn btn-dutio-primary">
        + Tambah Checklist
    </a>
</div>

<div class="dutio-card">
    <div class="dutio-card-header">
        <h3>Daftar Checklist</h3>
    </div>

    <div class="dutio-card-body">
        <table class="table align-middle">
            <thead>
                <tr>
                    <th>Area</th>
                    <th>Tugas</th>
                    <th width="180">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach($checklists as $checklist)
                    <tr>
                        <td>
                            {{ $checklist->areaPiket->nama_area }}
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
                                    onclick="return confirm('Hapus checklist?')">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection