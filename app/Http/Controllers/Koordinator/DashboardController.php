<?php

namespace App\Http\Controllers\Koordinator;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Jadwal;
use App\Models\Laporan;
use App\Models\Crewpoint;

class DashboardController extends Controller
{
    public function index()
    {
        $statistik = [
            'kamar'     => User::where('role', 'penghuni')->count(),
            'laporan'   => Laporan::count(),
            'crewpoint' => Crewpoint::sum('poin'),
        ];

        $laporanTerbaru = Laporan::with(['jadwal.areaPiket'])
            ->latest()
            ->take(5)
            ->get();

        return view(
            'koordinator.dashboard.index',
            compact('statistik', 'laporanTerbaru')
        );
    }
}