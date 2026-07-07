<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checklist extends Model
{
    use HasFactory;

    protected $fillable = [
        'area_piket_id',
        'aktivitas'
    ];

    public function areaPiket()
    {
        return $this->belongsTo(AreaPiket::class);
    }
}