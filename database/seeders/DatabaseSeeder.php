<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\Vehicle::factory(50)->create();
        // $this->call(VehicleTypeSeeder::class);
        $this->call(roleSeeder::class);
        $this->call(PremissionSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(VehicleStatusSeeder::class);
        // $this->call(ShipmentStatusSeeder::class);
    }
}
