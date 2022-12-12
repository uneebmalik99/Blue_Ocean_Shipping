<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Notification;
use App\Models\User;
use App\Models\VehicleCart;
use Carbon\Carbon;
use Illuminate\Http\Request;

class NotificationController extends Controller
{

    private $type = "Notifications";
    private $singular = "Notification";
    private $plural = "Notifications";
    private $view = "notification.";
    private $db_key = "id";
    private $user = [];
    private $perpage = 100;
    private $directory = "/notification_images";
    private $action = "/admin/notifications";

    public function Notification()
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
            $data['notification'] = "asda";
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
                'current_time' => Carbon::now(),
            ],
        ];

        $data['vehicles_cart'] = VehicleCart::with('vehicle')->get()->toArray();


        $notification = $this->Notification();
        $data['user'] = User::role('Customer')->get();
        
        return view($this->view . 'list', $data, $notification);
    }

    public function create(Request $request)
    {
        $data = $request->session()->all();

        $request->validate([
            'subject' => 'required',
            'editor1' => 'required',
            'expirydate' => 'required',
        ]);
        //    $notification = new Notification();
        //    $notification->subject = $request->subject;
        //    $notification->message = $request->editor1;
        //    $notification->expiry_date = $request->expirydate;
        //    $notification->user_id = Auth::user()->id;
        //    $notification->save($request->all());

        $flight = Notification::updateOrCreate(
            ['id' => $request->id],
            [
                'subject' => $request->subject,
                'message' => $request->editor1,
                'expiry_date' => $request->expirydate,
                'user_id' => $request->user_id,
                'is_read' => $request->is_read,
                'status' => '0',

            ]
        );

        return back()->with('success', 'Notification Submitted Successfully');
    }

    public function del($id)
    {

        $res = Notification::find($id);
        $res->delete();
        if ($res) {
            return back()->with('success', 'Notification Deleted Successfully!');
        }

    }

    public function update_record(Request $req)
    {
        $id = $req->id;
        $data = Notification::find($id);
        return response($data);
    }

    public function search_record(Request $request)
    {
        $search = $request->search;

        $notifications = Notification::where('subject', 'LIKE', '%' . $search . '%')
            ->orWhere('message', 'LIKE', '%' . $search . '%')
            ->get();

        return response($notifications);

    }
    public function status(Request $request)
    {
        $Obj = new Notification;
        $data = $Obj->find($request->id);
        $status = $data['status'];
        if ($status == '0') {
            $data['status'] = '1';
            $data->save();
        }
        return Response($status);
    }
}
