@extends('layouts.app')

@section('content')

@php
    $total = count($checklists);
    $selesai = collect($checklists)->where('selesai', true)->count();
    $persen = $total > 0 ? ($selesai / $total) * 100 : 0;
@endphp

<div class="dutio-page-header d-flex align-items-center justify-content-between flex-wrap gap-2">
    <div>
        <h1>Checklist Piket</h1>
        <p class="text-muted mb-0">
            Area hari ini : <strong>{{ $area['nama'] }}</strong>
        </p>
    </div>

    <span class="dutio-pill dutio-pill--warning">
        {{ $area['status'] }}
    </span>
</div>

<div class="dutio-card mb-4 dutio-focus-card">

    <div class="dutio-card-header">
        <h3>Progress Pekerjaan</h3>
        <span class="dutio-focus-percent" id="progressPercentText">{{ round($persen) }}%</span>
    </div>

    <div class="dutio-card-body">

        <div class="dutio-progress-track dutio-progress-track--lg mb-3">
            <div class="dutio-progress-fill" id="progressFill" style="width: {{ $persen }}%"></div>
        </div>

        <p class="mb-0 text-muted">
            <i class="fa-solid fa-circle-check me-1"></i>
            <strong id="progressCountText">{{ $selesai }} / {{ $total }}</strong> checklist selesai
        </p>

    </div>

</div>

<div class="dutio-card">

    <div class="dutio-card-header">
        <h3>Checklist Area</h3>
    </div>

    <div class="dutio-card-body">

        <div class="dutio-checklist-grid" id="checklistGrid">

            @foreach($checklists as $item)

                <label class="dutio-check-tile {{ $item['selesai'] ? 'is-done' : '' }}">

                    <input
                        type="checkbox"
                        class="dutio-check-tile-input"
                        data-id="{{ $item['id'] }}"
                        {{ $item['selesai'] ? 'checked' : '' }}
                    >

                    <span class="dutio-check-tile-circle">
                        <i class="fa-solid fa-check"></i>
                    </span>

                    <span class="dutio-check-tile-label">
                        {{ $item['nama'] }}
                    </span>

                </label>

            @endforeach

        </div>

    </div>

</div>

<div class="dutio-card mt-4">

    <div class="dutio-card-header">
        <h3>Langkah Selanjutnya</h3>
    </div>

    <div class="dutio-card-body" id="nextStepArea">

        @if($selesai == $total)

            <a href="/laporan" class="dutio-action-tile dutio-action-tile--success">
                <div class="dutio-action-tile-icon">
                    <i class="fa-solid fa-file-arrow-up"></i>
                </div>
                <div>
                    <strong>Upload Laporan</strong>
                    <span>Semua checklist udah beres, gas lanjut 🚀</span>
                </div>
                <i class="fa-solid fa-chevron-right dutio-action-tile-arrow"></i>
            </a>

        @else

            <div class="dutio-action-tile dutio-action-tile--disabled">
                <div class="dutio-action-tile-icon">
                    <i class="fa-solid fa-lock"></i>
                </div>
                <div>
                    <strong>Upload Laporan</strong>
                    <span>Selesaikan {{ $total - $selesai }} checklist lagi dulu</span>
                </div>
            </div>

        @endif

    </div>

</div>

@push('styles')
<style>

.dutio-checklist-grid{
    display:grid;
    grid-template-columns:repeat(auto-fill,minmax(260px,1fr));
    gap:12px;
}

.dutio-check-tile{
    position:relative;
    display:flex;
    align-items:center;
    gap:14px;
    background: var(--dutio-surface);
    border:1.5px solid var(--dutio-border);
    border-radius:16px;
    padding:16px;
    cursor:pointer;
    transition: transform .2s ease, box-shadow .2s ease, border-color .25s ease, background .25s ease;
    box-shadow: var(--dutio-shadow);
}

.dutio-check-tile:hover{
    transform: translateY(-2px);
    box-shadow: var(--dutio-shadow-hover);
}

.dutio-check-tile-input{
    position:absolute;
    opacity:0;
    width:0;
    height:0;
}

.dutio-check-tile-circle{
    width:26px;
    height:26px;
    border-radius:50%;
    border:2px solid var(--dutio-border);
    display:flex;
    align-items:center;
    justify-content:center;
    flex-shrink:0;
    font-size:.7rem;
    color:transparent;
    background: var(--dutio-bg);
    transition: all .25s ease;
}

.dutio-check-tile-label{
    font-size:.92rem;
    font-weight:500;
    transition: color .25s ease;
}

.dutio-check-tile.is-done{
    background: var(--dutio-success-soft);
    border-color: var(--dutio-success);
}

.dutio-check-tile.is-done .dutio-check-tile-circle{
    background: var(--dutio-success);
    border-color: var(--dutio-success);
    color:#fff;
}

.dutio-check-tile.is-done .dutio-check-tile-label{
    color: var(--dutio-ink-soft);
    text-decoration: line-through;
}

.dutio-check-tile.is-loading{
    opacity:.6;
    pointer-events:none;
}

</style>
@endpush

@push('scripts')
<script>
document.querySelectorAll('.dutio-check-tile-input').forEach(function(checkbox){

    checkbox.addEventListener('change', function(){

        const tile = this.closest('.dutio-check-tile');
        const id = this.dataset.id;
        const checked = this.checked;

        tile.classList.add('is-loading');

        fetch(`/checklist/${id}/toggle`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({ selesai: checked })
        })
        .then(res => res.json())
        .then(data => {

            tile.classList.remove('is-loading');
            tile.classList.toggle('is-done', checked);

            document.getElementById('progressFill').style.width = data.persen + '%';
            document.getElementById('progressPercentText').textContent = Math.round(data.persen) + '%';
            document.getElementById('progressCountText').textContent = data.selesai + ' / ' + data.total;

            const nextStepArea = document.getElementById('nextStepArea');

            if (data.allDone) {
                nextStepArea.innerHTML = `
                    <a href="/laporan" class="dutio-action-tile dutio-action-tile--success">
                        <div class="dutio-action-tile-icon">
                            <i class="fa-solid fa-file-arrow-up"></i>
                        </div>
                        <div>
                            <strong>Upload Laporan</strong>
                            <span>Semua checklist udah beres, gas lanjut 🚀</span>
                        </div>
                        <i class="fa-solid fa-chevron-right dutio-action-tile-arrow"></i>
                    </a>
                `;
            } else {
                const sisa = data.total - data.selesai;
                nextStepArea.innerHTML = `
                    <div class="dutio-action-tile dutio-action-tile--disabled">
                        <div class="dutio-action-tile-icon">
                            <i class="fa-solid fa-lock"></i>
                        </div>
                        <div>
                            <strong>Upload Laporan</strong>
                            <span>Selesaikan ${sisa} checklist lagi dulu</span>
                        </div>
                    </div>
                `;
            }

        })
        .catch(() => {
            tile.classList.remove('is-loading');
            this.checked = !checked;
            alert('Gagal update checklist, coba lagi.');
        });

    });

});
</script>
@endpush

@endsection