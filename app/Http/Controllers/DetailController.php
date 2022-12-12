<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\Location;
use App\Models\Notification;
use Carbon\Carbon;

class DetailController extends Controller
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
        // return $data['notification'];
        // dd(\Carbon\Carbon::now());
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

        // dd($data);
        return $data;
    }

  public function detail_page ($id = null){
    $data = [];
        
    $data = [
        "page_title" => $this->plural . " Detail_page",
        "page_heading" => $this->plural . 'detail_page',
        "breadcrumbs" => array('#' => $this->plural . " List"),
        "module" => [
            'type' => $this->type,
            'singular' => $this->singular,
            'plural' => $this->plural,
            'view' => $this->view,
            'db_key' => $this->db_key,
            'action' => $this->action,
            'page' => 'detail_page',
        ],
    ];
    // dd($data);
    $data['location'] = Location::all();
    $notification = $this->Notification();
    $data['invoices']=Invoice::find($id)->toArray();
    

    
    return view('invoice.detail_page',$data,$notification);
    // $data['location'] = Location::all();
    // $notification = $this->Notification();
    // return view('invoice.detail_page',$data,$notification);
  }
}
