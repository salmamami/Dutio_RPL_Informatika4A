<?php

namespace App\Http\Controllers\Koordinator;

use App\Http\Controllers\Controller;
use App\Models\CrewPoint;

class CrewPointController extends Controller
{
    public function index()
    {
        $crewpoints = CrewPoint::with([
            'user',
            'penilaian.laporan.jadwal.areaPiket'
        ])
        ->latest()
        ->get();

        $totalPoin = $crewpoints->sum('poin');

        $rataRata = $crewpoints->count()
            ? round($crewpoints->avg('poin'))
            : 0;

        return view(
            'koordinator.crewpoints.index',
            compact(
                'crewpoints',
                'totalPoin',
                'rataRata'
            )
        );
    }
}