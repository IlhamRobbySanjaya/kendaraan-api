<?php

namespace App\Repositories;

use App\Models\Motor;
use Illuminate\Support\Collection;

class MotorRepository
{
    public function all(): Collection
    {
        return Motor::all();
    }

    public function findById($id): ?Motor
    {
        return Motor::find($id);
    }

    public function create(array $data): Motor
    {
        return Motor::create($data);
    }

    public function update(Motor $motor, array $data): bool
    {
        return $motor->update($data);
    }

    public function delete(Motor $motor): bool
    {
        return $motor->delete();
    }
}
