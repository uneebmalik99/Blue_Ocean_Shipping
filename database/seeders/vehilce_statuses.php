<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\vehicleStatus;

class vehilce_statuses extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        vehicleStatus::create([
            'status_id' => 0,
            'Status_name' => 'onhand'
        ]);
        vehicleStatus::create([
            'status_id' => 1,
            'Status_name' => 'dispatch'
        ]);
        vehicleStatus::create([
            'status_id' => 2,
            'Status_name' => 'Manifest'
        ]);
        vehicleStatus::create([
            'status_id' => 3,
            'Status_name' => 'Shipped'
        ]);
        vehicleStatus::create([
            'status_id' => 4,
            'Status_name' => 'Arrived'
        ]);
    }
}
