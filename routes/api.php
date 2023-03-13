<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\AuthController;
use App\Http\Controllers\Api\v1\ContainerController;
use App\Http\Controllers\Api\v1\VehicleController;
use App\Http\Controllers\Api\v1\CustomerApiController;
use App\Http\Controllers\Api\v1\DashboardController;
use App\Http\Controllers\Api\v1\RateController;

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


    //dashboard 
    Route::prefix('/dashboard')->group(function () {
        Route::get('/list', [DashboardController::class, 'dashboard'])->name('dashboard.list');
    });

    // Rate shipment and towing 
    Route::prefix('/rate')->group(function (){
        // shipping rate 
     Route::get('/shipment',[RateController::class, 'index']);
     Route::get('/shipment/delete/{id?}' , [RateController::class, 'shipping_rate_delete']);


        //  towing rate
     Route::get('/towing',[RateController::class, 'towing']);
     Route::get('/towing/delete/{id?}',[RateController::class, 'towing_rate_delete']);

    });
    //Vehicle
    Route::prefix('/vehicle')->group(function () {
        Route::post('/search', [VehicleController::class, 'search_vehicle']);
        Route::post('/update', [VehicleController::class, 'update_vehicle']);
        Route::get('/all/vehicles', [VehicleController::class, 'all_vehicles']);
        Route::post('/customerVehicles', [VehicleController::class, 'customer_vehicles']);
    });
    Route::prefix('/shipment')->group(function () {
        Route::post('/search', [ContainerController::class, 'search_shipment']);
        Route::post('/update', [ContainerController::class, 'update_shipment']);
    });
    Route::prefix('/customer')->group(function () {
        Route::get('/View/AllCustomers', [CustomerApiController::class, 'view_all_customers']);
        Route::get('/buyer_ids/{id?}', [CustomerApiController::class, 'view_buyer_ids']);
        Route::get('/consignee/{id?}', [CustomerApiController::class, 'view_consignee']);
    });
});
//VehicLe Resoucrce Routes
//Route::apiResource('vehicle',\App\Http\Controllers\Api\v1\VehicleController::class);