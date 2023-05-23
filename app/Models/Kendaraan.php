<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Kendaraan extends Model
{
    protected $collection = 'kendaraan';

    protected $fillable = [
        'tahun_keluaran',
        'warna',
        'harga',
    ];

    public function motor()
    {
        return $this->hasOne(Motor::class);
    }

    public function mobil()
    {
        return $this->hasOne(Mobil::class);
    }
}
