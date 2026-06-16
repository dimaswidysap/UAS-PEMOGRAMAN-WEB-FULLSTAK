<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class Users extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $users = [
            [
                'name' => 'Dimas Widy',
                'email' => 'dimas@gmail.com',
                'password' => 'dimas123',
            ],
            [
                'name' => 'Dani tri',
                'email' => 'dani@gmail.com',
                'password' => 'dani123',
            ],
            [
                'name' => 'ridho',
                'email' => 'ridho@gmail.com',
                'password' => 'ridho123',
            ],
            [
                'name' => 'adam',
                'email' => 'adam@gmail.com',
                'password' => 'adam123',
            ],
            [
                'name' => 'yanuar',
                'email' => 'yanuar@gmail.com',
                'password' => 'adam123',
            ],
            [
                'name' => 'danny',
                'email' => 'danny@gmail.com',
                'password' => 'danny123',
            ],
        ];

        foreach ($users as $user) {
            User::create([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => Hash::make($user['password']),
            ]);
        }
    }
}
