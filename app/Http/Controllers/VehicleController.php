<?php

namespace App\Http\Controllers;

use App\Http\Requests\Vehicle\VehicleStoreRequest;
use App\Http\Requests\Vehicle\VehicleUpdateRequest;
use App\Services\VehicleService;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;

class VehicleController extends Controller
{
    private VehicleService $vehicleService;

    public function __construct(VehicleService $vehicleService)
    {
        $this->vehicleService = $vehicleService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Renderable
     */
    public function index(): Renderable
    {
        $items = $this->vehicleService->all();
        return view('vehicles.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Renderable
     */
    public function create(): Renderable
    {
        return view('vehicles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param VehicleStoreRequest $request
     * @return RedirectResponse
     */
    public function store(VehicleStoreRequest $request): RedirectResponse
    {
        if($request->hasFile('photo') && !$request->url_photo)
        {
            $path = $this->vehicleService->pathPhoto($request->photo);
            $request->merge(['url_photo'=>$path]);
        }
        return $this->vehicleService->store($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Renderable
     */
    public function show(int $id): Renderable
    {
        $item = $this->vehicleService->find($id);
        return view('vehicles.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Renderable
     */
    public function edit(int $id): Renderable
    {
        $item = $this->vehicleService->find($id);
        return view('vehicles.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param VehicleUpdateRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(VehicleUpdateRequest $request, int $id): RedirectResponse
    {
        if ($request->hasFile('photo') && !$request->url_photo) {
            $path = $this->vehicleService->pathPhoto($request->photo);
            $request->merge(['url_photo' => $path]);
        }
        return $this->vehicleService->update($id, $request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return bool
     */
    public function destroy(int $id): bool
    {
        return $this->vehicleService->destroy($id);
    }
}
