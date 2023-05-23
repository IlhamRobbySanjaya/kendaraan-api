<?php

namespace App\Http\Controllers;

use App\Repositories\KendaraanRepository;
use Illuminate\Http\Request;

class KendaraanController extends Controller
{
    private $kendaraanRepository;

    public function __construct(KendaraanRepository $kendaraanRepository)
    {
        $this->kendaraanRepository = $kendaraanRepository;
    }

    public function index()
    {
        $kendaraan = $this->kendaraanRepository->all();

        return response()->json($kendaraan);
    }

    public function show($id)
    {
        $kendaraan = $this->kendaraanRepository->find($id);

        if (!$kendaraan) {
            return response()->json(['message' => 'Kendaraan not found'], 404);
        }

        return response()->json($kendaraan);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'kendaraan.tahun_keluaran' => 'required|integer',
            'kendaraan.warna' => 'required|string',
            'kendaraan.harga' => 'required|numeric',
            'jenis' => 'required|in:motor,mobil',
            'motor.mesin' => 'required_if:jenis,motor|string',
            'motor.tipe_suspensi' => 'required_if:jenis,motor|string',
            'motor.tipe_transmisi' => 'required_if:jenis,motor|string',
            'mobil.mesin' => 'required_if:jenis,mobil|string',
            'mobil.kapasitas_penumpang' => 'required_if:jenis,mobil|integer',
            'mobil.tipe' => 'required_if:jenis,mobil|string',
        ]);

        $kendaraan = $this->kendaraanRepository->create($data);

        return response()->json($kendaraan, 201);
    }

    public function getStokKendaraan()
    {
        $stokKendaraan = $this->kendaraanRepository->getStokKendaraan();

        return response()->json($stokKendaraan);
    }

    public function penjualanKendaraan($id)
    {
        $kendaraan = $this->kendaraanRepository->penjualanKendaraan($id);

        if (!$kendaraan) {
            return response()->json(['message' => 'Kendaraan not found'], 404);
        }

        return response()->json(['message' => 'Kendaraan sold successfully']);
    }

    public function laporanPenjualan()
    {
        $laporan = $this->kendaraanRepository->laporanPenjualan();

        return response()->json($laporan);
    }
}
