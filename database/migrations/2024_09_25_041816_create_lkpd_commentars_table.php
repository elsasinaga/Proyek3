<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('lkpd_commentars', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('lkpd_id');
            $table->text('commentar_contents');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('parent_commentar')->nullable();
            $table->timestamps();

            $table->foreign('lkpd_id')
                  ->references('id')
                  ->on('module_lkpds')
                  ->onDelete('cascade');

            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');

            $table->foreign('parent_commentar')
                  ->references('id')
                  ->on('lkpd_commentars')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lkpd_commentars');
    }
};