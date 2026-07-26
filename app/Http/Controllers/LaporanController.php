<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Laporan;
use App\Models\ChecklistJadwal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LaporanController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $jadwal = Jadwal::where('user_id', $user->id)
            ->whereIn('status', [
                'Belum Dikerjakan',
                'Menunggu Verifikasi'
            ])
            ->orderBy('tanggal')
            ->with('areaPiket')
            ->first();

        $riwayat = Laporan::where('user_id', $user->id)
            ->with('jadwal.areaPiket')
            ->latest()
            ->get();

        return view('laporan.index', compact(
            'jadwal',
            'riwayat'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'foto' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'keterangan' => 'nullable|string'
        ]);

        $user = Auth::user();

        $jadwal = Jadwal::where('user_id', $user->id)
            ->where('status', 'Belum Dikerjakan')
            ->orderBy('tanggal')
            ->firstOrFail();

        $totalChecklist = ChecklistJadwal::where('jadwal_id', $jadwal->id)
            ->count();

        $selesaiChecklist = ChecklistJadwal::where('jadwal_id', $jadwal->id)
            ->where('selesai', true)
            ->count();

        if ($totalChecklist == 0 || $totalChecklist != $selesaiChecklist) {

            return back()->with(
                'error',
                'Checklist harus diselesaikan terlebih dahulu.'
            );

        }

        if (Laporan::where('jadwal_id', $jadwal->id)->exists()) {

            return back()->with(
                'error',
                'Laporan untuk jadwal ini sudah dikirim.'
            );

        }

        $namaFile = $request->file('foto')
            ->store('laporan', 'public');

        Laporan::create([
            'jadwal_id' => $jadwal->id,
            'user_id' => $user->id,
            'foto' => $namaFile,
            'keterangan' => $request->keterangan,
            'status' => 'Menunggu'
        ]);

        $jadwal->update([
            'status' => 'Menunggu Verifikasi'
        ]);

        return redirect('/laporan')
            ->with('success', 'Laporan berhasil dikirim.');
    }
}