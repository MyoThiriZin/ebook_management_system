<?php

use Illuminate\Database\Seeder;
use App\User;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'phone_no' => '09987654321',
                'address' => 'yangon',
                'password' => bcrypt('123456'),
                'type' => '0',
                'created_by' => 1,
                'updated_by' => 1,
            ];

        User::create($user);
    }
}
