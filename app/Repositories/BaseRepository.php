<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository
{
    /**
     * Repository get all object
     * @return Collection
     */
    abstract protected function all(): Collection;

    /**
     * Repository store new object
     * @param array $attributes
     * @return Model
     */
    abstract public function store(array $attributes): Model;

    /** Repository update object
     * @param int $id
     * @param array $attributes
     * @return Model
     */
    abstract public function update(int $id, array $attributes): bool;

    /** Repository delete object
     * @param int $id
     * @return bool
     */
    abstract public function destroy(int $id): bool;
}
