<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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
            'password' => Hash::make('password'), // hash password for security
            'is_admin' => true,
            'notification_preference' => 'immediate',
        ]);

        User::create([
            'name' => 'Regular User',
            'username' => 'akun1',
            'email' => 'user@example.com',
            'password' => Hash::make('password'),
            'is_admin' => false,
            'notification_preference' => 'immediate',
        ]);

        User::create([
            'name' => 'Another User',
            'username' => 'akun2',
            'email' => 'anotheruser@example.com',
            'password' => Hash::make('password'),
            'is_admin' => false,
            'notification_preference' => 'immediate',
        ]);
    }
}
