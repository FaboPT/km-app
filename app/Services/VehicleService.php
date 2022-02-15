<?php

namespace App\Services;

use App\Repositories\VehicleRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Mimey\MimeTypes;

class VehicleService extends BaseService
{
    private VehicleRepository $vehicleRepository;

    public function __construct(VehicleRepository $vehicleRepository)
    {
        $this->vehicleRepository = $vehicleRepository;
    }

    /**
     * @inheritDoc
     */
    public function all(): Collection
    {
        return $this->vehicleRepository->all();
    }

    /**
     * @inheritDoc
     */
    public function store(array $data): RedirectResponse
    {
        DB::transaction(function () use (&$data) {
            $this->vehicleRepository->store($data);
        });
        flash()->success('Vehicle successfully created')->important();
        return redirect()->route('vehicles.index');
    }

    /**
     * @inheritDoc
     */
    public function update(int $id, array $data): RedirectResponse
    {
        // TODO: Implement update() method.
    }

    /**
     * @inheritDoc
     */
    public function destroy(int $id): bool
    {
        // TODO: Implement destroy() method.
    }

    public function edit(int $id): Model
    {
        return $this->vehicleRepository->find($id);
    }

    public function pathPhoto(UploadedFile  $photo): string
    {
        $name= $photo->getFilename().'.'.$photo->clientExtension();
        return $photo->storeAs('images',$name);
    }
}
