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
        // User::create([
        //     'username'=>'kashif',
        //     'authkey' => '09dss9daasdzxc',
        //     'password' => '$2y$10$p2kJCt2lu6VEUIY7Wa61c.vxpB8DDbQp3hQOJHB5u9CeZyY7GAkqC', // 123456789
        //     'password_reset_token' => Null,
        //     'email' => 'kashif@gmail.com',
        //     'status' => '0',
        //     'role_id' => 1,
        //     'user_is_detected' => 0,
        //     'address_line1' => 'jad',
        //     'address_line2' => 'jkasdlf',
        //     'city' => 'jhang',
        //     'state' => Null,
        //     'zip_code'=> Null,
        //     'phone' => Null,
        //     'fax' => Null,
        //     'customer_name' =>Null,
        // ]);
        User::factory()->count(10)->create();

    }
}
