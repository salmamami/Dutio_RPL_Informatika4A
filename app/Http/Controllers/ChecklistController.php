<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Checklist;
use App\Models\ChecklistJadwal;
use App\Models\Jadwal;

class ChecklistController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Ambil jadwal aktif
        $jadwal = Jadwal::where('user_id', $user->id)
            ->whereIn('status',[
                'Belum Dikerjakan',
                'Menunggu Verifikasi'
            ])
            ->orderBy('tanggal')
            ->with('areaPiket')
            ->first();

        if (!$jadwal) {

            return view('checklist.index', [
                'user' => $user,
                'area' => [
                    'nama' => '-',
                    'status' => 'Tidak Ada Jadwal'
                ],
                'checklists' => []
            ]);

        }

        $checklists = Checklist::where(
            'area_piket_id',
            $jadwal->area_piket_id
        )->get();

        foreach ($checklists as $checklist) {

            $progress = ChecklistJadwal::firstOrCreate(

                [
                    'jadwal_id' => $jadwal->id,
                    'checklist_id' => $checklist->id
                ],

                [
                    'selesai' => false
                ]

            );

            $checklist->selesai = $progress->selesai;
            $checklist->nama = $checklist->aktivitas;
        }

        return view('checklist.index', [

            'user' => $user,

            'area' => [
                'nama' => $jadwal->areaPiket->nama_area,
                'status' => $jadwal->status
            ],

            'checklists' => $checklists

        ]);
    }

    public function toggle(Request $request, $id)
    {
        $user = Auth::user();

        // Ambil jadwal aktif
        $jadwal = Jadwal::where('user_id', $user->id)
            ->where('status', 'Belum Dikerjakan')
            ->orderBy('tanggal')
            ->first();

        if (!$jadwal) {

            return response()->json([
                'message' => 'Jadwal tidak ditemukan.'
            ], 404);

        }

        $progress = ChecklistJadwal::where('jadwal_id', $jadwal->id)
            ->where('checklist_id', $id)
            ->first();

        if (!$progress) {

            return response()->json([
                'message' => 'Checklist tidak ditemukan.'
            ], 404);

        }

        $progress->selesai = $request->boolean('selesai');
        $progress->save();

        $total = ChecklistJadwal::where('jadwal_id', $jadwal->id)
            ->count();

        $selesai = ChecklistJadwal::where('jadwal_id', $jadwal->id)
            ->where('selesai', true)
            ->count();

        $persen = $total == 0
            ? 0
            : round(($selesai / $total) * 100);

        return response()->json([
            'selesai' => $selesai,
            'total' => $total,
            'persen' => $persen,
            'allDone' => $selesai == $total
        ]);
    }
}