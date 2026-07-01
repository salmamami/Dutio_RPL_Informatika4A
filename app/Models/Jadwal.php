<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

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