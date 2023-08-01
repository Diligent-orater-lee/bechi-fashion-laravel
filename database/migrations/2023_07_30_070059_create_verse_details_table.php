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
        Schema::create('verse_details', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('verse_name')->unique();
            $table->string('verse_description');

            $table->boolean('is_ar_available');
            $table->string('verse_handle')->nullable()->unique();
            $table->string('ar_project_url')->nullable();
            $table->string('verse_audio_url')->nullable();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('verse_details');
    }
};
