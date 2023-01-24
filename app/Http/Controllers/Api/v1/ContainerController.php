<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Shipment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Traits\ApiResponser;
class ContainerController extends Controller
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
        $data = Shipment::with(['vehicle.warehouse_image', 'loading_image', 'vehicle.vehicle_status'])->where('container_no', $search_text)->get()->toArray();
        }
        else{
            $data = Shipment::with(['vehicle.warehouse_image','loading_image','vehicle.vehicle_status'])->where('container_no', $search_text)->get()->toArray();
        }
        if(!isset($data) || empty($data)){
            //error(string $message = null, int $code, $data = null)
            return $this->error('search key not match with any Shipment',401,$data);
        }
        return $this->success($data,"Shipment searched Successfully",200);
    }
}
