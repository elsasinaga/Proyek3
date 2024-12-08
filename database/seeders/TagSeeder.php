<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tag::create([
            'tag_name' => 'Geogebra',
            'category_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Tag::create([
            'tag_name' => 'Robot Mouse',
            'category_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Tag::create([
            'tag_name' => 'Kertas',
            'category_id' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
