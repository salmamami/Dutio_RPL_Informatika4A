<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TugasPiket;

class ChecklistJadwal extends Model
{
    use HasFactory;

    protected $table = 'checklist_jadwal';

    protected $fillable = [
        'jadwal_id',
        'checklist_id',
        'selesai'
    ];

    protected $casts = [
        'selesai' => 'boolean'
    ];

    public function tugasPiket()
    {
        return $this->belongsTo(TugasPiket::class, 'checklist_id');
    }

    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class);
    }
}