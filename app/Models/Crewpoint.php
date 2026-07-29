<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CrewPoint extends Model
{
    use HasFactory;

    protected $table = 'crewpoints';

    protected $fillable = [
        'kamar',
        'periode',
        'jumlah_penghuni',
        'jumlah_selesai',
        'jumlah_ditolak',
        'jumlah_belum',
        'crew_point'
    ];

    protected $casts = [
        'periode' => 'date'
    ];
}