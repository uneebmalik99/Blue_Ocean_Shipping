<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Traits\ApiResponser;
use App\Models\Shipment;
use App\Models\Vehicle;
use App\Models\User;
use App\Models\Shipper;
use App\Models\ImportVehicle;
class DashboardController extends Controller
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
        if(Auth::User()->HasRole('Super Admin')){
        $data['shipments'] = Shipment::all();
            $data['TotalCustomers'] = User::role('Customer')->count();
            $data['ActiveCustomers'] = User::role('Customer')->where('status', '1')->count();
            $data['InActiveCustomers'] = User::role('Customer')->where('status', '0')->count();
            $data['consignee'] = Shipper::where('consignee', '!=', Null)->count();


            // ===========================  vehicle status ================

            $data['TotalVehicles'] = Vehicle::all()->count();
            $data['NewOrders'] = Vehicle::where('status', 1)->count();
            $data['Dispatched'] = Vehicle::where('status', 2)->count();
            $data['onHand'] = Vehicle::where('status', 3)->count();
            $data['no_titles'] = Vehicle::where(function ($type) {
                    $type->where('title_type', '!=', 'EXPORTABLE');
                })->where(function ($status) {
                    $status->where('status', 1)
                        ->orwhere('status', 2)
                        ->orwhere('status', 3);
                })
                ->get()->count();
            $all_vehicles = Vehicle::all();
            // $allVehicles_value = Vehicle::get()->sum('value');
            $data['all_vehicles'] = $all_vehicles;
            // $data['allVehicles_value'] = $allVehicles_value;



            $onhand = Vehicle::where('status', '1');
            $onhand_count = $onhand->count();
            $onhand_value = $onhand->sum('value');
            $data['onhand_count'] = $onhand_count;
            $data['onhand_value'] = $onhand_value;

            $dispatch =  Vehicle::where('status', '2');
            $dispatch_count = $dispatch->count();
            $dispatch_value = $dispatch->sum('value');
            $data['dispatch_count'] = $dispatch_count;
            $data['dispatch_value'] = $dispatch_value;



            // ======= shipments statuses  ====== 
            $booked = Shipment::where('status', '1');
            $booked_count = $booked->count();
            $booked_value = Shipment::all()->count();
            $data['booked_count'] = $booked_count;
            $data['booked_total'] = $booked_value;

            $shipped = Shipment::where('status', '2');
            $shipped_count = $shipped->count();
            $shipped_value = Shipment::all()->count();
            $data['shipped_count'] = $shipped_count;
            $data['shipped_total'] = $shipped_value;

            $arrived = Shipment::where('status', '3');
            $arrived_count = $arrived->count();
            $arrived_value = Shipment::all()->count();
            $data['arrived_count'] = $arrived_count;
            $data['arrived_total'] = $arrived_value;

            $completed = Shipment::where('status', '4');
            $completed_count = $completed->count();
            $completed_value = Shipment::all()->count();
            $data['completed_count'] = $completed_count;
            $data['completed_total'] = $completed_value;
            $data['total_imported_vehicles'] = ImportVehicle::all()->count();
            
            return $this->success($data,'Dashboard',200);
        }
        else if(Auth::User()->HasRole('Customer')){
            $data['shipments'] = Shipment::where('select_consignee', auth()->user()->id)->get();
            $data['consignee'] = Shipper::where('consignee', '!=', Null)->where('customer_id', auth()->user()->id)->count();
            // $data['TotalVehicles'] = Vehicle::where('customer_name', auth()->user()->id)->get()->count();
            $data['NewOrders'] = Vehicle::where('status', 1)->where('customer_name', auth()->user()->id)->count();
            $data['Dispatched'] = Vehicle::where('status', 2)->where('customer_name', auth()->user()->id)->count();
            $data['onHand'] = Vehicle::where('status', 3)->where('customer_name', auth()->user()->id)->count();
            $data['no_titles'] = Vehicle::where('customer_name', auth()->user()->id)
                ->where(function ($type) {
                    $type->where('title_type', '!=', 'EXPORTABLE');
                })->where(function ($status) {
                    $status->where('status', 1)
                        ->orwhere('status', 2)
                        ->orwhere('status', 3);
                })
                ->get()->count();
            // dd($data['no_titles']);
            $all_vehicles = Vehicle::get();
            // $allVehicles_value = Vehicle::where('customer_name', auth()->user()->id)->get()->sum('value');
            $data['all_vehicles'] = $all_vehicles;
            // $data['allVehicles_value'] = $allVehicles_value;


            $user_vehicles_ids = Vehicle::where('customer_name', auth()->user()->id)->pluck('shipment_id');

            // ======= shipments statuses  ====== 

            $data['booked'] = Shipment::with('consignee')->where(function ($status) use ($user_vehicles_ids) {
                $status->wherein('id', $user_vehicles_ids)
                    ->orwhere('customer_email', auth()->user()->email);
            })->where('status', '1')->get();

            $data['shipped'] = Shipment::with('consignee')->where(function ($status) use ($user_vehicles_ids) {
                $status->wherein('id', $user_vehicles_ids)
                    ->orwhere('customer_email', auth()->user()->email);
            })->where('status', '2')->get();
            $data['arrived'] = Shipment::with('consignee')->where(function ($status) use ($user_vehicles_ids) {
                $status->wherein('id', $user_vehicles_ids)
                    ->orwhere('customer_email', auth()->user()->email);
            })->where('status', '3')->get();
            $data['completed'] = Shipment::with('consignee')->where(function ($status) use ($user_vehicles_ids) {
                $status->wherein('id', $user_vehicles_ids)
                    ->orwhere('customer_email', auth()->user()->email);
            })->where('status', '4')->get();




            $booked = Shipment::where(function ($status) use ($user_vehicles_ids) {
                $status->wherein('id', $user_vehicles_ids)
                    ->orwhere('select_consignee', auth()->user()->id);
            })->where('status', '1');
            $booked_count = $booked->count();
            $booked_value = Shipment::where('customer_email', auth()->user()->email)->count();
            $data['booked_count'] = $booked_count;
            $data['booked_total'] = $booked_value;

            $shipped = Shipment::where(function ($status) use ($user_vehicles_ids) {
                $status->wherein('id', $user_vehicles_ids)
                    ->orwhere('select_consignee', auth()->user()->id);
            })->where('status', '2');
            $shipped_count = $shipped->count();
            $shipped_value = Shipment::where('customer_email', auth()->user()->email)->count();
            $data['shipped_count'] = $shipped_count;
            $data['shipped_total'] = $shipped_value;

            $arrived = Shipment::where(function ($status) use ($user_vehicles_ids) {
                $status->wherein('id', $user_vehicles_ids)
                    ->orwhere('select_consignee', auth()->user()->id);
            })->where('status', '3');
            $arrived_count = $arrived->count();
            $arrived_value = Shipment::where('customer_email', auth()->user()->email)->count();
            $data['arrived_count'] = $arrived_count;
            $data['arrived_total'] = $arrived_value;


            $completed = Shipment::where(function ($status) use ($user_vehicles_ids) {
                $status->wherein('id', $user_vehicles_ids)
                    ->orwhere('select_consignee', auth()->user()->id);
            })->where('status', '4');
            $completed_count = $completed->count();
            $completed_value = Shipment::where('customer_email', auth()->user()->email)->count();
            $data['completed_count'] = $completed_count;
            $data['completed_total'] = $completed_value;
            return $this->success($data,'Customer Dashboard',200);
        }
        else {
            return $this->error('Client Request is Invalid', 401);
        }
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
}
