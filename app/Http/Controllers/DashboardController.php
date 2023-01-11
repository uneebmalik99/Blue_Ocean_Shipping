<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\User;
use App\Models\Location;
use App\Models\VehicleCart;
use App\Models\Vehicle;
use App\Models\Shipment;
use App\Models\LoadingCountry;
use App\Models\Shipper;
use App\Models\Warehouse;
use App\Models\Customer;
use Carbon\Carbon;
// use App\Http\Controllers\Auth;
// use Auth;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Yajra\Datatables\Datatables;



class DashboardController extends Controller
{
    private $type = "Dashboard";
    private $singular = "dashboard";
    private $plural = "dashboard";
    private $view = "dashboard.";
    private $db_key = "id";
    private $perpage = 100;
    private $user = [];
    private $directory = "user_images";
    private $action = "/admin/dashboard";


    public function Notification()
    {
    
        $data['notification'] = Notification::with('user')->paginate($this->perpage);
        // $data['location'] = Location::all()->toArray();
        // $data['location'] = LoadingCountry::select('state')->where('status', '1')->groupBy('state')->get()->toArray();
        $data['location'] = Warehouse::where('status', '1')->get()->toArray();
        if ($data['notification']->toArray()) {
            $current = Carbon::now();
            foreach ($data['notification'] as $key => $date_notification) {

                $date = $date_notification->created_at;
                $diff = $date->diffInSeconds(\Carbon\Carbon::now());
                $days = $diff / 86400;
                $hours = $diff / 3600;
                $minutes = $diff / 3600;
                $seconds = $diff % 60;

                if ($days > 1) {
                    $data['notification'][$key]['date'] = (int) $days . 'd,' . (int) $hours . 'h,' . (int) $minutes . 'm,' . $seconds . 's ';
                } elseif ($hours > 1) {
                    $data['notification'][$key]['date'] = (int) $hours . 'h,' . (int) $minutes . 'm,' . (int) $seconds . 's ';
                } elseif ($minutes > 1) {
                    $data['notification'][$key]['date'] = (int) $minutes . 'm,' . (int) $seconds . 's ';
                } else {
                    $data['notification'][$key]['date'] = (int) $seconds . 's ';
                }
            }
            $unread = Notification::with('user')->where('status', '0')->paginate($this->perpage);
            $data['notification_count'] = count($unread);
        } else {
            $data['notification'] = "asda";
        }
        // dd($data);
        return $data;
    }


    public function dashboard(){
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
        if(Auth::user()->hasRole('Customer')){
                $data['shipments'] = Shipment::where('select_consignee', auth()->user()->id)->get();
                $data['consignee'] = Shipper::where('consignee', '!=' , Null)->where('customer_id', auth()->user()->id)->count();
                // $data['TotalVehicles'] = Vehicle::where('customer_name', auth()->user()->id)->get()->count();
                $data['NewOrders'] = Vehicle::where('status', 1)->where('customer_name', auth()->user()->id)->count();
                $data['Dispatched'] = Vehicle::where('status', 2)->where('customer_name', auth()->user()->id)->count();
                $data['onHand'] = Vehicle::where('status', 3)->where('customer_name', auth()->user()->id)->count();
                $data['no_titles'] = Vehicle::where('customer_name', auth()->user()->id)
                ->where(function ($type){
                    $type->where('title_type', '!=', 'EXPORTABLE');
                })->where(function ($status){
                    $status->where('status', 1)
                    ->orwhere('status', 2)
                    ->orwhere('status', 3);
                })
                ->get()->count();
                // dd($data['no_titles']);
                $all_vehicles = Vehicle::get();
                // $allVehicles_value = Vehicle::where('added_by_user', auth()->user()->id)->get()->sum('value');
                $data['all_vehicles'] = $all_vehicles;
                // $data['allVehicles_value'] = $allVehicles_value;

               
 $user_vehicles_ids = Vehicle::where('customer_name', auth()->user()->id)->pluck('shipment_id');

                 // ======= shipments statuses  ====== 

                 $data['booked'] = Shipment::with('consignee')->where(function ($status) use ($user_vehicles_ids){
                    $status->wherein('id', $user_vehicles_ids)
                    ->orwhere('customer_email', auth()->user()->email);
                })->where('status', '1')->get();
    
                $data['shipped'] = Shipment::with('consignee')->where(function ($status) use ($user_vehicles_ids){
                    $status->wherein('id', $user_vehicles_ids)
                    ->orwhere('customer_email', auth()->user()->email);
                })->where('status', '2')->get();
                $data['arrived'] = Shipment::with('consignee')->where(function ($status) use ($user_vehicles_ids){
                    $status->wherein('id', $user_vehicles_ids)
                    ->orwhere('customer_email', auth()->user()->email);
                })->where('status', '3')->get();
                $data['completed'] = Shipment::with('consignee')->where(function ($status) use ($user_vehicles_ids){
                    $status->wherein('id', $user_vehicles_ids)
                    ->orwhere('customer_email', auth()->user()->email);
                })->where('status', '4')->get();




                 $booked = Shipment::where(function ($status) use ($user_vehicles_ids){
                    $status->wherein('id', $user_vehicles_ids)
                    ->orwhere('select_consignee', auth()->user()->id);
                })->where('status', '1');
                 $booked_count = $booked->count();
                 $booked_value = Shipment::where('customer_email', auth()->user()->email)->count();
                 $data['booked_count'] = $booked_count;
                 $data['booked_total'] = $booked_value;
         
                 $shipped = Shipment::where(function ($status) use ($user_vehicles_ids){
                    $status->wherein('id', $user_vehicles_ids)
                    ->orwhere('select_consignee', auth()->user()->id);
                })->where('status', '2');
                 $shipped_count = $shipped->count();
                 $shipped_value = Shipment::where('customer_email', auth()->user()->email)->count();
                 $data['shipped_count'] = $shipped_count;
                 $data['shipped_total'] = $shipped_value;
         
                 $arrived = Shipment::where(function ($status) use ($user_vehicles_ids){
                    $status->wherein('id', $user_vehicles_ids)
                    ->orwhere('select_consignee', auth()->user()->id);
                })->where('status', '3');
                 $arrived_count = $arrived->count();
                 $arrived_value = Shipment::where('customer_email', auth()->user()->email)->count();
                 $data['arrived_count'] = $arrived_count;
                 $data['arrived_total'] = $arrived_value;
                 
         
                 $completed = Shipment::where(function ($status) use ($user_vehicles_ids){
                    $status->wherein('id', $user_vehicles_ids)
                    ->orwhere('select_consignee', auth()->user()->id);
                })->where('status', '4');
                 $completed_count = $completed->count();
                 $completed_value = Shipment::where('customer_email', auth()->user()->email)->count();
                 $data['completed_count'] = $completed_count;
                 $data['completed_total'] = $completed_value;
        }
        else{
            $data['shipments'] = Shipment::all();
            $data['TotalCustomers'] = User::role('Customer')->count();
            $data['ActiveCustomers'] = User::role('Customer')->where('status', '1')->count();
            $data['InActiveCustomers'] = User::role('Customer')->where('status', '0')->count();
            $data['consignee'] = Shipper::where('consignee', '!=' , Null)->count();

            
            // ===========================  vehicle status ================
        
                $data['TotalVehicles'] = Vehicle::all()->count();
                $data['NewOrders'] = Vehicle::where('status', 1)->count();
                $data['Dispatched'] = Vehicle::where('status', 2)->count();
                $data['onHand'] = Vehicle::where('status', 3)->count();
                $data['noTitle'] = Vehicle::where('status', 4)->count();
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
        }
        $notification = $this->Notification();
        return view($this->view . 'list', $data, $notification);
    }

    public function changeState($state){
        if($state == 'ALL'){
            return redirect()->route('dashboard.list');
        }

        $data = [];
        $data = [
            "state" => $state,
            // "page_title" => $this->plural . " List",
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
        if(Auth::user()->hasRole('Customer')){
            $data['shipments'] = Shipment::where('customer_email', auth()->user()->email)->where('loading_state', $state);
                $data['consignee'] = Shipper::where('consignee', '!=' , Null)->where('customer_id', auth()->user()->id)->where('address', $state)->count();
                $data['TotalVehicles'] = Vehicle::where('added_by_user', auth()->user()->id)->where('port', $state)->count();
                $data['NewOrders'] = Vehicle::where('added_by_user', auth()->user()->id)->where('status', 1)->where('port', $state)->count();
                $data['Dispatched'] = Vehicle::where('added_by_user', auth()->user()->id)->where('status', 2)->where('port', $state)->count();
                $data['onHand'] = Vehicle::where('added_by_user', auth()->user()->id)->where('status', 3)->where('port', $state)->count();
                $data['noTitle'] = Vehicle::where('added_by_user', auth()->user()->id)->where('status', 4)->where('port', $state)->count();
                $all_vehicles = Vehicle::where('added_by_user', auth()->user()->id)->where('port', $state)->get();
                // $allVehicles_value = Vehicle::where('added_by_user', auth()->user()->id)->where('pickup_location', $state)->get()->sum('value');
                $data['all_vehicles'] = $all_vehicles;
                // $data['allVehicles_value'] = $allVehicles_value;

                $onhand = Vehicle::where('added_by_user', auth()->user()->id)->where('status', '1')->where('port', $state);
                $onhand_count = $onhand->count();
                // $onhand_value = $onhand->sum('value');
                $data['onhand_count'] = $onhand_count;
                $data['onhand_value'] = $onhand_value;
        
                $dispatch =  Vehicle::where('added_by_user', auth()->user()->id)->where('status', '2')->where('port', $state);
                $dispatch_count = $dispatch->count();
                // $dispatch_value = $dispatch->sum('value'); 
                $data['dispatch_count'] = $dispatch_count;
                $data['dispatch_value'] = $dispatch_value;


                 // ======= shipments statuses  ====== 
                 $booked = Shipment::where('customer_email', auth()->user()->email)->where('status', '1')->where('loading_state', $state);
                 $booked_count = $booked->count();
                 $booked_value = Shipment::where('customer_email', auth()->user()->email)->where('loading_state', $state)->count();
                 $data['booked_count'] = $booked_count;
                 $data['booked_total'] = $booked_value;
         
                 $shipped = Shipment::where('customer_email', auth()->user()->email)->where('status', '2')->where('loading_state', $state);
                 $shipped_count = $shipped->count();
                 $shipped_value = Shipment::where('customer_email', auth()->user()->email)->where('loading_state', $state)->count();
                 $data['shipped_count'] = $shipped_count;
                 $data['shipped_total'] = $shipped_value;
         
                 $arrived = Shipment::where('customer_email', auth()->user()->email)->where('status', '3')->where('loading_state', $state);
                 $arrived_count = $arrived->count();
                 $arrived_value = Shipment::where('customer_email', auth()->user()->email)->where('loading_state', $state)->count();
                 $data['arrived_count'] = $arrived_count;
                 $data['arrived_total'] = $arrived_value;
         
                 $completed = Shipment::where('customer_email', auth()->user()->email)->where('status', '4')->where('loading_state', $state);
                 $completed_count = $completed->count();
                 $completed_value = Shipment::where('customer_email', auth()->user()->email)->where('loading_state', $state)->count();
                 $data['completed_count'] = $completed_count;
                 $data['completed_total'] = $completed_value;
        }
        else{
            $data['shipments'] = Shipment::where('loading_state', $state)->get();
            $data['TotalCustomers'] = User::role('Customer')->where('state', $state)->count();
            $data['ActiveCustomers'] = User::role('Customer')->where('state', $state)->where('status', '1')->count();
            $data['InActiveCustomers'] = User::role('Customer')->where('state', $state)->where('status', '0')->count();
            $data['consignee'] = Shipper::where('consignee', '!=' , Null)->where('address', $state)->count();

            
            // ===========================  vehicle status ================
        
                $data['TotalVehicles'] = Vehicle::where('port', $state)->count();
                $data['NewOrders'] = Vehicle::where('status', 1)->where('port', $state)->count();
                $data['Dispatched'] = Vehicle::where('status', 2)->where('port', $state)->count();
                $data['onHand'] = Vehicle::where('status', 3)->where('port', $state)->count();
                $data['noTitle'] = Vehicle::where('status', 4)->where('port', $state)->count();
                $all_vehicles = Vehicle::where('port', $state)->get();
                // $allVehicles_value = Vehicle::get()->sum('value');
                $data['all_vehicles'] = $all_vehicles;
                // $data['allVehicles_value'] = $allVehicles_value;
        
        
        
                $onhand = Vehicle::where('status', '1')->where('port', $state);
                $onhand_count = $onhand->count();
                // $onhand_value = $onhand->sum('value');
                // $data['onhand_count'] = $onhand_count;
                // $data['onhand_value'] = $onhand_value;
        
                $dispatch =  Vehicle::where('status', '2')->where('port', $state);
                $dispatch_count = $dispatch->count();
                // $dispatch_value = $dispatch->sum('value'); 
                // $data['dispatch_count'] = $dispatch_count;
                // $data['dispatch_value'] = $dispatch_value;



                // ======= shipments statuses  ====== 
                $booked = Shipment::where('status', '1')->where('loading_state', $state);
                $booked_count = $booked->count();
                $booked_value = Shipment::where('loading_state', $state)->count();
                $data['booked_count'] = $booked_count;
                $data['booked_total'] = $booked_value;
        
                $shipped = Shipment::where('status', '2')->where('loading_state', $state);
                $shipped_count = $shipped->count();
                $shipped_value = Shipment::where('loading_state', $state)->count();
                $data['shipped_count'] = $shipped_count;
                $data['shipped_total'] = $shipped_value;
        
                $arrived = Shipment::where('status', '3')->where('loading_state', $state);
                $arrived_count = $arrived->count();
                $arrived_value = Shipment::where('loading_state', $state)->count();
                $data['arrived_count'] = $arrived_count;
                $data['arrived_total'] = $arrived_value;
        
                $completed = Shipment::where('status', '4')->where('loading_state', $state);
                $completed_count = $completed->count();
                $completed_value = Shipment::where('loading_state', $state)->count();
                $data['completed_count'] = $completed_count;
                $data['completed_total'] = $completed_value;
        }
        $notification = $this->Notification();
        return view($this->view . 'list', $data, $notification);
    }

    public function serverside(Request $request, $state = null)
    {
        if ($request->ajax()) {

            if($state != null){
                if(Auth::user()->hasRole('Customer')){
                    $user_vehicles_ids = Vehicle::where('customer_name', auth()->user()->id)->pluck('id');
                    $data = Shipment::with('vehicle.user', 'customer.billings', 'customer.shippers')->whereIn('id', $user_vehicles_ids)->orwhere('customer_email', auth()->user()->email)->orwhere('loading_state', $state)->get();
                }
                else{
                    $data = Shipment::with('vehicle.user')->where('loading_state', $state)->get();
                }
        }
        else{
            if(Auth::user()->hasRole('Customer')){
                $user_vehicles_ids = Vehicle::where('customer_name', auth()->user()->id)->pluck('shipment_id');
                // dd($user_vehicles_ids);
                $data = Shipment::with('vehicle.user', 'customer.billings')->whereIn('id', $user_vehicles_ids)->orwhere('customer_email', auth()->user()->email)->get();
                // dd($data);
            }
            else{
                $data = Shipment::with('vehicle.user', 'customer.billings')->get();
            }
        }
            return Datatables::of($data)
                ->addIndexColumn()
                // ->addColumn('id', function($row){
                //     $data['row'] = $row;
                    
                //     $data['img'] = Loading_Image::where('shipment_id', $row->id)->get();
                //     // return $data['img'];
                //     $data['image_path'] = $data['img'];
                //     $output = view('layouts.shipment_filter.vehicle_table', $data)->render();
                //     return $output;
                // })
                ->addColumn('shipment_id', function($row){
                    $totalVehicles = Vehicle::where('shipment_id', $row->id)->count();
                    $vehicles = $totalVehicles;
                    return $vehicles;
                })
                // ->addColumn('notes', function($row){
                //     $bol = view('layouts.shipment_filter.shipment_bol', $row)->render();
                //     return $bol;
                // })
                ->addColumn('shipper', function($row){
                    return strtoupper($row['shipper']);
                })
                ->addColumn('vin', function($row){
                  
                    return @$row['vehicle'][0]['vin'];

                })
                ->addColumn('lot', function($row){
                  
                    return @$row['vehicle'][0]['lot'];

                })
                ->addColumn('select_consignee', function($row){
                    $data['row'] = $row;
                    if($row['customer']['billings'][0]['company_name'] != null){
                        return $row['customer']['billings'][0]['company_name'];
                    }
                    return '';


                    // $bol = view('layouts.shipment_filter.shipment_consignee_detail', $data)->render();
                    // return $bol;
                })
                ->addColumn('action', function ($row) {
                    $data['row'] = $row; 
                    $output = view('layouts.shipment_detail.action_buttons', $data)->render();
                    return $output;})
                //     $url_view = url('admin/shipments/profile/' . $row->id);
                //     $url_delete = url('admin/shipments/delete/' . $row->id);
                //     $url_edit = url('admin/shipments/edit/' . $row->id);
                //     $id = $row->id;
                

                //     $btn = "<button class='profile-button'>
                //                             <a href='$url_view'>
                //                                 <svg width='14' height='13' viewBox='0 0 16 14' fill='none'
                //                                     xmlns='http://www.w3.org/2000/svg'>
                //                                     <path
                //                                         d='M16 7C16 7 13 2.1875 8 2.1875C3 2.1875 0 7 0 7C0 7 3 11.8125 8 11.8125C13 11.8125 16 7 16 7ZM1.173 7C1.65651 6.35698 2.21264 5.7581 2.833 5.21237C4.12 4.0845 5.88 3.0625 8 3.0625C10.12 3.0625 11.879 4.0845 13.168 5.21237C13.7884 5.7581 14.3445 6.35698 14.828 7C14.77 7.07613 14.706 7.16013 14.633 7.252C14.298 7.672 13.803 8.232 13.168 8.78763C11.879 9.9155 10.119 10.9375 8 10.9375C5.88 10.9375 4.121 9.9155 2.832 8.78763C2.21165 8.2419 1.65552 7.64301 1.172 7H1.173Z'
                //                                         fill='#048B52' />
                //                                     <path
                //                                         d='M8 4.8125C7.33696 4.8125 6.70107 5.04297 6.23223 5.4532C5.76339 5.86344 5.5 6.41984 5.5 7C5.5 7.58016 5.76339 8.13656 6.23223 8.5468C6.70107 8.95703 7.33696 9.1875 8 9.1875C8.66304 9.1875 9.29893 8.95703 9.76777 8.5468C10.2366 8.13656 10.5 7.58016 10.5 7C10.5 6.41984 10.2366 5.86344 9.76777 5.4532C9.29893 5.04297 8.66304 4.8125 8 4.8125ZM4.5 7C4.5 6.18777 4.86875 5.40882 5.52513 4.83449C6.1815 4.26016 7.07174 3.9375 8 3.9375C8.92826 3.9375 9.8185 4.26016 10.4749 4.83449C11.1313 5.40882 11.5 6.18777 11.5 7C11.5 7.81223 11.1313 8.59118 10.4749 9.16551C9.8185 9.73984 8.92826 10.0625 8 10.0625C7.07174 10.0625 6.1815 9.73984 5.52513 9.16551C4.86875 8.59118 4.5 7.81223 4.5 7Z'
                //                                         fill='#048B52' />
                //                                 </svg>
                //                             </a>
                //                         </button>
                                       
                //                         <button class='delete-button'>
                //                         <a href=$url_delete>
                //                             <svg width='14' height='13' viewBox='0 0 12 12' fill='none'
                //                                 xmlns='http://www.w3.org/2000/svg'>
                //                                 <path
                //                                     d='M5 3H7C7 2.73478 6.89464 2.48043 6.70711 2.29289C6.51957 2.10536 6.26522 2 6 2C5.73478 2 5.48043 2.10536 5.29289 2.29289C5.10536 2.48043 5 2.73478 5 3V3ZM4 3C4 2.46957 4.21071 1.96086 4.58579 1.58579C4.96086 1.21071 5.46957 1 6 1C6.53043 1 7.03914 1.21071 7.41421 1.58579C7.78929 1.96086 8 2.46957 8 3H10.5C10.6326 3 10.7598 3.05268 10.8536 3.14645C10.9473 3.24021 11 3.36739 11 3.5C11 3.63261 10.9473 3.75979 10.8536 3.85355C10.7598 3.94732 10.6326 4 10.5 4H10.059L9.616 9.17C9.57341 9.66923 9.34499 10.1343 8.97593 10.4732C8.60686 10.8121 8.12405 11.0001 7.623 11H4.377C3.87595 11.0001 3.39314 10.8121 3.02407 10.4732C2.65501 10.1343 2.42659 9.66923 2.384 9.17L1.941 4H1.5C1.36739 4 1.24021 3.94732 1.14645 3.85355C1.05268 3.75979 1 3.63261 1 3.5C1 3.36739 1.05268 3.24021 1.14645 3.14645C1.24021 3.05268 1.36739 3 1.5 3H4ZM7.5 6C7.5 5.86739 7.44732 5.74021 7.35355 5.64645C7.25979 5.55268 7.13261 5.5 7 5.5C6.86739 5.5 6.74021 5.55268 6.64645 5.64645C6.55268 5.74021 6.5 5.86739 6.5 6V8C6.5 8.13261 6.55268 8.25979 6.64645 8.35355C6.74021 8.44732 6.86739 8.5 7 8.5C7.13261 8.5 7.25979 8.44732 7.35355 8.35355C7.44732 8.25979 7.5 8.13261 7.5 8V6ZM5 5.5C5.13261 5.5 5.25979 5.55268 5.35355 5.64645C5.44732 5.74021 5.5 5.86739 5.5 6V8C5.5 8.13261 5.44732 8.25979 5.35355 8.35355C5.25979 8.44732 5.13261 8.5 5 8.5C4.86739 8.5 4.74021 8.44732 4.64645 8.35355C4.55268 8.25979 4.5 8.13261 4.5 8V6C4.5 5.86739 4.55268 5.74021 4.64645 5.64645C4.74021 5.55268 4.86739 5.5 5 5.5V5.5ZM3.38 9.085C3.4013 9.3347 3.51558 9.5673 3.70022 9.73676C3.88486 9.90621 4.12639 10.0002 4.377 10H7.623C7.87344 9.9999 8.11472 9.90584 8.29915 9.73642C8.48357 9.56699 8.59771 9.33453 8.619 9.085L9.055 4H2.945L3.381 9.085H3.38Z'
                //                                     fill='#EF5757' />
                //                             </svg>
                //                         </a>
                //                     </button>";
                                    
                                        
                //     return $btn;
                // })
                ->rawColumns(['action','shipment_id', 'shipper', 'select_consignee', 'vin', 'log'])
                ->make(true);
        }
        if(Auth::user()->hasRole('Customer')){
            $data['data'] = Shipment::with('vehicle')->where('customer_email', auth()->user()->email)->get()->toArray();
        }
        else{
            $data['data'] = Shipment::with('vehicle')->get()->toArray();
        }
        $action = ['action'=>''];
        array_push($data['data'], $action);
        return $data;
    }

}

