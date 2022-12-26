<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'test user 1', 'email' => 'testuser1@gmail.com', 'password' => Hash::make('password')],
            ['name' => 'test user 2', 'email' => 'testuser2@gmail.com', 'password' => Hash::make('password')],
            ['name' => 'test user 3', 'email' => 'testuser3@gmail.com', 'password' => Hash::make('password')],
            ['name' => 'test user 4', 'email' => 'testuser4@gmail.com', 'password' => Hash::make('password')],
            ['name' => 'test user 5', 'email' => 'testuser5@gmail.com', 'password' => Hash::make('password')],
        ];

        User::insert($data);
    }
}
