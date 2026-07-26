<?php

namespace App\Http\Controllers\Koordinator;

use App\Http\Controllers\Controller;
use App\Models\Laporan;
use Illuminate\Http\Request;
use App\Models\Penilaian;

class LaporanController extends Controller
{
    public function index()
    {
        $laporans = Laporan::with([
            'user',
            'jadwal.areaPiket'
        ])
        ->latest()
        ->get();

        return view(
            'koordinator.laporan.index',
            compact('laporans')
        );
    }

    public function show($id)
    {
        $laporan = Laporan::with([
            'user',
            'jadwal.areaPiket'
        ])->findOrFail($id);

        return view(
            'koordinator.laporan.show',
            compact('laporan')
        );
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'status'=>'required',
        'poin'=>'required|integer|min:0|max:100',
        'evaluasi'=>'required'
    ]);

    $laporan = Laporan::findOrFail($id);

    $laporan->status = $request->status;
    $laporan->save();

    Penilaian::updateOrCreate(

        [
            'laporan_id'=>$laporan->id
        ],

        [
            'poin'=>$request->poin,
            'evaluasi'=>$request->evaluasi
        ]

    );

    return redirect('/koordinator/laporan')
        ->with('success','Laporan berhasil dinilai.');
}
}