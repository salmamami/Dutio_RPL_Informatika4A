<?php

namespace App\Http\Controllers\Koordinator;

use App\Http\Controllers\Controller;
use App\Models\Checklist;
use App\Models\AreaPiket;
use Illuminate\Http\Request;

class ChecklistController extends Controller
{
    public function index()
    {
        $checklists = Checklist::with('areaPiket')
            ->orderBy('area_piket_id')
            ->get();

        return view('koordinator.checklist.index', compact('checklists'));
    }

    public function create()
    {
        $areas = AreaPiket::all();

        return view('koordinator.checklist.create', compact('areas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'area_piket_id' => 'required|exists:area_pikets,id',
            'aktivitas' => 'required'
        ]);

        Checklist::create([
            'area_piket_id' => $request->area_piket_id,
            'aktivitas' => $request->aktivitas
        ]);

        return redirect('/koordinator/checklist')
            ->with('success','Checklist berhasil ditambahkan');
    }

    public function edit($id)
    {
        $checklist = Checklist::findOrFail($id);
        $areas = AreaPiket::all();

        return view(
            'koordinator.checklist.edit',
            compact('checklist','areas')
        );
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'area_piket_id'=>'required|exists:area_pikets,id',
            'aktivitas'=>'required'
        ]);

        $checklist = Checklist::findOrFail($id);

        $checklist->update([
            'area_piket_id'=>$request->area_piket_id,
            'aktivitas'=>$request->aktivitas
        ]);

        return redirect('/koordinator/checklist')
            ->with('success','Checklist berhasil diperbarui');
    }

    public function destroy($id)
    {
        Checklist::findOrFail($id)->delete();

        return redirect('/koordinator/checklist')
            ->with('success','Checklist berhasil dihapus');
    }
}