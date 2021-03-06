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
        $users = [
            [
                'name' => 'nilson',
                'email' => 'nilson@email.com',
                'password' => 'nilson1234',
                'role' => '0'
            ]
        ];

        foreach($users as $user){
            User::create($user);
        }
    }
}
