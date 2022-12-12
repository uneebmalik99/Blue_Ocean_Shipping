<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\Location;
use App\Models\Notification;

use App\Http\Controllers\Controller;
use App\Models\MasterTowing;
use App\Models\VehicleCart;
use Illuminate\Http\Request;

class MasterTowingController extends Controller
{
    private $type = "master-towing";
    private $singular = "master-towing";
    private $plural = "master-towing";
    private $view = "masterTowing.";
    private $db_key = "id";
    private $perpage = 100;
    private $user = [];
    private $directory = "user_images";
    private $action = "/admin/master-towing";

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
            "page_title" => "Master Towing",
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
        $data['master_towing']  = MasterTowing::all()->toArray();
        return view($this->view . 'towing_rate', $data, $notification);
    }
    public function save(Request $request){
        // dd($request->all());
        $master_towing = new MasterTowing();
        $master_towing->rate = $request->rate;
        $master_towing->auction = $request->auction;
        $master_towing->city = $request->city;
        $master_towing->destination = $request->destination;
        // dd($master_towing);
        $master_towing->save();
        return 'success';
    }
    public function delete(Request $request){
        // dd($request->all());
        $master_towing = new MasterTowing;
        $master_towing->id = $request->id;
        $master_towing = MasterTowing::find($master_towing->id)->delete();
        // dd($shipment_rate);
        return 'deleted';

    }
    public function changestatus(Request $request){
        // dd($request->all());
        $master_towing = new MasterTowing();
        $id = $request->id;
        $status = $request->status;
        if ($status=='0') {
            $status = '1';
            $master_towing = MasterTowing::find($id);
        } else {
            $status = '0';
            $master_towing = MasterTowing::find($id);
        }
        $master_towing->status = $status;
        $master_towing->save();
        return 'updated';
    }
    // public function show_model(Request $request){
    //     if($request->id=='towing_rate_add'){
    //         $data = [];
    //         $data['title'] = "Towing Rate";
    //         $data['btn_id'] = "save";
    //         $data['button_value'] = "save_towingrate";
    //     }else{
    //         $data['towing_rate'] = MasterTowing::where('id',$request->id)->get()->toArray();
    //         $data['title'] = "Towing Rate";
    //         $data['btn_id'] = "update";
    //         $data['button_value'] = "update_towingrate";
    //     }
    //     return view($this->view . 'towingrate_common_model',$data);
    // }

    public function show_model(Request $request){
        if($request->id=='towing_rate_add'){
            $data = [];
            $data['title'] = "Towing Rate";
            $data['btn_id'] = "save";
            $data['button_value'] = "save_towingrate";
            $data['commonbutton'] = "save";
        }else{
            $data['towing_rate'] = MasterTowing::where('id',$request->id)->get()->toArray();
            $data['title'] = "Towing Rate";
            $data['btn_id'] = "update";
            $data['commonbutton'] = "update";
        }
        return view($this->view . 'towingrate_common_model',$data);
    }

    public function update_save(Request $request){
        // dd($request->all());
        $master_towing = new MasterTowing;
        if($request->id!=''){
            $id = $request->id;
            $master_towing = MasterTowing::find($id);
            $master_towing->city = $request->city;
            $master_towing->auction = $request->auction;
            $master_towing->rate = $request->rate;
            $master_towing->new_jersery = $request->new_jersery;
            $master_towing->georgia = $request->georgia;
            $master_towing->teses = $request->teses;
            $master_towing->california = $request->california;
            $master_towing->seattle = $request->seattle;
            $master_towing->save();
            return "updated";
        }else{
            $master_towing->city = $request->city;
            $master_towing->auction = $request->auction;
            $master_towing->rate = $request->rate;
            $master_towing->new_jersery = $request->new_jersery;
            $master_towing->georgia = $request->georgia;
            $master_towing->teses = $request->teses;
            $master_towing->california = $request->california;
            $master_towing->seattle = $request->seattle;
            $master_towing->save();
            return 'success';
        }
    }
}

