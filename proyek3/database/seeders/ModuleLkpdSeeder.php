<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ModuleLkpd;
use App\Models\Tag;

class ModuleLkpdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $moduleLkpd = ModuleLkpd::create([
            'lkpd_title' => 'Computational Thinking',
            'lkpd_image' => 'lkpd_images/dummy_image.jpg',
            'lkpd_description' => 'Materi tentang Computational Thinking untuk siswa.',
            'user_id' => 2, 
            'category_id' => 1, 
            'material_name' => 'Basic Concepts of Computational Thinking',
            'material_image' => 'materials_images/dummy_material.jpg'
        ]);

        $moduleLkpd->tags()->attach([1, 2]);
    }
}
