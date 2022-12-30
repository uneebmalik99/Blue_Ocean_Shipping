<?php

namespace Database\Seeders;

use App\Models\role;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role as SpatieRole;

class roleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SpatieRole::create([
            'name' => 'Super Admin',
        ]);
        SpatieRole::create([
            'name' => 'Sub Admin',
        ]);
        SpatieRole::create([
            'name' => 'Location Admin',
        ]);
        SpatieRole::create([
            'name' => 'Customer',
        ]);
    }
}
