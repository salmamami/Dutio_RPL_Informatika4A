<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    use HasFactory;

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
}