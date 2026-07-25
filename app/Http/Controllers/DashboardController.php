<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Jadwal;
use App\Models\ChecklistJadwal;
use App\Models\Laporan;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Jadwal user hari ini
        $jadwal = Jadwal::with('areaPiket')
            ->where('user_id', $user->id)
            ->whereDate('tanggal', today())
            ->first();

        if (!$jadwal) {

            return view('dashboard.index', [
                'user' => $user,
                'area' => [
                    'nama' => '-',
                    'status' => 'Tidak Ada Jadwal'
                ],
                'totalChecklist' => 0,
                'selesaiChecklist' => 0,
                'laporan' => false,
                'crewPoint' => 0,
            ]);
        }

        // Semua checklist pada jadwal tersebut
        $checklists = ChecklistJadwal::where('jadwal_id', $jadwal->id)->get();

        $totalChecklist = $checklists->count();
        $selesaiChecklist = $checklists->where('selesai', true)->count();

        // Cek laporan
        $laporan = Laporan::where('jadwal_id', $jadwal->id)->exists();

        // Crew Point
        $crewPoint = 85;

        $status = ($selesaiChecklist == $totalChecklist && $totalChecklist > 0)
            ? 'Selesai'
            : 'Belum Selesai';

        $area = [
            'nama' => $jadwal->areaPiket->nama_area,
            'status' => $status,
        ];

        return view('dashboard.index', compact(
            'user',
            'area',
            'totalChecklist',
            'selesaiChecklist',
            'laporan',
            'crewPoint'
        ));
    }
}