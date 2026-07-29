<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Jadwal;
use App\Models\ChecklistJadwal;
use App\Models\Laporan;
use App\Models\CrewPoint;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Ambil jadwal aktif (belum dikerjakan)
        $jadwal = Jadwal::with('areaPiket')
            ->where('user_id', $user->id)
            ->where('status', 'Belum Dikerjakan')
            ->orderBy('tanggal')
            ->first();

        // Total crew point
        $crewPoint = CrewPoint::sum('crew_point');

        // Kalau belum ada jadwal aktif
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
                'crewPoint' => $crewPoint,
            ]);

        }

        // Progress checklist
        $checklists = ChecklistJadwal::where('jadwal_id', $jadwal->id)
            ->get();

        $totalChecklist = $checklists->count();
        $selesaiChecklist = $checklists
            ->where('selesai', true)
            ->count();

        // Sudah upload laporan?
        $laporan = Laporan::where('jadwal_id', $jadwal->id)
            ->exists();

        $status = ($selesaiChecklist == $totalChecklist && $totalChecklist > 0)
            ? 'Siap Upload Laporan'
            : 'Sedang Dikerjakan';

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