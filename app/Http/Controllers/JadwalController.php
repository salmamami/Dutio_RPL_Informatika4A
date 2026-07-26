<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use Carbon\Carbon;

class JadwalController extends Controller
{
    public function index()
    {
        $today = Carbon::today()->toDateString();

        $jadwals = Jadwal::with(['user', 'areaPiket'])
            ->orderBy('tanggal')
            ->get()
            ->map(function ($jadwal) use ($today) {

                return [
                    'kamar' => $jadwal->user->kamar,
                    'area'  => $jadwal->areaPiket->nama_area,
                    'hari'  => Carbon::parse($jadwal->tanggal)
                                    ->translatedFormat('l'),

                    'status' => $jadwal->tanggal == $today
                                ? 'Hari Ini'
                                : $jadwal->status,
                ];
            });

        return view('jadwal.index', compact('jadwals'));
    }
}