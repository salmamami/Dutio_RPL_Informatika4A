<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Jadwal;
use App\Models\Penilaian;

class Laporan extends Model
{
    protected $fillable = [
        'jadwal_id',
        'user_id',
        'foto',
        'keterangan',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class);
    }

    public function penilaian()
    {
        return $this->hasOne(Penilaian::class);
    }
}