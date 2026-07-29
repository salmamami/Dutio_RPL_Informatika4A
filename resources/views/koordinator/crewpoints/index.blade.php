@extends('layouts.admin')

@section('content')

<div class="dutio-page-header d-flex justify-content-between align-items-center">

    <div>
        <h1>Crew Point</h1>
        <p class="text-muted mb-0">
            Rekap performa kebersihan setiap kamar berdasarkan periode.
        </p>
    </div>

</div>


{{-- SUMMARY --}}

<div class="row g-4 mb-4">

    <div class="col-lg-6">

        <div class="dutio-stat-card success">

            <div>
                <small>Total Crew Point</small>

                <h2>

                    {{ $totalCrewPoint }}

                </h2>
            </div>

            <div class="icon">
                ⭐
            </div>

        </div>

    </div>

    <div class="col-lg-6">

        <div class="dutio-stat-card warning">

            <div>
                <small>Rata-rata Crew Point</small>

                <h2>

                    {{ $rataRataCrewPoint }}

                </h2>
            </div>

            <div class="icon">
                📊
            </div>

        </div>

    </div>

</div>



<div class="dutio-card">

    <div class="dutio-card-header">

        <h3>Rekap Crew Point</h3>

    </div>

    <div class="dutio-card-body">

        <div class="table-responsive">

            <table class="table align-middle">

                <thead>

                <tr>

                    <th>No</th>

                    <th>Kamar</th>

                    <th>Periode</th>

                    <th>Penghuni</th>

                    <th>Selesai</th>

                    <th>Ditolak</th>

                    <th>Belum</th>

                    <th>Crew Point</th>

                </tr>

                </thead>

                <tbody>

                @forelse($crewpoints as $point)

                    <tr>

                        <td>{{ $loop->iteration }}</td>

                        <td>

                            <strong>

                                🏠 {{ $point->kamar }}

                            </strong>

                        </td>

                        <td>

                            {{ \Carbon\Carbon::parse($point->periode)->translatedFormat('F Y') }}

                        </td>

                        <td>

                            <span class="badge bg-light text-dark">

                                {{ $point->jumlah_penghuni }}

                            </span>

                        </td>

                        <td>

                            <span class="badge bg-success">

                                {{ $point->jumlah_selesai }}

                            </span>

                        </td>

                        <td>

                            <span class="badge bg-danger">

                                {{ $point->jumlah_ditolak }}

                            </span>

                        </td>

                        <td>

                            <span class="badge bg-warning text-dark">

                                {{ $point->jumlah_belum }}

                            </span>

                        </td>

                        <td>

                            @if($point->crew_point >= 90)

                                <span class="badge bg-success px-3 py-2">

                                    ⭐ {{ $point->crew_point }}

                                </span>

                            @elseif($point->crew_point >=70)

                                <span class="badge bg-warning text-dark px-3 py-2">

                                    ⭐ {{ $point->crew_point }}

                                </span>

                            @else

                                <span class="badge bg-danger px-3 py-2">

                                    ⭐ {{ $point->crew_point }}

                                </span>

                            @endif

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="8">

                            <div class="text-center py-5">

                                <img src="https://cdn-icons-png.flaticon.com/512/7486/7486740.png"
                                     width="90"
                                     class="mb-3">

                                <h5>Belum Ada Crew Point</h5>

                                <p class="text-muted mb-0">

                                    Crew Point akan muncul setelah proses penilaian dilakukan.

                                </p>

                            </div>

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection


@push('styles')

<style>

.dutio-stat-card{

    display:flex;

    justify-content:space-between;

    align-items:center;

    padding:28px;

    border-radius:20px;

    background:#fff;

    box-shadow:0 12px 30px rgba(0,0,0,.05);

    transition:.3s;

}

.dutio-stat-card:hover{

    transform:translateY(-5px);

}

.dutio-stat-card h2{

    font-size:34px;

    font-weight:700;

    margin-top:8px;

}

.dutio-stat-card small{

    color:#888;

}

.dutio-stat-card .icon{

    width:72px;

    height:72px;

    border-radius:18px;

    display:flex;

    justify-content:center;

    align-items:center;

    font-size:34px;

}

.dutio-stat-card.success{

    border-left:6px solid #3FA34D;

}

.dutio-stat-card.success .icon{

    background:#E8F7EB;

}

.dutio-stat-card.warning{

    border-left:6px solid #F4A300;

}

.dutio-stat-card.warning .icon{

    background:#FFF5DF;

}

.table thead{

    background:#F8F9FA;

}

.table tbody tr{

    transition:.25s;

}

.table tbody tr:hover{

    background:#F9FBF9;

}

.badge{

    border-radius:20px;

    padding:.55rem .9rem;

    font-weight:600;

}

</style>

@endpush