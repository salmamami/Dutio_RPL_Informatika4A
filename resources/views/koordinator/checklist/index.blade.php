@extends('layouts.admin')

@section('content')

<div class="dutio-page-header d-flex justify-content-between align-items-center">

    <div>
        <h1>Kelola Checklist</h1>
        <p class="text-muted">
            Atur daftar tugas untuk setiap area piket.
        </p>
    </div>

    <a href="/koordinator/checklist/create"
        class="btn btn-dutio-primary">

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
                        <strong>{{ $checklist['area'] }}</strong>
                    </td>

                    <td>
                        {{ $checklist['tugas'] }}
                    </td>

                    <td>

                        <a href="/koordinator/checklist/{{ $checklist['id'] }}/edit"
                            class="btn btn-warning btn-sm text-white">

                            Edit

                        </a>

                        <button
                            class="btn btn-danger btn-sm">

                            Hapus

                        </button>

                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>

    </div>

</div>

@endsection