<?php

namespace App\Repositories;

use App\Models\Kendaraan;
use App\Models\Motor;
use App\Models\Mobil;

class KendaraanRepository
{
    public function create(array $data)
    {
        $kendaraan = Kendaraan::create($data['kendaraan']);

        if ($data['jenis'] === 'motor') {
            $motorData = $data['motor'];
            $motorData['kendaraan_id'] = $kendaraan->id;
            Motor::create($motorData);
        } elseif ($data['jenis'] === 'mobil') {
            $mobilData = $data['mobil'];
            $mobilData['kendaraan_id'] = $kendaraan->id;
            Mobil::create($mobilData);
        }

        return $kendaraan;
    }

    public function find($id)
    {
        return Kendaraan::with(['motor', 'mobil'])->find($id);
    }

    public function all()
    {
        return Kendaraan::all();
    }

    public function getStokKendaraan()
    {
        $kendaraan = Kendaraan::with(['motor', 'mobil'])->get();

        return $kendaraan;
    }

    public function penjualanKendaraan($id)
    {
        $kendaraan = Kendaraan::findOrFail($id);
        $kendaraan->delete();

        return $kendaraan;
    }

    public function laporanPenjualan()
    {
        $laporan = Kendaraan::onlyTrashed()->with(['motor', 'mobil'])->get();

        return $laporan;
    }
}
