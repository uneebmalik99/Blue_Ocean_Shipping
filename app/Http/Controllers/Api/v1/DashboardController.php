<?php

namespace App\Http\Controllers\Api\V1;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notification;
use App\Models\User;
use App\Models\Location;
use App\Models\VehicleCart;
use App\Models\Vehicle;
use App\Models\Shipment;
use App\Models\LoadingCountry;
use App\Models\Shipper;
use App\Models\Warehouse;
use App\Models\ImportVehicle;
use App\Models\Customer;
use Carbon\Carbon;
// use App\Http\Controllers\Auth;
// use Auth;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Yajra\Datatables\Datatables;
use App\Traits\ApiResponser;


class DashboardController extends Controller
{
    use ApiResponser;

    private $type = "Dashboard";
    private $singular = "dashboard";
    private $plural = "dashboard";
    private $view = "dashboard.";
    private $db_key = "id";
    private $perpage = 100;
    private $user = [];
    private $directory = "user_images";
    private $action = "/admin/dashboard";

     // index function that show all records in dashboard page 
     public function dashboard()
     {
         $data = [];
         $data = [
             "page_heading" => $this->plural . ' List',
             "breadcrumbs" => array('#' => $this->plural . " List"),
             "module" => [
                 'type' => $this->type,
                 'singular' => $this->singular,
                 'plural' => $this->plural,
                 'view' => $this->view,
                 'db_key' => $this->db_key,
                 'action' => $this->action,
                 'page' => 'list',
                 'action' => $this->action,
             ],
         ];
         $data['vehicles_cart'] = VehicleCart::with('vehicle')->get()->toArray();
 
          // return auth()->user()->email;
          // auth()->user()->if(Auth::user()->hasRole('Customer')){
         if (Auth::user()->hasRole('Customer')) {

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
            //  $data['all_vehicles'] = $all_vehicles;
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
         } else {
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
            //  $data['all_vehicles'] = $all_vehicles;
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

             $towing =  Vehicle::where('status', '5');
             $towing_count = $dispatch->count();
             $towing_value = $dispatch->sum('value');
             $data['towing_count'] = $towing_count;
             $data['towing_value'] = $towing_value;
  
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
         }
         $data['total_imported_vehicles'] = ImportVehicle::all()->count();
 
         return $this->success($data, "Dashboard Data List", 200);
         
     }
}
