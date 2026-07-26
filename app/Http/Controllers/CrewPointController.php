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
            'penilaian.laporan.jadwal.areaPiket'
        ])
        ->where('user_id', $user->id)
        ->latest()
        ->get();

        $totalPoint = $riwayat->sum('poin');

        return view('crewpoints.index', compact(
            'riwayat',
            'totalPoint'
        ));
    }
}