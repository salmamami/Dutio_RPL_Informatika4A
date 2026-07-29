<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TugasPiket extends Model
{
    use HasFactory;

    protected $table = 'tugas_piket';

    protected $fillable = [
        'area_piket_id',
        'nama_tugas'
    ];

    public function areaPiket()
    {
        return $this->belongsTo(AreaPiket::class);
    }

    public function jadwals()
    {
        return $this->hasMany(Jadwal::class);
    }

    public function checklists()
    {
        return $this->hasMany(Checklist::class);
    }
}