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
            // Data Admin Existing
            [
                'name' => 'Dimas Widy',
                'email' => 'dimas@gmail.com',
                'password' => 'dimas123',
                'role' => 'admin',
            ],
            [
                'name' => 'Dani tri',
                'email' => 'dani@gmail.com',
                'password' => 'dani123',
                'role' => 'admin',
            ],
            [
                'name' => 'ridho',
                'email' => 'ridho@gmail.com',
                'password' => 'ridho123',
                'role' => 'admin',
            ],
            [
                'name' => 'adam',
                'email' => 'adam@gmail.com',
                'password' => 'adam123',
                'role' => 'admin',
            ],
            [
                'name' => 'yanuar',
                'email' => 'yanuar@gmail.com',
                'password' => 'yanuar123',
                'role' => 'admin',
            ],
            [
                'name' => 'danny',
                'email' => 'danny@gmail.com',
                'password' => 'danny123',
                'role' => 'admin',
            ],

            [
                'name' => 'Budi Santoso',
                'email' => 'budi@gmail.com',
                'password' => 'budi123',
                'role' => 'customer',
            ],
            [
                'name' => 'Siti Aminah',
                'email' => 'siti@gmail.com',
                'password' => 'siti123',
                'role' => 'customer',
            ],
            [
                'name' => 'Andi Wijaya',
                'email' => 'andi@gmail.com',
                'password' => 'andi123',
                'role' => 'customer',
            ],
            [
                'name' => 'Dewi Lestari',
                'email' => 'dewi@gmail.com',
                'password' => 'dewi123',
                'role' => 'customer',
            ],
            [
                'name' => 'Fajar Ramadhan',
                'email' => 'fajar@gmail.com',
                'password' => 'fajar123',
                'role' => 'customer',
            ],
        ];

        foreach ($users as $user) {
            User::create([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => Hash::make($user['password']),
                'role' => $user['role'],
            ]);
        }
    }
}
