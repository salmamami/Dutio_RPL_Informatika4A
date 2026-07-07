<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Checklist;
use App\Models\Jadwal;

class AreaPiket extends Model
{
    protected $fillable = [
        'nama_area',
        'deskripsi'
    ];

    public function checklists()
    {
        return $this->hasMany(Checklist::class);
    }

    public function jadwals()
    {
        return $this->hasMany(Jadwal::class);
    }
}