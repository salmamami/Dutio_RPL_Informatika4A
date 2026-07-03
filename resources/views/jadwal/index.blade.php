@extends('layouts.app')

@section('content')

<div class="dutio-page-header">
    <h1>Pembagian Piket</h1>
    <p class="text-muted">
        Jadwal pembagian piket seluruh kamar asrama
    </p>
</div>

<div class="dutio-card">

    <div class="dutio-card-header">
        <h3>Jadwal Mingguan</h3>
    </div>

    <div class="dutio-card-body p-0">

        <table class="table align-middle mb-0">

            <thead class="table-light">

                <tr>
                    <th>Kamar</th>
                    <th>Area Piket</th>
                    <th>Hari</th>
                    <th>Status</th>
                </tr>

            </thead>

            <tbody>

                @foreach($jadwals as $jadwal)

                <tr>

                    <td>
                        <strong>{{ $jadwal['kamar'] }}</strong>
                    </td>

                    <td>
                        {{ $jadwal['area'] }}
                    </td>

                    <td>
                        {{ $jadwal['hari'] }}
                    </td>

                    <td>

                        @if($jadwal['status'] == 'Hari Ini')

                            <span class="badge bg-success">
                                Hari Ini
                            </span>

                        @else

                            <span class="badge bg-secondary">
                                -
                            </span>

                        @endif

                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>

    </div>

</div>

@endsection
