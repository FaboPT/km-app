<?php

namespace App\Http\Controllers;

use App\Http\Requests\Home\SearchRequest;
use App\Models\Vehicle;
use App\Services\HomeService;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\JsonResponse;

class HomeController extends Controller
{
    private HomeService $homeService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(HomeService $homeService)
    {
        $this->homeService = $homeService;
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index(): Renderable
    {
        $vehicles = Vehicle::selectRaw('id, CONCAT(year_date," - ", make, " - ",model) as name')->pluck("name", 'id')->toArray();
        return view('home', compact('vehicles'));
    }

    /**
     * @param SearchRequest $request
     */

    public function search(SearchRequest $request): JsonResponse
    {
        return response()->json($this->homeService->search($request->all()));
    }
}
