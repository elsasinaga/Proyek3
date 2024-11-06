<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Profile;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Profile::create([
            'profile_image' => '',
            'about_me' => 'tes1',
            'npsn' => '12345678',
            'collab_id' => 1,
            'user_id' => 2,
        ]);

        Profile::create([
            'profile_image' => '',
            'about_me' => 'tes1',
            'npsn' => '12345678',
            'collab_id' => 2,
            'user_id' => 3,
        ]);
    }
}
