<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Tests\TestCase;

class VehicleTest extends TestCase
{

    private function user(): Model
    {
        return User::findOrFail(1);
    }

    public function testGetVehicles()
    {
        $this->actingAs($this->user());
        $response = $this->get(route('vehicles.index'));
        $response->assertOk()->assertViewIs('vehicles.index');


    }
}
