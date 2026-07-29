<?php

namespace App\Http\Controllers\Koordinator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Laporan;
use App\Models\Penilaian;

class LaporanController extends Controller
{
    public function index()
    {
        $laporans = Laporan::with([
            'user',
            'jadwal.areaPiket',
            'jadwal.tugasPiket'
        ])
        ->latest()
        ->get();

        return view(
            'koordinator.laporan.index',
            compact('laporans')
        );
    }

    public function show($id)
    {
        $laporan = Laporan::with([
            'user',
            'jadwal.areaPiket',
            'jadwal.tugasPiket',
            'penilaian'
        ])->findOrFail($id);

        return view(
            'koordinator.laporan.show',
            compact('laporan')
        );
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:Disetujui,Ditolak',
            'poin' => 'required|integer|min:0|max:100',
            'evaluasi' => 'required|string'
        ]);

        $laporan = Laporan::with('jadwal')->findOrFail($id);

        if ($laporan->status != 'Menunggu') {
            return back()->with(
                'error',
                'Laporan sudah pernah diverifikasi.'
            );
        }

        // Update status laporan
        $laporan->update([
            'status' => $request->status
        ]);

        // Simpan hasil penilaian
        Penilaian::updateOrCreate(
            [
                'laporan_id' => $laporan->id
            ],
            [
                'poin' => $request->poin,
                'evaluasi' => $request->evaluasi
            ]
        );

        // Update status jadwal
        $laporan->jadwal->update([
            'status' => $request->status == 'Disetujui'
                ? 'Selesai'
                : 'Belum Dikerjakan'
        ]);

        return redirect('/koordinator/laporan')
            ->with(
                'success',
                'Laporan berhasil diverifikasi.'
            );
    }
}