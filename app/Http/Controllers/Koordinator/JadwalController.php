<?php

namespace App\Http\Controllers\Koordinator;

use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use App\Models\User;
use App\Models\AreaPiket;
use App\Models\TugasPiket;
use Illuminate\Http\Request;

class JadwalController extends Controller
{

    public function index()
    {
        $jadwals = Jadwal::with([
            'user',
            'areaPiket',
            'tugasPiket'
        ])
        ->latest()
        ->get();

        return view(
            'koordinator.jadwal.index',
            compact('jadwals')
        );
    }



    public function create()
    {
        $kamars = User::where('role', 'penghuni')
            ->select('kamar')
            ->distinct()
            ->orderBy('kamar')
            ->get();

        $areas = AreaPiket::all();

        return view(
            'koordinator.jadwal.create',
            compact(
                'kamars',
                'areas'
            )
        );
    }



public function store(Request $request)
{
    $request->validate([
        'kamar' => 'required',
        'area_piket_id' => 'required|exists:area_pikets,id',
        'tanggal' => 'required|date'
    ]);

    // Ambil seluruh penghuni dalam kamar
    $penghuni = User::where('role', 'penghuni')
        ->where('kamar', $request->kamar)
        ->orderBy('id')
        ->get();

    if ($penghuni->count() == 0) {
        return back()->with(
            'error',
            'Belum ada penghuni pada kamar tersebut.'
        );
    }

    // Cek apakah jadwal sudah pernah dibuat
    $sudahAda = Jadwal::whereIn('user_id', $penghuni->pluck('id'))
        ->whereDate('tanggal', $request->tanggal)
        ->exists();

    if ($sudahAda) {
        return back()->with(
            'error',
            'Jadwal untuk kamar ini pada tanggal tersebut sudah dibuat.'
        );
    }

    // Ambil seluruh tugas pada area
    $tugas = TugasPiket::where('area_piket_id', $request->area_piket_id)
        ->orderBy('id')
        ->get();

    if ($tugas->count() < $penghuni->count()) {
        return back()->with(
            'error',
            'Jumlah tugas pada area ini belum mencukupi.'
        );
    }

    // Rotasi tugas berdasarkan minggu
    $offset = \Carbon\Carbon::parse($request->tanggal)
        ->weekOfYear % $tugas->count();

    foreach ($penghuni as $index => $user) {

        $tugasDipilih = $tugas[
            ($index + $offset) % $tugas->count()
        ];

        Jadwal::create([

            'user_id' => $user->id,

            'area_piket_id' => $request->area_piket_id,

            'tugas_piket_id' => $tugasDipilih->id,

            'tanggal' => $request->tanggal,

            'status' => 'Belum Dikerjakan'

        ]);
    }

    return redirect('/koordinator/jadwal')
        ->with(
            'success',
            'Jadwal berhasil dibuat untuk seluruh penghuni Kamar ' . $request->kamar
        );
}



    public function edit($id)
    {
        $jadwal = Jadwal::findOrFail($id);

        $kamars = User::where('role', 'penghuni')
            ->select('kamar')
            ->distinct()
            ->orderBy('kamar')
            ->get();

        $areas = AreaPiket::all();

        return view(
            'koordinator.jadwal.edit',
            compact(
                'jadwal',
                'kamars',
                'areas'
            )
        );
    }



    public function update(Request $request, $id)
    {
        $jadwal = Jadwal::findOrFail($id);

        $request->validate([
            'tanggal' => 'required|date'
        ]);

        $jadwal->update([
            'tanggal' => $request->tanggal
        ]);

        return redirect('/koordinator/jadwal')
            ->with(
                'success',
                'Tanggal jadwal berhasil diperbarui.'
            );
    }



    public function destroy($id)
    {
        $jadwal = Jadwal::findOrFail($id);

        $jadwal->delete();

        return redirect('/koordinator/jadwal')
            ->with(
                'success',
                'Jadwal berhasil dihapus.'
            );
    }
}