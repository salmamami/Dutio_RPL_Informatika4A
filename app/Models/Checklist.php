<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\AreaPiket;

class Checklist extends Model
{
    protected $fillable = [
        'area_piket_id',
        'aktivitas'
    ];

    public function areaPiket()
    {
        return $this->belongsTo(AreaPiket::class);
    }
}