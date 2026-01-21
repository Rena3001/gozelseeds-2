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
        Schema::create('feature_translations', function (Blueprint $table) {
            $table->id();

            $table->foreignId('feature_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('locale', 5); // az, en, ru

            $table->string('title');      // Best Quality Standards
            $table->string('button_text')->nullable(); // Discover More

            $table->unique(['feature_id', 'locale']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feature_translations');
    }
};
