<?php

namespace App\Http\Controllers;

class JadwalController extends Controller
{
    public function index()
{
    $jadwals = [

        [
            'kamar' => 'Kamar A',
            'area' => 'Kamar Mandi',
            'hari' => 'Jumat',
            'status' => 'Hari Ini'
        ],

        [
            'kamar' => 'Kamar B',
            'area' => 'Koridor',
            'hari' => 'Jumat',
            'status' => '-'
        ],

        [
            'kamar' => 'Kamar C',
            'area' => 'Taman',
            'hari' => 'Jumat',
            'status' => '-'
        ],

        [
            'kamar' => 'Kamar D',
            'area' => 'Mushola',
            'hari' => 'Jumat',
            'status' => '-'
        ],

        [
            'kamar' => 'Kamar E',
            'area' => 'Dapur',
            'hari' => 'Jumat',
            'status' => '-'
        ],

    ];

    return view('jadwal.index', compact('jadwals'));
}
}