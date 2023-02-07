<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use App\Traits\ApiResponser;

use Illuminate\Support\Facades\Validator;


class CustomerApiController extends Controller
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
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * 
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
    public function view_all_customers(){
        $users = User::role('Customer')->get();
        if($users){
            return response([
                'data' => $users,
                'success' => 'Success',
            ], 200);
        }
        else{
            return response([
                'data' => $users,
                'error' => 'fail',
            ], 401);
        }
    }
    public function view_buyer_ids($id = null){
        $buyyer_ids = User::with('billings')->whereid($id)->get()->toArray();
        if($buyyer_ids){
            $data['buyer_numbers'] = $buyyer_ids[0]['billings'][0]['buyer_number'];
            return $this->success($data, "Found Buyer Ids Successfully!", 200);
        }
        else{
            return $this->error('Not Found Any Buyer Id For This Customer', 401, $buyyer_ids);
        }
    }
    public function view_consignee($id = null){
        $data = [];
        $consignee = User::with('billings')->whereid($id)->get()->toArray();
        if($consignee){
            $data['consignee'] = $consignee[0]['billings'][0]['company_name'];
            return $this->success($data, "Found Buyer Ids Successfully!", 200);
        }
        else{
            return $this->error('Not Found Any Buyer Id For This Customer', 401, $consignee);
        }
    }
}
