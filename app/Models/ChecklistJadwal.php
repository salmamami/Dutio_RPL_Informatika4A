<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChecklistJadwal extends Model
{
    protected $table = 'checklist_jadwal';

    protected $fillable = [
        'jadwal_id',
        'checklist_id',
        'selesai'
    ];

    protected $casts = [
        'selesai' => 'boolean'
    ];

    public function checklist()
    {
        return $this->belongsTo(Checklist::class);
    }

    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class);
    }
}