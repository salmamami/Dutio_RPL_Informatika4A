<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Laporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LaporanController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $jadwal = Jadwal::where('user_id', $user->id)
            ->whereDate('tanggal', today())
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
            ->whereDate('tanggal', today())
            ->firstOrFail();

        if ($jadwal->status != 'Selesai') {
            return back()->with('error', 'Checklist belum selesai.');
        }

        if (Laporan::where('jadwal_id', $jadwal->id)->exists()) {
            return back()->with('error', 'Laporan sudah pernah dikirim.');
        }

        $namaFile = $request->file('foto')->store('laporan', 'public');

        Laporan::create([
            'jadwal_id' => $jadwal->id,
            'user_id' => $user->id,
            'foto' => $namaFile,
            'keterangan' => $request->keterangan,
            'status' => 'Menunggu'
        ]);

        return redirect('/laporan')
            ->with('success', 'Laporan berhasil dikirim.');
    }
}