<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Location::create([
            'name' => "New Jersey",
            'zip_code' => "08701",
            'added_by_role' => "3",
        ]);
        Location::create([
            'name' => "Savannah",
            'zip_code' => "31401",
            'added_by_role' => "3",
        ]);
        Location::create([
            'name' => "Texas",
            'zip_code' => "77494",
            'added_by_role' => "3",
        ]);
        Location::create([
            'name' => "Los Angeles",
            'zip_code' => "90001",
            'added_by_role' => "3",
        ]);
        Location::create([
            'name' => "Seattle",
            'zip_code' => "98101",
            'added_by_role' => "3",
        ]);
        Location::create([
            'name' => "Baltimore",
            'zip_code' => "21211",
            'added_by_role' => "3",
        ]);
        Location::create([
            'name' => "Norfolk",
            'zip_code' => "23324",
            'added_by_role' => "3",
        ]);
    }
}
