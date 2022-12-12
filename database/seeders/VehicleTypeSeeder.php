<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\VehicleType;
class VehicleTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        VehicleType::create([
            'vehicle_type' => 'SEDAN',
        ]);
        VehicleType::create([
            'vehicle_type' => 'COUPE',
        ]);
        VehicleType::create([
            'vehicle_type' => 'SPORTS CAR',
        ]);
        VehicleType::create([
            'vehicle_type' => 'STATION WAGON',
        ]);
    }
}
