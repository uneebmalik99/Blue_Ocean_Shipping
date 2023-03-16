<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Traits\ApiResponser;
use DB;
use Illuminate\Support\Facades\validator;
class InvoiceController extends Controller
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
        $data  = DB::table('invoices')
        // ->join('invoices', 'invoices.id', '=', 'vehicles.inovice_id')
        ->join('vehicles','inovice_id', '=', 'invoices.id')

        ->select('invoices.*', 'vehicles.vin','vehicles.year')
        ->get()->toArray();
        return $this->success($data,"All Invoices",200);
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
                'received_amount' => 'numeric',
                'invoice_document' => 'string',
                'invoice_amount' => 'string',
                'invoice_no' => 'numeric',
                'container_size' => 'string',
                'destination_port'=> 'string',
                'port_of_loading' => 'string',
                'company_name'=>'string',
                'ar_number' => 'string',

            ]
            );
            $data = $validated;
            $data['added_by_role'] = auth()->user()->id; 
            if($request->invoice_document){
                $file = $request->invoice_document;
                $file_name = time() . '.' . $file->extension();
                $docname = Storage::putFile($this->directory, $file);
                $file->move(public_path($this->directory), $docname);
                $data['invoice_document'] = $docname;        
            }
            $invoice = Invoice::firstOrCreate($data);
            if($invoice){
                return $this->success($invoice,'Invoice Detail',200);
    
            }
            else {
                return $this->error('Invoice Not Found Not Found',401);
            }
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
            $data  = DB::table('invoices')
        // ->join('invoices', 'invoices.id', '=', 'vehicles.inovice_id')
        ->join('vehicles','inovice_id', '=', 'invoices.id')

        ->select('invoices.*', 'vehicles.vin','vehicles.year')
        ->where('invoices.id', $id)->get()->toArray();
            if($data){
                return $this->success($data,'Invoice Detail',200);
    
            }
            else {
                return $this->error('Invoice Not Found Not Found',401);
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
            $data  = DB::table('invoices')
       
        ->join('vehicles','inovice_id', '=', 'invoices.id')

        ->select('invoices.*', 'vehicles.vin','vehicles.year')
        ->where('invoices.id', $id)->delete();
            if($data){
                return $this->success((bool)$data,'Invoice Delete',200);
    
            }
            else {
                return $this->error('Invoice Not Found or Not Deleted',401);
            }
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // Model not found, handle the exception here
            return response()->json(
                ['error' => 'Model not found'], 404);
        }
    }
}
