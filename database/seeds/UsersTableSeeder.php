<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
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
                'lastname' => 'Oniya',
                'firstname' => 'Daniel',
                'email' => 'daniel.prince84@gmail.com',
                'phone' => '08133887596',
                'password' => bcrypt('secret'),
            ],
            [
                'lastname' => 'Deborah',
                'firstname' => 'Deborah',
                'email' => 'deborah@mcu.edu.ng',
                'phone' => '08142645566',
                'password' => bcrypt('secret'),
            ],
        ];

        foreach ($users as $user) {

            factory(\App\User::class)->create([
                'lastname' => $user['lastname'],
                'firstname' => $user['firstname'],
                'email' => $user['email'],
                'phone' => $user['phone'],
                'password' => $user['password'],
            ]);
        }
    }
}
