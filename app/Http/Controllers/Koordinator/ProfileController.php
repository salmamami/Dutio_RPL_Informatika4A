<?php

namespace App\Http\Controllers\Koordinator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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

    // Halaman Edit Profil
    public function edit()
    {
        $user = Auth::user();

        return view('koordinator.profile.edit', compact('user'));
    }

    // Simpan perubahan profil
    public function update(Request $request)
    {
        $request->validate([
            'name'  => 'required|max:255',
            'email' => 'required|email',
        ]);

        $user = Auth::user();

        $user->name = $request->name;
        $user->email = $request->email;

        $user->save();

        return redirect('/koordinator/profile')
            ->with('success', 'Profil berhasil diperbarui.');
    }
}