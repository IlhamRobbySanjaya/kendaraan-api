<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class KendaraanTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test untuk melihat stok kendaraan.
     *
     * @return void
     */
    public function testGetStokKendaraan()
    {
        $response = $this->get('/api/kendaraan');

        $response->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'id',
                        'tahun_keluaran',
                        'warna',
                        'harga',
                        'jenis',
                        'motor' => [
                            'mesin',
                            'tipe_suspensi',
                            'tipe_transmisi'
                        ],
                        'mobil' => [
                            'mesin',
                            'kapasitas_penumpang',
                            'tipe'
                        ]
                    ]
                ]
            ]);
    }

    /**
     * Test untuk penjualan kendaraan.
     *
     * @return void
     */
    public function testPenjualanKendaraan()
    {
        $kendaraan = factory(\App\Models\Kendaraan::class)->create();

        $response = $this->delete('/api/kendaraan/' . $kendaraan->id);

        $response->assertStatus(200)
            ->assertJson([
                'message' => 'Kendaraan berhasil dijual.'
            ]);

        $this->assertDatabaseMissing('kendaraans', ['id' => $kendaraan->id]);
    }

    /**
     * Test untuk laporan penjualan per kendaraan.
     *
     * @return void
     */
    public function testLaporanPenjualan()
    {
        $kendaraan1 = factory(\App\Models\Kendaraan::class)->create();
        $kendaraan2 = factory(\App\Models\Kendaraan::class)->create();

        $kendaraan1->delete();

        $response = $this->get('/api/kendaraan/laporan');

        $response->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'id',
                        'tahun_keluaran',
                        'warna',
                        'harga',
                        'jenis',
                        'motor' => [
                            'mesin',
                            'tipe_suspensi',
                            'tipe_transmisi'
                        ],
                        'mobil' => [
                            'mesin',
                            'kapasitas_penumpang',
                            'tipe'
                        ]
                    ]
                ]
            ])
            ->assertJsonFragment([
                'id' => $kendaraan1->id,
                'deleted_at' => $kendaraan1->deleted_at->toISOString()
            ])
            ->assertJsonMissing([
                'id' => $kendaraan2->id,
                'deleted_at' => $kendaraan2->deleted_at->toISOString()
            ]);
    }
}
