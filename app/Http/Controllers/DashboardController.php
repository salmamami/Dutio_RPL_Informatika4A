<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
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

        ['nama'=>'Menyikat kloset','selesai'=>true],
        ['nama'=>'Menguras bak mandi','selesai'=>true],
        ['nama'=>'Membersihkan wastafel','selesai'=>false],
        ['nama'=>'Mengepel lantai','selesai'=>false],
        ['nama'=>'Mengisi sabun','selesai'=>false],
        ['nama'=>'Membuang sampah','selesai'=>false],

    ];

    $totalChecklist = count($checklists);
    $selesaiChecklist = collect($checklists)->where('selesai', true)->count();

    $laporan = false;

    $crewPoint = 85;

    return view('dashboard.index', compact(
        'user',
        'area',
        'checklists',
        'totalChecklist',
        'selesaiChecklist',
        'laporan',
        'crewPoint'
    ));
}
}