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
        Schema::create('module_lkpd_collabs', function (Blueprint $table) {
            $table->foreignId('lkpd_id')->constrained('module_lkpds')->onDelete('cascade');
            $table->foreignId('collab_id')->constrained('collaborators')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('module_lkpd_collabs');
    }
};
