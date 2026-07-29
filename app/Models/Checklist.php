<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checklist extends Model
{
    use HasFactory;

    protected $fillable = [
        'tugas_piket_id',
        'aktivitas'
    ];

    public function tugasPiket()
    {
        return $this->belongsTo(TugasPiket::class);
    }

    public function progresses()
    {
        return $this->hasMany(ChecklistJadwal::class);
    }
}