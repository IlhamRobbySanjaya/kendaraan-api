<?php

namespace App\Services;

use App\Models\Kendaraan;
use App\Repositories\KendaraanRepository;
use Illuminate\Support\Collection;

class KendaraanService
{
    private $kendaraanRepository;

    public function __construct(KendaraanRepository $kendaraanRepository)
    {
        $this->kendaraanRepository = $kendaraanRepository;
    }

    public function lihatStok(): Collection
    {
        return $this->kendaraanRepository->all();
    }

    public function penjualan($kendaraanId, array $data): bool
    {
        $kendaraan = $this->kendaraanRepository->findById($kendaraanId);

        if (!$kendaraan) {
            return false;
        }

        // Logika penjualan kendaraan
        // ...

        return true;
    }

    public function laporanPenjualanPerKendaraan(): array
    {
        // Logika laporan penjualan per kendaraan
        // ...

        return [];
    }
}
