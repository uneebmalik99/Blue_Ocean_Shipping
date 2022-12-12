<?php

namespace Database\Seeders;

use App\Models\ShipmentStatus;
use Illuminate\Database\Seeder;

class ShipmentStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ShipmentStatus::create([
            'name' => 'Booked',
        ]);
        ShipmentStatus::create([
            'name' => 'Shipped',
        ]);
        ShipmentStatus::create([
            'name' => 'Arrived',
        ]);
        ShipmentStatus::create([
            'name' => 'Completed',
        ]);
    }
}
