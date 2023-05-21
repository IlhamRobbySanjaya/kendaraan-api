<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Mobil extends Eloquent
{
    protected $fillable = ['mesin', 'kapasitas_penumpang', 'tipe'];

    public function kendaraan()
    {
        return $this->belongsTo(Kendaraan::class);
    }
}
