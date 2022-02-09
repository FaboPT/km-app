<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\VehicleController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {

    Route::prefix('vehicles')->controller(VehicleController::class)->group(function () {
        Route::get('', 'index')->name('vehicles.index');
        Route::get('/create', 'create')->name('vehicles.create');
        Route::post('', 'store')->name('vehicles.store');
        Route::get('/{id}', 'show')->name('vehicles.show');
        Route::get('/edit/{id}', 'edit')->name('vehicles.edit');
        Route::put('/{id}', 'update')->name('vehicles.update');
        Route::delete('/{id}', 'destroy')->name('vehicles.destroy');
    });
});

#### EXCLUDE ROUTES ####
Route::any('/register', function () {
    return redirect()->route('home');
});

Route::prefix('password')->group(function () {
    Route::any('', function () {
        return redirect()->route('home');
    });
    Route::any('/reset', function () {
        return redirect()->route('home');
    });
    Route::any('/confirm', function () {
        return redirect()->route('home');
    });
    Route::any('/reset/{token}', function () {
        return redirect()->route('home');
    });
});

