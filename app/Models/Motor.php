<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Motor extends Eloquent
{
    protected $fillable = ['mesin', 'tipe_suspensi', 'tipe_transmisi'];

    public function kendaraan()
    {
        return $this->belongsTo(Kendaraan::class);
    }
}
