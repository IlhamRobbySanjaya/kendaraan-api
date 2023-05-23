<?php

namespace App\Services;

use App\Models\Mobil;
use App\Repositories\MobilRepository;
use Illuminate\Support\Collection;

class MobilService
{
    private $MobilRepository;

    public function __construct(MobilRepository $MobilRepository)
    {
        $this->MobilRepository = $MobilRepository;
    }

    public function lihatStok(): Collection
    {
        return $this->MobilRepository->all();
    }

    public function penjualan($MobilId, array $data): bool
    {
        $Mobil = $this->MobilRepository->findById($MobilId);

        if (!$Mobil) {
            return false;
        }

        // Logika penjualan kendaraan
        // ...

        return true;
    }

    public function laporanPenjualanPerMobil(): array
    {
        // Logika laporan penjualan per kendaraan
        // ...

        return [];
    }
}
