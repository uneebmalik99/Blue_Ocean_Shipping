<?php

namespace App\Http\Controllers;

use App\Exports\VehicleExport;
use App\Http\Controllers\Controller;
use App\Imports\VehicleImport;
use App\Models\AuctionCopy;
use App\Models\AuctionImage; 
use App\Models\AuctionInvoice;
use App\Models\BillOfSale;
use App\Models\Image;
use App\Models\VehicleCart;
use App\Models\ContainerSize;
use App\Models\LoadingPort;
use App\Models\MMS;
use App\Models\Make;
use App\Models\VehicleModel;
use App\Models\ImportVehicle;
use App\Models\Color;
use App\Models\Key;
use App\Models\Title;
use App\Models\TitleType;
use App\Models\Auction;
use App\Models\Warehouse;
use App\Models\BillingParty;
use App\Models\Shipper;
use App\Models\Location;
use App\Models\Notification;
use App\Models\OriginalTitle;
use App\Models\PickupImage;
use App\Models\Shipment;
use App\Models\ShipperName;
use App\Models\Site;
use App\Models\User;
use App\Models\Vehicle;
use App\Models\VehicleType;
use App\Models\VehicleStatus;
use App\Models\WarehouseImage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Storage;
use Yajra\Datatables\Datatables;
use PDF;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
// use Excel;

class VehicleController extends Controller
{

    private $type = "Vehicles";
    private $singular = "vehicle";
    private $plural = "Vehicles";
    private $view = "vehicle.";
    private $db_key = "id";
    private $user = [];
    private $perpage = 100;
    private $directory = "/vehicle_images";
    private $action = "/admin/vehicles";

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

        $data['vehicles_cart'] = VehicleCart::with('vehicle')->get()->toArray();
        // dd($data['vehicles_cart']);


        if(Auth::user()->hasRole('Customer')){

            $data['records'] = Vehicle::with('user','pickupimages')->where('added_by_user', auth()->user()->id)->where('status', 3)->get()->toArray();
            $data['new_orders'] = Vehicle::where('added_by_user', auth()->user()->id)->where('status', '1')->get();
            $data['dispatched'] = Vehicle::where('added_by_user', auth()->user()->id)->where('status', '2')->get();
            $data['on_hand'] = Vehicle::where('added_by_user', auth()->user()->id)->where('status', '3')->get();
            $data['no_titles'] = Vehicle::where('added_by_user', auth()->user()->id)->where('status', '4')->get();
            $data['towing'] = Vehicle::where('added_by_user', auth()->user()->id)->where('status', '5')->get();
            $data['location'] = Location::all();
            $data['status'] = VehicleStatus::limit(3)->get()->toArray();
            $data['make'] = MMS::select('make')->where('status', '1')->groupBy('make')->get()->toArray();
            $data['model'] = MMS::select('model')->where('status', '1')->groupBy('model')->get()->toArray();
        }
        else{
            $data['records'] = Vehicle::with('user','pickupimages')->where('status', 3)->get()->toArray();
            $data['new_orders'] = Vehicle::where('status', '1')->get();
            $data['dispatched'] = Vehicle::where('status', '2')->get();
            $data['on_hand'] = Vehicle::where('status', '3')->get();
            $data['no_titles'] = Vehicle::where('status', '4')->get();
            $data['towing'] = Vehicle::where('status', '5')->get();
            $data['location'] = Location::all();
            $data['status'] = VehicleStatus::limit(3)->get()->toArray();
            $data['make'] = MMS::select('make')->where('status', '1')->groupBy('make')->get()->toArray();
            $data['model'] = MMS::select('model')->where('status', '1')->groupBy('model')->get()->toArray();
        }

        $notification = $this->Notification();
        return view($this->view . 'list', $data, $notification);
    }

    public function changeState($state){
        if($state == 'All'){
            return redirect()->route('vehicle.list');
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

        $data['vehicles_cart'] = VehicleCart::with('vehicle')->get()->toArray();
        // dd($data['vehicles_cart']);


        if(Auth::user()->hasRole('Customer')){

            $data['records'] = Vehicle::with('user','pickupimages')->where('added_by_user', auth()->user()->id)->where('status', 3)->where('pickup_location', $state)->get()->toArray();
            $data['new_orders'] = Vehicle::where('added_by_user', auth()->user()->id)->where('status', '1')->where('pickup_location', $state)->get();
            $data['dispatched'] = Vehicle::where('added_by_user', auth()->user()->id)->where('status', '2')->where('pickup_location', $state)->get();
            $data['on_hand'] = Vehicle::where('added_by_user', auth()->user()->id)->where('status', '3')->where('pickup_location', $state)->get();
            $data['no_titles'] = Vehicle::where('added_by_user', auth()->user()->id)->where('status', '4')->where('pickup_location', $state)->get();
            $data['towing'] = Vehicle::where('added_by_user', auth()->user()->id)->where('status', '5')->where('pickup_location', $state)->get();
            $data['location'] = Location::all();
            $data['status'] = VehicleStatus::limit(3)->get()->toArray();
            $data['make'] = MMS::select('make')->where('status', '1')->groupBy('make')->get()->toArray();
            $data['model'] = MMS::select('model')->where('status', '1')->groupBy('model')->get()->toArray();
        }
        else{
            $data['records'] = Vehicle::with('user','pickupimages')->where('status', 3)->where('pickup_location', $state)->get()->toArray();
            $data['new_orders'] = Vehicle::where('status', '1')->where('pickup_location', $state)->get();
            $data['dispatched'] = Vehicle::where('status', '2')->where('pickup_location', $state)->get();
            $data['on_hand'] = Vehicle::where('status', '3')->where('pickup_location', $state)->get();
            $data['no_titles'] = Vehicle::where('status', '4')->where('pickup_location', $state)->get();
            $data['towing'] = Vehicle::where('status', '5')->where('pickup_location', $state)->get();
            $data['location'] = Location::all();
            $data['status'] = VehicleStatus::limit(3)->get()->toArray();
            $data['make'] = MMS::select('make')->where('status', '1')->groupBy('make')->get()->toArray();
            $data['model'] = MMS::select('model')->where('status', '1')->groupBy('model')->get()->toArray();
        }

        $notification = $this->Notification();
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
                'singular' => $this->singular,
                'plural' => $this->plural,
                'view' => $this->view,
                'db_key' => $this->db_key,
                'action' => $this->action,
                'page' => 'create',
                'button' => 'Create',
            ],
        ];
        
        $data['buyers'] = BillingParty::all();
        $data['customer_name'] = User::role('Customer')->get();
        $data['location'] = Location::all();
        $data['shipment'] = Shipment::all();
        $data['auctions'] = Auction::where('status', '1')->get();
        $data['colors'] = Color::where('status', '1')->get();
        $data['keys'] = Key::where('status', '1')->get();
        $data['titles'] = Title::where('status', '1')->get();
        $data['title_types'] = TitleType::where('status', '1')->get();
        $data['shipper_names'] = ShipperName::where('status', '1')->get();
        // $data['vehicle_make'] = Make::where('status', '1')->get();
        $data['vehicle_make'] = MMS::select('make')->where('status', '1')->groupBy('make')->get()->toArray();
        // dd($data['vehicle_make']);
        // $data['vehicle_types'] = VehicleType::all();
        // $data['shipper_name'] = Shipper::all();
        $data['vehicle_status'] = VehicleStatus::limit(3)->get();
        $data['warehouses'] = Warehouse::where('status', '1')->get();
        $data['sites'] = Site::where('status', '1')->get();
        $data['vehicle_types'] = VehicleType::where('status', '1')->get();
        if ($request->ajax()) {
            $tab = $request->tab;
            $output = view('layouts.vehicle_create.' . $tab, $data)->render();
            return Response($output);
        }

        if ($request->isMethod('post')) {
            $data = $request->all();
            $Obj = new Vehicle;
            $Obj->create($data);
            $vehicle = $Obj->latest()->first();
            return redirect($this->action)->with('success', 'Vehicle addedd successfully.');
        }

        $notification = $this->Notification();
        return view($this->view . 'create_edit', $data, $notification);
    }

    public function edit(Request $request, $id = null)
    {
        // dd($request->isMethod('get'));

        if ($request->isMethod('post')) {
            // dd('kashif');
            $data = $request->all();
            $Obj = Vehicle::find($id);
            $Obj->update($data);
            return redirect($this->action)->with('success', 'Edited successfully.');
        }

        $action = url($this->action . '/edit/' . $id);
        $data = [];
        $data = [
            "page_title" => "Edit " . $this->singular,
            "page_heading" => "Edit " . $this->singular,
            "button_text" => "Update ",
            "breadcrumbs" => array("dashboard" => "Dashboard", "#" => $this->plural . " List"),
            'action' => $action,
            "module" => [
                'type' => $this->type,
                'singular' => $this->singular,
                'plural' => $this->plural,
                'view' => $this->view,
                'db_key' => $this->db_key,
                'action' => $this->action,
                'page' => 'edit',
                'button' => 'Next',
            ],
        ];
        if ($request->ajax()) {
            $id = $request->id;
            $data['user'] = Vehicle::with('vehicle_status')->where('id', $id)->get()->toArray();
            $data['update_buyer_id'] = User::with('billings')->wherecompany_name($data['user'][0]['customer_name'])->get()->toArray();
            // dd($data['update_buyer_id']);
            // $Obj_vehicle = new Vehicle;
            // $data['user'] = $Obj_vehicle->find($id)->toArray();
            $data['buyers'] = BillingParty::all();
            $data['buyers_number'] = BillingParty::with('customer.vehicles')->get()->toArray();
            $data['location'] = Location::all();
            $data['shipment'] = Shipment::all();
            $data['vehicle_make'] = MMS::select('make')->where('status', '1')->groupBy('make')->get()->toArray();
            $data['auctions'] = Auction::where('status', '1')->get();
            $data['vehicle_types'] = VehicleType::where('status', '1')->get();
            $data['colors'] = Color::where('status', '1')->get();
            $data['vehicle_status'] = VehicleStatus::limit(3)->get();
            $data['warehouses'] = Warehouse::where('status', '1')->get();
            $data['sites'] = Site::where('status', '1')->get();
            $data['keys'] = Key::where('status', '1')->get();
            $data['titles'] = Title::where('status', '1')->get();
            $data['title_types'] = TitleType::where('status', '1')->get();
            $data['shipper_names'] = ShipperName::where('status', '1')->get();
            $data['customer_name'] = User::role('Customer')->get();
            $output = view('layouts.vehicle_create.general', $data)->render();
            return Response($output);
        }
        $notification = $this->Notification();
        $data['buyers'] = User::where('role_id', '4')->get();
        $data['vehicle'] = Vehicle::with('user')->find($id)->toArray();
        return view($this->view . 'create_edit', $data, $notification);
    }

    public function delete($id = null)
    {
        $Vehicle = Vehicle::find($id);
        $Vehicle->delete();
        return redirect($this->action);
    }

    public function filtering(Request $request)
    {
        if ($request->ajax()) {
            $output = [];
            $output = [
                'module' => [
                    'db_key' => $this->db_key,
                ],
            ];
            $table = "";
            $page = "";

            if(Auth::user()->hasRole('Customer')){
                $total = Vehicle::where('added_by_user', auth()->user()->id)->get()->toArray();
                $records = Vehicle::with('user')->where('added_by_user', auth()->user()->id);
            }
            else{
                $total = Vehicle::all()->toArray();
                $records = Vehicle::with('user');
            }
            // $total = Vehicle::all()->toArray();
            // $records = Vehicle::with('user');
            $warehouse = $request->warehouse;
            $year = $request->year;
            $make = $request->make;
            $model = $request->model;
            $status = $request->status;
            $status_name = $request->status_name;

            if ($warehouse) {
                if ($warehouse != "") {
                    if ($warehouse == "all") {
                        $records = $records->with('vehicle_status')->get()->toArray();
                    } else {
                        $records = $records->with('vehicle_status')->where('title_state', $warehouse)->get()->toArray();
                    }
                }
            }

            if ($year) {
                if ($year != "") {
                    if ($year == "all") {
                        $records = Vehicle::with('user', 'vehicle_status')->get()->toArray();
                    }
                    else{

                        $records = $records->where('year', $year)->get()->toArray();
                    }
                }
            }
            if ($make) {
                if ($make != "") {
                    $records = $records->where('make', $make)->get()->toArray();       
                }
            }
            if ($model) {
                if ($model != "") {
                    $records = $records->where('model', $model)->get()->toArray();
                }
            }
            if ($status) {
                if ($status != "") {
                    if ($status == 'all') {
                        $records = Vehicle::all();

                    } else {
                        $records = Vehicle::with('user', 'vehicle_status')->where('status', $status)->paginate($this->perpage);
                        $data['records'] = $records;
                        $output['view'] = view('vehicle.' . $status_name, $data)->render();
                        return Response($output);
                    }
                }
            }
            $output['records'] = $records;
            return view('layouts.vehicle.FilterTable', $output)->render();
        }
    }

    public function create_form(Request $request)
    {
        $vehicle = [];
        $request->validate([
            'customer_name' => 'required',
            'vin' => 'required',
            
            'auction' => 'required',
            'buyer_id' => 'required',
            'key' => 'required',
            'status' => 'required',
        ]);
        $data = $request->all();
        $vin['vin'] = $data['vin'];
        $tab = $data['tab'];
        unset($data['tab']);
        $Obj = new Vehicle;
        if($request->id === null)
    {
        $new = $Obj->create($data);
        $Obj_vehicle = $Obj->where('vin', $data['vin'])->get();
        switch ($tab) {
            case ('general'):
                $output['view'] = view('layouts.vehicle_create.attachments', $vin)->render();
                break;
        }
        return Response($output);
    }
    else{
        $vehicle['vehicles'] = Vehicle::with('pickupimages','originaltitles', 'billofsales','auction_image', 'warehouse_image')->where('id', $request->id)->get()->toArray();
        // dd($vehicle['vehicles']);
        $obj = Vehicle::find($request->id);
        $obj->update($data);
        $Obj_vehicle = $obj->where('vin', $data['vin'])->get();
        switch ($tab) {
            case ('general'):
                $output['view'] = view('layouts.vehicle_create.attachments', $vin, $vehicle)->render();
                break;
        }
        return Response($output);
    }
        
    }
    public function store_image(Request $request)
    {
        // dd($request->all());


        // $data = $request->all();
        // if($request->auction_old){
        //     dd($request->auction_old);
        // }

        $output = [];
        $auction_invoice = $request->file("auction_invoice");
        $auction_copy = $request->file("auction_copy");
        $auction_images = $request->file("auction_images");
        $warehouse_images = $request->file("warehouse_images");
        $billofsales = $request->file("billofsales");
        $originaltitle = $request->file("originaltitle");
        $pickup = $request->file("pickup");
        // dd($pickup);

        $Obj = new Vehicle;
        $Obj_vehicle = $Obj->where('vin', $request->vin)->get();
        // dd($Obj_vehicle[0]['id']);


        if($request->auction_old){
            $auction_old_images = AuctionImage::where('vehicle_id', $Obj_vehicle[0]['id'])->get();
            foreach($auction_old_images as $old_images){
                if (in_array($old_images['id'], $request->auction_old)){
                }
                else{
                    $delete = AuctionImage::find($old_images['id'])->delete();
                }
            }
        }

        if($request->pickup_old){
            $pickup_old_images = PickupImage::where('vehicle_id', $Obj_vehicle[0]['id'])->get();
            foreach($pickup_old_images as $old_images){
                if (in_array($old_images['id'], $request->pickup_old)){
                }
                else{
                    $delete = PickupImage::find($old_images['id']);
                    $delete->delete();
                }
            }
        }


        if($request->warehouse_old){
            $warehouse_old_images = WarehouseImage::where('vehicle_id', $Obj_vehicle[0]['id'])->get();
            foreach($warehouse_old_images as $old_images){
                if (in_array($old_images['id'], $request->warehouse_old)){
                }
                else{
                    $delete = WarehouseImage::find($old_images['id']);
                    $delete->delete();
                }
            }
        }




       

    
        if($auction_invoice){
            $Obj_auctionInvoice = new AuctionInvoice;
            foreach ($auction_invoice as $auctiofile) {
                $file_name = time() . '.' . $auctiofile->extension();
                $filename = Storage::putFile($this->directory, $auctiofile);
                $type = $auctiofile->extension();
                $doc = $auctiofile->move(public_path($this->directory), $filename);
                $size = $doc->getSize() / 1000;
                $Obj_auctionInvoice->vehicle_id = $Obj_vehicle[0]['id'];
                $Obj_auctionInvoice->name = $filename;
                $Obj_auctionInvoice->type = $type;
                $Obj_auctionInvoice->size = $size . ' kb';
                $Obj_auctionInvoice->save();
                $output['result'] = "Success";
            }
            
        }

        if($auction_copy){
            $Obj_auctionCopy = new AuctionCopy;
            foreach ($auction_copy as $auctiocopy) {
                $file_name = time() . '.' . $auctiocopy->extension();
                $filename = Storage::putFile($this->directory, $auctiocopy);
                $type = $auctiocopy->extension();
                $doc = $auctiocopy->move(public_path($this->directory), $filename);
                $size = $doc->getSize() / 1000;
                $Obj_auctionCopy->vehicle_id = $Obj_vehicle[0]['id'];
                $Obj_auctionCopy->name = $filename;
                $Obj_auctionCopy->type = $type;
                $Obj_auctionCopy->size = $size . ' kb';
                $Obj_auctionCopy->save();
                $output['result'] = "Success";
            }
            
        }


        
        if($auction_images){
            $Obj_auctionImages = new AuctionImage;
            foreach ($auction_images as $auctionImages) {
                $file_name = time() . '.' . $auctionImages->extension();
                $filename = Storage::putFile($this->directory, $auctionImages);
                $type = $auctionImages->extension();
                $doc = $auctionImages->move(public_path($this->directory), $filename);
                $data = [
                    'name' => $filename,
                    'thumbnail' => $file_name,
                    'vehicle_id' => $Obj_vehicle[0]['id'],
                ];
                // dd($data);
                $Obj_auctionImages->create($data);
                $output['result'] = "Success";
            }   
        }

        if($billofsales){
            // dd($billofsales);
            $Obj_billofsales = new BillOfSale;
            foreach ($billofsales as $billofsales) {
                $file_name = time() . '.' . $billofsales->extension();
                $filename = Storage::putFile($this->directory, $billofsales);
                $type = $billofsales->extension();
                $doc = $billofsales->move(public_path($this->directory), $filename);
                $data = [
                    'name' => $filename,
                    'thumbnail' => $file_name,
                    'vehicle_id' => $Obj_vehicle[0]['id'],
                ];
                $Obj_billofsales->create($data);
                $output['result'] = "Success";
            }
        }


        if($warehouse_images){
            $Obj_warehouseImages = new WarehouseImage;
            foreach ($warehouse_images as $warehouseImages) {
                $file_name = time() . '.' . $warehouseImages->extension();
                $filename = Storage::putFile($this->directory, $warehouseImages);
                $type = $warehouseImages->extension();
                $doc = $warehouseImages->move(public_path($this->directory), $filename);
                $data = [
                    'name' => $filename,
                    'thumbnail' => $file_name,
                    'vehicle_id' => $Obj_vehicle[0]['id'],
                ];
                $Obj_warehouseImages->create($data);
                $output['result'] = "Success";
            }
            
        }

        if($originaltitle){
            $Obj_originaltitle = new OriginalTitle;
            foreach ($originaltitle as $originaltitle) {
                $file_name = time() . '.' . $originaltitle->extension();
                $filename = Storage::putFile($this->directory, $originaltitle);
                $type = $originaltitle->extension();
                $doc = $originaltitle->move(public_path($this->directory), $filename);
                $data = [
                    'name' => $filename,
                    'thumbnail' => $file_name,
                    'vehicle_id' => $Obj_vehicle[0]['id'],
                ];
                $Obj_originaltitle->create($data);
                $output['result'] = "Success";
            }   
        }
        
        if($pickup){
            $Obj_pickup = new PickupImage;
            foreach ($pickup as $pickup) {
                $file_name = time() . '.' . $pickup->extension();
                $filename = Storage::putFile($this->directory, $pickup);
                $type = $pickup->extension();
                $doc = $pickup->move(public_path($this->directory), $filename);
                $data = [
                    'name' => $filename,
                    'thumbnail' => $file_name,
                    'vehicle_id' => $Obj_vehicle[0]['id'],
                ];
                $Obj_pickup->create($data);
                $output['result'] = "Success";
            }
            
        }

        // $i = 0;
        // if ($request->hasFile('images')) {
            //     foreach ($images as $image) {
                //         switch ($tab) {
                    //             case ('auction'):
                        //                 $Obj_image = new AuctionImage;
                        //                 $this->directory = "/auction_images";
        //                 break;
        //             case ('warehouse'):
        //                 $Obj_image = new WarehouseImage;
        //                 $this->directory = "/warehouse_images";
        //                 break;
        //             case ('billofsales'):
        //                 $Obj_image = new BillOfSale;
        //                 $this->directory = "/billofsales_images";
        //                 break;
        //             case ('originalTitle'):
        //                 $Obj_image = new OriginalTitle;
        //                 $this->directory = "/OriginalTitle_images";
        //                 break;
        //             case ('pickup'):
        //                 $Obj_image = new PickupImage;
        //                 $this->directory = "/pickup_images";
        //                 break;
        //         }
        //         $image_name = time() . '.' . $image->extension();
        //         $filename = Storage::putFile($this->directory, $image);
        //         $image->move(public_path($this->directory), $filename);
        //         $Obj_image->vehicle_id = $Obj_vehicle[0]['id'];
        //         $Obj_image->name = $filename;
        //         $Obj_image->thumbnail = $image_name;
        //         $Obj_image->save();
        //         $output['result'] = "Success" . $i;
        //         $i++;
        //     }
        // }

        // if ($request->hasFile('name')) {
        //     // dd($tab);
        //     switch ($tab) {
        //         case ('invoice'):
        //             $Obj_file = new AuctionInvoice;
        //             $this->directory = "/auction_invoices";

        //             break;
        //         case ('auction_copy'):
        //             $Obj_file = new AuctionCopy;
        //             $this->directory = "/auction_copies";
        //             break;
        //     }
        //     $filename = Storage::putFile($this->directory, $documents);
        //     $type = $documents->extension();
        //     $doc = $documents->move(public_path($this->directory), $filename);
        //     // dd($doc->getSize() / 1000);/
        //     $size = $doc->getSize() / 1000;
            
        //     $Obj_file->vehicle_id = $Obj_vehicle[0]['id'];
        //     $Obj_file->name = $filename;
        //     $Obj_file->type = $type;
        //     $Obj_file->size = $size . ' kb';
            
        //     $Obj_file->save();

        //     $output['result'] = "Success";

        // }
        return Response($output);
        // return Response($output);
    }
    
    public function export($id)
    {
        return Excel::download(new VehicleExport($id), 'vehicles.xlsx');
    }

    public function import(Request $request)
    {
       
        
        if ($request->ajax()) {
            $output = view('layouts.vehicle.import_vehicles')->render();
            return Response($output);
        }
       

        if($request->file('import_document') == null){
            return redirect()->route('vehicle.list')->with('fail', "Please Select file then submit");
        }
        $path1 = $request->file('import_document')->store('temp');
        $path = storage_path('app').'/'.$path1;
        // $path = $request->file('import_document')->getRealPath();
        $data =  Excel::toArray([], $path);

       $vehicle_array = [];

        foreach($data as $value){
            // dd($value);
            $i = 1;
            foreach($value as $row){
                if($i != 1){
                    // dd($row);
                    if($row[0] != null && $row[1] != null && $row[2] != null && $row[3] != null && $row[4] != null && $row[5] != null && $row[6] != null && $row[7] != null && $row[8] != null && $row[9] != null && $row[10] != null && $row[11] != null && $row[20] != null ){
                        array_push($vehicle_array, $row);
                    }
                    else{
                        dd('your file not according to revolution criteria');
                    }
                }
                $i++;
            }

        }
        $import_vehicle = [];
        foreach($vehicle_array as $newValues){
            $import_vehicle = [
                'customer_name' => '',
                'vin' => $newValues[1],
                'year' => $newValues[2],
                'make' => $newValues[3],
                'model' => $newValues[4],
                'vehicle_type' => $newValues[5],
                'color' => $newValues[6],
                'weight' => $newValues[7],
                'value' => $newValues[8],
                'auction' => $newValues[9],
                'buyer_id' => $newValues[10],
                'key' => $newValues[11],
                'note' => $newValues[12],
                'hat_number' => $newValues[13],
                'title_type' => $newValues[14],
                'title' => $newValues[15],
                'title_rec_date' => $newValues[16],
                'title_state' => $newValues[17],
                'title_number' => $newValues[18],
                'shipper_name' => null,
                'status' => 1,
                'sale_date' => $newValues[21],
                'paid_date' => $newValues[22],
                'days' => $newValues[23],
                'posted_date' => $newValues[24],
                'pickup_date' => $newValues[25],
                'delivered' => $newValues[26],
                'delivered_date' => $newValues[27],
                'pickup_location' => $newValues[28],
                'site' => $newValues[29],
                'dealer_fee' => $newValues[30],
                'late_fee' => $newValues[31],
                'auction_storage' => $newValues[32],
                'towing_charges' => $newValues[33],
                'warehouse_storage' => $newValues[34],
                'title_fee' => $newValues[34],
                'port_detention_fee' => $newValues[35],
                'custom_inspection' => $newValues[36],
                'additional_fee' => $newValues[37],
                'insurance' => $newValues[38],
                'fee' => $newValues[39],
                'customer_paying_fee' => $newValues[40],
                'profit' => $newValues[41],
                'paid_by' => $newValues[42],
                'bidder' => $newValues[43],
                'lot' => $newValues[44],
                'entry_date' => $newValues[45],
                'age' => $newValues[46],
                'assign_date' => $newValues[47],
                'description' => $newValues[48],
                'dispatch_date' => $newValues[49],
                'port' => null,
                'vehicle_is_deleted' => $newValues[51],
                'shipment_id' => $newValues[52],
                'added_by_user' => $newValues[53],
            ];
            ImportVehicle::create($import_vehicle);
         }
    

        // Excel::import(new VehicleImport, $vehicle_array);
        return redirect()->route('vehicle.list')->with('success', "Vehicles imported successfully!");
    }

    public function profile($id)
    {
        $action = url($this->action . '/profile/');
        $data = [
            'vehicle' => Vehicle::with(['pickupimages', 'vehicle_status', 'billofsales'])->find($id)->toArray(),
            "page_title" => "Vehicle Detail",
            "page_heading" => "Profile " . $this->singular,
            "button_text" => "Update ",
            "breadcrumbs" => array("dashboard" => "Dashboard", "#" => $this->plural . " List"),
            'action' => $action,
            "module" => [
                'type' => $this->type,
                'singular' => $this->singular,
                'plural' => $this->plural,
                'view' => $this->view,
                'db_key' => $this->db_key,
                'action' => $this->action,
                'page' => 'profile',
                'button' => 'Update',
            ],
        ];
        $data['vehicles_cart'] = VehicleCart::with('vehicle')->get()->toArray();

// dd($data['vehicle']);
        $notification = $this->Notification();
        return view($this->view . 'profile', $data, $notification);

    }

    public function profile_tab(Request $request)
    {

        $id = $request->id;
        $tab = $request->tab;

        $data = [];

        $data['vehicle'] = Vehicle::with(['pickupimages', 'vehicle_status', 'billofsales', 'originaltitles'])->find($id)->toArray();
        // dd($data['vehicle']);

        $output = view('layouts.vehicle_information.' . $tab, $data)->render();

        return Response($output);

    }
    public function changesImages(Request $request)
    {

        $data = [];
        $output = [];
        $id = $request->id;
        // return $request->tab;

        if ($request->tab == 'auction_images') {
            $data['images'] = AuctionImage::where('vehicle_id', $request->id)->get()->toArray();
            $url = url('public/');
        } else if ($request->tab == 'warehouse_images') {
            $data['images'] = WarehouseImage::where('vehicle_id', $request->id)->get()->toArray();
            $url = url('public/');
        } else {
            $data['images'] = PickupImage::where('vehicle_id', $request->id)->get()->toArray();
            $url = url('public/');
        }
        // return $data['images'];
        $output['main_image'] =view('layouts.vehicle_information.Vehicle_image',$data)->render();
        $output['images'] = view('layouts.vehicle_information.Vehicle_images', $data)->render();

        // foreach ($data['images'] as $img) {
        //     $output['images'] = '
        //  <img src=' . $url . '/' . $img['name'] . ' alt=" " style="width:120px!important;height:80px!important;" class="item_1">
        // ';
        // }

        return Response($output);
    }

    public function serverside(Request $request)
    {
        if ($request->ajax()) {
            if(Auth::user()->hasRole('Customer')){
                $data = Vehicle::with('vehicle_status')->where('added_by_user', auth()->user()->id)->get()->toArray();
            }
            else{
                $data = Vehicle::with('vehicle_status')->get()->toArray();
            }
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('status', function($row){
                $status = "<div>".$row['vehicle_status']['status_name']."</div>";
                return $status;
                })
                ->addColumn('action', function ($row) {
                    $url_view = url('admin/vehicle/profile/' . $row['id']);
                    $url_delete = url('admin/vehicles/delete/' . $row['id']);
                    $url_edit = url('admin/vehicles/edit/' . $row['id']);
                    $id = $row['id'];
                    $btn = "<button class='profile-button'><a href=$url_view>
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
                       <button class='edit-button' onclick='updatevehicle(this.id)' id=$id
                       style='cursor: pointer !important;'>
                                            <svg width='14' height='13' viewBox='0 0 16 16' fill='none'
                                                xmlns='http://www.w3.org/2000/svg'>
                                                <path
                                                    d='M2.66708 14.0004C2.72022 14.0068 2.77394 14.0068 2.82708 14.0004L5.49375 13.3338C5.61205 13.3056 5.7204 13.2457 5.80708 13.1604L14.0004 4.94042C14.2488 4.69061 14.3881 4.35267 14.3881 4.00042C14.3881 3.64818 14.2488 3.31024 14.0004 3.06042L12.9471 2.00042C12.8233 1.87646 12.6762 1.77811 12.5143 1.71101C12.3525 1.64391 12.179 1.60938 12.0037 1.60938C11.8285 1.60938 11.655 1.64391 11.4932 1.71101C11.3313 1.77811 11.1842 1.87646 11.0604 2.00042L2.86708 10.1938C2.78094 10.2808 2.71891 10.3888 2.68708 10.5071L2.02042 13.1738C1.99645 13.26 1.99011 13.3502 2.00177 13.439C2.01342 13.5277 2.04284 13.6133 2.08826 13.6904C2.13368 13.7676 2.19417 13.8348 2.26613 13.888C2.33808 13.9413 2.42003 13.9795 2.50708 14.0004C2.56022 14.0068 2.61394 14.0068 2.66708 14.0004ZM12.0004 2.94042L13.0604 4.00042L12.0004 5.06042L10.9471 4.00042L12.0004 2.94042ZM3.94042 11.0071L10.0004 4.94042L11.0604 6.00042L4.99375 12.0671L3.58708 12.4138L3.94042 11.0071Z'
                                                    fill='#2C77E7'/>
                                            </svg>
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
                   </button>";
                    return $btn;
                })
                ->rawColumns(['action', 'status'])
                ->make(true);
        }
        return back();
    }

    public function fetchVehicles(Request $req)
    {
        
        if ($req->ajax()) {
            $output = [];
            $table = "";
            $page = "";
            $status = $req->id;
            $status_name = $req->tab;

            if($req->state){
                if(Auth::user()->hasRole('Customer')){  
                    $total = Vehicle::where('added_by_user', auth()->user()->id)->where('pickup_location', $req->state)->get();
                    $records = Vehicle::with('user')->where('added_by_user', auth()->user()->id);
                }
                else{
                    $total = Vehicle::where('pickup_location', $req->state)->get()->toArray();
                    $records = Vehicle::with('user','pickupimages')->where('pickup_location', $req->state);
                }
            }
            else{
                if(Auth::user()->hasRole('Customer')){  
                    $total = Vehicle::where('added_by_user', auth()->user()->id)->get();
                    $records = Vehicle::with('user')->where('added_by_user', auth()->user()->id);
                }
                else{
                    $total = Vehicle::all()->toArray();
                    $records = Vehicle::with('user','pickupimages');
                }
            }



          
            if ($status) {
                $records = $records->where('status', $status)->paginate($this->perpage);
                $data['records'] = $records;
                $output['view'] = view('vehicle.' . $status_name, $data)->render();
                return Response($output);
            }

        }
    }

    public function FetchModel(Request $req){
        $data = [];
        $output = [];

        // $data['state'] = MMS::where('make', $req->make_id)->where('status', '1')->get()->toArray();
        $data['state'] = MMS::select('model')->where('make', $req->make_id)->where('status', '1')->groupBy('model')->get()->toArray();

        // dd($data['state']);

        $output = view('layouts.vehicle_create.fetchModel', $data)->render();

        return Response($output);
    }

    public function SelectedDelete(Request $req){
        $del = Vehicle::whereIn('id', $req->ids)->delete();
        if($del){
            return response()->json(['success'=>'All Selected Vehicles Deleted Successfully!']);
        }
    }

    public function createpdf(){
        return view('vehicle.vehiclepdf');
    }
    public function exportpdf(){
            $pdf = PDF::LoadView('vehicle.vehiclepdf');
            return $pdf->stream('invoice.pdf', array("Attachment" => false));
    }

    public function getbuyersids(Request $request){
        $data = [];
        $output = [];
        $data['buyerids'] = User::with('billings')->where('company_name', $request->company_name)->get()->toArray();
        // dd($data['buyerids']);
        $output = view('layouts.vehicle_create.buyerIds' , $data)->render();
        // dd($output);
        return Response($output);
    }


    public function assignToCustomer(Request $request){
        $data = [];
        $assign_vehicle = ImportVehicle::where('id', $request->vehicle_id)->get()->toArray();
        $assign_vehicle[0]['added_by_user'] = $request->customer_id;
        unset($assign_vehicle[0]['id']);
        $data = $assign_vehicle;
        $obj = new Vehicle;
        $obj->create($data[0]);
        if($obj){
            // $assign_vehicle->delete();
            ImportVehicle::find($request->vehicle_id)->delete();
            return 'Assign To Customer Successfully';
        }

    }


    public function AddToCart(Request $request){

        $data = [];
        $data['vehicle_id'] = $request->vehicle_id;

        $vehicle = Vehicle::find($request->vehicle_id);
        $vehicle->shipment_status = '1';
        $vehicle->save();

        $check = VehicleCart::wherevehicle_id($request->vehicle_id)->get()->toArray();
        if($check == null){
            // dd($check);
            $ch = VehicleCart::create($data);
            if($ch){
                return 'Vehicle added to cart successfully!';
               }
               else{
                return 'Some Error Occurs';
               }
        
        }
        else{
            // dd('exit');
            return 'Vehicle Already Exits In Cart';
        }

       


    }

}
