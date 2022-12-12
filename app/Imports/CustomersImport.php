<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CustomersImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        // dd($row);
        unset($row['id']);
        unset($row['auth_key']);
        unset($row['user_id_detected']);
        $Obj = new User;
        $row['status'] = "0";
        return $Obj->create($row);

    }
}
