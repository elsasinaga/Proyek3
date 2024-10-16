<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('module_lkpds', function (Blueprint $table) {
            $table->id('lkpd_id'); // Menggunakan lkpd_id sebagai primary key
            $table->string('lkpd_title');
            $table->string('lkpd_image')->nullable();
            $table->text('lkpd_description')->nullable(); // Ubah ke text untuk deskripsi panjang
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');  
            $table->string('material_name')->nullable();
            $table->string('material_image')->nullable();
            $table->string('Kelas')->nullable();
            $table->string('Jenjang')->nullable();
            $table->string('kolaborasi')->nullable(); // Tambahkan kolom ini
            $table->string('tags')->nullable(); // Tambahkan kolom ini
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('module_lkpds');
    }
};