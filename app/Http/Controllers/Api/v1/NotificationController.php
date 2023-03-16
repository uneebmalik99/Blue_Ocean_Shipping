<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notification;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Traits\ApiResponser;

class NotificationController extends Controller
{
    use ApiResponser;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if(Auth::user()->hasRole("Super Admin")){
            $data['records'] = Notification::with('user')->get()->toArray();
            // $data['location'] = Location::all()->toArray();
            // $data['location'] = LoadingCountry::select('state')->where('status', '1')->groupBy('state')->get()->toArray();
            return $this->success($data, "Notification Data List", 200);
            }
            else{
                $data['records'] = Notification::with('user')->where('user_id',auth()->user()->id)->get()->toArray();
            return $this->success($data, "Notification Data List", 200);
                
            }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = Validator::validate(
            $request->all(),
            [
                'subject' => 'string',
                'message' => 'string',
                'expiry_date' => 'string',
                'is_read' => 'numeric',
                'status' => 'numeric',
            ]

        );
        $data = [
            'subject' => $request->subject,
            'message' => $request->editor1,
            'expiry_date' => $request->expirydate,
            'user_id' => auth()->user()->id,
            'is_read' => $request->is_read,
            'status' => $request->status,
        ];
        $obj=Notification::firstOrCreate($data);
        $output = "created";
        return $this->success($obj,$output);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
