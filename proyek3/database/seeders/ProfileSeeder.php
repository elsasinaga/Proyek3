<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Profile;

$table->string('profile_image')->nullable();
            $table->text('about_me')->nullable();
            $table->string('npsn', 8);
            $table->unsignedBigInteger('collab_id');
            $table->unsignedBigInteger('user_id');
            $table->enum('notification_preference', ['none', 'immediate', 'daily'])
                  ->default('immediate');
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
