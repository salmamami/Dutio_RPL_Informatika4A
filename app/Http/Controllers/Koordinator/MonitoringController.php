<?php

namespace App\Http\Controllers\Koordinator;

use App\Http\Controllers\Controller;
use App\Models\CrewPoint;
use App\Models\Jadwal;

class MonitoringController extends Controller
{
    public function index()
    {
        $monitoring = Jadwal::with([
            'user',
            'areaPiket',
            'tugasPiket',
            'laporan'
        ])
        ->orderBy('tanggal', 'desc')
        ->get()
        ->groupBy(function ($item) {
            return $item->user->kamar . '-' . $item->tanggal;
        });

        return view(
            'koordinator.monitoring.index',
            compact('monitoring')
        );
    }

    public function show($group)
    {
        $parts = explode('-', $group);

        $kamar = $parts[0];

        $tanggal = implode('-', array_slice($parts, 1));

        $jadwals = Jadwal::with([
            'user',
            'areaPiket',
            'tugasPiket',
            'laporan'
        ])
        ->whereHas('user', function ($q) use ($kamar) {
            $q->where('kamar', $kamar);
        })
        ->whereDate('tanggal', $tanggal)
        ->get();

        $jumlahPenghuni = $jadwals->count();

        $jumlahSelesai = $jadwals
            ->where('status', 'Selesai')
            ->count();

        $jumlahBelum = $jadwals
            ->where('status', 'Belum Dikerjakan')
            ->count();

        $jumlahDitolak = $jadwals
            ->filter(function ($item) {
                return optional($item->laporan)->status == 'Ditolak';
            })
            ->count();

        if ($jumlahPenghuni > 0) {

            $crewPoint = round(
                ($jumlahSelesai / $jumlahPenghuni) * 100
            );

        } else {

            $crewPoint = 0;

        }

        CrewPoint::updateOrCreate(

            [
                'kamar' => $kamar,
                'periode' => $tanggal
            ],

            [
                'jumlah_penghuni' => $jumlahPenghuni,
                'jumlah_selesai' => $jumlahSelesai,
                'jumlah_ditolak' => $jumlahDitolak,
                'jumlah_belum' => $jumlahBelum,
                'crew_point' => $crewPoint
            ]

        );

        return view(
            'koordinator.monitoring.show',
            compact(
                'jadwals',
                'kamar',
                'tanggal',
                'jumlahPenghuni',
                'jumlahSelesai',
                'jumlahDitolak',
                'jumlahBelum',
                'crewPoint'
            )
        );
    }
}