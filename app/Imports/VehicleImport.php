<?php

namespace App\Imports;

use App\Models\ImportVehicle;
use App\Models\Vehicle;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class VehicleImport implements ToModel, WithHeadingRow
{
    // public $product_ids;
    /**
     * 
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
         $product_ids = '';
        // dd($row);
        // $Obj = new ImportVehicle;
        // return $Obj->create($row);
        if($row['entry_date'] != null){
            $product_ids = 'false';
            
        }
        else
        {
             return new ImportVehicle([
                'entry_date'  => $row['entry_date'],
                'sale_date' => $row['sale_date'],
            ]);
            $product_ids = 'true';
        }

        return $product_ids;


    }
}
