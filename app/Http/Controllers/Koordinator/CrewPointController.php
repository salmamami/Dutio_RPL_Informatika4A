<?php

namespace App\Http\Controllers\Koordinator;

use App\Http\Controllers\Controller;
use App\Models\CrewPoint;

class CrewPointController extends Controller
{
    public function index()
    {
        $crewpoints = CrewPoint::latest('periode')->get();

        $totalCrewPoint = $crewpoints->sum('crew_point');

        $rataRataCrewPoint = $crewpoints->count()
            ? round($crewpoints->avg('crew_point'))
            : 0;

        return view(
            'koordinator.crewpoints.index',
            compact(
                'crewpoints',
                'totalCrewPoint',
                'rataRataCrewPoint'
            )
        );
    }
}