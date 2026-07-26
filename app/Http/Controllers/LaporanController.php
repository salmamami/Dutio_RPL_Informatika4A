<?php

namespace App\Http\Controllers\Koordinator;

use App\Http\Controllers\Controller;
use App\Models\Laporan;

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
}