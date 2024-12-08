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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('profile_image')->nullable();
            $table->text('about_me')->nullable();
            $table->string('npsn', 8);
            $table->unsignedBigInteger('collab_id');
            $table->unsignedBigInteger('user_id');
            $table->enum('notification_preference', ['none', 'immediate', 'daily'])
                  ->default('immediate');

            $table->foreign('npsn')
                ->references('npsn')
                ->on('schools')
                ->onDelete('cascade')
                ->onUpdate('cascade');   

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('collab_id')
                ->references('id')
                ->on('collaborators')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
