<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $users=[[
            'name'=>'User',
            'email'=>'user@gmail.com',
            'password'=>bcrypt('1234'),
            'role'=>0
        ],
       [
            'name'=>'Moderator',
            'email'=>'usModeratorer@gmail.com',
            'password'=>bcrypt('12345'),
            'role'=>1
        ],
       [
            'name'=>'admin',
            'email'=>'admin@example.com',
            'password'=>bcrypt('123456'),
            'role'=>2
        ]];
        foreach ($users as $user)
        {
            User::create($user);
        }
    }
}
