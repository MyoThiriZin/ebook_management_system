<?php

use Illuminate\Database\Seeder;
use App\Contact;
class ContactlistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'John',
                'email' => 'jon@gmail.com',
                'message' => 'good as new',
                'phone_no' => '0986547463',
            ],
            [
                'name' => 'Meyer',
                'email' => 'jmey@gmail.com',
                'message' => 'sfydgvyusgd',
                'phone_no' => '3453453453',
            ]
        ];
        foreach ($users as $user) {
            Contact::create($user);
        }
    }
}
