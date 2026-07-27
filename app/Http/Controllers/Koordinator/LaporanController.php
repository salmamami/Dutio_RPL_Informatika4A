<?php

namespace App\Http\Controllers\Koordinator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Laporan;
use App\Models\Penilaian;
use App\Models\CrewPoint;
use App\Models\AreaPiket;
use App\Models\Jadwal;
use Carbon\Carbon;

class LaporanController extends Controller
{
    public function index()
    {
        $laporans = Laporan::with([
            'user',
            'jadwal.areaPiket'
        ])
        ->latest()
        ->get();

        return view('koordinator.laporan.index', compact('laporans'));
    }

    public function show($id)
    {
        $laporan = Laporan::with([
            'user',
            'jadwal.areaPiket'
        ])->findOrFail($id);

        return view('koordinator.laporan.show', compact('laporan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status'    => 'required|in:Disetujui,Ditolak',
            'poin'      => 'required|integer|min:0|max:100',
            'evaluasi'  => 'required|string'
        ]);

        $laporan = Laporan::with('jadwal')->findOrFail($id);

        if ($laporan->status != 'Menunggu') {
            return back()->with('error', 'Laporan sudah pernah dinilai.');
        }

        // ==========================
        // Update Status Laporan
        // ==========================

        $laporan->update([
            'status' => $request->status
        ]);

        // ==========================
        // Simpan Penilaian
        // ==========================

        $penilaian = Penilaian::updateOrCreate(
            [
                'laporan_id' => $laporan->id
            ],
            [
                'poin'      => $request->poin,
                'evaluasi'  => $request->evaluasi
            ]
        );

        // ==========================
        // Simpan Crew Point
        // ==========================

        CrewPoint::updateOrCreate(
            [
                'penilaian_id' => $penilaian->id
            ],
            [
                'user_id' => $laporan->user_id,
                'poin'    => $request->poin
            ]
        );

        // ==========================
        // Jika Ditolak
        // ==========================

        if ($request->status == 'Ditolak') {

            $laporan->jadwal->update([
                'status' => 'Belum Dikerjakan'
            ]);

            return redirect('/koordinator/laporan')
                ->with('success', 'Laporan berhasil ditolak.');
        }

        // ==========================
        // Jika Disetujui
        // ==========================

        $laporan->jadwal->update([
            'status' => 'Selesai'
        ]);

        $nextArea = AreaPiket::where(
            'id',
            '>',
            $laporan->jadwal->area_piket_id
        )->orderBy('id')->first();

        if (!$nextArea) {
            $nextArea = AreaPiket::orderBy('id')->first();
        }

        $tanggalBaru = Carbon::parse($laporan->jadwal->tanggal)
            ->addDay();

        $jadwalAda = Jadwal::where('user_id', $laporan->user_id)
            ->whereDate('tanggal', $tanggalBaru)
            ->exists();

        if (!$jadwalAda) {

            Jadwal::create([
                'user_id'       => $laporan->user_id,
                'area_piket_id' => $nextArea->id,
                'tanggal'       => $tanggalBaru,
                'status'        => 'Belum Dikerjakan'
            ]);
        }

        return redirect('/koordinator/laporan')
            ->with('success', 'Laporan berhasil disetujui.');
    }
}