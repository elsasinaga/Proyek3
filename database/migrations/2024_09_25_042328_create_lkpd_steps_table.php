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
        Schema::create('lkpd_steps', function (Blueprint $table) {
            $table->id();

            $table->foreignId('lkpd_id')->constrained('module_lkpds')->onDelete('cascade');   
            $table->integer('step_number')->unsigned();

            $table->unique(['lkpd_id', 'step_number']);
            
            $table->string('step_title');
            $table->string('step_description')->nullable();
            $table->string('step_image')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lkpd_steps');
    }
};
