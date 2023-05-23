<?php

namespace Database\Seeders;

use App\Models\Kendaraan;
use App\Models\Motor;
use App\Models\Mobil;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        Kendaraan::create([
            'tahun_keluaran' => 2020,
            'warna' => 'Merah',
            'harga' => 50000000,
        ])->motor()->create([
            'mesin' => '125cc',
            'tipe_suspensi' => 'Depan Teleskopik, Belakang Monoshock',
            'tipe_transmisi' => 'Manual 6 percepatan',
        ]);

        Kendaraan::create([
            'tahun_keluaran' => 2021,
            'warna' => 'Hitam',
            'harga' => 75000000,
        ])->mobil()->create([
            'mesin' => '2000cc',
            'kapasitas_penumpang' => 5,
            'tipe' => 'Sedan',
        ]);
    }
}
