<?php

namespace App\Http\Controllers\Koordinator;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $statistik = [

            'kamar' => 10,

            'penghuni' => 80,

            'laporan' => 12,

            'crewpoint' => 78

        ];

        $laporanTerbaru = [

            [
                'kamar' => 'Kamar A',
                'area' => 'Kamar Mandi',
                'jam' => '08.10'
            ],

            [
                'kamar' => 'Kamar D',
                'area' => 'Koridor',
                'jam' => '09.00'
            ],

            [
                'kamar' => 'Kamar C',
                'area' => 'Taman',
                'jam' => '10.30'
            ]

        ];

        return view(
            'koordinator.dashboard.index',
            compact('statistik', 'laporanTerbaru')
        );
    }
}