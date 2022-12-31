<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Super Admin',
            'username'=>'Super Admin',
            'authkey' => '09dss9daasdzxc',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'password_reset_token' => Null,
            'email' => 'admin@admin.com',
            'status' => '1',
            'role_id' => 1,
            'user_is_detected' => 0,
            'address_line1' => 'jad',
            'address_line2' => 'jkasdlf',
            'city' => 'jhang',
            'state' => Null,
            'zip_code'=> Null,
            'phone' => Null,
            'fax' => Null,
        ]);

        $user->assignRole('Super Admin');

        // User::factory()->count(10)->create();

    }
}
