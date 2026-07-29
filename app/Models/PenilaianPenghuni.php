<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenilaianPenghuni extends Model
{
    use HasFactory;


    protected $fillable = [
        'penghuni_id',
        'poin',
        'kategori'
    ];


    public function penghuni()
    {
        return $this->belongsTo(Penghuni::class);
    }

}