<?php

namespace App\Http\Controllers;

class ChecklistController extends Controller
{
    public function index()
{
    $user = (object)[
        'name' => 'Perwakilan Kamar A',
        'kamar' => 'Kamar A',
    ];

    $area = [
        'nama' => 'Kamar Mandi Asrama',
        'status' => 'Belum Selesai'
    ];

    $checklists = [

        [
            'nama' => 'Menyikat kloset',
            'selesai' => true
        ],

        [
            'nama' => 'Menguras bak mandi',
            'selesai' => true
        ],

        [
            'nama' => 'Membersihkan wastafel',
            'selesai' => false
        ],

        [
            'nama' => 'Mengepel lantai',
            'selesai' => false
        ],

        [
            'nama' => 'Mengisi sabun',
            'selesai' => false
        ],

        [
            'nama' => 'Membuang sampah',
            'selesai' => false
        ],

    ];

    return view('checklist.index', compact(
        'user',
        'area',
        'checklists'
    ));
}
}