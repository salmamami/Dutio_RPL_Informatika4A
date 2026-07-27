<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\CrewPoint;

class CrewPointController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $riwayat = CrewPoint::with([
            'user',
            'penilaian',
            'penilaian.laporan',
            'penilaian.laporan.jadwal',
            'penilaian.laporan.jadwal.areaPiket'
        ])
        ->where('user_id', $user->id)
        ->latest()
        ->get();

        $totalPoint = $riwayat->sum('poin');

        $rataRata = $riwayat->count()
            ? round($riwayat->avg('poin'), 1)
            : 0;

        return view('crewpoints.index', compact(
            'riwayat',
            'totalPoint',
            'rataRata'
        ));
    }
}