<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('module_lkpd_tags', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('lkpd_id');
            $table->unsignedBigInteger('tag_id');

            $table->unique(['lkpd_id', 'tag_id']);

            $table->foreign('lkpd_id')
                  ->references('id')
                  ->on('module_lkpds')
                  ->onDelete('cascade');

            $table->foreign('tag_id')
                  ->references('id')
                  ->on('tags')
                  ->onDelete('cascade');

            // $table->foreignId('lkpd_id')->constrained('module_lkpds')->onDelete('cascade');
            // $table->foreignId('tag_id')->constrained('tags')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('module_lkpd_tags');
    }
};
