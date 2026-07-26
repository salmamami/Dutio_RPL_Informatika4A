<?php

namespace App\Http\Controllers\Koordinator;

use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use App\Models\User;
use App\Models\AreaPiket;
use Illuminate\Http\Request;

class JadwalController extends Controller
{

    public function index()
    {

        $jadwals = Jadwal::with([
            'user',
            'areaPiket'
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

        $users = User::where('role','penghuni')
                    ->get();


        $areas = AreaPiket::all();


        return view(
            'koordinator.jadwal.create',
            compact(
                'users',
                'areas'
            )
        );

    }



    public function store(Request $request)
    {

        $request->validate([

            'user_id'=>'required',
            'area_piket_id'=>'required',
            'tanggal'=>'required|date'

        ]);



        Jadwal::create([

            'user_id'=>$request->user_id,
            'area_piket_id'=>$request->area_piket_id,
            'tanggal'=>$request->tanggal,
            'status'=>'Belum Dikerjakan'

        ]);



        return redirect('/koordinator/jadwal')
            ->with(
                'success',
                'Jadwal berhasil ditambahkan'
            );

    }



    public function edit($id)
    {

        $jadwal = Jadwal::findOrFail($id);


        $users = User::where('role','penghuni')
                    ->get();


        $areas = AreaPiket::all();


        return view(
            'koordinator.jadwal.edit',
            compact(
                'jadwal',
                'users',
                'areas'
            )
        );

    }




    public function update(Request $request,$id)
    {

        $jadwal = Jadwal::findOrFail($id);


        $request->validate([

            'user_id'=>'required',
            'area_piket_id'=>'required',
            'tanggal'=>'required|date'

        ]);



        $jadwal->update([

            'user_id'=>$request->user_id,
            'area_piket_id'=>$request->area_piket_id,
            'tanggal'=>$request->tanggal

        ]);



        return redirect('/koordinator/jadwal')
            ->with(
                'success',
                'Jadwal berhasil diperbarui'
            );

    }





    public function destroy($id)
    {

        $jadwal = Jadwal::findOrFail($id);

        $jadwal->delete();


        return redirect('/koordinator/jadwal')
            ->with(
                'success',
                'Jadwal berhasil dihapus'
            );

    }

}