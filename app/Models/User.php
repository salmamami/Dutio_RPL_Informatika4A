<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Jadwal;
use App\Models\Laporan;
use App\Models\Penghuni;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'kamar',
        'email',
        'password',
        'role',
        'status',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function jadwals()
    {
        return $this->hasMany(Jadwal::class);
    }

    public function laporans()
    {
        return $this->hasMany(Laporan::class);
    }

    public function penghuni()
    {
        return $this->hasOne(Penghuni::class);
    }
}