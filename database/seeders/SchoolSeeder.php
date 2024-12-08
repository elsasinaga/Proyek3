<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\School;

class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        School::create([
            'npsn' => '12345678',
            'school_name' => 'Sekolah Dasar Negeri 1',
            'school_address' => 'Jl. Raya Pendidikan No.1',
        ]);

        School::create([
            'npsn' => '87654321',
            'school_name' => 'Sekolah Menengah Pertama 2',
            'school_address' => 'Jl. Pendidikan Jaya No.2',
        ]);

        School::create([
            'npsn' => '12348765',
            'school_name' => 'Sekolah Menengah Atas 3',
            'school_address' => 'Jl. Belajar No.3',
        ]);
    }
}
