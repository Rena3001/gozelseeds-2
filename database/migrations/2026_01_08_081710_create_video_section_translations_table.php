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
        Schema::create('video_section_translations', function (Blueprint $table) {
            $table->id();

            $table->foreignId('video_section_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('locale', 5); // az, en, ru

            $table->string('title')->nullable();
            $table->string('video_title')->nullable();

            $table->unique(['video_section_id', 'locale']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('video_section_translations');
    }
};
