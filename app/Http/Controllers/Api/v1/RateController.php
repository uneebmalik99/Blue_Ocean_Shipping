<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\ShippmentRate;
use App\Models\User;
use App\Models\VehicleCart;
use App\Models\Notification;
use App\Models\Location;
use Illuminate\Support\Facades\Auth;
use App\Traits\ApiResponser;

use App\Models\MasterTowing;
use App\Models\ImportVehicle;

class RateController extends Controller
{
    use ApiResponser;

    private $type = "shipment-rate";
    private $singular = "shipment-rate";
    private $plural = "shipment-rate";
    private $view = "masterTowing.";
    private $db_key = "id";
    private $perpage = 100;
    private $user = [];
    private $directory = "user_images";
    private $action = "/admin/shipment-rate";

    public function index(){
        $data = [];

        
        $data['vehicles_cart'] = VehicleCart::with('vehicle')->get()->toArray();

        $data['shippment_rate']  = ShippmentRate::all()->toArray();
        return $this->success($data, "Shipment Rate List", 200);



    }
    public function shipping_rate_delete($id){
        // dd($request->all());
        $shipment_rate = new ShippmentRate;
        $shipment_rate->id = $id;
        $shipment_rate = ShippmentRate::find($shipment_rate->id)->delete();
        if($shipment_rate){
            return $this->success("Shipment Rate Deleted Successfully.", 200);
        }
        else{
            return $this->error('Shipment Rate Not Deleted Successfully', 401);

        }



    }

    public function towing(){
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
        $data['total_imported_vehicles'] = ImportVehicle::all()->count();
        $data['master_towing']  = MasterTowing::all()->toArray();
        return $this->success($data, "Shipment Rate List", 200);

    }

    public function towing_rate_delete($id){
        $master_towing = new MasterTowing;
        $master_towing->id = $id;
        $master_towing = MasterTowing::find($master_towing->id)->delete();

        if($master_towing){

            return $this->success("Towing Rate Deleted Successfully.", 200);
        }
        else{
            return $this->error('Towing Rate Not Deleted Successfully', 401);
            
        }



    }
}
