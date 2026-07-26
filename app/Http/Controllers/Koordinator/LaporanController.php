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

        return view(
            'koordinator.laporan.index',
            compact('laporans')
        );
    }

    public function show($id)
    {
        $laporan = Laporan::with([
            'user',
            'jadwal.areaPiket'
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
            'evaluasi' => 'required'
        ]);

        $laporan = Laporan::with('jadwal')->findOrFail($id);

        // Cegah laporan dinilai dua kali
        if ($laporan->status != 'Menunggu') {
            return back()->with('error', 'Laporan sudah pernah dinilai.');
        }

        // Update status laporan
        $laporan->status = $request->status;
        $laporan->save();
        if ($request->status == 'Ditolak') {
            $laporan->jadwal->update([
                'status' => 'Belum Dikerjakan'
            ]);

        }

        // Simpan penilaian
        $penilaian = Penilaian::updateOrCreate(
            [
                'laporan_id' => $laporan->id
            ],
            [
                'poin' => $request->poin,
                'evaluasi' => $request->evaluasi
            ]
        );

        // Simpan crew point
        CrewPoint::updateOrCreate(
            [
                'penilaian_id' => $penilaian->id
            ],
            [
                'user_id' => $laporan->user_id,
                'poin' => $request->poin
            ]
        );

        /*
        |--------------------------------------------------------------------------
        | Generate jadwal berikutnya
        |--------------------------------------------------------------------------
        | HANYA jika laporan disetujui
        */
        if ($laporan->status == 'Disetujui') {

            $nextArea = AreaPiket::where('id', '>', $laporan->jadwal->area_piket_id)
                ->orderBy('id')
                ->first();

            if (!$nextArea) {
                $nextArea = AreaPiket::orderBy('id')->first();
            }

            $tanggalBerikutnya = Carbon::parse($laporan->jadwal->tanggal)
                ->addDay();

            $jadwalSudahAda = Jadwal::where('user_id', $laporan->user_id)
                ->whereDate('tanggal', $tanggalBerikutnya)
                ->exists();

            if (!$jadwalSudahAda) {

                Jadwal::create([
                    'user_id' => $laporan->user_id,
                    'area_piket_id' => $nextArea->id,
                    'tanggal' => $tanggalBerikutnya,
                    'status' => 'Belum Dikerjakan'
                ]);

            }

            // Tandai jadwal lama selesai
            $laporan->jadwal->status = 'Selesai';
            $laporan->jadwal->save();
        }

        return redirect('/koordinator/laporan')
            ->with('success', 'Laporan berhasil dinilai.');
    }
}