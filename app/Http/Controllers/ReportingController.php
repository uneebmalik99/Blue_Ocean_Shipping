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
use App\Models\LoadingCountry;
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
class ReportingController extends Controller
{
    private $type = "Reporting";
    private $singular = "reporting";
    private $plural = "Reportings";
    private $view = "reporting.";
    private $db_key = "id";
    private $user = [];
    private $perpage = 100;
    private $directory = "/reporting_images";
    private $action = "/admin/reporting";

    private function Notification()
    {
        $data['notification'] = Notification::with('user')->paginate($this->perpage);
        $data['location'] = LoadingCountry::select('state')->where('status', '1')->groupBy('state')->get()->toArray();
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
        return $data;
    }
    public function index()
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
            ],
        ];
        $data['vehicles'] = Vehicle::where('status', '1')->get()->toArray();
        $data['vehicles_cart'] = VehicleCart::with('vehicle')->get()->toArray();
        $notification = $this->Notification();
        return view($this->view . 'list', $data, $notification);
    }

    public function changetab(Request $req ,$id = null){
        $output = [];
        $data = [];

        if($req->id == 'dispatch_tab'){
            $data['vehicles'] = Vehicle::where('status', '2')->get()->toArray();
            $output =  view('layouts.reporting.' . $req->id, $data)->render();
        }
        elseif($req->id == 'new_order_tab'){
            $data['vehicles'] = Vehicle::where('status', '1')->get()->toArray();
            $output =  view('layouts.reporting.' . $req->id, $data)->render();
        }
        elseif($req->id == 'on_hand_tab'){
            $data['vehicles'] = Vehicle::where('status', '3')->get()->toArray();
            $output =  view('layouts.reporting.' . $req->id, $data)->render();
        }
        elseif($req->id == 'shipment_tab'){
            $data['vehicles'] = Vehicle::where('shipment_id', '!=',  null)->get()->toArray();
            $output =  view('layouts.reporting.'. $req->id, $data)->render();
        }
        elseif($req->id == 'no_title_tab')
        {
            $data['vehicles'] = Vehicle::where('status', '4')->get()->toArray();
            $output =  view('layouts.reporting.'. $req->id, $data)->render();
        }
        else{}

        return Response($output);
    }



}
