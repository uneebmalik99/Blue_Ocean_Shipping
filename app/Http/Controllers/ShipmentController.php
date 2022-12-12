<?php

namespace App\Http\Controllers;

use App\Models\Consignee;
use App\Models\ContainerSize;
use App\Models\ContainerType;
use App\Models\Loading_Image;
use App\Models\Location;
use App\Models\Notification;
use App\Models\Other_Document;
use App\Models\Shipment;
use App\Models\VehicleCart;
use App\Models\Shipment_Invice;
use App\Models\Stamp_Title;
use App\Models\Vehicle;
use App\Models\Country;
use App\Models\Shipper;
use App\Models\DCountry;
use App\Models\ShipmentType;
use App\Models\User;
use App\Models\Company;
use App\Models\DestinationCountry;
use App\Models\DestinationPort;
use App\Models\DestinationState;
use App\Models\DestinationTerminal;
use App\Models\LoadingTerminal;
use App\Models\LoadingPort;
use App\Models\ShippingCountry;
use App\Models\ShipmentLine;
use App\Models\LoadingCountry;
use App\Models\State;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Storage;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ShipmentExport;


class ShipmentController extends Controller
{

    private $type = "Shipments";
    private $singular = "Shipment";
    private $plural = "Shipments";
    private $view = "shipment.";
    private $db_key = "id";
    private $user = [];
    private $perpage = 100;
    private $directory = "/shipment_images";
    private $action = "/admin/shipments";

    private function Notification()
    {
        $data['notification'] = Notification::with('user')->paginate($this->perpage);
        $data['location'] = Location::all()->toArray();
        // dd();
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
        }
        // dd($data);
        return $data;
    }

    public function index()
    {
        $data = [];
        $data = [
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
            ],
        ];

        $notification = $this->Notification();
        $data['vehicles_cart'] = VehicleCart::with('vehicle')->get()->toArray();

        // $data['companies'] = User::all();

        if(Auth::user()->hasRole('Customer')){
            $data['records'] = Shipment::with('consignee')->where('customer_email', auth()->user()->email)->get();
            $data['booked'] = Shipment::with('consignee')->where('customer_email', auth()->user()->email)->where('status', '1')->get();
            $data['shipped'] = Shipment::with('consignee')->where('customer_email', auth()->user()->email)->where('status', '2')->get();
            $data['arrived'] = Shipment::with('consignee')->where('customer_email', auth()->user()->email)->where('status', '3')->get();
            $data['completed'] = Shipment::with('consignee')->where('customer_email', auth()->user()->email)->where('status', '4')->get();
        $data['shipments'] = Shipment::with('vehicle')->where('customer_email', auth()->user()->email)->get()->toArray();

        $data['loading_port'] = LoadingCountry::select('port')->where('status', '1')->groupBy('port')->get()->toArray();
        $data['destination_port'] = DCountry::select('port')->where('status', '1')->groupBy('port')->get()->toArray();

           
        }
        else{
            $data['records'] = Shipment::with('consignee')->paginate($this->perpage);
            $data['booked'] = Shipment::with('consignee')->where('status', '1')->paginate($this->perpage);
            $data['shipped'] = Shipment::with('consignee')->where('status', '2')->paginate($this->perpage);
            $data['arrived'] = Shipment::with('consignee')->where('status', '3')->paginate($this->perpage);
            $data['completed'] = Shipment::with('consignee')->where('status', '4')->paginate($this->perpage);
        $data['shipments'] = Shipment::with('vehicle')->get()->toArray();
        $data['loading_port'] = LoadingCountry::select('port')->where('status', '1')->groupBy('port')->get()->toArray();

        $data['destination_port'] = DCountry::select('port')->where('status', '1')->groupBy('port')->get()->toArray();
        

        }
       
        // dd($data['loading_port']);
        // years
        $current_date = Carbon::now();
        $period = CarbonPeriod::create('2022-09-09', $current_date);
        $period = CarbonPeriod::create('2022-09-09', $current_date);
        // dd($period->toArray());
        foreach ($period as $date) {
            // dd($date);
            $data['date'][] = $date->format('Y-m-d');
        }

        // dd($data['shipments']);
        return view($this->view . 'list', $data, $notification);
    }


    public function changeState($state){
        if($state == 'All'){
            return redirect()->route('shipment.list');
        }
        $data = [];
        $data = [
            "state" => $state,
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
            ],
        ];

        $notification = $this->Notification();
        $data['vehicles_cart'] = VehicleCart::with('vehicle')->get()->toArray();


        if(Auth::user()->hasRole('Customer')){
            $data['records'] = Shipment::with('consignee')->where('customer_email', auth()->user()->email)->get();
            $data['booked'] = Shipment::with('consignee')->where('customer_email', auth()->user()->email)->where('status', '1')->where('loading_state', $state)->get();
            $data['shipped'] = Shipment::with('consignee')->where('customer_email', auth()->user()->email)->where('status', '2')->where('loading_state', $state)->get();
            $data['arrived'] = Shipment::with('consignee')->where('customer_email', auth()->user()->email)->where('status', '3')->where('loading_state', $state)->get();
            $data['completed'] = Shipment::with('consignee')->where('customer_email', auth()->user()->email)->where('status', '4')->where('loading_state', $state)->get();
        $data['shipments'] = Shipment::with('vehicle')->where('customer_email', auth()->user()->email)->get()->toArray();

        $data['loading_port'] = LoadingCountry::select('port')->where('status', '1')->groupBy('port')->get()->toArray();
        $data['destination_port'] = DCountry::select('port')->where('status', '1')->groupBy('port')->get()->toArray();

           
        }
        else{
            $data['records'] = Shipment::with('consignee')->paginate($this->perpage);
            $data['booked'] = Shipment::with('consignee')->where('status', '1')->where('loading_state', $state)->paginate($this->perpage);
            $data['shipped'] = Shipment::with('consignee')->where('status', '2')->where('loading_state', $state)->paginate($this->perpage);
            $data['arrived'] = Shipment::with('consignee')->where('status', '3')->where('loading_state', $state)->paginate($this->perpage);
            $data['completed'] = Shipment::with('consignee')->where('status', '4')->where('loading_state', $state)->paginate($this->perpage);
        $data['shipments'] = Shipment::with('vehicle')->get()->toArray();
        $data['loading_port'] = LoadingCountry::select('port')->where('status', '1')->groupBy('port')->get()->toArray();

        $data['destination_port'] = DCountry::select('port')->where('status', '1')->groupBy('port')->get()->toArray();
        

        }
       
        
        $current_date = Carbon::now();
        $period = CarbonPeriod::create('2022-09-09', $current_date);
        $period = CarbonPeriod::create('2022-09-09', $current_date);
        foreach ($period as $date) {
            $data['date'][] = $date->format('Y-m-d');
        }

        return view($this->view . 'list', $data, $notification);

    }

    public function create(Request $request)
    {
        $action = url($this->action . '/create');
        $data = [
            "page_title" => $this->plural . " create",
            "page_heading" => $this->plural . ' create',
            "breadcrumbs" => array("dashboard" => "Dashboard", "#" => $this->plural . " create"),
            "action" => $action,
            "button_text" => "Create",
            "module" => [
                'type' => $this->type,
                // 'type' => $this->type,
                'singular' => $this->singular,
                'plural' => $this->plural,
                'view' => $this->view,
                'db_key' => $this->db_key,
                'action' => $this->action,
                'page' => 'create',
            ],
        ];
        $data['buyer_ids'] = User::with('billings')->get()->toArray();
        // dd($data['buyer_ids']);
        $notification = $this->Notification();
        $data['vehicles'] = Vehicle::where('shipment_id', null)->get();
        $data['consignees'] = Consignee::all()->toArray();
        $data['records'] = Shipment::all()->toArray();
        $data['location'] = Location::all()->toArray();
        // $data['countries'] = ShippingCountry::where('status', '1')->get();
        $data['countries'] = LoadingCountry::select('country')->where('status', '1')->groupBy('country')->get()->toArray();

        // User::select('name')->groupBy('name')->get()->toArray()
        $data['container_size'] = ContainerSize::where('status', '1')->get();
        $data['container_types'] = ContainerType::where('status', '1')->get();
        $data['shipment_lines'] = ShipmentLine::where('status', '1')->get();
        $data['shipment_types'] = ShipmentType::where('status', '1')->get();
        // $data['companies'] = Company::where('status', '1')->get();
        $data['companies'] = User::role('Customer')->get();
        $data['destination_country'] = DCountry::select('country')->where('status', '1')->groupBy('country')->get()->toArray();
        $data['shippers'] = Shipper::all();
        // $data['states'] = State::where('status', '1')->get();
        if($request->ajax()) {
            $tab = $request->tab;
            // return $tab;
            $output = view('shipment.' . $tab, $data)->render();
            return Response($output);
        }
    }
    
    function addtoshipment(Request $req){
        
        $output = [];
        $action = url($this->action . '/create');
        $data = [
            "page_title" => $this->plural . " create",
            "page_heading" => $this->plural . ' create',
            "breadcrumbs" => array("dashboard" => "Dashboard", "#" => $this->plural . " create"),
            "action" => $action,
            "button_text" => "Create",
            "module" => [
                'type' => $this->type,
                // 'type' => $this->type,
                'singular' => $this->singular,
                'plural' => $this->plural,
                'view' => $this->view,
                'db_key' => $this->db_key,
                'action' => $this->action,
                'page' => 'create',
            ],
        ];

        $data['vehicle_cart'] = VehicleCart::with('vehicle')->get()->toArray();
        // dd($vehicle_cart);
        // $output['cart'] = view('layouts.shipment_filter.checkVehicle', $data)->render();
        // dd($data['vehicle_cart']);

        $data['buyer_ids'] = User::with('billings')->get()->toArray();
        // dd($data['shipment']);
        $data['shippers'] = Shipper::all();

        $notification = $this->Notification();
        $data['vehicles'] = Vehicle::where('shipment_id', null)->get();
        $data['consignees'] = Consignee::all()->toArray();
        $data['records'] = Shipment::all()->toArray();
        $data['location'] = Location::all()->toArray();
        // $data['countries'] = ShippingCountry::where('status', '1')->get();
        $data['countries'] = LoadingCountry::select('country')->where('status', '1')->groupBy('country')->get()->toArray();

        // User::select('name')->groupBy('name')->get()->toArray()
        $data['container_size'] = ContainerSize::where('status', '1')->get();
        $data['container_types'] = ContainerType::where('status', '1')->get();
        $data['shipment_lines'] = ShipmentLine::where('status', '1')->get();
        $data['shipment_types'] = ShipmentType::where('status', '1')->get();
        // $data['companies'] = Company::where('status', '1')->get();
        $data['companies'] = User::all();
        $data['destination_country'] = DCountry::select('country')->where('status', '1')->groupBy('country')->get()->toArray();

        $output = view('shipment.general', $data);
        return Response($output);
    }
    function edit(Request $req){
        // return $req->id;
        $output = [];
        $action = url($this->action . '/create');
        $data = [
            "page_title" => $this->plural . " create",
            "page_heading" => $this->plural . ' create',
            "breadcrumbs" => array("dashboard" => "Dashboard", "#" => $this->plural . " create"),
            "action" => $action,
            "button_text" => "Create",
            "module" => [
                'type' => $this->type,
                // 'type' => $this->type,
                'singular' => $this->singular,
                'plural' => $this->plural,
                'view' => $this->view,
                'db_key' => $this->db_key,
                'action' => $this->action,
                'page' => 'create',
            ],
        ];
        $data['buyer_ids'] = User::with('billings')->get()->toArray();

        $data['shipment'] = Shipment::with('vehicle')->where('id', $req->id)->get()->toArray();
        // dd($data['shipment']);
        $data['shippers'] = Shipper::all();

        $notification = $this->Notification();
        $data['vehicles'] = Vehicle::where('shipment_id', null)->get();
        $data['consignees'] = Consignee::all()->toArray();
        $data['records'] = Shipment::all()->toArray();
        $data['location'] = Location::all()->toArray();
        // $data['countries'] = ShippingCountry::where('status', '1')->get();
        $data['countries'] = LoadingCountry::select('country')->where('status', '1')->groupBy('country')->get()->toArray();

        // User::select('name')->groupBy('name')->get()->toArray()
        $data['container_size'] = ContainerSize::where('status', '1')->get();
        $data['container_types'] = ContainerType::where('status', '1')->get();
        $data['shipment_lines'] = ShipmentLine::where('status', '1')->get();
        $data['shipment_types'] = ShipmentType::where('status', '1')->get();
        // $data['companies'] = Company::where('status', '1')->get();
        $data['companies'] = User::role('Customer')->get();
        $data['destination_country'] = DCountry::select('country')->where('status', '1')->groupBy('country')->get()->toArray();

        $output = view('shipment.general', $data);
        return Response($output);
    }
    public function FetchState(Request $req){
        $data = [];
        $output = [];

        $data['state'] = LoadingCountry::select('state')->where('country',$req->country_id)->groupBy('state')->get()->toArray();
        // select('name')->groupBy('name')->get()->toArray()
        // dd($data['state']);

        $output = view('shipment.fetchstate', $data)->render();

        return Response($output);

        
    }


    public function FetchPort(Request $req){
        $data = [];
        $output = [];

        // $data['port'] = LoadingPort::where('state_id', $req->state_id)->where('status', '1')->get()->toArray();

        $data['port'] = LoadingCountry::select('port')->where('state',$req->state_id)->where('status', '1')->groupBy('port')->get()->toArray();

        $output = view('shipment.fetchport', $data)->render();

        return Response($output);
    }

    public function FetchTerminal(Request $req){
        $data = [];
        $output = [];
        // $data['terminals'] = LoadingTerminal::where('loadingport_id', $req->port_id)->where('status', '1')->get()->toArray();
        $data['terminal'] = LoadingCountry::select('terminal')->where('port',$req->port_id)->where('status', '1')->groupBy('terminal')->get()->toArray();
        $output = view('shipment.fetchterminal', $data)->render();
        return Response($output);
    }

    public function FetchDestiState(Request $req){
        $data = [];
        $output = [];

        $data['state'] = DCountry::select('state')->where('country', $req->country_id)->where('status', '1')->groupBy('state')->get()->toArray();

        // $data['port'] = LoadingCountry::select('port')->where('state',$req->state_id)->where('status', '1')->groupBy('port')->get()->toArray();


        $output = view('shipment.fetchstate', $data)->render();

        return Response($output);
        
    }

    public function FetchDestiPort(Request $req){
        $data = [];
        $output = [];

        // $data['port'] = DestinationPort::where('state_id', $req->state_id)->where('status', '1')->get()->toArray();

        $data['port'] = DCountry::select('port')->where('state', $req->state_id)->where('status', '1')->groupBy('port')->get()->toArray();

        $output = view('shipment.fetchport', $data)->render();

        return Response($output);
    }

    public function FetchDestiTerminal(Request $req){
        $data = [];
        $output = [];

        // $data['terminals'] = DestinationTerminal::where('destinationPort_id', $req->port_id)->where('status', '1')->get()->toArray();

        $data['terminal'] = DCountry::select('terminal')->where('port', $req->port_id)->where('status', '1')->groupBy('terminal')->get()->toArray();

        $output = view('shipment.fetchterminal', $data)->render();

        return Response($output);
    }

    private function store($request)
    {

        // $request->request->remove('vehicle');
        $data = $request->all();
        $Obj = new Shipment;
        $Obj->create($data);
        $shipment = $Obj->latest()->first();

        $vehicle = Vehicle::find($id);

        $vehicle->shipment_id = $shipment->id;
        $vehicle->save();
        return redirect($this->action)->with('success', 'Vehicle added successfully.');
    }
    // public function attachmentsIndex()
    // {
    //     $action = url($this->action . '/attachments');
    //     $data = [
    //         "page_title" => $this->plural . " attachments",
    //         "page_heading" => $this->plural . ' attachments',
    //         "breadcrumbs" => array("dashboard" => "Dashboard", "#" => $this->plural . " attachments"),
    //         "action" => $action,
    //         "button_text" => "Upload Image",
    //         "module" => [
    //             'type' => $this->type,
    //             'type' => $this->type,
    //             'singular' => $this->singular,
    //             'plural' => $this->plural,
    //             'view' => $this->view,
    //             'db_key' => $this->db_key,
    //             'action' => $this->action,
    //             'page' => 'attachment',
    //         ],
    //     ];
    //     $notification = $this->Notification();
    //     return view('shipment.attachments', $notification, $data);
    // }
    public function create_form(Request $request)
    {
        if ($request->ajax()) {
            $data = [];
            $data = $request->all();
            // dd($data);
            $vehicles = $request->vehicle;
            $tab = $request->tab;
            $loading_image = $request->file('loading_image');
            $shipment_inovice = $request->file('shipment_inovice');
            $stamp_title = $request->file('stamp_title');
            $other_document = $request->file('other_document');
            unset($data['vehicle']);
            unset($data['shipment_vehicle_table_length']);
            unset($data['loading_image']);
            unset($data['shipment_inovice']);
            unset($data['stamp_title']);
            unset($data['other_document']);
            unset($data['tab']);
            if($request->id){
                // dd($vehicle_id);
                if($vehicles){
                    $old_vehicles = Vehicle::where('shipment_id', $data['id'])->get()->toArray();
                    foreach($old_vehicles as $old_vehicle){
                        if(in_array($old_vehicle['id'], $vehicles)){
                            // dd($vehicles);
                        }
                        else{
                            // dd($old_vehicle['id']);
                            $update_vehicle = Vehicle::find($old_vehicle['id']);
                            $update_vehicle->shipment_id = null;
                            $update_vehicle->update();
                        }
                    }
                    foreach ($vehicles as $vehicle_id) {
                        $get_vehicle = Vehicle::find($vehicle_id);
                        $get_vehicle->shipment_id = $data['id'];
                        $get_vehicle->update();
                    }


                    $shipment = Shipment::find($data['id']);
                    $shipment->update($data);
                }

                $data['shipment_id'] = $request->id;
                $data['loading_images'] = Shipment::with('loading_image')->where('id', $request->id)->get()->toArray();
                // dd($request->id);
            }
            else{
                $Obj_vehicle = new Vehicle;
                $Obj = new Shipment;
                $data['status'] = "1";
                if($vehicles){
                    $Obj->create($data);
                }
                $shipment = $Obj->where('container_no', $request->container_no)->get();
                $data['shipment_id'] = $shipment[0]['id'];
                foreach ($vehicles as $vehicle_id) {
                    $get_vehicle = $Obj_vehicle->find($vehicle_id);
                    $get_vehicle->shipment_id = $shipment[0]['id'];
                    $get_vehicle->status = 7;
                    $get_vehicle->save();
                }
                VehicleCart::query()->delete();
            }
            $view = view('shipment.' . $tab, $data)->render();
            return Response($view);
        }
    }

    public function create_images(Request $request)
    {
        // dd($request->loading_old);
        $shipment_id = $request->shipment_id;
        $data = [];
        $shipment_inovice = $request->file('shipment_inovice');
        $stamp_title = $request->file('stamp_title');
        $loading_image = $request->file('loading_image');
        $other_document = $request->file('other_document');
        if($request->loading_old){
            $loading_old_images = Loading_Image::where('shipment_id', $shipment_id)->get();
            foreach($loading_old_images as $old_images){
                if (in_array($old_images['id'], $request->loading_old)){
                }
                else{
                    $delete = Loading_Image::find($old_images['id'])->delete();
                }
            }
        }
        if ($shipment_inovice) {
            $Obj_shipment = new Shipment_Invice;
            foreach ($shipment_inovice as $shipment_images) {
                $image_name = time() . '.' . $shipment_images->extension();
                $filename = Storage::putFile($this->directory, $shipment_images);
                $shipment_images->move(public_path($this->directory), $filename);
                $data = [
                    'name' => $filename,
                    'thumbnail' => $image_name,
                    'shipment_id' => $shipment_id,
                ];
                $Obj_shipment->create($data);
            }
        }
        if ($stamp_title) {
            $Obj_stamp = new Stamp_Title;
            foreach ($stamp_title as $stamp_images) {
                $image_name = time() . '.' . $stamp_images->extension();
                $filename = Storage::putFile($this->directory, $stamp_images);
                $stamp_images->move(public_path($this->directory), $filename);
                $data = [
                    'name' => $filename,
                    'thumbnail' => $image_name,
                    'shipment_id' => $shipment_id,
                ];
                $Obj_stamp->create($data);
            }
        }
        if ($loading_image) {
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
        if ($other_document) {
            $Obj_other = new Other_Document;
            foreach ($other_document as $other_images) {
                $image_name = time() . '.' . $other_images->extension();
                $filename = Storage::putFile($this->directory, $other_images);
                $other_images->move(public_path($this->directory), $filename);
                $data = [
                    'name' => $filename,
                    'thumbnail' => $image_name,
                    'shipment_id' => $shipment_id,
                ];
                $Obj_other->create($data);
            }
        }
        return "Success";
    }
    public function profile(Request $request)
    {
        $data = [];
        $data = [
            "page_title" => "Shipment Detail",
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
            ],
        ];
        $notification = $this->Notification();
        $data['vehicles_cart'] = VehicleCart::with('vehicle')->get()->toArray();

        $data['shipments'] = Shipment::with(['vehicle.warehouse_image', 'loading_image'])->where('id', $request->id)->get()->toArray();
        if ($request->ajax()) {
            $tab = $request->tab;
            $output = view('layouts.shipment_detail.' . $tab, $data)->render();
            return Response($output);
        }
        return view($this->view . 'profile', $data, $notification);
    }

    
    public function profile_tab(Request $request)
    {
        $id = $request->id;
        $data = [];
        $data['shipments'] = Shipment::with('vehicle.warehouse_image', 'loading_image', 'shipment_invoice', 'stamp_titles','other_documents')->where('id', $request->id)->get()->toArray();
        if ($request->tab) {
            $tab = $request->tab;
            $output = view('layouts.shipment_detail.' . $tab, $data)->render();
        }
        return Response($output);
    }


    public function filtering(Request $request)
    {
        if ($request->ajax()) {
            // dd($request->all());
            $data = [];
            $data = [
                "page_title" => $this->plural . " List",
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
                ],
            ];
            $port_of_loading = $request->port_of_loading;
            $loading_date = $request->loading_date;
            $arrival_date = $request->arrival_date;
            $destination_port = $request->destination_port;
            // $records = new Shipment;
            // if(Auth::user()->hasRole('Customer')){
            //     $records = $records->where('customer_email', auth()->user()->email);
            // }
            if ($port_of_loading) {
                if ($port_of_loading != "") {
                    // $records = $records->where('loading_port', $port_of_loading);
                    $data['tab'] = 'loading_port';
                    $data['value'] = $port_of_loading;

                    
                }
            }
            if ($loading_date) {
                if ($loading_date != "") {
                    // $records = $records->orwhere('loading_date', $loading_date);
                    $data['tab'] = 'loading_date';
                    $data['value'] = $loading_date;
                }
            }
            if ($arrival_date) {
                if ($arrival_date != "") {
                    // $records = $records->orwhere('est_arrival_date', $arrival_date);
                    $data['tab'] = 'arrival_date';
                    $data['value'] = $arrival_date;
                }
            }

            if ($destination_port) {
                if ($destination_port != "") {
                    // $records = $records->orwhere('destination_port', $destination_port);
                    $data['tab'] = 'destination_port';
                    $data['value'] = $destination_port;
                }
            }
            // $records = $records->get();

            if ($port_of_loading == "all" || $destination_port == "all") {
                // $records = Shipment::all();
                $data['tab'] = 'all';
            }

            $output = view('layouts.shipment_filter.filtering', $data)->render();
            return Response($output);
        }
    }

    public function delete($id)
    {
        $data = ['shipment_id'=> null];
        $vehicles =  Shipment::with('vehicle')->where('id',$id)->get();
           foreach($vehicles[0]['vehicle'] as $vehi){
            $Obj = Vehicle::find($vehi['id']);
            $Obj->update($data);
        }
        $del = Shipment::find($id)->delete();
        if ($del) {
            return back()->with('success', 'Shipment Delete Successfully');
        } else {
            return back()->with('failed', 'Some Error Occurs');
        }
    }
    public function FetchStatusRecords(Request $request)
    {
        
        
        if ($request->ajax()) {


            if($request->columns[0]['data']['state'] != ''){

                if(Auth::user()->hasRole('Customer')){
                    $data = Shipment::with('vehicle')->where('status', $request->columns[0]['data']['tab'])->where('customer_email', auth()->user()->email)->where('loading_state', $request->columns[0]['data']['state'])->get();
                }
                else{
                    if($request->columns[0]['data']['tab'] == 'loading_port'){
                        $data = Shipment::with('vehicle')->where('loading_port', $request->columns[0]['data']['value'])->where('loading_state', $request->columns[0]['data']['state'])->get();
                    }
                    elseif($request->columns[0]['data']['tab'] == 'destination_port'){
                        $data = Shipment::with('vehicle')->where('destination_port', $request->columns[0]['data']['value'])->where('loading_state', $request->columns[0]['data']['state'])->get();
                    }
                    elseif($request->columns[0]['data']['tab'] == 'loading_date'){
                        $data = Shipment::with('vehicle')->where('loading_date', $request->columns[0]['data']['value'])->where('loading_state', $request->columns[0]['data']['state'])->get();
                    }
                    elseif($request->columns[0]['data']['tab'] == 'arrival_date'){
                        $data = Shipment::with('vehicle')->where('arrival_date', $request->columns[0]['data']['value'])->where('loading_state', $request->columns[0]['data']['state'])->get();
                    }
                    elseif($request->columns[0]['data']['tab'] == 'all'){
                        $data = Shipment::with('vehicle')->where('loading_state', $request->columns[0]['data']['state'])->get();
                    }
                    else{
                        $data = Shipment::with('vehicle')->where('status', $request->columns[0]['data']['tab'])->where('loading_state', $request->columns[0]['data']['state'])->get();
                    }
                }




            
            }
            else{


                if(Auth::user()->hasRole('Customer')){
                    $data = Shipment::with('vehicle')->where('status', $request->columns[0]['data']['tab'])->where('customer_email', auth()->user()->email)->get();
                }
                else{
                    if($request->columns[0]['data']['tab'] == 'loading_port'){
                        $data = Shipment::with('vehicle')->where('loading_port', $request->columns[0]['data']['value'])->get();
                    }
                    elseif($request->columns[0]['data']['tab'] == 'destination_port'){
                        $data = Shipment::with('vehicle')->where('destination_port', $request->columns[0]['data']['value'])->get();
                    }
                    elseif($request->columns[0]['data']['tab'] == 'loading_date'){
                        $data = Shipment::with('vehicle')->where('loading_date', $request->columns[0]['data']['value'])->get();
                    }
                    elseif($request->columns[0]['data']['tab'] == 'arrival_date'){
                        $data = Shipment::with('vehicle')->where('arrival_date', $request->columns[0]['data']['value'])->get();
                    }
                    elseif($request->columns[0]['data']['tab'] == 'all'){
                        $data = Shipment::with('vehicle')->get();
                    }
                    else{
                        $data = Shipment::with('vehicle')->where('status', $request->columns[0]['data']['tab'])->get();
                    }
                }
                
            }






           
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('id', function($row){
                    $data['row'] = $row;
                    // $data['vehicles'] = Vehicle::where('shipment_id', $row->id)->get();
                    
                    $data['img'] = Loading_Image::where('shipment_id', $row->id)->get();
                    // return $data['img'];
                    $data['image_path'] = $data['img'];
                    $output = view('layouts.shipment_filter.vehicle_table', $data)->render();
                    return $output;
                })
                ->addColumn('shipment_id', function($row){
                    $totalVehicles = Vehicle::where('shipment_id', $row->id)->count();
                    $vehicles = $totalVehicles;
                    return $vehicles;
                })
                ->addColumn('action', function ($row) {
                    $url_view = url('admin/shipments/profile/' . $row->id);
                    $url_delete = url('admin/shipments/delete/' . $row->id);
                    $url_edit = url('admin/shipments/edit/' . $row->id);
                    $id = $row->id;
               

                    $btn = "<button class='profile-button'>
                                            <a href='$url_view'>
                                                <svg width='14' height='13' viewBox='0 0 16 14' fill='none'
                                                    xmlns='http://www.w3.org/2000/svg'>
                                                    <path
                                                        d='M16 7C16 7 13 2.1875 8 2.1875C3 2.1875 0 7 0 7C0 7 3 11.8125 8 11.8125C13 11.8125 16 7 16 7ZM1.173 7C1.65651 6.35698 2.21264 5.7581 2.833 5.21237C4.12 4.0845 5.88 3.0625 8 3.0625C10.12 3.0625 11.879 4.0845 13.168 5.21237C13.7884 5.7581 14.3445 6.35698 14.828 7C14.77 7.07613 14.706 7.16013 14.633 7.252C14.298 7.672 13.803 8.232 13.168 8.78763C11.879 9.9155 10.119 10.9375 8 10.9375C5.88 10.9375 4.121 9.9155 2.832 8.78763C2.21165 8.2419 1.65552 7.64301 1.172 7H1.173Z'
                                                        fill='#048B52' />
                                                    <path
                                                        d='M8 4.8125C7.33696 4.8125 6.70107 5.04297 6.23223 5.4532C5.76339 5.86344 5.5 6.41984 5.5 7C5.5 7.58016 5.76339 8.13656 6.23223 8.5468C6.70107 8.95703 7.33696 9.1875 8 9.1875C8.66304 9.1875 9.29893 8.95703 9.76777 8.5468C10.2366 8.13656 10.5 7.58016 10.5 7C10.5 6.41984 10.2366 5.86344 9.76777 5.4532C9.29893 5.04297 8.66304 4.8125 8 4.8125ZM4.5 7C4.5 6.18777 4.86875 5.40882 5.52513 4.83449C6.1815 4.26016 7.07174 3.9375 8 3.9375C8.92826 3.9375 9.8185 4.26016 10.4749 4.83449C11.1313 5.40882 11.5 6.18777 11.5 7C11.5 7.81223 11.1313 8.59118 10.4749 9.16551C9.8185 9.73984 8.92826 10.0625 8 10.0625C7.07174 10.0625 6.1815 9.73984 5.52513 9.16551C4.86875 8.59118 4.5 7.81223 4.5 7Z'
                                                        fill='#048B52' />
                                                </svg>
                                            </a>
                                        </button>
                                        <button class='edit-button' id='$id' onclick='editShipment(this.id)'>
                    <a>
                        <svg width='14' height='13' viewBox='0 0 16 16' fill='none'
                            xmlns='http://www.w3.org/2000/svg'>
                            <path
                                d='M2.66708 14.0004C2.72022 14.0068 2.77394 14.0068 2.82708 14.0004L5.49375 13.3338C5.61205 13.3056 5.7204 13.2457 5.80708 13.1604L14.0004 4.94042C14.2488 4.69061 14.3881 4.35267 14.3881 4.00042C14.3881 3.64818 14.2488 3.31024 14.0004 3.06042L12.9471 2.00042C12.8233 1.87646 12.6762 1.77811 12.5143 1.71101C12.3525 1.64391 12.179 1.60938 12.0037 1.60938C11.8285 1.60938 11.655 1.64391 11.4932 1.71101C11.3313 1.77811 11.1842 1.87646 11.0604 2.00042L2.86708 10.1938C2.78094 10.2808 2.71891 10.3888 2.68708 10.5071L2.02042 13.1738C1.99645 13.26 1.99011 13.3502 2.00177 13.439C2.01342 13.5277 2.04284 13.6133 2.08826 13.6904C2.13368 13.7676 2.19417 13.8348 2.26613 13.888C2.33808 13.9413 2.42003 13.9795 2.50708 14.0004C2.56022 14.0068 2.61394 14.0068 2.66708 14.0004ZM12.0004 2.94042L13.0604 4.00042L12.0004 5.06042L10.9471 4.00042L12.0004 2.94042ZM3.94042 11.0071L10.0004 4.94042L11.0604 6.00042L4.99375 12.0671L3.58708 12.4138L3.94042 11.0071Z'
                                fill='#2C77E7' />
                        </svg>
                    </a>
                </button>
                                       
                                        <button class='delete-button'>
                                        <a href=$url_delete>
                                            <svg width='14' height='13' viewBox='0 0 12 12' fill='none'
                                                xmlns='http://www.w3.org/2000/svg'>
                                                <path
                                                    d='M5 3H7C7 2.73478 6.89464 2.48043 6.70711 2.29289C6.51957 2.10536 6.26522 2 6 2C5.73478 2 5.48043 2.10536 5.29289 2.29289C5.10536 2.48043 5 2.73478 5 3V3ZM4 3C4 2.46957 4.21071 1.96086 4.58579 1.58579C4.96086 1.21071 5.46957 1 6 1C6.53043 1 7.03914 1.21071 7.41421 1.58579C7.78929 1.96086 8 2.46957 8 3H10.5C10.6326 3 10.7598 3.05268 10.8536 3.14645C10.9473 3.24021 11 3.36739 11 3.5C11 3.63261 10.9473 3.75979 10.8536 3.85355C10.7598 3.94732 10.6326 4 10.5 4H10.059L9.616 9.17C9.57341 9.66923 9.34499 10.1343 8.97593 10.4732C8.60686 10.8121 8.12405 11.0001 7.623 11H4.377C3.87595 11.0001 3.39314 10.8121 3.02407 10.4732C2.65501 10.1343 2.42659 9.66923 2.384 9.17L1.941 4H1.5C1.36739 4 1.24021 3.94732 1.14645 3.85355C1.05268 3.75979 1 3.63261 1 3.5C1 3.36739 1.05268 3.24021 1.14645 3.14645C1.24021 3.05268 1.36739 3 1.5 3H4ZM7.5 6C7.5 5.86739 7.44732 5.74021 7.35355 5.64645C7.25979 5.55268 7.13261 5.5 7 5.5C6.86739 5.5 6.74021 5.55268 6.64645 5.64645C6.55268 5.74021 6.5 5.86739 6.5 6V8C6.5 8.13261 6.55268 8.25979 6.64645 8.35355C6.74021 8.44732 6.86739 8.5 7 8.5C7.13261 8.5 7.25979 8.44732 7.35355 8.35355C7.44732 8.25979 7.5 8.13261 7.5 8V6ZM5 5.5C5.13261 5.5 5.25979 5.55268 5.35355 5.64645C5.44732 5.74021 5.5 5.86739 5.5 6V8C5.5 8.13261 5.44732 8.25979 5.35355 8.35355C5.25979 8.44732 5.13261 8.5 5 8.5C4.86739 8.5 4.74021 8.44732 4.64645 8.35355C4.55268 8.25979 4.5 8.13261 4.5 8V6C4.5 5.86739 4.55268 5.74021 4.64645 5.64645C4.74021 5.55268 4.86739 5.5 5 5.5V5.5ZM3.38 9.085C3.4013 9.3347 3.51558 9.5673 3.70022 9.73676C3.88486 9.90621 4.12639 10.0002 4.377 10H7.623C7.87344 9.9999 8.11472 9.90584 8.29915 9.73642C8.48357 9.56699 8.59771 9.33453 8.619 9.085L9.055 4H2.945L3.381 9.085H3.38Z'
                                                    fill='#EF5757' />
                                            </svg>
                                        </a>
                                    </button>
                                    
                                        ";
                    return $btn;
                })
                ->rawColumns(['id','action','shipment_id'])
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

    public function serverside(Request $request, $state = null)
    {
        
        if ($request->ajax()) {

            
            if($state != null){
                if(Auth::user()->hasRole('Customer')){
                    $data = Shipment::with('vehicle')->where('customer_email', auth()->user()->email)->where('loading_state', $state)->get();
                }
                else{
                    $data = Shipment::with('vehicle')->where('loading_state', $state)->get();
                }
        }
        else{
            if(Auth::user()->hasRole('Customer')){
                $data = Shipment::with('vehicle')->where('customer_email', auth()->user()->email)->get();
            }
            else{
                $data = Shipment::with('vehicle')->get();
            }
        }



            
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('id', function($row){
                    $data['row'] = $row;
                    
                    $data['img'] = Loading_Image::where('shipment_id', $row->id)->get();
                    // return $data['img'];
                    $data['image_path'] = $data['img'];
                    $output = view('layouts.shipment_filter.vehicle_table', $data)->render();
                    return $output;
                })
                ->addColumn('shipment_id', function($row){
                    $totalVehicles = Vehicle::where('shipment_id', $row->id)->count();
                    $vehicles = $totalVehicles;
                    return $vehicles;
                })
                ->addColumn('notes', function($row){
                    $bol = view('layouts.shipment_filter.shipment_bol', $row)->render();
                    return $bol;
                })
                ->addColumn('action', function ($row) {
                    $url_view = url('admin/shipments/profile/' . $row->id);
                    $url_delete = url('admin/shipments/delete/' . $row->id);
                    $url_edit = url('admin/shipments/edit/' . $row->id);
                    $id = $row->id;
                

                    $btn = "<button class='profile-button'>
                                            <a href='$url_view'>
                                                <svg width='14' height='13' viewBox='0 0 16 14' fill='none'
                                                    xmlns='http://www.w3.org/2000/svg'>
                                                    <path
                                                        d='M16 7C16 7 13 2.1875 8 2.1875C3 2.1875 0 7 0 7C0 7 3 11.8125 8 11.8125C13 11.8125 16 7 16 7ZM1.173 7C1.65651 6.35698 2.21264 5.7581 2.833 5.21237C4.12 4.0845 5.88 3.0625 8 3.0625C10.12 3.0625 11.879 4.0845 13.168 5.21237C13.7884 5.7581 14.3445 6.35698 14.828 7C14.77 7.07613 14.706 7.16013 14.633 7.252C14.298 7.672 13.803 8.232 13.168 8.78763C11.879 9.9155 10.119 10.9375 8 10.9375C5.88 10.9375 4.121 9.9155 2.832 8.78763C2.21165 8.2419 1.65552 7.64301 1.172 7H1.173Z'
                                                        fill='#048B52' />
                                                    <path
                                                        d='M8 4.8125C7.33696 4.8125 6.70107 5.04297 6.23223 5.4532C5.76339 5.86344 5.5 6.41984 5.5 7C5.5 7.58016 5.76339 8.13656 6.23223 8.5468C6.70107 8.95703 7.33696 9.1875 8 9.1875C8.66304 9.1875 9.29893 8.95703 9.76777 8.5468C10.2366 8.13656 10.5 7.58016 10.5 7C10.5 6.41984 10.2366 5.86344 9.76777 5.4532C9.29893 5.04297 8.66304 4.8125 8 4.8125ZM4.5 7C4.5 6.18777 4.86875 5.40882 5.52513 4.83449C6.1815 4.26016 7.07174 3.9375 8 3.9375C8.92826 3.9375 9.8185 4.26016 10.4749 4.83449C11.1313 5.40882 11.5 6.18777 11.5 7C11.5 7.81223 11.1313 8.59118 10.4749 9.16551C9.8185 9.73984 8.92826 10.0625 8 10.0625C7.07174 10.0625 6.1815 9.73984 5.52513 9.16551C4.86875 8.59118 4.5 7.81223 4.5 7Z'
                                                        fill='#048B52' />
                                                </svg>
                                            </a>
                                        </button>
                                        <button class='edit-button' id='$id' onclick='editShipment(this.id)'>
                    <a>
                        <svg width='14' height='13' viewBox='0 0 16 16' fill='none'
                            xmlns='http://www.w3.org/2000/svg'>
                            <path
                                d='M2.66708 14.0004C2.72022 14.0068 2.77394 14.0068 2.82708 14.0004L5.49375 13.3338C5.61205 13.3056 5.7204 13.2457 5.80708 13.1604L14.0004 4.94042C14.2488 4.69061 14.3881 4.35267 14.3881 4.00042C14.3881 3.64818 14.2488 3.31024 14.0004 3.06042L12.9471 2.00042C12.8233 1.87646 12.6762 1.77811 12.5143 1.71101C12.3525 1.64391 12.179 1.60938 12.0037 1.60938C11.8285 1.60938 11.655 1.64391 11.4932 1.71101C11.3313 1.77811 11.1842 1.87646 11.0604 2.00042L2.86708 10.1938C2.78094 10.2808 2.71891 10.3888 2.68708 10.5071L2.02042 13.1738C1.99645 13.26 1.99011 13.3502 2.00177 13.439C2.01342 13.5277 2.04284 13.6133 2.08826 13.6904C2.13368 13.7676 2.19417 13.8348 2.26613 13.888C2.33808 13.9413 2.42003 13.9795 2.50708 14.0004C2.56022 14.0068 2.61394 14.0068 2.66708 14.0004ZM12.0004 2.94042L13.0604 4.00042L12.0004 5.06042L10.9471 4.00042L12.0004 2.94042ZM3.94042 11.0071L10.0004 4.94042L11.0604 6.00042L4.99375 12.0671L3.58708 12.4138L3.94042 11.0071Z'
                                fill='#2C77E7' />
                        </svg>
                    </a>
                </button>
                                       
                                        <button class='delete-button'>
                                        <a href=$url_delete>
                                            <svg width='14' height='13' viewBox='0 0 12 12' fill='none'
                                                xmlns='http://www.w3.org/2000/svg'>
                                                <path
                                                    d='M5 3H7C7 2.73478 6.89464 2.48043 6.70711 2.29289C6.51957 2.10536 6.26522 2 6 2C5.73478 2 5.48043 2.10536 5.29289 2.29289C5.10536 2.48043 5 2.73478 5 3V3ZM4 3C4 2.46957 4.21071 1.96086 4.58579 1.58579C4.96086 1.21071 5.46957 1 6 1C6.53043 1 7.03914 1.21071 7.41421 1.58579C7.78929 1.96086 8 2.46957 8 3H10.5C10.6326 3 10.7598 3.05268 10.8536 3.14645C10.9473 3.24021 11 3.36739 11 3.5C11 3.63261 10.9473 3.75979 10.8536 3.85355C10.7598 3.94732 10.6326 4 10.5 4H10.059L9.616 9.17C9.57341 9.66923 9.34499 10.1343 8.97593 10.4732C8.60686 10.8121 8.12405 11.0001 7.623 11H4.377C3.87595 11.0001 3.39314 10.8121 3.02407 10.4732C2.65501 10.1343 2.42659 9.66923 2.384 9.17L1.941 4H1.5C1.36739 4 1.24021 3.94732 1.14645 3.85355C1.05268 3.75979 1 3.63261 1 3.5C1 3.36739 1.05268 3.24021 1.14645 3.14645C1.24021 3.05268 1.36739 3 1.5 3H4ZM7.5 6C7.5 5.86739 7.44732 5.74021 7.35355 5.64645C7.25979 5.55268 7.13261 5.5 7 5.5C6.86739 5.5 6.74021 5.55268 6.64645 5.64645C6.55268 5.74021 6.5 5.86739 6.5 6V8C6.5 8.13261 6.55268 8.25979 6.64645 8.35355C6.74021 8.44732 6.86739 8.5 7 8.5C7.13261 8.5 7.25979 8.44732 7.35355 8.35355C7.44732 8.25979 7.5 8.13261 7.5 8V6ZM5 5.5C5.13261 5.5 5.25979 5.55268 5.35355 5.64645C5.44732 5.74021 5.5 5.86739 5.5 6V8C5.5 8.13261 5.44732 8.25979 5.35355 8.35355C5.25979 8.44732 5.13261 8.5 5 8.5C4.86739 8.5 4.74021 8.44732 4.64645 8.35355C4.55268 8.25979 4.5 8.13261 4.5 8V6C4.5 5.86739 4.55268 5.74021 4.64645 5.64645C4.74021 5.55268 4.86739 5.5 5 5.5V5.5ZM3.38 9.085C3.4013 9.3347 3.51558 9.5673 3.70022 9.73676C3.88486 9.90621 4.12639 10.0002 4.377 10H7.623C7.87344 9.9999 8.11472 9.90584 8.29915 9.73642C8.48357 9.56699 8.59771 9.33453 8.619 9.085L9.055 4H2.945L3.381 9.085H3.38Z'
                                                    fill='#EF5757' />
                                            </svg>
                                        </a>
                                    </button>
                                    
                                        ";
                    return $btn;
                })
                ->rawColumns(['id','action','shipment_id', 'notes'])
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

    public function filterShipmentt(Request $req)
    {

        if ($req->ajax()) {
            $data = [];

            if($req->state){

                if(Auth::user()->hasRole('Customer')){
                    $data['records'] = Shipment::where('customer_email', auth()->user()->email)->where('status', $req->id)->where('loading_state', $req->state)->get();
    
                }
                else{
                    $data['records'] = Shipment::where('loading_state', $req->state)->where('status', $req->id)->get();
                }


            }
            else{
                if(Auth::user()->hasRole('Customer')){
                    $data['records'] = Shipment::where('customer_email', auth()->user()->email)->where('status', $req->id)->get();
                }
                else{
                    $data['records'] = Shipment::where('status', $req->id)->get();
                }
            }

            
            $data['tab'] = $req->id;
            $data['state'] = $req->state;
            if($req->tab == 'Completed'){
                $output = view('layouts.shipment_filter.CompletedShipments', $data)->render();
            }
            else{
                $output = view('layouts.shipment_filter.filtering', $data)->render();
            }
            return Response($output);
        }
    }

    public function search_shipment(Request $req){
        $search_text = $req->searchText;
        $data = [];
        if ($req->searchText) {
            if(Auth::user()->hasRole('Customer')){
                $data['vehicles'] = Vehicle::where('added_by_user', auth()->user()->id)->where('vin', 'LIKE', '%' . $search_text . "%")->where('shipment_id', null)->whereshipment_status('0')->get()->toArray();
                // dd($data['vehicles']);

            }else{
                $data['vehicles'] = Vehicle::where('vin', 'LIKE', '%' . $search_text . "%")->where('shipment_id', null)->whereshipment_status('0')->get()->toArray();
                // dd($data['vehicles']);
            }
                
                $output = view('layouts.shipment_filter.filterVehicles', $data)->render();
                return Response($output);
        }


    }

    public function Customer_Details(Request $req){
        $customer_details = User::with('shippers')->where('company_name', $req->company_name)->get();
        return $customer_details;
    }

    public function add_vehicles(Request $req){
        // return $req->id;

        $vehicle = Vehicle::find($req->id);
        $vehicle->shipment_status = '1';
        $vehicle->save();


        $data  = [];

        $data['vehicles'] = Vehicle::where('id', $req->id)->get()->toArray();

        // $data['records'] = $records;
        $output = view('layouts.shipment_filter.checkVehicle', $data)->render();
        return Response($output);

        // return $data['vehicles'];
    }

    public function deleteFromCart(Request $req){
        $data = [];

        $vehicle = Vehicle::find($req->value);
        $vehicle->shipment_status = '0';
        $vehicle->save();



        $data = VehicleCart::find($req->id);

        if($data){
            $data->delete();
            return true;
        }
        else
        {
            return true;
        
        }


    }

    public function export()
    {
        return Excel::download(new ShipmentExport, 'shipment.xlsx');
    }
}