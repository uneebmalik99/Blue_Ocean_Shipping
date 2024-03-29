<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Vehicle;
use App\Http\Requests\StoreVehicleRequest;
use App\Http\Requests\UpdateVehicleRequest;
use Illuminate\Http\Request;
use App\Traits\ApiResponser;
use App\Models\WarehouseImage;
use App\Models\PickupImage;
use App\Models\AuctionImage; 
use Illuminate\Support\Facades\Storage;

use Directory;
use Illuminate\Support\Facades\Validator;

class VehicleController extends Controller
{
    use ApiResponser;
    public $directory = '/vehicle_images';
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
    public function search_vehicle(Request $request)
    {
        $validated = Validator::validate(
            $request->all(),
            [
                'vin_lot_no' => 'string|required'
            ]

        );

        $search_text = $validated['vin_lot_no'];

        if (auth()->user()->hasRole('Customer')) {
            $data = Vehicle::with(['invoice', 'auction_image', 'warehouse_image', 'auction_invoice', 'billofsales', 'originaltitles', 'pickupimages'])->where('customer_name', auth()->user()->id)
                ->where(function ($query) use ($search_text) {
                    $query->where('vin', 'LIKE', "%{$search_text}%")
                        ->orwhere('lot', 'LIKE', "%{$search_text}%");
                })
                ->where(function ($status) {
                    $status->where('status', 1)
                        ->orwhere('status', 2)
                        ->orwhere('status', 3);
                })->get()->toArray();
        } else {
            $data = Vehicle::with(['invoice', 'auction_image', 'warehouse_image', 'auction_invoice', 'billofsales', 'originaltitles', 'pickupimages'])
                ->where(function ($query) use ($search_text) {
                    $query->where('vin', 'LIKE', "%{$search_text}%")
                        ->orwhere('lot', 'LIKE', "%{$search_text}%");
                })
                ->where(function ($status) {
                    $status->where('status', 1)
                        ->orwhere('status', 2)
                        ->orwhere('status', 3);
                })->get()->toArray();
        }
        if (!isset($data) || empty($data)) {
            //error(string $message = null, int $code, $data = null)
            return $this->error('search key not match with any vehicle', 401, $data);
        }
        return $this->success($data, "vehicle searched Successfully", 200);
    }


    public function update_vehicle(Request $request)
    {
        $data = [];
        $validated = Validator::validate(
            $request->all(),
            [
                // 'customer_name' => 'required',
                // 'auction' => 'required',
                // 'buyer_id' => 'required',
                // 'status' => 'required',
                'vehicle_id' => 'required',
            ]

        );
        $auction_images = $request->file("auction_images");
        $warehouse_images = $request->file("warehouse_images");
        $pickup = $request->file("pickup");
        $data = $request->all();
        unset($data['warehouse_images']);
        unset($data['auction_images']);
        unset($data['pickup']);
        unset($data['warehouse_deleted_images']);
        unset($data['auction_deleted_images']);
        unset($data['pickup_deleted_images']);

        $vehicle_id = $data['vehicle_id'];
        $checkAlreadyVin = Vehicle::where('vin', $data['vin'])->where(function ($type) use ($data) {
            $type->where('id', '!=', $data['vehicle_id']);
        })->get()->toArray();
        if ($checkAlreadyVin) {
            return $this->error('Vin Already Exists', 401, $checkAlreadyVin);
        }

        unset($data['vehicle_id']);
        unset($data['vin']);
        
        // vehicle update code start  

        $obj = Vehicle::find($vehicle_id);
        $obj->update($data);
        

        // vehicle images delete code start 

        if($request->warehouse_deleted_images){
            $warehouse_image_delete = [];
           foreach($request->warehouse_deleted_images as $warehouse_images){
            $w_image_delete = WarehouseImage::find($warehouse_images)->delete();
            array_push($warehouse_image_delete, $w_image_delete);
           }
        }
        if($request->auction_deleted_images){
            $auction_image_delete = [];
           foreach($request->auction_deleted_images as $auction_images){
            $a_image_delete = AuctionImage::find($auction_images)->delete();
            array_push($auction_image_delete, $a_image_delete);
           }
        }
        if($request->pickup_deleted_images){
            $pickup_image_delete = [];
           foreach($request->pickup_deleted_images as $pickup_images){
            $p_image_delete = PickupImage::find($pickup_images)->delete();
            array_push($pickup_image_delete, $p_image_delete);
           }
        }


        // vehicle images update code 

        if ($request->file("warehouse_images")) {
            $Obj_warehouseImages = new WarehouseImage;
            foreach ($warehouse_images as $warehouseImages) {
                $file_name = time() . '.' . $warehouseImages->extension();
                $filename = Storage::putFile($this->directory, $warehouseImages);
                $type = $warehouseImages->extension();
                $doc = $warehouseImages->move(public_path($this->directory), $filename);
                $data = [
                    'name' => $filename,
                    'thumbnail' => $file_name,
                    'vehicle_id' => $vehicle_id,
                ];
                $Obj_warehouseImages->create($data);
                $output['result'] = "Success";
            }
        }
        if ($request->file("auction_images")) {
            $Obj_auctionImages = new AuctionImage;
            foreach ($auction_images as $auctionImages) {
                $file_name = time() . '.' . $auctionImages->extension();
                $filename = Storage::putFile($this->directory, $auctionImages);
                $type = $auctionImages->extension();
                $doc = $auctionImages->move(public_path($this->directory), $filename);
                $data = [
                    'name' => $filename,
                    'thumbnail' => $file_name,
                    'vehicle_id' => $vehicle_id,
                ];
                $Obj_auctionImages->create($data);
                $output['result'] = "Success";
            }
        }
        if($request->file("pickup")){
            $Obj_pickup = new PickupImage;
            foreach ($pickup as $pickup) {
                $file_name = time() . '.' . $pickup->extension();
                $filename = Storage::putFile($this->directory, $pickup);
                $type = $pickup->extension();
                $doc = $pickup->move(public_path($this->directory), $filename);
                $data = [
                    'name' => $filename,
                    'thumbnail' => $file_name,
                    'vehicle_id' => $vehicle_id,
                ];
                $Obj_pickup->create($data);
                $output['result'] = "Success";
            }   
        }

        // return code start 

        if (!$obj) {
            return $this->error('Vehicle Not Updated Successfully', 401, $obj);
        }
        return $this->success($obj, "vehicle Updated Successfully", 200);
    }
}
