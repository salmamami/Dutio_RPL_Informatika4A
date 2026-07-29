<?php

namespace App\Http\Controllers\Koordinator;

use App\Http\Controllers\Controller;
use App\Models\Checklist;
use App\Models\TugasPiket;
use Illuminate\Http\Request;

class ChecklistController extends Controller
{
    public function index()
    {
        $checklists = Checklist::with([
            'tugasPiket.areaPiket'
        ])
        ->latest()
        ->get();

        return view(
            'koordinator.checklist.index',
            compact('checklists')
        );
    }

    public function create()
    {
        $tugas = TugasPiket::with('areaPiket')
            ->orderBy('area_piket_id')
            ->get();

        return view(
            'koordinator.checklist.create',
            compact('tugas')
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'tugas_piket_id' => 'required|exists:tugas_piket,id',
            'aktivitas' => 'required|string|max:255'
        ]);

        Checklist::create([
            'tugas_piket_id' => $request->tugas_piket_id,
            'aktivitas' => $request->aktivitas
        ]);

        return redirect('/koordinator/checklist')
            ->with(
                'success',
                'Checklist berhasil ditambahkan.'
            );
    }

    public function edit($id)
    {
        $checklist = Checklist::findOrFail($id);

        $tugas = TugasPiket::with('areaPiket')
            ->orderBy('area_piket_id')
            ->get();

        return view(
            'koordinator.checklist.edit',
            compact(
                'checklist',
                'tugas'
            )
        );
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tugas_piket_id' => 'required|exists:tugas_piket,id',
            'aktivitas' => 'required|string|max:255'
        ]);

        $checklist = Checklist::findOrFail($id);

        $checklist->update([
            'tugas_piket_id' => $request->tugas_piket_id,
            'aktivitas' => $request->aktivitas
        ]);

        return redirect('/koordinator/checklist')
            ->with(
                'success',
                'Checklist berhasil diperbarui.'
            );
    }

    public function destroy($id)
    {
        Checklist::findOrFail($id)->delete();

        return redirect('/koordinator/checklist')
            ->with(
                'success',
                'Checklist berhasil dihapus.'
            );
    }
}