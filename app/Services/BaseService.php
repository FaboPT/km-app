<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;

abstract class BaseService
{
    /**
     * Service get all object
     * @return Collection
     */
    abstract public function all(): Collection;

    /**
     * Service store new object
     * @param array $data
     * @return RedirectResponse
     */
    abstract public function store(array $data): RedirectResponse;

    /** Service update object
     * @param int $id
     * @param array $data
     * @return RedirectResponse
     */
    abstract public function update(int $id, array $data): RedirectResponse;

    /** Service delete object
     * @param int $id
     * @return bool
     */
    abstract public function destroy(int $id): bool;
}
