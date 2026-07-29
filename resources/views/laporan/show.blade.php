@extends('layouts.admin')

@section('content')

<div class="dutio-page-header d-flex justify-content-between align-items-center flex-wrap gap-3">

    <div>
        <h1>Detail Laporan</h1>
        <p class="text-muted mb-0">
            Verifikasi hasil kegiatan piket penghuni.
        </p>
    </div>

    <a href="{{ url('/koordinator/laporan') }}" class="dutio-back-link">
        <i class="fa-solid fa-arrow-left"></i>
        Kembali
    </a>

</div>


<div class="row g-4">

    {{-- FOTO --}}
    <div class="col-lg-7">

        <div class="dutio-card h-100">

            <div class="dutio-card-header d-flex justify-content-between align-items-center">

                <h3 class="mb-0">
                    Foto Bukti
                </h3>

                @if($laporan->status=='Menunggu')
                    <span class="dutio-pill dutio-pill--warning">
                        Menunggu
                    </span>
                @elseif($laporan->status=='Disetujui')
                    <span class="dutio-pill dutio-pill--success">
                        Disetujui
                    </span>
                @else
                    <span class="dutio-pill dutio-pill--danger">
                        Ditolak
                    </span>
                @endif

            </div>

            <div class="dutio-card-body text-center">

                <a
                    href="{{ asset('storage/'.$laporan->foto) }}"
                    target="_blank"
                    class="dutio-photo-frame">

                    <img
                        src="{{ asset('storage/'.$laporan->foto) }}"
                        alt="Foto Laporan">

                    <div class="dutio-photo-overlay">

                        <i class="fa-solid fa-magnifying-glass-plus"></i>

                        Lihat Ukuran Penuh

                    </div>

                </a>

            </div>

        </div>

    </div>


    {{-- INFORMASI --}}
    <div class="col-lg-5">

        <div class="dutio-card">

            <div class="dutio-card-header">
                <h3>Informasi Laporan</h3>
            </div>

            <div class="dutio-card-body">

                <div class="dutio-info-card">

                    <div class="dutio-info-item">
                        <span>Kamar</span>
                        <strong>{{ $laporan->jadwal->user->kamar }}</strong>
                    </div>

                    <div class="dutio-info-item">
                        <span>Penghuni</span>
                        <strong>{{ $laporan->user->name }}</strong>
                    </div>

                    <div class="dutio-info-item">
                        <span>Area Piket</span>
                        <strong>{{ $laporan->jadwal->areaPiket->nama_area }}</strong>
                    </div>

                    <div class="dutio-info-item">
                        <span>Tanggal</span>
                        <strong>{{ \Carbon\Carbon::parse($laporan->jadwal->tanggal)->translatedFormat('d F Y') }}</strong>
                    </div>

                </div>

                <hr>

                <label class="form-label fw-semibold">

                    Catatan Penghuni

                </label>

                <div class="dutio-note">

                    {{ $laporan->keterangan ?: 'Tidak ada catatan.' }}

                </div>

            </div>

        </div>


        {{-- VERIFIKASI --}}
        <div class="dutio-card mt-3">

            <div class="dutio-card-header">
                <h3>Verifikasi Koordinator</h3>
            </div>

            <div class="dutio-card-body">

                <form action="{{ url('/koordinator/laporan/'.$laporan->id) }}" method="POST">

                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Poin</label>

                        <input
                            type="number"
                            name="poin"
                            min="0"
                            max="100"
                            class="form-control"
                            required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">
                            Evaluasi
                        </label>

                        <textarea
                            name="evaluasi"
                            rows="4"
                            class="dutio-textarea"
                            required></textarea>
                    </div>

                    <div class="d-flex gap-2">

                        <button
                            type="submit"
                            name="status"
                            value="Ditolak"
                            class="dutio-btn-danger flex-fill">

                            <i class="fa-solid fa-xmark"></i>

                            Tolak

                        </button>

                        <button
                            type="submit"
                            name="status"
                            value="Disetujui"
                            class="dutio-btn-success flex-fill">

                            <i class="fa-solid fa-check"></i>

                            Setujui

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

@push('styles')

<style>

.dutio-back-link{
display:flex;
align-items:center;
gap:8px;
padding:10px 18px;
border-radius:12px;
border:1px solid var(--dutio-border);
color:var(--dutio-ink-soft);
font-weight:600;
transition:.25s;
text-decoration:none;
}

.dutio-back-link:hover{
background:var(--dutio-bg);
color:var(--dutio-primary);
}

.dutio-photo-frame{
position:relative;
display:block;
overflow:hidden;
border-radius:18px;
}

.dutio-photo-frame img{
width:100%;
max-height:480px;
object-fit:cover;
transition:.35s;
}

.dutio-photo-frame:hover img{
transform:scale(1.05);
}

.dutio-photo-overlay{
position:absolute;
inset:0;
display:flex;
flex-direction:column;
align-items:center;
justify-content:center;
background:rgba(0,0,0,.45);
color:white;
font-weight:600;
opacity:0;
transition:.3s;
gap:8px;
}

.dutio-photo-frame:hover .dutio-photo-overlay{
opacity:1;
}

.dutio-info-card{
display:grid;
gap:15px;
}

.dutio-info-item{
background:var(--dutio-bg);
border-radius:14px;
padding:14px;
}

.dutio-info-item span{
display:block;
font-size:.8rem;
color:var(--dutio-ink-soft);
margin-bottom:4px;
}

.dutio-info-item strong{
font-size:.95rem;
}

.dutio-note{
background:var(--dutio-primary-soft);
border-left:4px solid var(--dutio-primary);
padding:16px;
border-radius:12px;
line-height:1.7;
}

.dutio-textarea{
width:100%;
border:1px solid var(--dutio-border);
border-radius:14px;
padding:14px;
background:var(--dutio-bg);
resize:none;
}

.dutio-textarea:focus{
outline:none;
border-color:var(--dutio-primary);
}

.dutio-btn-success{
background:var(--dutio-primary);
border:none;
color:white;
padding:13px;
border-radius:14px;
font-weight:700;
transition:.25s;
}

.dutio-btn-success:hover{
background:#4f6b3f;
transform:translateY(-2px);
}

.dutio-btn-danger{
background:#FDECEC;
border:none;
color:#D64545;
padding:13px;
border-radius:14px;
font-weight:700;
transition:.25s;
}

.dutio-btn-danger:hover{
background:#D64545;
color:white;
transform:translateY(-2px);
}

</style>

@endpush

@endsection