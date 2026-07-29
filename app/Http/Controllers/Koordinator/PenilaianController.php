<?php

namespace App\Http\Controllers\Koordinator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Penilaian;
use App\Models\Laporan;
use App\Models\Penghuni;
use App\Models\PenilaianPenghuni;

class PenilaianController extends Controller
{
    /**
     * Tampilkan halaman penilaian
     */
    public function index()
    {
        $penghunis = Penghuni::with([
            'user',
            'penilaianPenghunis'
        ])
        ->orderBy('kamar')
        ->orderBy('nama_penghuni')
        ->get()
        ->groupBy('kamar');

        return view('koordinator.penilaian.index', compact('penghunis'));
    }


    /**
     * Form tambah penilaian
     * Ditambahkan agar route create tidak error
     */
    public function create($id)
    {
        $penghuni = Penghuni::with([
            'user.laporans'
        ])->findOrFail($id);


        $laporan = $penghuni->user->laporans()
            ->latest()
            ->first();


        return view(
            'koordinator.penilaian.create',
            compact(
                'penghuni',
                'laporan'
            )
        );
    }

    /**
     * Simpan atau update penilaian
     */
    public function store(Request $request)
    {
        $request->validate([
            'penghuni_id' => 'required|exists:penghunis,id',
            'poin' => 'required|integer|min:0|max:100',
            'kategori' => 'required',
        ]);

        PenilaianPenghuni::updateOrCreate(
            [
                'penghuni_id' => $request->penghuni_id,
            ],
            [
                'poin' => $request->poin,
                'kategori' => $request->kategori,
            ]
        );

        return redirect()
            ->route('koordinator.penilaian.index')
            ->with('success', 'Penilaian berhasil disimpan.');
    }



    /**
     * Form edit penilaian
     */
    public function edit($id)
    {
        $penilaian = Penilaian::with([
            'laporan.user.penghuni',
            'laporan.jadwal.areaPiket'
        ])
        ->findOrFail($id);


        return view(
            'koordinator.penilaian.edit',
            compact('penilaian')
        );
    }



    /**
     * Update penilaian
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'poin' => 'required|integer|min:0|max:100',
            'evaluasi' => 'required'
        ]);


        $penilaian = Penilaian::findOrFail($id);


        $penilaian->update([
            'poin' => $request->poin,
            'evaluasi' => $request->evaluasi
        ]);


        return redirect()
            ->route('koordinator.penilaian.index')
            ->with('success', 'Penilaian berhasil diperbarui.');
    }

    public function show($id)
    {
        $penghuni = Penghuni::findOrFail($id);

        $penilaian = PenilaianPenghuni::where('penghuni_id', $id)
            ->latest()
            ->first();

        return view(
            'koordinator.penilaian.show',
            compact('penghuni', 'penilaian')
        );
    }

    /**
     * Hapus penilaian
     */
    public function destroy($id)
    {
        $penilaian = Penilaian::findOrFail($id);

        $penilaian->delete();


        return redirect()
            ->route('koordinator.penilaian.index')
            ->with('success', 'Penilaian berhasil dihapus.');
    }
}