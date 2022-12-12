<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\ShippmentRate;
use App\Models\User;
use App\Models\VehicleCart;
use App\Models\Notification;
use App\Models\Location;
use Illuminate\Http\Request;

class ShipmentRateController extends Controller
{
    private $type = "shipment-rate";
    private $singular = "shipment-rate";
    private $plural = "shipment-rate";
    private $view = "masterTowing.";
    private $db_key = "id";
    private $perpage = 100;
    private $user = [];
    private $directory = "user_images";
    private $action = "/admin/shipment-rate";

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
            $unread = Notification::with('customer')->where('status', '0')->paginate($this->perpage);
            $data['notification_count'] = count($unread);
        } else {
            $data['notification'] = "asda";
        }

        // dd($data);
        return $data;
    }
    public function index(){
        $data = [];
        $data = [
            "page_title" => "Shippment Rate",
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

        $notification = $this->Notification();
        $data['shippment_rate']  = ShippmentRate::all()->toArray();
        return view($this->view . 'shipment_rate', $data, $notification);
    }
    public function save(Request $request){
        $shipment_rate = new ShippmentRate;
        $shipment_rate->container_size = $request->container_size;
        $shipment_rate->vehicle = $request->vehicle;
        $shipment_rate->loading_port = $request->loading_port;
        $shipment_rate->destination = $request->destination;
        $shipment_rate->shipping_line = $request->shipping_line;
        $shipment_rate->rate = $request->rate;
        // dd($shipment_rate);
        $shipment_rate->save();
        return 'success';
    }
    public function delete(Request $request){
        // dd($request->all());
        $shipment_rate = new ShippmentRate;
        $shipment_rate->id = $request->id;
        $shipment_rate = ShippmentRate::find($shipment_rate->id)->delete();
        // dd($shipment_rate);
        return 'deleted';

    }
    public function changestatus(Request $request){
        // dd($request->all());
        $shipment_rate = new ShippmentRate;
        $id = $request->id;
        $status = $request->status;
        if ($status=='0') {
            $status = '1';
            $shipment_rate = ShippmentRate::find($id);
        } else {
            $status = '0';
            $shipment_rate = ShippmentRate::find($id);
        }
        $shipment_rate->status = $status;
        $shipment_rate->save();
        return 'updated';
    }
        // public function update_save(Request $request)
        // {
        //     $data = [];
        //     $id = $request->id;
        //     $container_size = $request->container_size;
        //     $vehicle = $request->vehicle;
        //     $loading_port = $request->loading_port;
        //     $destination = $request->destination;
        //     $shipping_line = $request->shipping_line;
        //     $rate = $request->rate;
        //     $shipment_rate = new ShippmentRate();
        //     $shipment_rate = ShippmentRate::find($id);
        //     $shipment_rate->country = $container_size;
        //     $shipment_rate->state = $vehicle;
        //     $shipment_rate->port = $loading_port;
        //     $shipment_rate->destination = $destination;
        //     $shipment_rate->shipping_line = $shipping_line;
        //     $shipment_rate->rate = $rate;
        //     $shipment_rate->save();
        //     return 'updated';
        // }
    // public function show_model(Request $request){
    //     if($request->id=='shipment_rate_add'){
    //         $data = [];
    //         $data['title'] = "Shipmet Rate";
    //         $data['btn_id'] = "save";
    //         $data['button_value'] = "save_shipmentrate";
    //     }else{
    //         $data['shippment_rate'] = ShippmentRate::where('id',$request->id)->get()->toArray();
    //         $data['title'] = "Shipmet Rate";
    //         $data['btn_id'] = "update";
    //         $data['button_value'] = "update_shipmentrate";
    //     }
    //     return view($this->view . 'shipment_common_model',$data);
    // }

    public function show_model(Request $request){
        if($request->id=='shipment_rate_add'){
            $data = [];
            $data['title'] = "Shipmet Rate";
            $data['btn_id'] = "save";
            $data['button_value'] = "save_shipmentrate";
            $data['commonbutton'] = "Save";
        }else{
            $data['shippment_rate'] = ShippmentRate::where('id',$request->id)->get()->toArray();
            $data['title'] = "Shipmet Rate";
            $data['btn_id'] = "update";
            $data['commonbutton'] = "Update";
        }
        return view($this->view . 'shipment_common_model',$data);
    }


    public function update_save(Request $request){
        $shipment_rate = new ShippmentRate;
        if($request->value=='update'){
            $id = $request->id;
            $shipment_rate = $shipment_rate::find($id);
            $shipment_rate->container_size = $request->container_size;
            $shipment_rate->vehicle = $request->vehicle;
            $shipment_rate->loading_port = $request->loading_port;
            $shipment_rate->destination = $request->destination;
            $shipment_rate->shipping_line = $request->shipping_line;
            $shipment_rate->rate = $request->rate;
            $shipment_rate->save();
            return "updated";
        }else{
            $shipment_rate->container_size = $request->container_size;
            $shipment_rate->vehicle = $request->vehicle;
            $shipment_rate->loading_port = $request->loading_port;
            $shipment_rate->destination = $request->destination;
            $shipment_rate->shipping_line = $request->shipping_line;
            $shipment_rate->rate = $request->rate;
            $shipment_rate->save();
            return 'success';
        }
    }
}
