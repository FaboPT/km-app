<?php

namespace App\Repositories;

use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class VehicleRepository extends BaseRepository
{
    private Vehicle $vehicle;

    public function __construct(Vehicle $vehicle)
    {
        $this->vehicle = $vehicle;
    }

    /**
     * @inheritDoc
     */
    public function all(): Collection
    {
        return $this->vehicle->all();
    }

    /**
     * @inheritDoc
     */
    public function store(array $attributes): Model
    {
        return $this->vehicle->create($attributes);
    }

    /**
     * @inheritDoc
     */
    public function update(int $id, array $attributes): bool
    {
        return $this->vehicle->findOrFail($id)->update($attributes);
    }

    /**
     * @inheritDoc
     */
    public function destroy(int $id): bool
    {
        return $this->vehicle->findOrFail($id)->delete();

    }
}
