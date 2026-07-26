@extends('layouts.app')

@section('content')

<div class="dutio-page-header">
    <h1>Laporan Kegiatan</h1>
    <p class="text-muted">
        Upload bukti kegiatan piket yang telah diselesaikan
    </p>
</div>

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

@if(session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif

<div class="row g-3">

    {{-- =========================
        FORM UPLOAD
    ========================== --}}
    <div class="col-md-5">

        <div class="dutio-card mb-0 h-100">

            <div class="dutio-card-header">
                <h3>Upload Laporan</h3>
            </div>

            <div class="dutio-card-body">

                <form
                    action="{{ route('laporan.store') }}"
                    method="POST"
                    enctype="multipart/form-data">

                    @csrf

                    <div class="mb-3">

                        <label class="form-label">
                            Area Piket
                        </label>

                        <input
                            type="text"
                            class="dutio-textarea"
                            readonly
                            value="{{ $jadwal ? $jadwal->areaPiket->nama_area : '-' }}">

                    </div>

                    <div class="mb-3">

                        <label class="form-label">
                            Foto Bukti
                        </label>

                        <label class="dutio-dropzone-v2">

                            <input
                                type="file"
                                id="fotoInput"
                                name="foto"
                                accept="image/*"
                                required>

                            <div id="dropzoneEmpty">

                                <span class="dutio-dropzone-v2-icon">

                                    <svg viewBox="0 0 24 24"
                                         fill="none"
                                         xmlns="http://www.w3.org/2000/svg">

                                        <path d="M4 8.5C4 7.67157 4.67157 7 5.5 7H7.5L8.5 5H15.5L16.5 7H18.5C19.3284 7 20 7.67157 20 8.5V17.5C20 18.3284 19.3284 19 18.5 19H5.5C4.67157 19 4 18.3284 4 17.5V8.5Z"
                                              stroke="currentColor"
                                              stroke-width="1.8"
                                              stroke-linejoin="round"/>

                                        <circle cx="12"
                                                cy="13"
                                                r="3.2"
                                                stroke="currentColor"
                                                stroke-width="1.8"/>

                                    </svg>

                                </span>

                                <span class="dutio-dropzone-v2-text">

                                    <strong>
                                        Klik untuk pilih foto
                                    </strong>

                                    <span>
                                        atau seret file ke sini
                                    </span>

                                </span>

                            </div>

                            <div
                                id="dropzonePreview"
                                class="dutio-dropzone-v2-preview"
                                style="display:none;">

                                <img
                                    id="previewImg"
                                    src=""
                                    alt="Preview">

                                <span id="previewFileName"></span>

                                <span class="dutio-dropzone-v2-change">
                                    Ganti Foto
                                </span>

                            </div>

                        </label>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">
                            Keterangan
                        </label>

                        <textarea
                            class="dutio-textarea"
                            name="keterangan"
                            rows="4"
                            placeholder="Tulis keterangan kegiatan..."></textarea>

                    </div>

                    <button
                        class="dutio-submit-btn w-100"
                        type="submit">

                        <i class="fa-solid fa-paper-plane me-1"></i>

                        Kirim Laporan

                    </button>

                </form>

            </div>

        </div>

    </div>

    {{-- =========================
        RIWAYAT
    ========================== --}}
    <div class="col-md-7">

        <div class="dutio-card mb-0 h-100">

            <div class="dutio-card-header">
                <h3>Riwayat Laporan</h3>
            </div>

            <div class="dutio-card-body">

                <div class="dutio-timeline">

                    @forelse($riwayat as $laporan)

                        <div class="dutio-timeline-item">

                            <div class="dutio-timeline-card">

                                <div class="dutio-timeline-day">
                                    {{ $laporan->created_at->format('d M Y') }}
                                </div>

                                <div class="dutio-timeline-body">

                                    <strong>
                                        {{ $laporan->jadwal->areaPiket->nama_area }}
                                    </strong>

                                    <span>
                                        {{ $laporan->keterangan }}
                                    </span>

                                </div>

                                @if($laporan->status == 'Menunggu')

                                    <span class="dutio-pill dutio-pill--warning">
                                        Menunggu
                                    </span>

                                @elseif($laporan->status == 'Disetujui')

                                    <span class="dutio-pill dutio-pill--success">
                                        Disetujui
                                    </span>

                                @else

                                    <span class="dutio-pill dutio-pill--danger">
                                        Ditolak
                                    </span>

                                @endif

                            </div>

                        </div>

                    @empty

                        <p class="text-muted">
                            Belum ada laporan yang dikirim.
                        </p>

                    @endforelse

                </div>

            </div>

        </div>

    </div>

</div>
@push('styles')
<style>

/* =========================
   CUSTOM SELECT
========================= */

.dutio-select-wrap{
    position:relative;
}

.dutio-select{
    width:100%;
    appearance:none;
    background:var(--dutio-bg);
    border:1.5px solid var(--dutio-border);
    border-radius:14px;
    padding:13px 40px 13px 16px;
}

/* =========================
   DROPZONE
========================= */

.dutio-dropzone-v2{
    display:flex;
    flex-direction:column;
    align-items:center;
    justify-content:center;
    text-align:center;
    border:1.5px dashed var(--dutio-border);
    border-radius:18px;
    padding:32px 20px;
    background:var(--dutio-bg);
    cursor:pointer;
    position:relative;
    transition:.3s;
}

.dutio-dropzone-v2:hover{
    border-color:var(--dutio-primary);
    background:var(--dutio-primary-soft);
}

.dutio-dropzone-v2 input[type=file]{
    position:absolute;
    inset:0;
    opacity:0;
    cursor:pointer;
}

.dutio-dropzone-v2-icon{
    width:52px;
    height:52px;
    border-radius:50%;
    background:var(--dutio-surface);
    color:var(--dutio-primary);
    display:grid;
    place-items:center;
    margin-bottom:12px;
}

.dutio-dropzone-v2-icon svg{
    width:22px;
    height:22px;
}

.dutio-dropzone-v2-preview{
    display:flex;
    flex-direction:column;
    align-items:center;
    gap:8px;
}

.dutio-dropzone-v2-preview img{
    max-height:150px;
    border-radius:12px;
}

.dutio-dropzone-v2-change{
    color:var(--dutio-primary);
    font-size:.8rem;
    font-weight:600;
}

/* =========================
   TEXTAREA
========================= */

.dutio-textarea{
    width:100%;
    background:var(--dutio-bg);
    border:1.5px solid var(--dutio-border);
    border-radius:14px;
    padding:14px 16px;
    font-size:.9rem;
    resize:vertical;
    font-family:inherit;
}

.dutio-textarea:focus{
    outline:none;
    border-color:var(--dutio-primary);
}

/* =========================
   BUTTON
========================= */

.dutio-submit-btn{
    border:none;
    border-radius:14px;
    padding:14px;
    background:linear-gradient(
        135deg,
        var(--dutio-primary),
        var(--dutio-sidebar-bg)
    );
    color:white;
    font-weight:700;
}

.dutio-submit-btn:hover{
    transform:translateY(-2px);
}

/* =========================
   TIMELINE
========================= */

.dutio-timeline-card{
    display:flex;
    align-items:center;
    gap:15px;
    flex-wrap:wrap;
}

.dutio-timeline-body{
    flex:1;
}

.dutio-timeline-body strong{
    display:block;
}

.dutio-timeline-body span{
    color:#777;
    font-size:.85rem;
}

.dutio-pill{
    margin-left:auto;
}

</style>
@endpush


@push('scripts')
<script>

const fotoInput=document.getElementById('fotoInput');

if(fotoInput){

fotoInput.addEventListener('change',function(e){

const file=e.target.files[0];

if(!file)return;

const reader=new FileReader();

reader.onload=function(ev){

document.getElementById('previewImg').src=ev.target.result;

document.getElementById('previewFileName').textContent=file.name;

document.getElementById('dropzoneEmpty').style.display='none';

document.getElementById('dropzonePreview').style.display='flex';

};

reader.readAsDataURL(file);

});

}

</script>
@endpush

@endsection