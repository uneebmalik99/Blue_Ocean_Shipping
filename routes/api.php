<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::post('/auth/register', [App\Http\Controllers\Api\V1\AuthController::class, 'register']);

Route::post('/auth/login', [App\Http\Controllers\Api\V1\AuthController::class, 'login']);

Route::prefix('/auth')->middleware(['auth:sanctum'])->group(function () {


    Route::post('/logout', [App\Http\Controllers\Api\V1\AuthController::class, 'logout']);


    //dashboard 
    Route::prefix('/dashboard')->group(function () {
        Route::get('/list', [App\Http\Controllers\Api\V1\DashboardController::class, 'dashboard'])->name('dashboard.list');
    });

    // Rate shipment and towing 
    Route::prefix('/rate')->group(function (){
        // shipping rate 
     Route::get('/shipment',[App\Http\Controllers\Api\V1\RateController::class, 'index']);
     Route::get('/shipment/delete/{id?}' , [App\Http\Controllers\Api\V1\RateController::class, 'shipping_rate_delete']);
     Route::post('/shipment/save', [App\Http\Controllers\Api\V1\RateController::class, 'shipmentrate_save']);
     Route::post('/shipment/update', [App\Http\Controllers\Api\V1\RateController::class, 'shipmentrate_update']);


        //  towing rate
     Route::get('/towing',[App\Http\Controllers\Api\V1\RateController::class, 'towing']);
     Route::get('/towing/delete/{id?}',[App\Http\Controllers\Api\V1\RateController::class, 'towing_rate_delete']);
     Route::post('/towing/save', [App\Http\Controllers\Api\V1\RateController::class, 'towingrate_save']);
     Route::post('/towing/update', [App\Http\Controllers\Api\V1\RateController::class, 'towingrate_update']);


    });
    //Vehicle
    Route::prefix('/vehicle')->group(function () {
        Route::post('/search', [App\Http\Controllers\Api\V1\VehicleController::class, 'search_vehicle']);
        Route::post('/update', [App\Http\Controllers\Api\V1\VehicleController::class, 'update_vehicle']);
        Route::get('/all/vehicles', [App\Http\Controllers\Api\V1\VehicleController::class, 'all_vehicles']);
        Route::post('/customerVehicles', [App\Http\Controllers\Api\V1\VehicleController::class, 'customer_vehicles']);
        Route::get('/allvehicles', [App\Http\Controllers\Api\V1\VehicleController::class, 'index']);
        Route::get('/show/{id}',[App\Http\Controllers\Api\V1\VehicleController::class,'show']);
        Route::get('/delete/{id}',[App\Http\Controllers\Api\V1\VehicleController::class,'destroy']);
        Route::post('/create',[App\Http\Controllers\Api\V1\VehicleController::class,'store']);
    });
    Route::prefix('/shipment')->group(function () {
        Route::post('/search', [App\Http\Controllers\Api\V1\ContainerController::class, 'search_shipment']);
        Route::post('/update', [App\Http\Controllers\Api\V1\ContainerController::class, 'update_shipment']);
        Route::get('/all/shipments', [App\Http\Controllers\Api\V1\ContainerController::class,'index']);
        Route::get('/show/{id}',[App\Http\Controllers\Api\V1\ContainerController::class,'show']);
        Route::get('/delete/{id}',[App\Http\Controllers\Api\V1\ContainerController::class,'destroy']);
        Route::post('/create',[App\Http\Controllers\Api\V1\ContainerController::class,'store']);

    });
    Route::prefix('/customer')->group(function () {
        Route::get('/View/AllCustomers', [App\Http\Controllers\Api\V1\CustomerApiController::class, 'view_all_customers']);
        Route::get('/buyer_ids/{id?}', [App\Http\Controllers\Api\V1\CustomerApiController::class, 'view_buyer_ids']);
        Route::get('/consignee/{id?}', [App\Http\Controllers\Api\V1\CustomerApiController::class, 'view_consignee']);
    });
    Route::prefix('/invoice')->group(function (){
        Route::get('/allinvoices', [App\Http\Controllers\Api\V1\InvoiceController::class, 'index']);
        Route::get('/show/{id}', [App\Http\Controllers\Api\V1\InvoiceController::class, 'show']);
        Route::get('/delete/{id}', [App\Http\Controllers\Api\V1\InvoiceController::class,'destroy']);
        Route::post('/create', [App\Http\Controllers\Api\V1\InvoiceController::class,'store']);
    });
    
    /**
     * Sticky Notes routes
     * 
     */
    Route::prefix('/sticknotes')->group(function(){
        Route::get('/view',[App\Http\Controllers\Api\V1\StickyNoteController::class, 'index']);
        Route::post('/create',[App\Http\Controllers\Api\V1\StickyNoteController::class, 'store']);
        Route::get('/show/{id}',[App\Http\Controllers\Api\V1\StickyNoteController::class, 'show']);
        Route::get('/delete/{id}',[App\Http\Controllers\Api\V1\StickyNoteController::class,'destroy']);
    });
    Route::prefix('/notification')->group(function(){
        Route::get('/view',[App\Http\Controllers\Api\V1\NotificationController::class, 'index']);
        Route::post('/create',[App\Http\Controllers\Api\V1\NotificationController::class, 'store']);
        Route::get('/show/{id}',[App\Http\Controllers\Api\V1\NotificationController::class, 'show']);
        Route::get('/delete/{id}',[App\Http\Controllers\Api\V1\NotificationController::class,'destroy']);
    });
});
//VehicLe Resoucrce Routes
//Route::apiResource('vehicle',\App\Http\Controllers\Api\v1\VehicleController::class);