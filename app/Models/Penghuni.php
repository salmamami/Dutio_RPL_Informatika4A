<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penghuni extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nama_penghuni',
        'kamar',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function penilaianPenghunis()
    {
        return $this->hasMany(PenilaianPenghuni::class);
    }
}