<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use Illuminate\Http\Request;

class KendaraanController extends Controller
{
    public function index()
    {
        $kendaraans = Kendaraan::all();

        return response()->json(['data' => $kendaraans], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'tahun_keluaran' => 'required',
            'warna' => 'required',
            'harga' => 'required',
            'type' => 'required',
            'attributes' => 'required'
        ]);

        $kendaraan = Kendaraan::create([
            'tahun_keluaran' => $request->tahun_keluaran,
            'warna' => $request->warna,
            'harga' => $request->harga
        ]);

        if ($request->type === 'motor') {
            $kendaraan->motor()->create($request->attributes);
        } elseif ($request->type === 'mobil') {
            $kendaraan->mobil()->create($request->attributes);
        }

        return response()->json(['message' => 'Kendaraan created successfully'], 201);
    }

    public function show($id)
    {
        $kendaraan = Kendaraan::findOrFail($id);

        return response()->json(['data' => $kendaraan], 200);
    }

    public function destroy($id)
    {
        $kendaraan = Kendaraan::findOrFail($id);
        $kendaraan->delete();

        return response()->json(['message' => 'Kendaraan deleted successfully'], 200);
    }
}
