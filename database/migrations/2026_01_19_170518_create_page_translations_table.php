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
        Schema::create('page_translations', function (Blueprint $table) {
            $table->id();

            $table->foreignId('page_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('locale', 5); // az, en, ru

    

            // About Content
            $table->string('tagline')->nullable();
            $table->string('content_title')->nullable();
            $table->string('subtitle')->nullable();
            $table->text('description')->nullable();

            // Feature boxes
            $table->string('feature_1_title')->nullable();
            $table->text('feature_1_text')->nullable();
            $table->string('feature_2_title')->nullable();
            $table->text('feature_2_text')->nullable();


            $table->unique(['page_id', 'locale']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('page_translations');
    }
};
