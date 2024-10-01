<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Collaborator;

class CollaboratorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Collaborator::create([
            'collaborator_name' => 'Messi',
            'profile_image'=> '',
            'about_me' => 'tes1',
            'npsn' => '12345678',
            'user_id' => 2,
        ]);

        Collaborator::create([
            'collaborator_name' => 'Ronaldo',
            'profile_image'=> '',
            'about_me' => 'tes2',
            'npsn' => '87654321',
            'user_id' => 3,
        ]);
    }
}