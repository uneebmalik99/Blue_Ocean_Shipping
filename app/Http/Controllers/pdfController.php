<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\Location;
use App\Models\Vehicle;
use App\Models\Notification;
use App\Models\Shipment;
use Carbon\Carbon;
use PDF;

class pdfController extends Controller
{
    private $type = "Invoice";
    private $singular = "Invoice";
    private $plural = "Invoice";
    private $view = "Invoice.";
    private $db_key = "id";
    private $user = [];
    private $perpage = 100;
    private $directory = "customer_images";
    private $action = "/admin/Invoice";

    public function Notification()
    {
        $data['notification'] = Notification::with('user')->paginate($this->perpage);
        $data['location'] = Location::all()->toArray();
        if ($data['notification']) {
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
        return $data;
    }

    public function detail_data( $id = null){
        $data = [];
        $data = [
            "page_title" => $this->plural . " Detail",
            "page_heading" => $this->plural . 'detail',
            "breadcrumbs" => array('#' => $this->plural . " List"),
            "module" => [
                'type' => $this->type,
                'singular' => $this->singular,
                'plural' => $this->plural,
                'view' => $this->view,
                'db_key' => $this->db_key,
                'action' => $this->action,
                'page' => 'detail',
            ],
        ];
        $data['location'] = Location::all();
        $notification = $this->Notification();
        $data['invoices']=Invoice::find($id)->toArray();
        return view('invoice.detail',$data, $notification);
    }

    public function generatePDF($id = null){
        $data = [];
        $data['invoices']=Invoice::find($id)->toArray();
        $pdf = PDF::loadview('invoice.pdf',$data);
        return $pdf->stream();   
    }

    public function search_shipment(Request $req){
        $search_text = $req->searchText;
        if ($search_text) {
            $data['vehicles'] = Vehicle::all();
            $output = view('layouts.shipment_filter.filterVehicles', $data)->render();
            return Response($output);
        }
    }

    public function shipmentview($id){
        $data = [];
        $data['shipment']=Shipment::with('vehicle', 'customer.billings')->whereid($id)->get()->toArray();
        $data['button_hide'] = 'hide';
        $pdf = PDF::loadview('layouts.shipment_detail.shipment_Hazard_pdf', $data);
        return $pdf->stream(); 
    }

    public function shipmentHouston($id){
        $data = [];
        $data['shipment']=Shipment::with('vehicle')->whereid($id)->get()->toArray();
        $data['button_hide'] = 'hide';
        $pdf = PDF::loadview('layouts.shipment_detail.shipment_Houston_pdf', $data);
        return $pdf->stream(); 
    }

    public function shipmentLanding($id){
        $data = [];
        $data['shipment']=Shipment::with('vehicle', 'customer.billings', 'customer.shippers')->whereid($id)->get()->toArray();
        $data['button_hide'] = 'hide';
        // dd($data['shipment']);
        $pdf = PDF::loadview('layouts.shipment_detail.shipment__Landing_pdf', $data);
        return $pdf->stream(); 
    }

    public function shipmentCustom($id){
        $data = [];
        $data['shipment']=Shipment::with('vehicle')->whereid($id)->get()->toArray();
        $data['button_hide'] = 'hide';
        $pdf = PDF::loadview('layouts.shipment_detail.shipment__Custom_pdf', $data);
        return $pdf->stream(); 
    }

    public function shipmentDock($id){
        $data = [];
        $data['shipment']=Shipment::with('vehicle')->whereid($id)->get()->toArray();
        $data['button_hide'] = 'hide';
        $pdf = PDF::loadview('layouts.shipment_detail.shipment__Dock_pdf', $data);
        return $pdf->stream(); 
    }


    public function OpenPdf(Request $request){
        $data = [];
        $output = [];

        if($request->tab == 'non_hazard'){
            $data['shipment']=Shipment::with('vehicle', 'customer.billings')->whereid($request->id)->get()->toArray();
            $data['button_hide'] = 'show';
            $output = view('layouts.shipment_detail.shipment_Hazard_pdf', $data)->render();
        }
        else if($request->tab == 'houston'){
            $data['shipment']=Shipment::with('vehicle', 'customer.billings')->whereid($request->id)->get()->toArray();
            $data['button_hide'] = 'show';
            $output = view('layouts.shipment_detail.shipment_Houston_pdf', $data)->render();
        }
        else if($request->tab == 'bol'){
            $data['total_weight'] = 0;
            $data['shipment']=Shipment::with('vehicle.user', 'customer.billings', 'customer.shippers')->whereid($request->id)->get()->toArray();
            $data['button_hide'] = 'show';
            foreach ($data['shipment'][0]['vehicle'] as $weight) {
                if($weight['weight'] != null){
                   $data['total_weight'] += $weight['weight'];
                }
            }
            $output = view('layouts.shipment_detail.shipment__Landing_pdf', $data)->render();
        }
        else if($request->tab == 'us_custom'){
            $data['shipment']=Shipment::with('vehicle', 'customer.billings')->whereid($request->id)->get()->toArray();
            $data['button_hide'] = 'show';
            $output = view('layouts.shipment_detail.shipment__Custom_pdf', $data)->render();
        }
        else if($request->tab == 'dock_receipt'){
            $data['shipment']=Shipment::with('vehicle', 'customer.billings')->whereid($request->id)->get()->toArray();
            $data['button_hide'] = 'show';
            $output = view('layouts.shipment_detail.shipment__Dock_pdf', $data)->render();
        }
        // dd($output);
        return Response($output);
    }
    
}
