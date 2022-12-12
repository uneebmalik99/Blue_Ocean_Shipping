<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\User;
use App\Models\Location;
use App\Models\VehicleCart;
// use App\Models\role;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    private $type = "Users";
    private $singular = "User";
    private $plural = "Users";
    private $view = "user.";
    private $db_key = "id";
    private $perpage = 100;
    private $user = [];
    private $directory = "user_images";
    private $action = "/admin/users";

    public function Notification()
    {
        $data['notification'] = Notification::with('user')->paginate($this->perpage);
        $data['location'] = Location::all();
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
    //    return auth()->user()->getRoleNames();
    // return User::role('Super Admin')->get();

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
        $data['vehicles_cart'] = VehicleCart::with('vehicle')->get()->toArray();


        // $data['role'] = Auth::user()->role;
        // if ($data['role']->name == 'Customer') {

        if(Auth::user()->hasRole('Customer')){

            $records = User::where('email', Auth::user()->email)->get();
            $data['records'] = $records;

        } else {

            $records = User::with('roles')->where('role_id', 1)->orwhere('role_id', 2)->orwhere('role_id', 3)->get();
            // return $records;
            $data['records'] = $records;
            
        }

        $notification = $this->Notification();
        return view($this->view . 'list', $data, $notification);
   
    }

    public function create(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            $Obj = new User;
            $Obj->create($data);
        }
        $data = [];
        $data = [
            "page_title" => $this->plural . " create",
            "page_heading" => $this->plural . ' create',
            "breadcrumbs" => array("dashboard" => "Dashboard", "#" => $this->plural . " create"),
            "module" => ['type' => $this->type,
                'type' => $this->type,
                'singular' => $this->singular,
                'plural' => $this->plural,
                'view' => $this->view,
                'db_key' => $this->db_key,
                'action' => $this->action,
                'page' => 'create',
            ],
        ];
        $notification = $this->Notification();
        return view($this->view . "create_edit", $data, $notification);

    }

    public function edit(Request $request, $id = null)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            if (isset($data['password']) && !empty($data['password'])) {
                $data['password'] = Hash::make($data['password']);
            } else {
                unset($data['password']);
            }
            $Obj = User::find($id);
            $request->validate([
                'username' => 'required',
                'email' => 'required|email|unique:users',
                'status' => 'required|min:1',
                'phone' => 'required|numeric',
                'customer_name' => 'required|min:8',
            ]);
            $Obj->update($data);
        }
        $action = url($this->action . '/edit/' . $id);
        $data = [];
        $data = [
            "page_title" => "Edit " . $this->singular,
            "page_heading" => "Edit " . $this->singular,
            "button_text" => "Update ",
            "breadcrumbs" => array("dashboard" => "Dashboard", "#" => $this->plural . " List"),
            'action' => $action,
            "module" => ['type' => $this->type,
                'type' => $this->type,
                'singular' => $this->singular,
                'plural' => $this->plural,
                'view' => $this->view,
                'db_key' => $this->db_key,
                'action' => $this->action,
                'page' => 'edit',
            ],
        ];
        $notification = $this->Notification();
        $data['user'] = User::find($id)->toArray();
        return view($this->view . 'create_edit', $data, $notification);
    }

    public function delete($id)
    {

        $user = User::find($id);
        $user->delete();
        // return view($this->view . 'list');
        return back()->with('delete', 'User Deleted Successfully');
    }

    public function profile(Request $request, $id = null)
    {
        $data = [];
        $data = [
            "page_title" => $this->singular . ' Profile',
            "page_heading" => $this->singular . ' Profile',
            "breadcrumbs" => array("dashboard" => "Dashboard", "#" => $this->plural . " List"),
            "module" => ['type' => $this->type,
                'type' => $this->type,
                'singular' => $this->singular,
                'plural' => $this->plural,
                'view' => $this->view,
                'db_key' => $this->db_key,
                'action' => $this->action,
                'page' => 'profile',
            ],
        ];
        $data['vehicles_cart'] = VehicleCart::with('vehicle')->get()->toArray();
        $user = User::find($id);
        $notification = $this->Notification();
        $data['records'] = User::find($id)->toArray();
        $data['roles'] = Role::all()->whereNotIn('name', $user->getRoleNames())->toArray();
        
        $data['permissions'] = Permission::all()->whereNotIn('name',$user->getPermissionsViaRoles())->take(5)->toArray();
        
        $data['assignRoles'] = $user->getRoleNames();
        $data['assignPermissions'] = $user->getPermissionsViaRoles();

        $data['routes'] = Permission::all()->skip(5);
        $data['assignedRoutes'] = $user->getAllPermissions()->skip(5);
        return view($this->view . 'profile', $data, $notification);


    }

    public function updateProfile(Request $request)
    {
        $data = $request->all();
        if (isset($data['password']) && !empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }
        if (isset($data['password']) && empty($data['password']) || $data['password'] == null) {
            unset($data['password']);
        }

        User::find(Auth::id())->update($data);
        return back()->with('success', 'Profile successfully updated.');
    }

    public function search(Request $request)
    {
        if ($request->ajax()) {
            $table = "";
            $page = "";
            $total = User::all()->toArray();
            $records = new User;
            if ($request->search) {
                $records = $records->where('username', 'LIKE', '%' . $request->search . "%")
                    ->orWhere('email', 'LIKE', '%' . $request->search . "%")
                    ->orWhere('status', 'LIKE', '%' . $request->search . "%")
                    ->orWhere('city', 'LIKE', '%' . $request->search . "%")
                    ->orWhere('state', 'LIKE', '%' . $request->search . "%")
                    ->orWhere('phone', 'LIKE', '%' . $request->search . "%")
                    ->orWhere('customer_name', 'LIKE', '%' . $request->search . "%");
            }
            if ($request->pagination) {
                $this->perpage = $request->pagination;
                $records = $records->paginate($this->perpage);
            }

            if ($records) {
                $i = 1;
                foreach ($records as $val) {
                    $url_edit = url($this->action . '/edit/' . $val->id);
                    $url_delete = url($this->action . '/delete/' . $val->id);
                    $table .= '<tr>' .
                    '<td>' . $i . '</td>' .
                    '<td>' . $val->username . '</td>' .
                    '<td>' . $val->email . '</td>' .
                    '<td>' . $val->status . '</td>' .
                    '<td>' . $val->city . '</td>' .
                    '<td>' . $val->state . '</td>' .
                    '<td>' . $val->phone . '</td>' .
                    '<td>' . $val->customer_name . '</td>' .

                        '<td>' . '<button><a href=' . $url_edit . '><i class=' . '"ti-pencil"' . '></i></a></button>' . '<button><a href=' . $url_delete . '><i class=' . '"ti-trash"' . '></i></a></button>' . '</td>' .
                        '</tr>';
                    $i++;
                }
                $page .= '<div>' . '<div>' . '<p>' . 'Displaying ' . $records->count() . ' of ' . count($total) . ' user(s)' . '</p>' . '</div>' . '<div>' . $records->links() . '</div>' . '</div>';
                $output = [
                    'table' => $table,
                    'pagination' => $page,
                ];
                return Response($output);
            }
        }
    }

    public function createRole()
    {

        $data = [];
        $data = [
            "page_title" => $this->plural . " Create Role",
            "page_heading" => $this->plural . ' CreateRole',
            "breadcrumbs" => array('#' => $this->plural . " List"),
            "module" => [
                'type' => $this->type,
                'singular' => $this->singular,
                'plural' => $this->plural,
                'view' => $this->view,
                'db_key' => $this->db_key,
                'action' => $this->action,
                'page' => 'CreateRole',
                'action' => $this->action,
            ],
        ];
        $data['roles'] = role::all()->toArray();
        $data['vehicles_cart'] = VehicleCart::with('vehicle')->get()->toArray();


        $notification = $this->Notification();
        return view($this->view . 'showRole', $data, $notification);

    }

    public function createroles()
    {
        $data['permissions'] = Permission::all()->toArray();
        $output = view('user.createRole',$data)->render();
        return Response($output);

    }

    public function addRoles(Request $req)
    {
        $role = role::updateOrCreate(
            ['id' => $req->id],
            [
                'name' => $req['role_name'],
            ]
        );
        $role->givePermissionTo($req['permission']);
        return Response($role);
    }

    public function deleteRole($id)
    {
        $role = role::find($id);
        $role->delete();
        if ($role) {
            return back()->with('delete', 'Role Deleted Successfully!');

        }
    }

    public function showUpdateRole(Request $req)
    {
        $id = $req->id;
        $role = role::find($id)->first();
        $data['roles'] = $role->toArray();
        $data['permissions'] = $role->permissions;
        $output = view('user.createRole', $data)->render();
        return Response($output);

    }


    public function showUpdateUser(Request $req)
    {   
        
        $id = $req->id;
        $data['user'] = User::find($id)->toArray();
        $data['roles'] = role::get();
        $output = view('user.createuser', $data)->render();
        return Response($output);

    }
    public function createUser(Request $req){
        $data['roles'] = role::get();
        $output = view('user.createUser',$data)->render();
        return Response($output);
    }
    public function addUsers(Request $req){
        $role = role::where('id',$req['role_id'])->select('name')->first();
        
        $user = User::updateOrCreate(
            ['id' => $req->id],
            [
                "name" => $req['name'],
                "username" => $req['user_name'],
                "password" => Hash::make($req['password']),
                "email" => $req['email'],
                "company_name" => $req['company_name'],
                "company_email" => $req['company_email'],
                "address_line1" => $req['address_line1'],
                "address_line2" => $req['address_line2'],
                "city" => $req['city'],
                "country" => $req['country'],
                "zip_code" => $req['zip_code'],
                "phone" => $req['phone'],
                "role_id" => $req['role_id']
            ]
        );
        
        if($role['name'] == 'Super Admin'){
            $user->assignRole('Super Admin');
        }
        if($role['name'] == 'Sub Admin'){
            $user->assignRole('Sub Admin');
        }
        if($role['name'] == 'Location Admin'){
            $user->assignRole('Location Admin');
        }
        if($role['name'] == 'Customer'){
            $user->assignRole('Customer');
        }
        
        return Response($user);
    }
    public function assignRole(Request $req){
        
        $user = User::where('id',$req['id'])->first();
        $role = $user->assignRole($req['role']);
        if($role){
            return "Assigned";
        }
    }
    public function dismissrole(Request $req){
        $user = User::where('id',$req['id'])->first();
        $role = $user->removeRole($req['role']);
        if($role){
            return "Revoked";
        }
    }
    public function permissions(){
        $data['permissions'] = Permission::all()->toArray();
        
        $output = view('user.showPermission',$data)->render();

        return Response($output);
    }
    public function roles(){
        $data['roles'] = role::all()->toArray();
        $output = view('user.showRoles',$data)->render();
        return Response($output);
    }
    public function assignroute(Request $req){
    
        $user = User::where('id',$req['id'])->first();
        $role = $user->givePermissionTo($req['role']);
        if($role){
            return "Assigned";
        }
    }
    public function dismissroute(Request $req){
        $user = User::where('id',$req['id'])->first();
        $role = $user->revokePermissionTo($req['role']);
        if($role){
            return "Revoked";
        }
    }

}
