<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\ApiResponser;
use Illuminate\Support\Facades\Auth;
use App\Models\Sticky;
use Illuminate\Support\Facades\Validator;

class StickyNoteController extends Controller
{
    use ApiResponser;
    private $perpage = 10;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if(Auth::user()->hasRole("Super Admin")){
            $data['records'] = Sticky::with('user')->get()->toArray();
            // $data['location'] = Location::all()->toArray();
            // $data['location'] = LoadingCountry::select('state')->where('status', '1')->groupBy('state')->get()->toArray();
            return $this->success($data, "Sticky Notes Data List", 200);
            }
            else{
                $data['records'] = Sticky::with('user')->where('customer_id',auth()->user()->id)->get()->toArray();
            return $this->success($data, "Sticky Notes Data List", 200);
                
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
        //
        $validated = Validator::validate(
            $request->all(),
            [
                'sticky_id' => 'required|string',
                'notes' => 'required|string',
            ]

        );
        $sticky_id = $request->sticky_id;
        $notes = $request->notes;
        $customer_id = Auth::user()->id;
        // $Obj = new Sticky;
        // $Obj->notes = $notes;
        // $Obj->sticky_id = $sticky_id;
        // $Obj->customer_id = $customer_id;
        // $Obj->save();
        $obj=Sticky::firstOrCreate([
            'notes' => $notes,
            'sticky_id' => $sticky_id,
            'customer_id' => $customer_id
        ]);
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
        
        try {
            
            $data = Sticky::where('id',$id)->with('user')->get()->toArray();
            
            if($data){
                return $this->success($data,'Sticky Detail',200);
    
            }
            else {
                return $this->error('Sticky Not Found Not Found',401);
            }
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // Model not found, handle the exception here
            return response()->json(
                ['error' => 'Model not found'], 404);
        }
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
        try {
            $data = Sticky::destroy($id);
            if($data){
                return $this->success((bool)$data,'Sticky Deleted',200);
    
            }
            else {
                return $this->error('Sticky Not Found',401);
            }
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // Model not found, handle the exception here
            return response()->json(
                ['error' => 'Model not found'], 404);
        }
    }
}
