<?php

namespace App\Http\Controllers\Koordinator;

use App\Http\Controllers\Controller;

class LaporanController extends Controller
{
    public function index()
    {
        $laporans = [

            [
                'id' => 1,
                'kamar' => 'Kamar A',
                'area' => 'Kamar Mandi',
                'tanggal' => '06 Juli 2026',
                'status' => 'Menunggu'
            ],

            [
                'id' => 2,
                'kamar' => 'Kamar C',
                'area' => 'Taman',
                'tanggal' => '06 Juli 2026',
                'status' => 'Disetujui'
            ],

            [
                'id' => 3,
                'kamar' => 'Kamar D',
                'area' => 'Koridor',
                'tanggal' => '06 Juli 2026',
                'status' => 'Ditolak'
            ],

        ];

        return view(
            'koordinator.laporan.index',
            compact('laporans')
        );
    }

    public function show($id)
    {
        $laporan = [

            'id' => $id,
            'kamar' => 'Kamar A',
            'area' => 'Kamar Mandi',
            'tanggal' => '06 Juli 2026',
            'foto' => 'https://placehold.co/700x450',
            'catatan' => 'Piket sudah selesai.',
            'status' => 'Menunggu'

        ];

        return view(
            'koordinator.laporan.show',
            compact('laporan')
        );
    }
}