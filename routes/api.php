<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\AuthController;
use App\Http\Controllers\Api\v1\ContainerController;
use App\Http\Controllers\Api\v1\VehicleController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
    
});
//Auth Api Routes
Route::post('/auth/register', [AuthController::class, 'register']);

Route::post('/auth/login', [AuthController::class, 'login']);

Route::prefix('/auth')->middleware(['auth:sanctum'])->group(function () {
    

    Route::post('/logout', [AuthController::class, 'logout']);
    //Vehicle
    Route::prefix('/vehicle')->group(function(){
        Route::post('/search', [VehicleController::class, 'search_vehicle']);
    });
    Route::prefix('/shipment')->group(function(){
        Route::post('/search', [ContainerController::class, 'search_shipment']);
    });
});
//VehicLe Resoucrce Routes
//Route::apiResource('vehicle',\App\Http\Controllers\Api\v1\VehicleController::class);