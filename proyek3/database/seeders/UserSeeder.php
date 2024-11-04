<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        User::create([
            'name' => 'Admin User',
            'username' => 'admin',
            'email' => 'admin@example.com',
            'password' => Crypt::encryptString('password'),
            'is_admin' => true,
        ]);

        User::create([
            'name' => 'Regular User',
            'username' => 'Messi',
            'email' => 'user@example.com',
            'password' => Crypt::encryptString('password'),
            'is_admin' => false,
        ]);

        User::create([
            'name' => 'Another User',
            'username' => 'Ronaldo',
            'email' => 'anotheruser@example.com',
            'password' => Crypt::encryptString('password'),
            'is_admin' => false,
        ]);
    }
}
