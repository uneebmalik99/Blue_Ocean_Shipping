<?php

namespace Database\Seeders;

use App\Models\VehicleStatus;
use Illuminate\Database\Seeder;

class VehicleStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        VehicleStatus::create([
            'status_name' => 'New Order',
        ]);
        VehicleStatus::create([
            'status_name' => 'Dispatched',
        ]);
        VehicleStatus::create([
            'status_name' => 'On Hand',
        ]);
        VehicleStatus::create([
            'status_name' => 'No Title',
        ]);
        VehicleStatus::create([
            'status_name' => 'Towing',
        ]);
        VehicleStatus::create([
            'status_name' => 'Inventory Value',
        ]);
        VehicleStatus::create([
            'status_name' => 'Booked',
        ]);
    }
}
