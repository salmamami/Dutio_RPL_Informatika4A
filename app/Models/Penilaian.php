<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Laporan;
use App\Models\Penghuni;
use App\Models\CrewPoint;

class Penilaian extends Model
{
    protected $fillable = [
        'laporan_id',
        'penghuni_id',
        'poin',
        'kategori'
    ];

    public function laporan()
    {
        return $this->belongsTo(Laporan::class);
    }

    public function penghuni()
    {
        return $this->belongsTo(Penghuni::class);
    }

    public function crewPoint()
    {
        return $this->hasOne(CrewPoint::class);
    }
}