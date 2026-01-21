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
        Schema::create('about_section_translations', function (Blueprint $table) {
            $table->id();

            $table->foreignId('about_section_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('locale', 5); // az, en, ru

            $table->string('tagline')->nullable();
            $table->string('title')->nullable();
            $table->string('subtitle')->nullable();
            $table->text('text')->nullable();
            $table->string('counter_text')->nullable();
            $table->string('video_title')->nullable();
            $table->string('video_text')->nullable();

            $table->unique(['about_section_id', 'locale']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_section_translations');
    }
};
