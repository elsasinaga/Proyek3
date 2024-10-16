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
            'lkpd_image' => 'lkpd_images/dummy_image.jpg', // Tambahkan 1 di akhir
            'lkpd_description' => 'Materi tentang Computational Thinking untuk siswa.',
            'user_id' => 2, 
            'category_id' => 1, 
            'material_name' => 'Basic Concepts of Computational Thinking',
            'material_image' => 'materials_images/dummy_material1.jpg' // Tambahkan 1 di akhir
        ]);
        $moduleLkpd->tags()->attach([1, 2]);
    
        // Data kedua
        $moduleLkpd2 = ModuleLkpd::create([
            'lkpd_title' => 'Menyusun Algoritma dengan Berpikir Komputasional untuk Menyelesaikan Masalah Sehari-hari',
            'lkpd_image' => 'lkpd_images/dummy_image2.jpg', // Tambahkan 1 di akhir
            'lkpd_description' => 'Bagaimana membentuk cara berpikir komputasional bagi anak',
            'user_id' => 2, 
            'category_id' => 2, 
            'material_name' => 'Kertas dan Alat Tulis',
            'material_image' => 'materials_images/dummy_material2.jpg' // Tambahkan 1 di akhir
        ]);
        $moduleLkpd2->tags()->attach([3]);
    
        // Data ketiga
        $moduleLkpd3 = ModuleLkpd::create([
            'lkpd_title' => 'Pengenalan Algoritma Dasar',
            'lkpd_image' => 'lkpd_images/dummy_image3.jpg', // Tambahkan 1 di akhir
            'lkpd_description' => 'Materi pengenalan algoritma untuk siswa.',
            'user_id' => 3, 
            'category_id' => 1, 
            'material_name' => 'Algoritma dan Pemrograman',
            'material_image' => 'materials_images/dummy_material3.jpg' // Tambahkan 1 di akhir
        ]);
        $moduleLkpd3->tags()->attach([1, 2]);
    
        // Data keempat
        $moduleLkpd4 = ModuleLkpd::create([
            'lkpd_title' => 'Pemecahan Masalah dengan Algoritma',
            'lkpd_image' => 'lkpd_images/dummy_image4.jpg', // Tambahkan 1 di akhir
            'lkpd_description' => 'Pendekatan pemecahan masalah dengan algoritma.',
            'user_id' => 2, 
            'category_id' => 2, 
            'material_name' => 'Strategi Algoritma',
            'material_image' => 'materials_images/dummy_material4.jpg' // Tambahkan 1 di akhir
        ]);
        $moduleLkpd4->tags()->attach([3]);
    
        // Data kelima
        $moduleLkpd5 = ModuleLkpd::create([
            'lkpd_title' => 'Dasar-Dasar Pemrograman',
            'lkpd_image' => 'lkpd_images/dummy_image5.jpg', // Tambahkan 1 di akhir
            'lkpd_description' => 'Konsep dasar dalam pemrograman untuk siswa.',
            'user_id' => 3, 
            'category_id' => 1, 
            'material_name' => 'Pemrograman Dasar',
            'material_image' => 'materials_images/dummy_material5.jpg' // Tambahkan 1 di akhir
        ]);
        $moduleLkpd5->tags()->attach([1]);
    
        // Data keenam
        $moduleLkpd6 = ModuleLkpd::create([
            'lkpd_title' => 'Membangun Proyek Sederhana',
            'lkpd_image' => 'lkpd_images/dummy_image6.jpg', // Tambahkan 1 di akhir
            'lkpd_description' => 'Langkah-langkah membangun proyek pemrograman sederhana.',
            'user_id' => 2, 
            'category_id' => 2, 
            'material_name' => 'Proyek Pemrograman',
            'material_image' => 'materials_images/dummy_material6.jpg' // Tambahkan 1 di akhir
        ]);
        $moduleLkpd6->tags()->attach([2]);
    }
}
