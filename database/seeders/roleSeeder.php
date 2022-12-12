<?php

namespace Database\Seeders;

use App\Models\role;
use Illuminate\Database\Seeder;

class roleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        role::create([
            'name' => 'Super Admin',
        ]);
        role::create([
            'name' => 'Sub Admin',
        ]);
        role::create([
            'name' => 'Location Admin',
        ]);
        role::create([
            'name' => 'Customer',
        ]);
    }
}
