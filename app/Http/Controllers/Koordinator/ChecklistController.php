<?php

namespace App\Http\Controllers\Koordinator;

use App\Http\Controllers\Controller;

class ChecklistController extends Controller
{
    public function index()
    {
        $checklists = [

            [
                'id' => 1,
                'area' => 'Kamar Mandi',
                'tugas' => 'Menguras bak mandi'
            ],

            [
                'id' => 2,
                'area' => 'Kamar Mandi',
                'tugas' => 'Menyikat kloset'
            ],

            [
                'id' => 3,
                'area' => 'Koridor',
                'tugas' => 'Menyapu koridor'
            ],

            [
                'id' => 4,
                'area' => 'Taman',
                'tugas' => 'Menyiram tanaman'
            ],

        ];

        return view(
            'koordinator.checklist.index',
            compact('checklists')
        );
    }

    public function create()
    {
        return view('koordinator.checklist.create');
    }

    public function edit($id)
    {
        $checklist = [

            'id' => $id,
            'area' => 'Kamar Mandi',
            'tugas' => 'Menguras bak mandi'

        ];

        return view(
            'koordinator.checklist.edit',
            compact('checklist')
        );
    }
}