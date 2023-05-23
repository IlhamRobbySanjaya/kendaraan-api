<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Kendaraan;
use App\Repositories\KendaraanRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;

class KendaraanControllerTest extends TestCase
{
    use RefreshDatabase;

    protected $repository;

    public function setUp(): void
    {
        parent::setUp();

        $this->repository = new KendaraanRepository();
    }

    public function testGetAllKendaraans()
    {
        Kendaraan::factory()->count(3)->create();

        $response = $this->get('/api/kendaraans');

        $response->assertStatus(200);
        $response->assertJsonCount(3);
    }

    // Implement unit tests for other KendaraanController methods

    public function testCreateKendaraan()
    {
        $data = [
            'tipe' => 'Motor',
            'tahun_keluaran' => 2022,
            'warna' => 'Merah',
            'harga' => 20000000,
            'mesin' => 'Mesin Motor',
            'tipe_suspensi' => 'Suspensi Motor',
            'tipe_transmisi' => 'Transmisi Motor'
        ];

        $response = $this->post('/api/kendaraans', $data);

        $response->assertStatus(201);
        $this->assertDatabaseHas('kendaraans', ['tipe' => 'Motor']);
    }
}
