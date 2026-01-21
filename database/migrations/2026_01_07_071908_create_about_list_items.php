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
        Schema::create('about_list_items', function (Blueprint $table) {
            $table->id();

            $table->foreignId('about_section_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('locale', 5); // az, en, ru
            $table->string('text');

            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);

            $table->unique(['about_section_id', 'locale', 'order']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_list_items');
    }
};
