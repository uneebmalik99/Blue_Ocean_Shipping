<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission as SpatiePremission;
use Spatie\Permission\Models\Role as SpatieRole;
use Spatie\Permission\Traits\HasRoles;



class PremissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SpatiePremission::create([
            'name' => 'view',
        ]);
        SpatiePremission::create([
            'name' => 'create',
        ]);
        SpatiePremission::create([
            'name' => 'edit',
        ]);
        SpatiePremission::create([
            'name' => 'delete',
        ]);
        SpatiePremission::create([
            'name' => 'Page Access',
        ]);


        $premissions = SpatiePremission::select('name')->get()->toArray();
        $role = SpatieRole::find(1)->first();
        $role->syncPermissions($premissions);

    }
}
