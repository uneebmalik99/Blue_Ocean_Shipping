<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Vehicle;
use App\Http\Requests\StoreVehicleRequest;
use App\Http\Requests\UpdateVehicleRequest;
use Illuminate\Http\Request;
use App\Traits\ApiResponser;
use Illuminate\Support\Facades\Validator;

class VehicleController extends Controller
{
    use ApiResponser;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreVehicleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVehicleRequest $request)
    {
        //
        
        
        
        $vehicle = Vehicle::create($request->all());
        return $vehicle;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function show(Vehicle $vehicle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVehicleRequest  $request
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVehicleRequest $request, Vehicle $vehicle)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehicle $vehicle)
    {
        //
    }
    public function search_vehicle(Request $request){
        $validated = Validator::validate($request->all(),[
            'vin_lot_no' => 'string|required'
        ]

        );
        
        $search_text = $validated['vin_lot_no'];
        
        if(auth()->user()->hasRole('Customer')){
        $data = Vehicle::with(['invoice','auction_image','warehouse_image','auction_invoice','billofsales','originaltitles','pickupimages'])->where('customer_name', auth()->user()->id)
            ->where(function($query) use ($search_text){
                $query->where('vin', 'LIKE', "%{$search_text}%")
                ->orwhere('lot', 'LIKE', "%{$search_text}%");
            })
            ->where(function ($status){
                $status->where('status', 1)
                ->orwhere('status', 2)
                ->orwhere('status', 3);
            })->get()->toArray();
        }
        else{
            $data = Vehicle::with(['invoice','auction_image','warehouse_image','auction_invoice','billofsales','originaltitles','pickupimages'])
            ->where(function($query) use ($search_text){
                $query->where('vin', 'LIKE', "%{$search_text}%")
                ->orwhere('lot', 'LIKE', "%{$search_text}%");
            })
            ->where(function ($status){
                $status->where('status', 1)
                ->orwhere('status', 2)
                ->orwhere('status', 3);
            })->get()->toArray();
        }
        if(!isset($data) || empty($data)){
            //error(string $message = null, int $code, $data = null)
            return $this->error('search key not match with any vehicle',401,$data);
        }
        return $this->success($data,"vehicle searched Successfully",200);
    }
}
