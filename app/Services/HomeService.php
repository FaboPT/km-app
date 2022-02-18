<?php

namespace App\Services;

use App\Repositories\VehicleRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use KMLaravel\GeographicalCalculator\Facade\GeoFacade;
use Nette\NotImplementedException;

class HomeService extends BaseService
{
    const PRICE_GASOLINE_PER_LITRE = 1.8;
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
        throw new NotImplementedException();
    }

    /**
     * @inheritDoc
     */
    public function store(array $data): RedirectResponse
    {
        throw new NotImplementedException();
    }

    /**
     * @inheritDoc
     */
    public function update(int $id, array $data): RedirectResponse
    {
        throw new NotImplementedException();
    }

    /**
     * @inheritDoc
     */
    public function destroy(int $id): bool
    {
        throw new NotImplementedException();
    }

    public function search(array $data): string
    {
        $vehicle = $this->vehicleRepository->find($data['vehicle_id']);
        $tankCapacity = $vehicle->getAttribute('tank_capacity');


        $distance = GeoFacade::setPoint([$data['pointALatitude'], $data['pointALongitude']])
            ->setOptions(['units' => ['km']])
            // you can set unlimited lat/long points.
            ->setPoint([$data['pointBLatitude'], $data['pointBLongitude']])
            // get the calculated distance between each point
            ->getDistance();

        $consumePerTank = $tankCapacity / $vehicle->getAttribute('avg_consume');
        $quantityTanks = $distance["1-2"]["km"] / $consumePerTank;


        return number_format($quantityTanks * $tankCapacity * self::PRICE_GASOLINE_PER_LITRE, 2, '.') . '€';


    }
}
