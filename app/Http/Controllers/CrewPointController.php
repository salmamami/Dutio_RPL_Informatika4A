<?php

namespace App\Http\Controllers;

use App\Models\CrewPoint;

class CrewPointController extends Controller
{
    public function index()
    {
        $riwayat = CrewPoint::latest()->get();

        $totalPoint = $riwayat->sum('crew_point');

        $rataRata = $riwayat->count()
            ? round($riwayat->avg('crew_point'), 1)
            : 0;

        return view('crewpoints.index', compact(
            'riwayat',
            'totalPoint',
            'rataRata'
        ));
    }
}