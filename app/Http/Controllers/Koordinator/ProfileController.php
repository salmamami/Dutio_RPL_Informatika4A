<?php

namespace App\Http\Controllers\Koordinator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Penghuni;
use App\Models\Laporan;
use App\Models\CrewPoint;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login');
        }

        $statistik = [

            // Total kamar berdasarkan tabel penghuni
            'kamar' => Penghuni::distinct('kamar')
                ->count('kamar'),

            // Total seluruh penghuni
            'penghuni' => Penghuni::count(),

            // Total laporan
            'laporan' => Laporan::count(),

            // Total crew point
            'crewpoint' => CrewPoint::sum('crew_point'),

        ];

        return view(
            'koordinator.profile.index',
            compact(
                'user',
                'statistik'
            )
        );
    }

    public function edit()
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login');
        }

        return view(
            'koordinator.profile.edit',
            compact('user')
        );
    }

    public function update(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login');
        }

        $user->update([
            'name'  => $request->name,
            'email' => $request->email,
        ]);

        return redirect()
            ->route('koordinator.profile.index')
            ->with(
                'success',
                'Profil berhasil diperbarui.'
            );
    }
}