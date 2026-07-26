<?php

namespace App\Http\Controllers\Koordinator;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Laporan;
use App\Models\CrewPoint;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $statistik = [
            'kamar' => User::where('role', 'penghuni')
                ->distinct()
                ->count('kamar'),

            'penghuni' => User::where('role', 'penghuni')->count(),

            'laporan' => Laporan::count(),

            'crewpoint' => CrewPoint::sum('poin'),
        ];

        return view('koordinator.profile.index', compact(
            'user',
            'statistik'
        ));
    }
}