<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\CrewPoint;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Ambil crew point sesuai kamar user
        $crewPoint = CrewPoint::where('kamar', $user->kamar)
            ->sum('crew_point');

        return view('profile.index', compact(
            'user',
            'crewPoint'
        ));
    }
}