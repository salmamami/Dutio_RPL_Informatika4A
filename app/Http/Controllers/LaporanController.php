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

    dd('VALIDASI LOLOS');
}
}