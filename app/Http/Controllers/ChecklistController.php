<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ChecklistController extends Controller
{
    // Data dummy checklist (nanti ini yang diganti ke database)
    private function getChecklistData()
    {
        return [
            ['id' => 1, 'nama' => 'Menyikat kloset', 'selesai' => true],
            ['id' => 2, 'nama' => 'Menguras bak mandi', 'selesai' => true],
            ['id' => 3, 'nama' => 'Membersihkan wastafel', 'selesai' => false],
            ['id' => 4, 'nama' => 'Mengepel lantai', 'selesai' => false],
            ['id' => 5, 'nama' => 'Mengisi sabun', 'selesai' => false],
            ['id' => 6, 'nama' => 'Membuang sampah', 'selesai' => false],
        ];
    }

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

        $checklists = $this->getChecklistData();

        // Kalau session belum ada progress, isi dengan data default di atas
        if (!Session::has('checklist_progress')) {
            $progress = collect($checklists)->pluck('selesai', 'id')->toArray();
            Session::put('checklist_progress', $progress);
        }

        // Timpa status 'selesai' pakai data dari session
        $progress = Session::get('checklist_progress');

        foreach ($checklists as &$item) {
            $item['selesai'] = $progress[$item['id']] ?? false;
        }

        return view('checklist.index', compact(
            'user',
            'area',
            'checklists'
        ));
    }

    public function toggle($id, Request $request)
    {
        $progress = Session::get('checklist_progress', []);
        $progress[$id] = $request->boolean('selesai');
        Session::put('checklist_progress', $progress);

        $checklists = $this->getChecklistData();
        $total = count($checklists);
        $selesai = 0;

        foreach ($checklists as $item) {
            if ($progress[$item['id']] ?? false) {
                $selesai++;
            }
        }

        $persen = $total > 0 ? ($selesai / $total) * 100 : 0;

        return response()->json([
            'selesai' => $selesai,
            'total' => $total,
            'persen' => $persen,
            'allDone' => $selesai == $total,
        ]);
    }
}