<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\AreaPiket;
use App\Models\Laporan;

class Jadwal extends Model
{
    protected $fillable = [
        'user_id',
        'area_piket_id',
        'tanggal',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function areaPiket()
    {
        return $this->belongsTo(AreaPiket::class);
    }

    public function laporan()
    {
        return $this->hasOne(Laporan::class);
    }
}