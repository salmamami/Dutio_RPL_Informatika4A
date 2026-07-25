<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checklist extends Model
{
    use HasFactory;

    protected $fillable = [
        'area_piket_id',
        'aktivitas',
        'selesai'
    ];

    protected $casts = [
        'selesai' => 'boolean'
    ];

    public function areaPiket()
    {
        return $this->belongsTo(AreaPiket::class);
    }
    
    public function progresses()
    {
        return $this->hasMany(ChecklistJadwal::class);
    }
}