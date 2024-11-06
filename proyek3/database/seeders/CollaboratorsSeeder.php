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
        ]);

        Collaborator::create([
            'collaborator_name' => 'Ronaldo',
        ]);

        Collaborator::create([
            'collaborator_name' => 'Dzaki',
        ]);

        Collaborator::create([
            'collaborator_name' => 'Jupri',
        ]);
    }   
}