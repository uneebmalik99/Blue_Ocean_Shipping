<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Key;
use App\Models\MMS;
use App\Models\Make;
use App\Models\Site;
use App\Models\User;
use App\Models\Color;
use App\Models\ImportVehicle;
use App\Models\VehicleCart;
// use App\Models\State;
use App\Models\Title;
use App\Models\Series;
use App\Models\Auction;
use App\Models\Company;
use App\Models\Country;
use App\Models\State;
// use App\Models\Status;
use App\Models\ContainerSize;
use App\Models\ContainerType;
use App\Models\ShipmentStatus;
use App\Models\ShipmentLine;
use App\Models\Vehicle;
use App\Models\Location;
use App\Models\Shipment;
use App\Models\TitleType;
use App\Models\Warehouse;
use App\Models\LoadingPort;
use App\Models\ShipperName;
use App\Models\VehicleType;
use App\Models\Notification;
use App\Models\VehicleModel;
use Illuminate\Http\Request;
use App\Models\ShippingState;
use App\Models\VehicleStatus;
use App\Models\PickupLocation;
use App\Models\DestinationPort;
use App\Models\ShippingCountry;
use App\Models\ShipmentType;
use App\Models\LoadingCountry;
use App\Models\DCountry;
use App\Models\NoOfVehicle;

use App\Models\DestinationCountry;

use App\Http\Controllers\Controller;
use App\Models\DestinationState;

class MasterController extends Controller
{
    private $type = "Masters";
    private $singular = "master";
    private $plural = "Masters";
    private $view = "master.";
    private $db_key = "id";
    private $perpage = 100;
    private $user = [];
    private $directory = "user_images";
    private $action = "/admin/master";

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
            // $data['notification'] = "asda";`
        }

        // dd($data);
        return $data;
    }

    public function index()
    {
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
                'action' => $this->action,
            ],
        ];

        $records = User::paginate($this->perpage);
        $data['records'] = $records;
        $records = Company::all();
        $data['companies'] = $records;
        $records = ShippingCountry::all();
        $data['shippingcountry'] = $records;
        $records = ShippingState::all();
        $data['shippingstates'] = $records;
        $records = LoadingPort::all();
        $data['loadingport'] = $records;
        $records = DestinationPort::all();
        $data['destinationport'] = $records;
        $records = Auction::all();
        $data['auction'] = $records;
        $records = DestinationCountry::all();
        $data['destinationcountry'] = $records;
        $records = Title::all();
        $data['title'] = $records;
        $records = Key::all();
        $data['key'] = $records;
        $records = VehicleModel::all();
        $data['model'] = $records;
        $records = Color::all();
        $data['color'] = $records;
        $records = Make::all();
        $data['make'] = $records;
        $records = TitleType::all();
        $data['titletypes'] = $records;
        $records = ShipperName::all();
        $data['shippername'] = $records;
        $records = VehicleStatus::all();
        $data['vehiclestatus'] = $records;
        $records = PickupLocation::all();
        $data['pickuplocation'] = $records;
        $records = Site::all();
        $data['site'] = $records;
        $records = Warehouse::all();
        $data['warehouse'] = $records;
        $records = VehicleType::all();
        $data['vehicletype'] = $records;
        $records = ContainerSize::all();
        $data['containersize'] = $records;
        $records = ShipmentLine::all();
        $data['shipmentlines'] = $records;
        $records = ShipmentStatus::all();
        $data['shipmentstatus'] = $records;
        $records = ContainerType::all();
        $data['containertype'] = $records;
        $records = VehicleType::all();
        $data['vehicletype'] = $records;

        $data['loading_countries'] = ShippingCountry::with('state.loading_ports')->get()->toArray();
        $data['destination_countries'] = DestinationCountry::with('state.destination_port')->get()->toArray();
        $data['Vehicle_mms'] = Make::with('model.series')->get()->toArray();
        $data['vehicles_cart'] = VehicleCart::with('vehicle')->get()->toArray();

        // $data['states_countries'] = State::with('country')->where('status','1')->get();
        // return $data['destination_countries'];
        $notification = $this->Notification();
        return view($this->view . 'master', $data, $notification);
    }
    public function companiesshow(){
        $data = [];
        $data= [
            "page_title"=>"Company",
            "id"=>"popup_button",
            "class"=>"companiespopup",
            "data_toggle"=>"modal",
            "data_target"=>"companiesmodal",
            "tab"=>"companies",
            "value"=>"companies",
        ];
        $data['vehicles_cart'] = VehicleCart::with('vehicle')->get()->toArray();

        $records = User::paginate($this->perpage);
        $data['records'] = $records;
        $records = Company::all();
        $data['recordlist'] = $records;
        $notification = $this->Notification();
        return view($this->view . 'common_list', $data, $notification);
    }
    public function colorshow(){
        $data = [];
        $data= [
            "page_title"=>"Color",
            "id"=>"popup_button",
            "class"=>"colorpopup",
            "data_toggle"=>"modal",
            "data_target"=>"colormodal",
            "tab"=>"color",
            "value"=>"color",
        ];
        $data['vehicles_cart'] = VehicleCart::with('vehicle')->get()->toArray();

        $records = User::paginate($this->perpage);
        $data['records'] = $records;
        $records = Color::all();
        $data['recordlist'] = $records;
        $notification = $this->Notification();
        return view($this->view . 'common_list', $data, $notification);
    }
    public function titleshow(){
        $data = [];
        $data= [
            "page_title"=>"Title",
            "id"=>"popup_button",
            "class"=>"titlepopup",
            "data_toggle"=>"modal",
            "data_target"=>"titlemodal",
            "tab"=>"title",
            "value"=>"title",
        ];
        $data['vehicles_cart'] = VehicleCart::with('vehicle')->get()->toArray();

        $records = Title::all();
        $data['recordlist'] = $records;
        $notification = $this->Notification();
        return view($this->view . 'common_list', $data, $notification);
    }
    public function keyshow(){
         $data = [];
        $data= [
            "page_title"=>"Keys",
            "id"=>"popup_button",
            "class"=>"keypopup",
            "data_toggle"=>"modal",
            "data_target"=>"keymodal",
            "tab"=>"key",
            "value"=>"key",
        ];
        $data['vehicles_cart'] = VehicleCart::with('vehicle')->get()->toArray();

        $records = Key::all();
        $data['recordlist'] = $records;
        $notification = $this->Notification();
        return view($this->view . 'common_list', $data, $notification);
    }
    public function vehicletypeshow(){
        $data = [];
        $data= [
            "page_title"=>"Vehicle Type",
            "id"=>"popup_button",
            "class"=>"vehicletypepopup",
            "data_toggle"=>"modal",
            "data_target"=>"vehicletypemodal",
            "tab"=>"vehicletype",
            "value"=>"vehicletype",
        ];
        $data['vehicles_cart'] = VehicleCart::with('vehicle')->get()->toArray();

        $records = VehicleType::all();
        $data['recordlist'] = $records;
        $notification = $this->Notification();
        return view($this->view . 'common_list', $data, $notification);
    }
    public function auctionshow(){
         $data = [];
        $data= [
            "page_title"=>"Auction",
            "id"=>"popup_button",
            "class"=>"auctionpopup",
            "data_toggle"=>"modal",
            "data_target"=>"auctionmodal",
            "tab"=>"auction",
            "value"=>"auction",
        ];
        $data['vehicles_cart'] = VehicleCart::with('vehicle')->get()->toArray();

        $records = Auction::all();
        $data['recordlist'] = $records;
        $notification = $this->Notification();
        return view($this->view . 'common_list', $data, $notification);
    }
    public function no_ofvehicleshow(){
        $data = [];
       $data= [
           "page_title"=>"No. Of Vehicles",
           "id"=>"popup_button",
           "class"=>"no_ofvehiclepopup",
           "data_toggle"=>"modal",
           "data_target"=>"no_ofvehiclemodal",
           "tab"=>"no_ofvehicle",
           "value"=>"no_ofvehicle",
       ];
       $data['vehicles_cart'] = VehicleCart::with('vehicle')->get()->toArray();

       $records = NoOfVehicle::all();
       $data['recordlist'] = $records;
       $notification = $this->Notification();
       return view($this->view . 'common_list', $data, $notification);
   }
    public function shipmentstatusshow(){
         $data = [];
        $data= [
            "page_title"=>"Shipment Status",
            "id"=>"popup_button",
            "class"=>"shipmentstatuspopup",
            "data_toggle"=>"modal",
            "data_target"=>"shipmentstatusmodal",
            "tab"=>"shipmentstatus",
            "value"=>"shipmentstatus",
        ];
        $data['vehicles_cart'] = VehicleCart::with('vehicle')->get()->toArray();

        $records = ShipmentStatus::all();
        $data['recordlist'] = $records;
        $notification = $this->Notification();
        return view($this->view . 'common_list', $data, $notification);
    }
    public function shipmentlinesshow(){
         $data = [];
        $data= [
            "page_title"=>"Shipping Line",
            "id"=>"popup_button",
            "class"=>"shipmentlinespopup",
            "data_toggle"=>"modal",
            "data_target"=>"shipmentlinesmodal",
            "tab"=>"shipmentlines",
            "value"=>"shipmentlines",
        ];
        $data['vehicles_cart'] = VehicleCart::with('vehicle')->get()->toArray();

        $records = ShipmentLine::all();
        $data['recordlist'] = $records;
        $notification = $this->Notification();
        return view($this->view . 'common_list', $data, $notification);
    }
    public function containertypeshow(){
         $data = [];
        $data= [
            "page_title"=>"Container Type",
            "id"=>"popup_button",
            "class"=>"containertypepopup",
            "data_toggle"=>"modal",
            "data_target"=>"containertypemodal",
            "tab"=>"containertype",
            "value"=>"containertype",
        ];
        $data['vehicles_cart'] = VehicleCart::with('vehicle')->get()->toArray();

        $records = ContainerType::all();
        $data['recordlist'] = $records;
        $notification = $this->Notification();
        return view($this->view . 'common_list', $data, $notification);
    }
    public function containersizeshow(){
         $data = [];
        $data= [
            "page_title"=>"Container Size",
            "id"=>"popup_button",
            "class"=>"containersizepopup",
            "data_toggle"=>"modal",
            "data_target"=>"containersizemodal",
            "tab"=>"containersize",
            "value"=>"containersize",
        ];
        $data['vehicles_cart'] = VehicleCart::with('vehicle')->get()->toArray();

        $records = ContainerSize::all();
        $data['recordlist'] = $records;
        $notification = $this->Notification();
        return view($this->view . 'common_list', $data, $notification);
    }
    public function titletypeshow(){
         $data = [];
        $data= [
            "page_title"=>"Title Type",
            "id"=>"popup_button",
            "class"=>"titletypepopup",
            "data_toggle"=>"modal",
            "data_target"=>"titletypemodal",
            "tab"=>"titletype",
            "value"=>"titletype",
        ];
        $data['vehicles_cart'] = VehicleCart::with('vehicle')->get()->toArray();

        $records = TitleType::all();
        $data['recordlist'] = $records;
        $notification = $this->Notification();
        return view($this->view . 'common_list', $data, $notification);
    }
    public function shippernameshow(){
         $data = [];
        $data= [
            "page_title"=>"Shipper Name",
            "id"=>"popup_button",
            "class"=>"shippernamepopup",
            "data_toggle"=>"modal",
            "data_target"=>"shippernamemodal",
            "tab"=>"shippername",
            "value"=>"shippername",
        ];
        $data['vehicles_cart'] = VehicleCart::with('vehicle')->get()->toArray();

        $records = Shippername::all();
        $data['recordlist'] = $records;
        $notification = $this->Notification();
        return view($this->view . 'common_list', $data, $notification);
    }
    public function vehiclestatushow(){
         $data = [];
        $data= [
            "page_title"=>"Vehicle Status",
            "id"=>"popup_button",
            "class"=>"vehiclestatuspopup",
            "data_toggle"=>"modal",
            "data_target"=>"vehiclestatusmodal",
            "tab"=>"vehiclestatus",
            "value"=>"vehiclestatus",
        ];
        $data['vehicles_cart'] = VehicleCart::with('vehicle')->get()->toArray();

        $records = VehicleStatus::all();
        $data['recordlist'] = $records;
        $notification = $this->Notification();
        return view($this->view . 'common_list', $data, $notification);
    }
    public function pickuplocationshow(){
         $data = [];
        $data= [
            "page_title"=>"Pickup Location",
            "id"=>"popup_button",
            "class"=>"pickuplocationpopup",
            "data_toggle"=>"modal",
            "data_target"=>"pickuplocationmodal",
            "tab"=>"pickuplocation",
            "value"=>"pickuplocation",
        ];
        $data['vehicles_cart'] = VehicleCart::with('vehicle')->get()->toArray();

        $records = PickupLocation::all();
        $data['recordlist'] = $records;
        $notification = $this->Notification();
        return view($this->view . 'common_list', $data, $notification);
    }
    public function siteshow(){
         $data = [];
        $data= [
            "page_title"=>"Site",
            "id"=>"popup_button",
            "class"=>"sitepopup",
            "data_toggle"=>"modal",
            "data_target"=>"sitemodal",
            "tab"=>"site",
            "value"=>"site",
        ];
        $data['vehicles_cart'] = VehicleCart::with('vehicle')->get()->toArray();

        $records = Site::all();
        $data['recordlist'] = $records;
        $notification = $this->Notification();
        return view($this->view . 'common_list', $data, $notification);
    }
    public function warehouseshow(){
         $data = [];
        $data= [
            "page_title"=>"Warehouse",
            "id"=>"popup_button",
            "class"=>"warehousepopup",
            "data_toggle"=>"modal",
            "data_target"=>"warehousemodal",
            "tab"=>"warehouse",
            "value"=>"warehouse",
        ];
        $data['vehicles_cart'] = VehicleCart::with('vehicle')->get()->toArray();

        $records = Warehouse::all();
        $data['recordlist'] = $records;
        $notification = $this->Notification();
        return view($this->view . 'common_list', $data, $notification);
    }
    public function shipmenttypeshow(){
        $data = [];
       $data= [
           "page_title"=>"Shipment Type",
           "id"=>"popup_button",
           "class"=>"shipmenttypepopup",
           "data_toggle"=>"modal",
           "data_target"=>"shipmenttypemodal",
           "tab"=>"shipmenttype",
           "value"=>"shipmenttype",
       ];
       $data['vehicles_cart'] = VehicleCart::with('vehicle')->get()->toArray();

       $records = ShipmentType::all();
       $data['recordlist'] = $records;
       $notification = $this->Notification();
       return view($this->view . 'common_list', $data, $notification);
   }
    public function loadingcountryshow(){
        $data = [];
        $data= [
            "page_title"=>"Loading Country",
            "id"=>"popup_button",
            "class"=>"loadingcountrypopup",
            "data_toggle"=>"modal",
            "data_target"=>"loadingcountrymodal",
            "tab"=>"loadingcountry",
            "value"=>"loadingcountry",
            ];
        $data['vehicles_cart'] = VehicleCart::with('vehicle')->get()->toArray();

            $records = LoadingCountry::all();
            $data['recordlist'] = $records;
            $notification = $this->Notification();
        return view($this->view . 'common_page', $data, $notification);
    }
    public function destinationcountryshow(){
        $data = [];
        $data= [
            "page_title"=>"Destination Country",
            "id"=>"popup_button",
            "class"=>"destinationcountrypopup",
            "data_toggle"=>"modal",
            "data_target"=>"destinationcountrymodal",
            "tab"=>"destinationcountry",
            "value"=>"destinationcountry",
            ];
        $data['vehicles_cart'] = VehicleCart::with('vehicle')->get()->toArray();

            $records = DCountry::all();
            $data['recordlist'] = $records;
            $notification = $this->Notification();
        return view($this->view . 'common_page', $data, $notification);
    }
    public function mmsshow(){
        $data = [];
        $data= [
            "page_title"=>"Vehicle",
            "id"=>"popup_button",
            "class"=>"mmspopup",
            "data_toggle"=>"modal",
            "data_target"=>"mmsmodal",
            "tab"=>"mms",
            "value"=>"mms",
            ];
        $data['vehicles_cart'] = VehicleCart::with('vehicle')->get()->toArray();

            $records = MMS::all();
            $data['recordlist'] = $records;
            $notification = $this->Notification();
        return view($this->view . 'mms', $data, $notification);
    }

    public function make(Request $request){
        $data = [];
        $tab = $request->tab;
        if($tab=="make"){
        $data['title'] ="Make";
        $data['placeholder'] ="Enter Make Name";
        $data['model'] = VehicleModel::all();
        $data['series'] = Series::all();
        $data['make'] = Make::all();
        $data['vehicles_cart'] = VehicleCart::with('vehicle')->get()->toArray();

        $output = view('master.make',$data)->render();
        return Response($output);


        $tab = $request->id;
        $data['model'] = VehicleModel::with($tab);
        }
    }
    public function delete_master(Request $request)
    {
        $data = [];
        $inputdata = $request->input();
        $tab_name = $request->tab ;
        $id = $request->id;
        if ($tab_name =='companies' && $id !="") {
            $data['deleted'] = Company::find($id)->delete();
        }
        if ($tab_name =='shippingcountries' && $id !="") {
            $data['deleted'] = ShippingCountry::find($id)->delete();
        }
        if ($tab_name =='shippingstates' && $id !="") {
            $data['deleted'] = ShippingState::find($id)->delete();
        }
        if ($tab_name =='loadingport' && $id !="") {
            $data['deleted'] = LoadingPort::find($id)->delete();
        }
        if ($tab_name =='destinationcountries' && $id !="") {
            $data['deleted'] = DestinationCountry::find($id)->delete();
        }
        if ($tab_name =='destinationport' && $id !="") {
            $data['deleted'] = DestinationPort::find($id)->delete();
        }
        if ($tab_name =='title' && $id !="") {
            $data['deleted'] = Title::find($id)->delete();
        }
        if ($tab_name =='model' && $id !="") {
            $data['deleted'] = VehicleModel::find($id)->delete();
        }
        if ($tab_name =='key' && $id !="") {
            $data['deleted'] = Key::find($id)->delete();
        }
        if ($tab_name =='color' && $id !="") {
            $data['deleted'] = Color::find($id)->delete();
        }
        if ($tab_name =='auction' && $id !="") {
            $data['deleted'] = Auction::find($id)->delete();
        }
        if ($tab_name =='no_ofvehicle' && $id !="") {
            $data['deleted'] = NoOfVehicle::find($id)->delete();
        }
        if ($tab_name =='pickuplocation' && $id !="") {
            $data['deleted'] = PickupLocation::find($id)->delete();
        }
        if ($tab_name =='site' && $id !="") {
            $data['deleted'] = Site::find($id)->delete();
        }
        if ($tab_name =='warehouse' && $id !="") {
            $data['deleted'] = Warehouse::find($id)->delete();
        }
        if ($tab_name =='status' && $id !="") {
            $data['deleted'] = Status::find($id)->delete();
        }
        if ($tab_name =='shippername' && $id !="") {
            $data['deleted'] = ShipperName::find($id)->delete();
        }
        if ($tab_name =='titletype' && $id !="") {
            $data['deleted'] = TitleType::find($id)->delete();
        }
        if ($tab_name =='shippment' && $id !="") {
            $data['deleted'] = Shipment::find($id)->delete();
        }
        if ($tab_name =='vehiclestatus' && $id !="") {
            $data['deleted'] = VehicleStatus::find($id)->delete();
        }
        if ($tab_name =='shipmentstatus' && $id !="") {
            $data['deleted'] = ShipmentStatus::find($id)->delete();
        }
        if ($tab_name =='shipmentlines' && $id !="") {
            $data['deleted'] = ShipmentLine::find($id)->delete();
        }
        if ($tab_name =='containertype' && $id !="") {
            $data['deleted'] = ContainerType::find($id)->delete();
        }
        if ($tab_name =='containersize' && $id !="") {
            $data['deleted'] = ContainerSize::find($id)->delete();
        }
        if ($tab_name =='vehicletype' && $id !="") {
            $data['deleted'] = VehicleType::find($id)->delete();
        }
        if ($tab_name =='shipmenttype' && $id !="") {
            $data['deleted'] = ShipmentType::find($id)->delete();
        }
        if ($tab_name =='loadingcountry' && $id !="") {
            $data['deleted'] = LoadingCountry::find($id)->delete();
        }
        if ($tab_name =='destinationcountry' && $id !="") {
            $data['deleted'] = DCountry::find($id)->delete();
        }
        if ($tab_name =='mms' && $id !="") {
            $data['deleted'] = MMS::find($id)->delete();
        }
        return 'deleted';
    }

    public function update_master(Request $request)
    {
        // dd($request->input());
        $data = [];
        $data['common_btn'] = "Update";
        $tab = $request->tab;
        $id  = $request->id;
        if ($tab=="companies") {
            $data['title'] = "Company";
            $data['name'] = "name";
            $data['record'] = Company::where('id', '=', $id)->get()->toArray();
        }
        if ($tab=="shippingcountries") {
            $data['title'] = "Shipping Countries";
            $data['name'] = "name";
            $data['record'] = ShippingCountry::where('id', '=', $id)->get()->toArray();
        }
        if ($tab=="shippingstates") {
            $data['title'] = "Update Shipping States";
            $data['name'] = "name";
            $data['record'] = ShippingState::where('id', '=', $id)->get()->toArray();
        }
        if ($tab=="loadingport") {
            // dd($request->input());
            $data['title'] = "Update Loading Ports";
            $data['name'] = "name";
            $data['record'] = LoadingPort::where('id', '=', $id)->get()->toArray();
        }
        if ($tab=="destinationcountries") {
            // dd($request->input());
            $data['title'] = "Update Destination Countries";
            $data['name'] = "name";
            $data['record'] = DestinationCountry::where('id', '=', $id)->get()->toArray();
        }
        if ($tab=="destinationport") {
            // dd($request->input());
            $data['title'] = "Update Destination Port";
            $data['name'] = "name";
            $data['record'] = DestinationPort::where('id', '=', $id)->get()->toArray();
        }
        if ($tab=="title") {
            $data['title'] = "Title";
            $data['name'] = "name";
            $data['record'] = Title::where('id', '=', $id)->get()->toArray();
        }
        if ($tab=="auction") {
            // dd($request->input());
            $data['title'] = "Auction";
            $data['name'] = "name";
            $data['record'] = Auction::where('id', '=', $id)->get()->toArray();
        }
        if ($tab=="no_ofvehicle") {
            // dd($request->input());
            $data['title'] = "No. Of Vehicles";
            $data['name'] = "name";
            $data['record'] = NoOfVehicle::where('id', '=', $id)->get()->toArray();
        }
        // if ($tab=="model") {
        //     // dd($request->input());
        //     $data['title'] = "Update model";
        //     $data['name'] = "name";
        //     $data['record'] = VehicleModel::where('id', '=', $id)->get()->toArray();
        // }
        // if ($tab=="make") {
        //     // dd($request->input());
        //     $data['title'] = "Update make";
        //     $data['record'] = Make::where('id', '=', $id)->get()->toArray();
        // }
        if ($tab=="color") {
            // dd($request->input());
            $data['title'] = "Color";
            $data['name'] = "name";
            $data['record'] = Color::where('id', '=', $id)->get()->toArray();
        }
        if ($tab=="key") {
            // dd($request->input());
            $data['title'] = "Keys";
            $data['name'] = "name";
            $data['record'] = Key::where('id', '=', $id)->get()->toArray();
        }
        if ($tab=="shipmentstatus") {
            // dd($request->input());
            $data['title'] = "Shipment Status";
            $data['name'] = "name";
            $data['record'] = ShipmentStatus::where('id', '=', $id)->get()->toArray();
        }
        if ($tab=="shipmentlines") {
            // dd($request->input());
            $data['title'] = "Shipping Line";
            $data['name'] = "name";
            $data['record'] = ShipmentLine::where('id', '=', $id)->get()->toArray();
        }
        if ($tab=="containertype") {
            // dd($request->input());
            $data['title'] = "Container Type";
            $data['name'] = "name";
            $data['record'] = ContainerType::where('id', '=', $id)->get()->toArray();
        }
        if ($tab=="containersize") {
            // dd($request->input());
            $data['title'] = "Container Size";
            $data['name'] = "name";
            $data['record'] = ContainerSize::where('id', '=', $id)->get()->toArray();
        }
        if ($tab=="titletype") {
            // dd($request->input());
            $data['title'] = "Title Type";
            $data['name'] = "name";
            $data['record'] = TitleType::where('id', '=', $id)->get()->toArray();
        }
        if ($tab=="shippername") {
            // dd($request->input());
            $data['title'] = "Shipper Name";
            $data['name'] = "name";
            $data['record'] = ShipperName::where('id', '=', $id)->get()->toArray();
        }
        if ($tab=="vehiclestatus") {
            // dd($request->input());
            $data['title'] = "Vehicle Status";
            $data['name'] = "status_name";
            $data['record'] = VehicleStatus::where('id', '=', $id)->get()->toArray();
        }
        if ($tab=="pickuplocation") {
            // dd($request->input());
            $data['title'] = "Pickup Location";
            $data['name'] = "name";
            $data['record'] = PickupLocation::where('id', '=', $id)->get()->toArray();
        }
        if ($tab=="site") {
            // dd($request->input());
            $data['title'] = "Site";
            $data['name'] = "name";
            $data['record'] = Site::where('id', '=', $id)->get()->toArray();
        }
        if ($tab=="warehouse") {
            $data['title'] = "Warehouse";
            $data['name'] = "name";
            $data['record'] = Warehouse::where('id', '=', $id)->get()->toArray();
        }
        if ($tab=="vehicletype") {
            $data['title'] = "Vehicle Type";
            $data['name'] = "vehicle_types";
            $data['record'] = VehicleType::where('id', '=', $id)->get()->toArray();
        }
        if ($tab=="shipmenttype") {
            $data['title'] = "Shipment Type";
            $data['name'] = "name";
            $data['record'] = ShipmentType::where('id', $id)->get()->toArray();
        }
        if ($tab=="loadingcountry") {
            $data['title'] = "Loading Country";
            $data['name'] = "name";
            $data['record'] = LoadingCountry::where('id', $id)->get()->toArray();
            $output = view('master.common_popmodal', $data)->render();
            return Response($output);
        }
        if ($tab=="destinationcountry") {
            $data['title'] = "Destination Country";
            $data['name'] = "name";
            $data['common_btn'] = "Update";
            $data['record'] = DCountry::where('id', $id)->get()->toArray();
            $output = view('master.common_popmodal', $data)->render();
            return Response($output);
        }
        if ($tab=="mms") {
            $data['title'] = "Vehicle";
            $data['name'] = "name";
            $data['common_btn'] = "Update";
            $data['record'] = MMS::where('id', $id)->get()->toArray();
            $output = view('master.mms_popup', $data)->render();
            return Response($output);
        }

        $output = view('master.common', $data)->render();
        return Response($output);

    }

    public function update_save(Request $request)
    {
        // dd($request->all());
        $data = [];
        $tab_name = $request->tab ;
        $id = $request->id;
        if ($tab_name =='loadingcountry') {
            $country = $request->country;
            $state = $request->state;
            $port = $request->port;
            $terminal = $request->terminal;
            $loadingcountry = new LoadingCountry();
            $loadingcountry = $loadingcountry::find($id);
            $loadingcountry->country = $country;
            $loadingcountry->state = $state;
            $loadingcountry->port = $port;
            $loadingcountry->terminal = $terminal;
            $loadingcountry->save();
            return 'updated';
        }
        if ($tab_name =='destinationcountry') {
            $country = $request->country;
            $state = $request->state;
            $port = $request->port;
            $terminal = $request->terminal;
            $destinationcountry = new DCountry();
            $destinationcountry = $destinationcountry::find($id);
            $destinationcountry->country = $country;
            $destinationcountry->state = $state;
            $destinationcountry->port = $port;
            $destinationcountry->terminal = $terminal;
            $destinationcountry->save();
            return 'updated';
        }
        if ($tab_name =='mms') {
            $make = $request->make;
            $model = $request->model;
            $series = $request->series;
            $terminal = $request->terminal;
            $mms = new MMS();
            $mms = $mms::find($id);
            $mms->make = $make;
            $mms->model = $model;
            $mms->series = $series;
            $mms->save();
            return 'updated';
        }
        $name = $request->name;
        if ($tab_name =='companies' && $name !="" && $id !="") {
            $companies = new Company();
            $companies = Company::find($id);
            $companies->name = $request['name'];
            $companies->save();
        }
        if ($tab_name =='shippingcountries') {
            $shippingcountry = new ShippingCountry();
            $shippingcountry = ShippingCountry::find($id);
            $shippingcountry->name = $name;
            $shippingcountry->save();
        }
        if ($tab_name =='shippingstates') {
            $sta = new ShippingState();
            $shippingstates = ShippingState::find($id);
            $shippingstates->name = $name;
            $shippingstates->save();
        }
        if ($tab_name =='loadingport') {
            $loadingport = new LoadingPort();
            $loadingport = LoadingPort::find($id);
            $loadingport->name = $name;
            $loadingport->save();
        }
        if ($tab_name =='destinationcountries') {
            $destinationcountries = new DestinationCountry();
            $destinationcountries = DestinationCountry::find($id);
            $destinationcountries->name = $name;
            $destinationcountries->save();
        }
        if ($tab_name =='destinationport') {
            $destinationport = new DestinationPort();
            $destinationport = DestinationPort::find($id);
            $destinationport->name = $name;
            $destinationport->save();
        }
        if ($tab_name =='title') {
            $title = new Title();
            $title = $title::find($id);
            $title->name = $name;
            $title->save();
        }
        if ($tab_name =='color') {
            $color = new Color();
            $color = $color::find($id);
            $color->name = $name;
            $color->save();
        }
        if ($tab_name =='auction') {
            $auction = new Auction();
            $auction = $auction::find($id);
            $auction->name = $name;
            $auction->save();
        }
        if ($tab_name =='no_ofvehicle') {
            $no_ofvehicle = new NoOfVehicle();
            $no_ofvehicle = $no_ofvehicle::find($id);
            $no_ofvehicle->name = $name;
            $no_ofvehicle->save();
        }
        if ($tab_name =='make') {
            $make = new Make();
            $make = $make::find($id);
            $make->name = $name;
            $make->save();
        }
        if ($tab_name =='model') {
            $model = new VehicleModel();
            $model = $model::find($id);
            $model->name = $name;
            $model->save();
        }
        if ($tab_name =='key') {
            $key = new Key();
            $key = $key::find($id);
            $key->name = $name;
            $key->save();
        }
        if ($tab_name =='shipmentstatus') {
            $key = new ShipmentStatus();
            $key = $key::find($id);
            $key->name = $name;
            $key->save();
        }
        if ($tab_name =='shipmentlines') {
            $key = new ShipmentLine();
            $key = $key::find($id);
            $key->name = $name;
            $key->save();
        }
        if ($tab_name =='containertype') {
            $key = new ContainerType();
            $key = $key::find($id);
            $key->name = $name;
            $key->save();
        }
        if ($tab_name =='containersize') {
            $key = new ContainerSize();
            $key = $key::find($id);
            $key->name = $name;
            $key->save();
        }
        if ($tab_name =='titletype') {
            $key = new TitleType();
            $key = $key::find($id);
            $key->name = $name;
            $key->save();
        }
        if ($tab_name =='shippername') {
            $key = new ShipperName();
            $key = $key::find($id);
            $key->name = $name;
            $key->save();
        }
        if ($tab_name =='vehiclestatus') {
            $key = new VehicleStatus();
            $key = $key::find($id);
            $key->status_name = $name;
            $key->save();
        }
        if ($tab_name =='pickuplocation') {
            $key = new PickupLocation();
            $key = $key::find($id);
            $key->name = $name;
            $key->save();
        }
        if ($tab_name =='site') {
            $key = new Site();
            $key = $key::find($id);
            $key->name = $name;
            $key->save();
        }
        if ($tab_name =='warehouse') {
            $key = new Warehouse();
            $key = $key::find($id);
            $key->name = $name;
            $key->save();
        }
        if ($tab_name =='vehicletype') {
            $key = new VehicleType();
            $key = $key::find($id);
            $key->vehicle_type = $name;
            $key->save();
        }
        if ($tab_name =='shipmenttype') {
            $key = new ShipmentType();
            $key = $key::find($id);
            $key->name = $name;
            $key->save();
        }

        return 'updated';
    }
    public function master_status(Request $request)
    {
        // dd($request->input());
        $data = [];
        $tab_name = $request->tab ;
        $id = $request->id;
        $status = $request->status;
        if ($tab_name =='vehicletype' && $id !="") {
            $vehicletype = new VehicleType();
            if ($status=='0') {
                $status = '1';
                $vehicletype = VehicleType::find($id);
            } else {
                $status = '0';
                $vehicletype = VehicleType::find($id);
            }
            $vehicletype->status = $status;
            $vehicletype->save();
        }
        if ($tab_name =='companies' && $id !="") {
            if ($status=='0') {
                $status = '1';
                $company = Company::find($id);
            } else {
                $status = '0';
                $company = Company::find($id);
            }
            $company->status = $status;
            $company->save();
        }
        if ($tab_name =='loading_ports' && $id !="") {
            if ($status=='0') {
                $status = '1';
                $loadingPort = loadingPort::find($id);
            } else {
                $status = '0';
                $loadingPort = loadingPort::find($id);
            }
            $loadingPort->status = $status;
            $loadingPort->save();
        }
        if ($tab_name =='loading_state' && $id !="") {
            if ($status=='0') {
                $status = '1';
                $shippingcountries = State::find($id);
            } else {
                $status = '0';
                $shippingcountries = State::find($id);
            }
            $shippingcountries->status = $status;
            $shippingcountries->save();
        }
        if ($tab_name =='mmake' && $id !="") {
            if ($status=='0') {
                $status = '1';
                $mmake = Make::find($id);
            } else {
                $status = '0';
                $mmake = Make::find($id);
            }
            $mmake->status = $status;
            $mmake->save();
        }
        if ($tab_name =='mmodel' && $id !="") {
            if ($status=='0') {
                $status = '1';
                $mmodel = VehicleModel::find($id);
            } else {
                $status = '0';
                $mmodel = VehicleModel::find($id);
            }
            $mmodel->status = $status;
            $mmodel->save();
        }
        if ($tab_name =='mseries' && $id !="") {
            if ($status=='0') {
                $status = '1';
                $mseries = Series::find($id);
            } else {
                $status = '0';
                $mseries = Series::find($id);
            }
            $mseries->status = $status;
            $mseries->save();
        }
        if ($tab_name =='country' && $id !="") {
            if ($status=='0') {
                $status = '1';
                $shippingcountries = ShippingCountry::find($id);
            } else {
                $status = '0';
                $shippingcountries = ShippingCountry::find($id);
            }
            $shippingcountries->status = $status;
            $shippingcountries->save();
        }
        if ($tab_name =='state' && $id !="") {
            if ($status=='0') {
                $status = '1';
                $shippingstates = ShippingState::find($id);
            } else {
                $status = '0';
                $shippingstates = ShippingState::find($id);
            }
            $shippingstates->status = $status;
            $shippingstates->save();
        }
        if ($tab_name =='loadingports' && $id !="") {
            if ($status=='0') {
                $status = '1';
                $loadingports = LoadingPort::find($id);
            } else {
                $status = '0';
                $loadingports = LoadingPort::find($id);
            }
            $loadingports->status = $status;
            $loadingports->save();
        }
        if ($tab_name =='dcountry' && $id !="") {
            if ($status=='0') {
                $status = '1';
                $destinationcountries = DestinationCountry::find($id);
            } else {
                $status = '0';
                $destinationcountries = DestinationCountry::find($id);
            }
            $destinationcountries->status = $status;
            $destinationcountries->save();
        }
        if ($tab_name =='destination_state' && $id !="") {
            if ($status=='0') {
                $status = '1';
                $destinationstate = DestinationState::find($id);
            } else {
                $status = '0';
                $destinationstate = DestinationState::find($id);
            }
            $destinationstate->status = $status;
            $destinationstate->save();
        }

        if ($tab_name =='destination_ports' && $id !="") {
            if ($status=='0') {
                $status = '1';
                $destinationport = DestinationPort::find($id);
            } else {
                $status = '0';
                $destinationport = DestinationPort::find($id);
            }
            $destinationport->status = $status;
            $destinationport->save();
        }
        if ($tab_name =='title' && $id !="") {
            $title = new Title();
            if ($status=='0') {
                $status = '1';
                $title = Title::find($id);
            } else {
                $status = '0';
                $title = Title::find($id);
            }
            $title->status = $status;
            $title->save();
        }
        if ($tab_name =='color' && $id !="") {
            $color = new color();
            if ($status=='0') {
                $status = '1';
                $color = Color::find($id);
            } else {
                $status = '0';
                $color = Color::find($id);
            }
            $color->status = $status;
            $color->save();
        }
        if ($tab_name =='key' && $id !="") {
            $key = new Key();
            if ($status=='0') {
                $status = '1';
                $key = Key::find($id);
            } else {
                $status = '0';
                $key = Key::find($id);
            }
            $key->status = $status;
            $key->save();
        }
        if ($tab_name =='auction' && $id !="") {
            $auction = new Auction();
            if ($status=='0') {
                $status = '1';
                $auction = Auction::find($id);
            } else {
                $status = '0';
                $auction = Auction::find($id);
            }
            $auction->status = $status;
            $auction->save();
        }
        if ($tab_name =='no_ofvehicle' && $id !="") {
            $no_ofvehicleshow = new NoOfVehicle();
            if ($status=='0') {
                $status = '1';
                $no_ofvehicleshow = NoOfVehicle::find($id);
            } else {
                $status = '0';
                $no_ofvehicleshow = NoOfVehicle::find($id);
            }
            $no_ofvehicleshow->status = $status;
            $no_ofvehicleshow->save();
        }
        // issue aa raha kioun k table shippment ka nahi pata mujhy
        // if ($tab_name =='shippment' && $id !="") {
            //     if ($status=='0') {
            //         $status = '1';
            //         $shippment = Shipment::find($id);
            //     } else {
            //         $status = '0';
            //         $shippment = Shipment::find($id);
            //     }
            //     $shippment->status = $status;
            //     $shippment->save();
        // }
        if ($tab_name =='titletype' && $id !="") {
            if ($status=='0') {
                $status = '1';
                $titletype = TitleType::find($id);
            } else {
                $status = '0';
                $titletype = TitleType::find($id);
            }
            $titletype->status = $status;
            $titletype->save();
        }
        if ($tab_name =='shippername' && $id !="") {
            if ($status=='0') {
                $status = '1';
                $shippername = ShipperName::find($id);
            } else {
                $status = '0';
                $shippername = ShipperName::find($id);
            }
            $shippername->status = $status;
            $shippername->save();
        }
        if ($tab_name =='vehiclestatus' && $id !="") {
            if ($status=='0') {
                $statuss = '1';
                $status = VehicleStatus::find($id);
            } else {
                $statuss = '0';
                $status = VehicleStatus::find($id);
            }
            $status->status = $statuss;
            $status->save();
        }
        if ($tab_name =='pickuplocation' && $id !="") {
            if ($status=='0') {
                $status = '1';
                $pickuplocation = PickupLocation::find($id);
            } else {
                $status = '0';
                $pickuplocation = PickupLocation::find($id);
            }
            $pickuplocation->status = $status;
            $pickuplocation->save();
        }
        if ($tab_name =='site' && $id !="") {
            // dd("testing");
            if ($status=='0') {
                $status = '1';
                $site = Site::find($id);
            } else {
                $status = '0';
                $site = Site::find($id);
            }
            $site->status = $status;
            $site->save();
        }
        if ($tab_name =='warehouse' && $id !="") {
            if ($status=='0') {
                $status = '1';
                $warehouse = Warehouse::find($id);
            } else {
                $status = '0';
                $warehouse = Warehouse::find($id);
            }
            $warehouse->status = $status;
            $warehouse->save();
        }
        if ($tab_name =='containersize' && $id !="") {
            if ($status=='0') {
                $status = '1';
                $containersize = ContainerSize::find($id);
            } else {
                $status = '0';
                $containersize = ContainerSize::find($id);
            }
            $containersize->status = $status;
            $containersize->save();
        }
        if ($tab_name =='shipmentlines' && $id !="") {
            if ($status=='0') {
                $status = '1';
                $shipmentlines = ShipmentLine::find($id);
            } else {
                $status = '0';
                $shipmentlines = ShipmentLine::find($id);
            }
            $shipmentlines->status = $status;
            $shipmentlines->save();
        }
        if ($tab_name =='shipmentstatus' && $id !="") {
            if ($status=='0') {
                $status = '1';
                $shipmentstatus = shipmentstatus::find($id);
            } else {
                $status = '0';
                $shipmentstatus = ShipmentStatus::find($id);
            }
            $shipmentstatus->status = $status;
            $shipmentstatus->save();
        }
        if ($tab_name =='containertype' && $id !="") {
            // dd($request->all());
            if ($status=='0') {
                $status = '1';
                $containertype = ContainerType::find($id);
            } else {
                $status = '0';
                $containertype = ContainerType::find($id);
            }
            $containertype->status = $status;
            $containertype->save();
        }
        if ($tab_name =='shipmenttype' && $id !="") {
            // dd($request->all());
            if ($status=='0') {
                $status = '1';
                $shipmenttype = ShipmentType::find($id);
            } else {
                $status = '0';
                $shipmenttype = ShipmentType::find($id);
            }
            $shipmenttype->status = $status;
            $shipmenttype->save();
        }
        if ($tab_name =='loadingcountry' && $id !="") {
            // dd($request->all());
            if ($status=='0') {
                $status = '1';
                $loadingcountry = LoadingCountry::find($id);
            } else {
                $status = '0';
                $loadingcountry = LoadingCountry::find($id);
            }
            $loadingcountry->status = $status;
            $loadingcountry->save();
        }
        if ($tab_name =='destinationcountry' && $id !="") {
            // dd($request->all());
            if ($status=='0') {
                $status = '1';
                $destinationcountry = DCountry::find($id);
            } else {
                $status = '0';
                $destinationcountry = DCountry::find($id);
            }
            $destinationcountry->status = $status;
            $destinationcountry->save();
        }
        if ($tab_name =='mms' && $id !="") {
            // dd($request->all());
            if ($status=='0') {
                $status = '1';
                $mms = MMS::find($id);
            } else {
                $status = '0';
                $mms = MMS::find($id);
            }
            $mms->status = $status;
            $mms->save();
        }
        return 'updated';
    }
    public function master_seriesadd(Request $request)
    {
        $data = [];
        if ($request->tab=="make") {
            $model = new VehicleModel();
            $model_id = $request->model_id;
            $data['model'] = VehicleModel::where('make_id', '=', $model_id)->get()->toArray();
            return $data['model'];
        }
        if ($request->tab=="model") {
            $series = new Series();
            $model_id = $request->model_id;
            $data['series'] = Series::where('model_id', '=', $model_id)->get();
            return $data['series'];
        }
    }

    public function showmodel(Request $request)
    {
        $data = [];
        $data['common_btn'] = "Save";
        $tab['tab'] = $request->tab;
        if ($request->tab=='warehouse') {
            $title['title'] ="Warehouse";
            $data['placeholder'] ="Enter Warehouse";
        }
        if ($request->tab=='vehicletype') {
            $title['title'] ="Vehicel Types";
            $data['placeholder'] ="Enter Vehicle Types";
        }
        if ($request->tab=='site') {
            $title['title'] ="Site";
            $data['placeholder'] ="Enter Site";
        }
        if ($request->tab=='pickuplocation') {
            $title['title'] ="Pickup Location";
            $data['placeholder'] ="Enter Pickup Location";
        }
        if ($request->tab=='vehiclestatus') {
            $title['title'] ="Vehicle Status";
            $data['placeholder'] ="Enter Vehicle Status";
        }
        if ($request->tab=='shippername') {
            $title['title'] ="Shipper Name";
            $data['placeholder'] ="Enter Shipper Name";
        }
        if ($request->tab=='titletype') {
            $title['title'] ="Title Type";
            $data['placeholder'] ="Enter Title Type";
        }
        if ($request->tab=='shippment') {
            $title['title'] ="Shippment";
            $data['placeholder'] ="Enter Shippment";
        }
        if ($request->tab=='vehicletype') {
            $title['title'] ="Vehicle Type";
            $data['placeholder'] ="Enter Vehicle Type";
        }
        if ($request->tab=='auction') {
            $title['title'] ="Auction";
            $data['placeholder'] ="Enter Auction";
        }
        if ($request->tab=='no_ofvehicle') {
            $title['title'] ="No. Of Vehicles";
            $data['placeholder'] ="Enter No. Of Vehicles";
        }
        if ($request->tab=='key') {
            $title['title'] ="Keys";
            $data['placeholder'] ="Enter Key";
        }
        if ($request->tab=='title') {
            $title['title'] ="Title";
            $data['placeholder'] ="Enter Title";
        }
        if ($request->tab=='color') {
            $title['title'] ="Color";
            $data['placeholder'] ="Enter Color";
        }
        if ($request->tab=='model') {
            $title['title'] ="Model";
            $data['placeholder'] ="Enter Model";
        }
        if ($request->tab=='destinationport') {
            $title['title'] ="Destination Port";
            $data['placeholder'] ="Enter Destination Port";
        }
        if ($request->tab=='destinationcountries') {
            $title['title'] ="Destination Countries";
            $data['placeholder'] ="Enter Destination Countries";
        }
        if ($request->tab=='loadingport') {
            $title['title'] ="Loading Ports";
            $data['placeholder'] ="Enter Loading Ports";
        }
        if ($request->tab=='shippingstates') {
            $title['title'] ="Shipping States";
            $data['placeholder'] ="Enter Shipping States";
        }
        if ($request->tab=='companies') {
            $title['title'] ="Company";
            $data['placeholder'] ="Enter Company";
        }
        if ($request->tab=='containersize') {
            $title['title'] ="Container Size";
            $data['placeholder'] ="Enter Container Size";
        }
        if ($request->tab=='shipmentlines') {
            $title['title'] ="Shipping Line";
            $data['placeholder'] ="Enter Shipping Line";
        }
        if ($request->tab=='containertype') {
            $title['title'] ="Container Type";
            $data['placeholder'] ="Enter Container Type";
        }
        if ($request->tab=='shipmentstatus') {
            $title['title'] ="Shipment Status";
            $data['placeholder'] ="Enter Shipment Status";
        }
        if ($request->tab=='shipmenttype') {
            $title['title'] ="Shipment Type";
            $data['placeholder'] ="Enter Shipment Type";
        }
        if ($request->tab=='loadingcountry') {
            $title['title'] ="Loading Country";
            $data = [
                "placeholder" => [
                    'country' => "Enter Country Name",
                    'state' => "Enter State Name",
                    'port' => "Enter Port Name",
                    'terminal' => "Enter Terminal Name",
                ],
            ];
            $output = view('master.common_popmodal', $data,$title, $tab )->render();
            return Response($output);
        }
        if ($request->tab=='destinationcountry') {
            $title['title'] ="Destination Country";
            $data = [
                'common_btn'=>'Save',
                "placeholder" => [
                    'country' => "Enter Country",
                    'state' => "Enter State",
                    'port' => "Enter Port",
                    'terminal' => "Enter Terminal",
                ],
            ];
            $output = view('master.common_popmodal', $data,$title, $tab )->render();
            return Response($output);
        }
        if ($request->tab=='mms') {
            $title['title'] ="Vehicle";
            $data = [
                'common_btn' => "Save",
                "placeholder" => [
                    'make' => "Enter Make",
                    'model' => "Enter Model",
                    'series' => "Enter Series",
                ],
            ];
            $output = view('master.mms_popup', $data,$title, $tab )->render();
            return Response($output);
        }

        $output = view('master.common', $data,$title, $tab )->render();
        return Response($output);
    }

    public function save(Request $request)
    {
        // dd($request->all());
        if ($request->tab=='loadingcountry') {
            $data = [
                'country' => $request->country,
                'state' => $request->state,
                'port' => $request->port,
                'terminal' => $request->terminal,
                ];
            LoadingCountry::Create($data);
            return 'success';
        }
        if ($request->tab=='destinationcountry') {
            $data = [
                'country' => $request->country,
                'state' => $request->state,
                'port' => $request->port,
                'terminal' => $request->terminal,
                ];
            DCountry::Create($data);
            return 'success';
        }
        if ($request->tab=='mms') {
            $data = [
                'make' => $request->make,
                'model' => $request->model,
                'series' => $request->series,
                ];
            MMS::Create($data);
            return 'success';
        }
        $length  = count($request->addmore);
        if ($request->tab=='containersize') {
            for ($i=0; $i<$length; $i++) {
                $data['record_exist'] = ContainerSize::where('name', '=', $request->addmore[$i])
                ->get()->toArray();
                if (!$data['record_exist']) {
                    $data = [
                        'name' => $request->addmore[$i],
                      ];
                      ContainerSize::Create($data);
                }
            }
        }
        if ($request->tab=='shipmentlines') {
            for ($i=0; $i<$length; $i++) {
                $data['record_exist'] = ShipmentLine::where('name', '=', $request->addmore[$i])
                ->get()->toArray();
                if (!$data['record_exist']) {
                    $data = [
                        'name' => $request->addmore[$i],
                      ];
                      ShipmentLine::Create($data);
                }
            }
        }
        if ($request->tab=='containertype') {
            for ($i=0; $i<$length; $i++) {
                $data['record_exist'] = ContainerType::where('name', '=', $request->addmore[$i])
                ->get()->toArray();
                if (!$data['record_exist']) {
                    $data = [
                        'name' => $request->addmore[$i],
                      ];
                      ContainerType::Create($data);
                }
            }
        }
        if ($request->tab=='shipmentstatus') {
            for ($i=0; $i<$length; $i++) {
                $data['record_exist'] = ShipmentStatus::where('name', '=', $request->addmore[$i])
                ->get()->toArray();
                if (!$data['record_exist']) {
                    $data = [
                        'name' => $request->addmore[$i],
                      ];
                      ShipmentStatus::Create($data);
                }
            }
        }
        if ($request->tab=='warehouse') {
            for ($i=0; $i<$length; $i++) {
                $data['record_exist'] = Warehouse::where('name', '=', $request->addmore[$i])
                ->get()->toArray();
                if (!$data['record_exist']) {
                    $data = [
                        'name' => $request->addmore[$i],
                      ];
                    Warehouse::Create($data);
                }
            }
        }
        if ($request->tab=='site') {
            for ($i=0; $i<$length; $i++) {
                $data['record_exist'] = Site::where('name', '=', $request->addmore[$i])
                ->get()->toArray();
                if (!$data['record_exist']) {
                    $data = [
                        'name' => $request->addmore[$i],
                      ];
                    Site::Create($data);
                }
            }
        }
        if ($request->tab=='pickuplocation') {
            for ($i=0; $i<$length; $i++) {
                $data['record_exist'] = PickupLocation::where('name', '=', $request->addmore[$i])
                ->get()->toArray();
                if (!$data['record_exist']) {
                    $data = [
                        'name' => $request->addmore[$i],
                      ];
                    PickupLocation::Create($data);
                }
            }
        }
        if ($request->tab=='vehiclestatus') {
            for ($i=0; $i<$length; $i++) {
                $data['record_exist'] = VehicleStatus::where('status_name', '=', $request->addmore[$i])
                ->get()->toArray();
                if (!$data['record_exist']) {
                    $data = [
                        'status_name' => $request->addmore[$i],
                      ];
                      VehicleStatus::Create($data);
                }
            }
        }
        if ($request->tab=='shippername') {
            for ($i=0; $i<$length; $i++) {
                $data['record_exist'] = ShipperName::where('name', '=', $request->addmore[$i])
                ->get()->toArray();
                if (!$data['record_exist']) {
                    $data = [
                        'name' => $request->addmore[$i],
                      ];
                    ShipperName::Create($data);
                }
            }
        }
        if ($request->tab=='titletype') {
            for ($i=0; $i<$length; $i++) {
                $data['record_exist'] = TitleType::where('name', '=', $request->addmore[$i])
                ->get()->toArray();
                if (!$data['record_exist']) {
                    $data = [
                        'name' => $request->addmore[$i],
                      ];
                    TitleType::Create($data);
                }
            }
        }
        if ($request->tab=='vehicletype') {
            for ($i=0; $i<$length; $i++) {
                $data['record_exist'] = VehicleType::where('vehicle_type', '=', $request->addmore[$i])
                ->get()->toArray();
                if (!$data['record_exist']) {
                    $data = [
                        'vehicle_type' => $request->addmore[$i],
                      ];
                    VehicleType::Create($data);
                }
            }
        }
        if ($request->tab=='auction') {
            for ($i=0; $i<$length; $i++) {
                $data['record_exist'] = Auction::where('name', '=', $request->addmore[$i])
                ->get()->toArray();
                if (!$data['record_exist']) {
                    $data = [
                        'name' => $request->addmore[$i],
                      ];
                    Auction::Create($data);
                }
            }
        }
        if ($request->tab=='no_ofvehicle') {
            for ($i=0; $i<$length; $i++) {
                $data['record_exist'] = NoOfVehicle::where('name', '=', $request->addmore[$i])
                ->get()->toArray();
                if (!$data['record_exist']) {
                    $data = [
                        'name' => $request->addmore[$i],
                      ];
                      NoOfVehicle::Create($data);
                }
            }
        }
        if ($request->tab=='vehicletype') {
            for ($i=0; $i<$length; $i++) {
                $data['record_exist'] = VehicleType::where('vehicle_type', '=', $request->addmore[$i])
                ->get()->toArray();
                if (!$data['record_exist']) {
                    $data = [
                        'vehicle_type' => $request->addmore[$i],
                      ];
                      VehicleType::Create($data);
                }
            }
        }
        if ($request->tab=='key') {
            for ($i=0; $i<$length; $i++) {
                $data['record_exist'] = Key::where('name', '=', $request->addmore[$i])
                ->get()->toArray();
                if (!$data['record_exist']) {
                    $data = [
                        'name' => $request->addmore[$i],
                      ];
                    Key::Create($data);
                }
            }
        }
        if ($request->tab=='title') {
            for ($i=0; $i<$length; $i++) {
                $data['record_exist'] = Title::where('name', '=', $request->addmore[$i])
                ->get()->toArray();
                if (!$data['record_exist']) {
                    $data = [
                        'name' => $request->addmore[$i],
                      ];
                    Title::Create($data);
                }
            }
        }
        if ($request->tab=='color') {
            for ($i=0; $i<$length; $i++) {
                $data['record_exist'] = Color::where('name', '=', $request->addmore[$i])
                ->get()->toArray();
                if (!$data['record_exist']) {
                    $data = [
                        'name' => $request->addmore[$i],
                      ];
                    Color::Create($data);
                }
            }
        }
        if ($request->tab=='destinationport') {
            for ($i=0; $i<$length; $i++) {
                $data['record_exist'] = DestinationPort::where('destination', '=', $request->addmore[$i])
                ->get()->toArray();
                if (!$data['record_exist']) {
                    $data = [
                        'destination' => $request->addmore[$i],
                      ];
                    DestinationPort::Create($data);
                }
            }
        }
        if ($request->tab=='destinationcountries') {
            for ($i=0; $i<$length; $i++) {
                $data['record_exist'] = DestinationCountry::where('name', '=', $request->addmore[$i])
                ->get()->toArray();
                if (!$data['record_exist']) {
                    $data = [
                        'name' => $request->addmore[$i],
                      ];
                    DestinationCountry::Create($data);
                }
            }
        }
        if ($request->tab=='loadingport') {
            for ($i=0; $i<$length; $i++) {
                $data['record_exist'] = LoadingPort::where('name', '=', $request->addmore[$i])
                ->get()->toArray();
                if (!$data['record_exist']) {
                    $data = [
                        'name' => $request->addmore[$i],
                      ];
                    LoadingPort::Create($data);
                }
            }
        }
        if ($request->tab=='shippingstates') {
            for ($i=0; $i<$length; $i++) {
                $data['record_exist'] = ShippingState::where('name', '=', $request->addmore[$i])
                ->get()->toArray();
                if (!$data['record_exist']) {
                    $data = [
                        'name' => $request->addmore[$i],
                      ];
                    ShippingState::Create($data);
                }
            }
        }
        if ($request->tab=='shippingcountries') {
            for ($i=0; $i<$length; $i++) {
                $data['record_exist'] = ShippingCountry::where('name', '=', $request->addmore[$i])
                ->get()->toArray();
                if (!$data['record_exist']) {
                    $data = [
                        'name' => $request->addmore[$i],
                      ];
                    ShippingCountry::Create($data);
                }
            }
        }
        if ($request->tab=='companies') {
            for ($i=0; $i<$length; $i++) {
                $data['record_exist'] = Company::where('name', '=', $request->addmore[$i])
                ->get()->toArray();
                if (!$data['record_exist']) {
                    $data = [
                        'name' => $request->addmore[$i],
                      ];
                    Company::Create($data);
                }
            }
        }
        if ($request->tab=='shipmenttype') {
            for ($i=0; $i<$length; $i++) {
                $data['record_exist'] = ShipmentType::where('name', '=', $request->addmore[$i])
                ->get()->toArray();
                if (!$data['record_exist']) {
                    $data = [
                        'name' => $request->addmore[$i],
                      ];
                    ShipmentType::Create($data);
                }
            }
        }

        return 'success';
    }


    public function importVehicles(){

        $data = [];
        $data= [
            "page_title"=>"Imported Vehicles",
            "id"=>"popup_button",
            "class"=>"companiespopup",
            "data_toggle"=>"modal",
            "data_target"=>"companiesmodal",
            "tab"=>"companies",
            "value"=>"companies",
        ];

        $notification = $this->Notification();
        $data['importVehicles'] = ImportVehicle::all();
        $data['customers'] = User::role('Customer')->get()->toArray();
        $data['vehicles_cart'] = VehicleCart::with('vehicle')->get()->toArray();

        return view($this->view . 'import_vehicles', $data, $notification);
    }
}



