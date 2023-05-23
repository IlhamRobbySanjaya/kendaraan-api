<?php

namespace App\Repositories;

use App\Models\Mobil;
use Illuminate\Support\Collection;

class MobilRepository
{
    public function all(): Collection
    {
        return Mobil::all();
    }

    public function findById($id): ?Mobil
    {
        return Mobil::find($id);
    }

    public function create(array $data): Mobil
    {
        return Mobil::create($data);
    }

    public function update(Mobil $mobil, array $data): bool
    {
        return $mobil->update($data);
    }

    public function delete(Mobil $mobil): bool
    {
        return $mobil->delete();
    }
}
