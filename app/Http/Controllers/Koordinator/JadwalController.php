<?php

namespace App\Http\Controllers\Koordinator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function index()
    {
        $jadwals = [

            [
                'id' => 1,
                'kamar' => 'Kamar A',
                'area' => 'Kamar Mandi',
                'hari' => 'Senin',
            ],

            [
                'id' => 2,
                'kamar' => 'Kamar B',
                'area' => 'Koridor',
                'hari' => 'Selasa',
            ],

            [
                'id' => 3,
                'kamar' => 'Kamar C',
                'area' => 'Taman',
                'hari' => 'Rabu',
            ],

            [
                'id' => 4,
                'kamar' => 'Kamar D',
                'area' => 'Mushola',
                'hari' => 'Kamis',
            ],

        ];

        return view('koordinator.jadwal.index', compact('jadwals'));
    }
    public function edit($id)
    {
        $jadwal = [
            'id' => $id,
            'kamar' => 'Kamar A',
            'area' => 'Kamar Mandi',
            'hari' => 'Senin'
        ];

        return view('koordinator.jadwal.edit', compact('jadwal'));
    }

    public function store(Request $request)
    {

    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {
        
    }
}