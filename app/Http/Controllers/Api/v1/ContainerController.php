<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Shipment;
use Illuminate\Http\Request;
use App\Models\Loading_Image;
use Illuminate\Support\Facades\Validator;
use App\Traits\ApiResponser;
use Illuminate\Support\Facades\Storage;
class ContainerController extends Controller
{
    use ApiResponser;

    public $directory = '/shipment_images';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data=Shipment::with(['vehicle','vehicle.warehouse_image', 'loading_image', 'vehicle.vehicle_status'])->get()->toArray();
        return $this->success($data,"All Shipments",200);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $data = Shipment::findOrFail($id)->toArray();
        if($data){
            return $this->success($data,'Shipment/Container Detail',200);

        }
        else {
            return $this->error('Shipment/Container Not Found',401);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    /***
     * Shipment Search
     */
    public function search_shipment(Request $request){
        $validated = Validator::validate($request->all(),[
            'container_number' => 'string|required'
        ]
        );
        
        $search_text = $validated['container_number'];
        if(auth()->user()->hasRole('Customer')){
        $data = Shipment::with(['vehicle','vehicle.warehouse_image', 'loading_image', 'vehicle.vehicle_status'])->where('container_no', $search_text)->get()->toArray();
        }
        else{ 
            $data = Shipment::with(['vehicle', 'vehicle.warehouse_image','loading_image','vehicle.vehicle_status'])->where('container_no', $search_text)->get()->toArray();
        }
        if(!isset($data) || empty($data)){
            //error(string $message = null, int $code, $data = null)
            return $this->error('search key not match with any Shipment',401,$data);
        }
        return $this->success($data,"Shipment searched Successfully",200);
    }

    public function update_shipment(Request $request){
        $validated = Validator::validate($request->all(),[
            'company_name' => 'required',
            'booking_number' => 'required',
            'container_no' => 'required',
            'shipment_id' => 'required',
        ]
        );
        $data = [];
        $data = $request->all();
        $shipment_id = $data['shipment_id'];
        $loading_image = $request->file('loading_images');
        unset($data['shipment_id']);
        unset($data['loading_delelte_images']);
        unset($data['loading_images']);
        $obj = Shipment::find($shipment_id);
        $obj->update($data);

        if($request->loading_delelte_images){
            $loading_image_delete = [];
           foreach($request->loading_delelte_images as $loading_images){
            $loading_delete = Loading_Image::find($loading_images)->delete();
            array_push($loading_image_delete, $loading_delete);
           }
        }

        if ($request->file('loading_images')) {
            $Obj_loading = new Loading_Image;
            foreach ($loading_image as $load_images) {
                $image_name = time() . '.' . $load_images->extension();
                $filename = Storage::putFile($this->directory, $load_images);
                $load_images->move(public_path($this->directory), $filename);
                $data = [
                    'name' => $filename,
                    'thumbnail' => $image_name,
                    'shipment_id' => $shipment_id,
                ];
                $Obj_loading->create($data);
            }
        }

        if (!$obj) {
            return $this->error('Shipment Not Updated Successfully', 401, $obj);
        }
        return $this->success($obj, "Shipment Updated Successfully", 200);

    }
}