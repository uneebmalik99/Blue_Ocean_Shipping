<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\DashboardController;
use App\Http\Controllers\Api\v1\AuthController;
use App\Http\Controllers\Api\v1\ContainerController;
use App\Http\Controllers\Api\v1\VehicleController;
use App\Http\Controllers\Api\v1\CustomerApiController;
use App\Http\Controllers\Api\v1\RateController;
use App\Http\Controllers\api\v1\InvoiceController;
use App\Http\Controllers\api\v1\StickyNoteController;
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
     Route::post('/shipment/save', [RateController::class, 'shipmentrate_save']);
     Route::post('/shipment/update', [RateController::class, 'shipmentrate_update']);


        //  towing rate
     Route::get('/towing',[RateController::class, 'towing']);
     Route::get('/towing/delete/{id?}',[RateController::class, 'towing_rate_delete']);
     Route::post('/towing/save', [RateController::class, 'towingrate_save']);
     Route::post('/towing/update', [RateController::class, 'towingrate_update']);


    });
    //Vehicle
    Route::prefix('/vehicle')->group(function () {
        Route::post('/search', [VehicleController::class, 'search_vehicle']);
        Route::post('/update', [VehicleController::class, 'update_vehicle']);
        Route::get('/all/vehicles', [VehicleController::class, 'all_vehicles']);
        Route::post('/customerVehicles', [VehicleController::class, 'customer_vehicles']);
        Route::get('/allvehicles', [VehicleController::class, 'index']);
        Route::get('/show/{id}',[VehicleController::class,'show']);
        Route::get('/delete/{id}',[VehicleController::class,'destroy']);
        Route::post('/create',[VehicleController::class,'store']);
    });
    Route::prefix('/shipment')->group(function () {
        Route::post('/search', [ContainerController::class, 'search_shipment']);
        Route::post('/update', [ContainerController::class, 'update_shipment']);
        Route::get('/all/shipments', [ContainerController::class,'index']);
        Route::get('/show/{id}',[ContainerController::class,'show']);
        Route::get('/delete/{id}',[ContainerController::class,'destroy']);
        Route::post('/create',[ContainerController::class,'store']);

    });
    Route::prefix('/customer')->group(function () {
        Route::get('/View/AllCustomers', [CustomerApiController::class, 'view_all_customers']);
        Route::get('/buyer_ids/{id?}', [CustomerApiController::class, 'view_buyer_ids']);
        Route::get('/consignee/{id?}', [CustomerApiController::class, 'view_consignee']);
    });
    Route::prefix('/invoice')->group(function (){
        Route::get('/allinvoices', [InvoiceController::class, 'index']);
        Route::get('/show/{id}', [InvoiceController::class, 'show']);
        Route::get('/delete/{id}', [InvoiceController::class,'destroy']);
    });
    Route::prefix('/dashboard')->group(function(){
        Route::get('/view',[DashboardController::class, 'index']);
    });
    Route::prefix('/sticknotes')->group(function(){
        Route::get('/view',[StickyNoteController::class, 'index']);
        Route::get('/create',[StickyNoteController::class, 'store']);

    });
});
//VehicLe Resoucrce Routes
//Route::apiResource('vehicle',\App\Http\Controllers\Api\v1\VehicleController::class);