<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CrewPoint extends Model
{
    protected $table = 'crewpoints';
    
    protected $fillable = [
        'user_id',
        'penilaian_id',
        'poin'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function penilaian()
    {
        return $this->belongsTo(Penilaian::class);
    }
}