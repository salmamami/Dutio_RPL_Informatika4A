@extends('layouts.admin')

@section('content')

<div class="container mt-4">

    <h3 class="mb-4">
        Data Penilaian Penghuni
    </h3>

    {{-- Alert sukses --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Error --}}
    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <div class="accordion" id="accordionKamar">

        @forelse($penghunis as $kamar => $listPenghuni)

        <div class="accordion-item mb-3 shadow-sm">

            <h2 class="accordion-header" id="heading{{ \Illuminate\Support\Str::slug($kamar) }}">

                <button
                    class="accordion-button collapsed"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#collapse{{ \Illuminate\Support\Str::slug($kamar) }}"
                    aria-expanded="false">

                    <strong>{{ $kamar }}</strong>

                    <span class="ms-2 text-muted">
                        ({{ $listPenghuni->count() }} Penghuni)
                    </span>

                </button>

            </h2>

            <div
                id="collapse{{ \Illuminate\Support\Str::slug($kamar) }}"
                class="accordion-collapse collapse"
                data-bs-parent="#accordionKamar">

                <div class="accordion-body">

                    <div class="row">

                        @foreach($listPenghuni as $penghuni)

                        <div class="col-md-4 mb-4">

                            <div class="card shadow-sm h-100">

                                <div class="card-body">

                                    <h5 class="card-title">
                                        {{ $penghuni->nama_penghuni }}
                                    </h5>

                                    <p class="mb-2">
                                        <strong>Kamar :</strong>
                                        {{ $penghuni->kamar }}
                                    </p>

                                    <p class="mb-3">

                                        <strong>Status :</strong>

                                        @if($penghuni->penilaianPenghunis->count() > 0)
                                            <span class="badge bg-success">
                                                Sudah Dinilai
                                            </span>

                                        @else

                                            <span class="badge bg-danger">
                                                Belum Dinilai
                                            </span>

                                        @endif

                                    </p>

                                    @if($penghuni->penilaianPenghunis->count() > 0)

                                        <a href="{{ route('koordinator.penilaian.show', $penghuni->id) }}"
                                        class="btn btn-success w-100">

                                            <i class="bi bi-eye"></i>
                                            Lihat Detail

                                        </a>

                                    @else

                                        <a href="{{ route('koordinator.penilaian.create', $penghuni->id) }}"
                                        class="btn btn-primary w-100">

                                            <i class="bi bi-pencil-square"></i>
                                            Beri Penilaian

                                        </a>

                                    @endif

                                </div>

                            </div>

                        </div>

                        @endforeach

                    </div>

                </div>

            </div>

        </div>

        @empty

        <div class="alert alert-info">
            Belum ada data penghuni.
        </div>

        @endforelse

    </div>

</div>

@endsection