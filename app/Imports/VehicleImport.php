<?php

namespace App\Imports;

use App\Models\ImportVehicle;
use App\Models\Vehicle;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class VehicleImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $Obj = new ImportVehicle;
        return $Obj->create($row);
    }
}
