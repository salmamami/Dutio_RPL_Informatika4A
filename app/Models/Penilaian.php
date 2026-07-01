<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Laporan;

class Penilaian extends Model
{
    protected $fillable = [
        'laporan_id',
        'poin',
        'evaluasi'
    ];

    public function laporan()
    {
        return $this->belongsTo(Laporan::class);
    }
}