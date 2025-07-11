<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
                'name' => "Sonny Taniguchi",
                'email' => "admin@mail.com",
                'password' => Hash::make('123'),
            ],
        ];
        User::insert($users);
    }
}
