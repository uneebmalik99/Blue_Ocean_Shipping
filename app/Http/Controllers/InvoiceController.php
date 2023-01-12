<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Export;
use App\Models\Invoice;
use App\Models\Consignee;
use App\Models\Notification;
use App\Models\Shipment;
use App\Models\Vehicle;
use Carbon\Carbon;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use LDAP\Result;
use Illuminate\Support\Facades\Storage;
use App\Models\VehicleCart;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    private $type = "Invoice";
    private $singular = "invoice";
    private $plural = "Invoices";
    private $view = "invoice.";
    private $db_key = "id";
    private $user = [];
    private $perpage = 100;
    private $directory = "/invoice_images";
    private $action = "/admin/invoices";

    public function Notification()
    {
        $data['notification'] = Notification::with('user')->get();
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
            $unread = Notification::with('user')->where('status', '0')->get();
            $data['notification_count'] = count($unread);
        } else {
        }
        // dd($data);
        return $data;
    }

    public function index()
    {
        $data = [];

        // dd($data);

        $data = [
            "page_title" => $this->plural . " List",
            "page_heading" => $this->plural . ' List',
            'records' => Invoice::with('user')->get()->toArray(),
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

        $notification = $this->Notification();
        return view($this->view . 'list', $data, $notification);
    }

    public function create_invoice(Request $request,$id = null){
        
        $data['invoice'] =Invoice::with('vehicle')->where('id', $request->id)->get()->toArray();
        
        $output = view('invoice.create_edit',$data)->render();
        return Response($output);
    }
    public function create(Request $request)
    {
     
        if ($request->isMethod('post')) {
            $invoice = $request->all();
            $obj = new Invoice;
            $result = $obj->create($invoice);
            return back();
        }

        $data = [];
        $action = url($this->action . '/create');
        $data = [
            "page_title" => $this->plural . " List",
            "page_heading" => $this->plural . ' List',
            "breadcrumbs" => array('#' => $this->plural . " List"),
            "action" => $action,
            "module" => [
                'type' => $this->type,
                'singular' => $this->singular,
                'plural' => $this->plural,
                'view' => $this->view,
                'db_key' => $this->db_key,
                'page' => 'list',
            ],
        ];
        $data['export'] = Export::all()->toArray();
        $data['customer'] = Consignee::all();
        $notification = $this->Notification();
        return view($this->view . 'create_edit', $data, $notification);
    }


    public function update(Request $request, $id = null)
    {

        if ($request->isMethod('post')) {
            $invoice = $request->all();
            $obj = new Invoice;
            $result = $obj->update($invoice);
            return back();
        }

        $data = [];
        $action = url($this->action . '/create');
        $data = [
            "page_title" => $this->plural . " List",
            "page_heading" => $this->plural . ' List',
            "breadcrumbs" => array('#' => $this->plural . " List"),
            "action" => $action,
            "module" => [
                'type' => $this->type,
                'singular' => $this->singular,
                'plural' => $this->plural,
                'view' => $this->view,
                'db_key' => $this->db_key,
                'page' => 'list',
            ],
        ];
        $data['invoices'] = Invoice::with('export', 'consignee')->where('id', $id)->get();
        $data['export'] = Export::all()->toArray();
        $data['customer'] = Consignee::all();
        $notification = $this->Notification();
        return view($this->view . 'create_edit', $data, $notification);
    }
   
    public function delete( $id = null){
                $data= Invoice::find($id);
                $data->delete();
                return back();
    }

    public function fetchShipment(Request $request){

        $data = [];
        $data['shipments'] = Shipment::with('vehicle')->wherecontainer_no($request->ar_number)->get()->toArray();
        return Response($data);
        // dd($data['shipments']);

    }
    public function saveInovice(Request $req){
        
        $data = [];
        $output = [];
        $data = $req->all();
        if(empty($data['vehicles'])){
            return 'Invoice can not be generated';
        }
        if(isset($req->id)){
            if($req->invoice_document){
                $file = $data['invoice_document'];
                $file_name = time() . '.' . $file->extension();
                $docname = Storage::putFile($this->directory, $file);
                $file->move(public_path($this->directory), $docname);
                $data['invoice_document'] = $docname;        
            }
            else{
                unset($data['invoice_document']);
            }
           
            $output['vehicle'] = $data['vehicles'];
            $data['added_by_role'] = auth()->user()->id;
            $id = $data['id'];
            unset($data['vehicles']);
            unset($data['id']);
            unset($data['_token']);
            $invoice = Invoice::whereid($req->id)->update($data);

                
            if($invoice){
                $invoice_id = $req->id;
                if($output['vehicle']){

                    // dd($output['vehicle']);
                    $already_vehicles = Vehicle::whereinovice_id($invoice_id)->pluck('id')->toArray();
                    
                    $unsetInvoice = DB::table('vehicles')->whereIn('id', $already_vehicles)->update(array('inovice_id' => null));
                    
                   
                    if($unsetInvoice){
                        foreach($output['vehicle'] as $id){
                            $get_vehicle = Vehicle::find($id);
                            $get_vehicle->inovice_id  = $invoice_id;
                            $get_vehicle->update();
                        }
                    }
                    // for($i = 0; $i<count($already_vehicles); $i++){
                    //     foreach($output['vehicle'] as $vehicle_id){
                    //         if($already_vehicles[$i]['id'] == $vehicle_id){
                                
                    //         }
                    //         else{
                    //             $get_vehicle = Vehicle::find($already_vehicles[$i]['id']);
                    //             $get_vehicle->inovice_id  = null;
                    //             $get_vehicle->update();
                                
                    //         }
                    //     }
                    // }   

                }
        }

        return 'Invoice Updated!';

        }
        $file = $data['invoice_document'];
        $file_name = time() . '.' . $file->extension();
        $docname = Storage::putFile($this->directory, $file);
        $file->move(public_path($this->directory), $docname);
        $data['invoice_document'] = $docname;        
        $output['vehicle'] = $data['vehicles'];
        $data['added_by_role'] = auth()->user()->id;
        unset($data['vehicles']);
        
        $obj = new Invoice;
        
        $id = $obj->create($data);

        if($id){
            $invoice_id = $id->id;
            if($output['vehicle']){
                foreach ($output['vehicle'] as $vehicle_id) {
                    $get_vehicle = Vehicle::find($vehicle_id);
                    $get_vehicle->inovice_id  = $invoice_id;
                    $get_vehicle->update();
                }
            }


        }

        return 'Invoice Created!';


        
    }

    public function serverside(Request $request)
    {
        

        if ($request->ajax()) {
            if(Auth::user()->hasRole('Customer')){
                $data = Invoice::with('vehicle.user')->wherecompany_name(auth()->user()->company_name)->get();
                
            }
            else{
                $data = Invoice::with('vehicle.user')->get();
            }
            return Datatables::of($data)
                ->addIndexColumn()
            
                ->addColumn('action', function ($row) {
                    $data['row'] = $row; 
                    $output = view('layouts.invoice.action_buttons', $data)->render();
                    return $output;})
                ->rawColumns(['action'])
                ->make(true);
        }
        if(Auth::user()->hasRole('Customer')){
            $data['data'] = Invoice::with('vehicle')->where('company_name', auth()->user()->company_name)->get()->toArray();
        }
        else{
            $data['data'] = Invoice::with('vehicle')->get()->toArray();
        }
        $action = ['action'=>''];
        array_push($data['data'], $action);
        return $data;
    }
   
}
