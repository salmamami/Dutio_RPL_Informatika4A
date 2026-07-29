<?php

namespace App\Http\Controllers\Koordinator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Penilaian;
use App\Models\Penghuni;

class PenilaianController extends Controller
{
    /**
     * Daftar penilaian
     */
    public function index()
    {
        $penilaians = Penilaian::with([
            'laporan.user',
            'laporan.jadwal.areaPiket',
            'laporan.jadwal.tugasPiket',
            'penghuni'
        ])
        ->latest()
        ->get();

        return view(
            'koordinator.penilaian.index',
            compact('penilaians')
        );
    }

    /**
     * Detail penilaian
     */
    public function show($id)
    {
        $penilaian = Penilaian::with([
            'laporan.user',
            'laporan.jadwal.areaPiket',
            'laporan.jadwal.tugasPiket',
            'penghuni'
        ])->findOrFail($id);

        return view(
            'koordinator.penilaian.show',
            compact('penilaian')
        );
    }

    /**
     * Form edit
     */
    public function edit($id)
    {
        $penilaian = Penilaian::with([
            'laporan.user',
            'laporan.jadwal.areaPiket',
            'laporan.jadwal.tugasPiket',
            'penghuni'
        ])->findOrFail($id);

        return view(
            'koordinator.penilaian.edit',
            compact('penilaian')
        );
    }

    /**
     * Update penilaian
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'poin' => 'required|integer|min:0|max:100',
            'kategori' => 'required|string',
            'evaluasi' => 'nullable|string'
        ]);

        $penilaian = Penilaian::findOrFail($id);

        $penilaian->update([
            'poin' => $request->poin,
            'kategori' => $request->kategori,
            'evaluasi' => $request->evaluasi
        ]);

        return redirect()
            ->route('koordinator.penilaian.index')
            ->with(
                'success',
                'Penilaian berhasil diperbarui.'
            );
    }

    /**
     * Hapus penilaian
     */
    public function destroy($id)
    {
        $penilaian = Penilaian::findOrFail($id);

        $penilaian->delete();

        return redirect()
            ->route('koordinator.penilaian.index')
            ->with(
                'success',
                'Penilaian berhasil dihapus.'
            );
    }
}