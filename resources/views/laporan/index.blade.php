@extends('layouts.app')

@section('content')

<div class="dutio-page-header">
    <h1>Laporan Kegiatan</h1>
    <p class="text-muted">Upload bukti kegiatan piket yang telah diselesaikan</p>
</div>

<div class="row g-3">

    <div class="col-md-5">
        <div class="dutio-card mb-0 h-100">
            <div class="dutio-card-header">
                <h3>Upload Laporan</h3>
            </div>
            <div class="dutio-card-body">

                <div class="mb-3">
                    <label class="form-label">Tugas Piket</label>
                    <div class="dutio-select-wrap">
                        <select class="dutio-select">
                            <option>Menyapu Koridor</option>
                            <option>Buang Sampah</option>
                            <option>Membersihkan Mushola</option>
                        </select>
                        <i class="fa-solid fa-chevron-down dutio-select-arrow"></i>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Foto Bukti</label>

                    <label class="dutio-dropzone-v2" id="dropzone">
                        <input type="file" id="fotoInput" accept="image/*">

                        <div id="dropzoneEmpty">
                            <span class="dutio-dropzone-v2-icon">
                                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4 8.5C4 7.67157 4.67157 7 5.5 7H7.5L8.5 5H15.5L16.5 7H18.5C19.3284 7 20 7.67157 20 8.5V17.5C20 18.3284 19.3284 19 18.5 19H5.5C4.67157 19 4 18.3284 4 17.5V8.5Z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/>
                                    <circle cx="12" cy="13" r="3.2" stroke="currentColor" stroke-width="1.8"/>
                                </svg>
                            </span>
                            <span class="dutio-dropzone-v2-text">
                                <strong>Klik untuk pilih foto</strong>
                                <span>atau seret file ke sini</span>
                            </span>
                        </div>

                        <div id="dropzonePreview" class="dutio-dropzone-v2-preview" style="display:none;">
                            <img id="previewImg" src="" alt="Preview">
                            <span id="previewFileName"></span>
                            <span class="dutio-dropzone-v2-change">Ganti foto</span>
                        </div>
                    </label>
                </div>

                <div class="mb-3">
                    <label class="form-label">Keterangan</label>
                    <textarea class="dutio-textarea" rows="4" placeholder="Tulis keterangan kegiatan..."></textarea>
                </div>

                <button class="dutio-submit-btn w-100">
                    <i class="fa-solid fa-paper-plane me-1"></i> Kirim Laporan
                </button>

            </div>
        </div>
    </div>

    <div class="col-md-7">
        <div class="dutio-card mb-0 h-100">
            <div class="dutio-card-header">
                <h3>Riwayat Laporan</h3>
            </div>
            <div class="dutio-card-body">

                <div class="dutio-timeline">

                    <div class="dutio-timeline-item">
                        <div class="dutio-timeline-card">
                            <div class="dutio-timeline-day">Hari ini</div>

                            <div class="dutio-timeline-icon" style="background:var(--dutio-warning-soft); color:var(--dutio-warning);">
                                <i class="fa-solid fa-hourglass-half"></i>
                            </div>

                            <div class="dutio-timeline-body">
                                <strong>Menyapu Koridor</strong>
                                <span>Menunggu verifikasi koordinator</span>
                            </div>

                            <span class="dutio-pill dutio-pill--warning">Menunggu</span>
                        </div>
                    </div>

                    <div class="dutio-timeline-item">
                        <div class="dutio-timeline-card">
                            <div class="dutio-timeline-day">Kemarin</div>

                            <div class="dutio-timeline-icon" style="background:var(--dutio-success-soft); color:var(--dutio-success);">
                                <i class="fa-solid fa-check"></i>
                            </div>

                            <div class="dutio-timeline-body">
                                <strong>Buang Sampah</strong>
                                <span>Laporan diterima koordinator</span>
                            </div>

                            <span class="dutio-pill dutio-pill--success">Diterima</span>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

</div>

@push('styles')
<style>

/* ===== CUSTOM SELECT ===== */
.dutio-select-wrap{
    position:relative;
}

.dutio-select{
    width:100%;
    appearance:none;
    -webkit-appearance:none;
    background: var(--dutio-bg);
    border:1.5px solid var(--dutio-border);
    border-radius:14px;
    padding:13px 40px 13px 16px;
    font-size:.92rem;
    font-weight:500;
    color: var(--dutio-ink);
    cursor:pointer;
    transition: border-color .25s ease, box-shadow .25s ease, background .25s ease;
}

.dutio-select:hover{
    border-color:#D5CDBB;
}

.dutio-select:focus{
    outline:none;
    background: var(--dutio-surface);
    border-color: var(--dutio-primary);
    box-shadow: 0 0 0 4px var(--dutio-primary-soft);
}

.dutio-select-arrow{
    position:absolute;
    right:16px;
    top:50%;
    transform: translateY(-50%);
    font-size:.75rem;
    color: var(--dutio-ink-soft);
    pointer-events:none;
    transition: transform .25s ease, color .25s ease;
}

.dutio-select:focus ~ .dutio-select-arrow{
    color: var(--dutio-primary);
    transform: translateY(-50%) rotate(180deg);
}

/* ===== DROPZONE V2 ===== */
.dutio-dropzone-v2{
    display:flex;
    flex-direction:column;
    align-items:center;
    justify-content:center;
    text-align:center;
    border:1.5px dashed var(--dutio-border);
    border-radius:18px;
    padding:32px 20px;
    background: var(--dutio-bg);
    cursor:pointer;
    position:relative;
    transition: border-color .3s ease, background .3s ease, transform .2s ease;
}

.dutio-dropzone-v2:hover{
    border-color: var(--dutio-primary);
    background: var(--dutio-primary-soft);
    transform: translateY(-2px);
}

.dutio-dropzone-v2 input[type="file"]{
    position:absolute;
    inset:0;
    opacity:0;
    cursor:pointer;
}

/* Icon wrapper — pakai flex + grid ganda biar 100% presisi center */
.dutio-dropzone-v2-icon{
    width:52px;
    height:52px;
    border-radius:50%;
    background: var(--dutio-surface);
    color: var(--dutio-primary);
    display:grid;
    place-items:center;
    margin-bottom:12px;
    box-shadow: var(--dutio-shadow);
    transition: transform .3s ease, background .3s ease, color .3s ease;
}

/* SVG icon: ukuran tetap, nggak kena isu line-height font icon */
.dutio-dropzone-v2-icon svg{
    width:22px;
    height:22px;
    display:block;
}

.dutio-dropzone-v2:hover .dutio-dropzone-v2-icon{
    transform: scale(1.08) rotate(-6deg);
    background: var(--dutio-primary);
    color:#fff;
}

.dutio-dropzone-v2-text strong{
    display:block;
    font-size:.92rem;
    color: var(--dutio-primary);
    margin-bottom:4px;
}

.dutio-dropzone-v2-text span{
    display:block;
    font-size:.8rem;
    color: var(--dutio-ink-soft);
}

.dutio-dropzone-v2-preview{
    display:flex;
    flex-direction:column;
    align-items:center;
    gap:8px;
}

.dutio-dropzone-v2-preview img{
    max-height:130px;
    border-radius:14px;
    object-fit:cover;
    box-shadow: var(--dutio-shadow-hover);
}

.dutio-dropzone-v2-preview span:not(.dutio-dropzone-v2-change){
    font-size:.8rem;
    color: var(--dutio-ink-soft);
    max-width:220px;
    overflow:hidden;
    text-overflow:ellipsis;
    white-space:nowrap;
}

.dutio-dropzone-v2-change{
    font-size:.76rem;
    font-weight:600;
    color: var(--dutio-primary);
    text-decoration:underline;
}

/* ===== TEXTAREA ===== */
.dutio-textarea{
    width:100%;
    background: var(--dutio-bg);
    border:1.5px solid var(--dutio-border);
    border-radius:14px;
    padding:14px 16px;
    font-size:.9rem;
    color: var(--dutio-ink);
    resize:vertical;
    min-height:100px;
    transition: border-color .25s ease, box-shadow .25s ease, background .25s ease;
    font-family:inherit;
}

.dutio-textarea::placeholder{
    color: var(--dutio-ink-soft);
}

.dutio-textarea:hover{
    border-color:#D5CDBB;
}

.dutio-textarea:focus{
    outline:none;
    background: var(--dutio-surface);
    border-color: var(--dutio-primary);
    box-shadow: 0 0 0 4px var(--dutio-primary-soft);
}

/* ===== SUBMIT BUTTON ===== */
.dutio-submit-btn{
    border:none;
    border-radius:14px;
    padding:14px;
    background: linear-gradient(135deg, var(--dutio-primary), var(--dutio-sidebar-bg));
    background-size:180% 180%;
    background-position:0% 50%;
    color:#fff;
    font-weight:700;
    font-size:.95rem;
    display:flex;
    align-items:center;
    justify-content:center;
    transition: background-position .5s ease, transform .25s ease, box-shadow .25s ease;
}

.dutio-submit-btn:hover{
    background-position:100% 50%;
    transform: translateY(-2px);
    box-shadow: 0 14px 28px -10px rgba(53,100,63,.4);
    color:#fff;
}

.dutio-submit-btn:active{
    transform: translateY(0) scale(.98);
}

/* Timeline card jadi flex biar pill-nya rapi di kanan */
.dutio-timeline-card{
    flex-wrap:wrap;
}

.dutio-timeline-card .dutio-pill{
    margin-left:auto;
}

@media (max-width:480px){
    .dutio-timeline-card .dutio-pill{
        margin-left:0;
        margin-top:6px;
    }
}

</style>
@endpush

@push('scripts')
<script>
document.getElementById('fotoInput').addEventListener('change', function(e){

    const file = e.target.files[0];
    if (!file) return;

    const reader = new FileReader();

    reader.onload = function(ev){
        document.getElementById('previewImg').src = ev.target.result;
        document.getElementById('previewFileName').textContent = file.name;
        document.getElementById('dropzoneEmpty').style.display = 'none';
        document.getElementById('dropzonePreview').style.display = 'flex';
    };

    reader.readAsDataURL(file);

});
</script>
@endpush

@endsection