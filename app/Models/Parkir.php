<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Parkir extends Model
{
    protected $fillable = [
        'pengguna_id',
        'kendaraan_id',
        'lokasi'
    ];

    // RELASI KE PENGGUNA
    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class);
    }

    // RELASI KE KENDARAAN
    public function kendaraan()
    {
        return $this->belongsTo(Kendaraan::class);
    }
}