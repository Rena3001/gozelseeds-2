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
        Schema::create('contact_section_translations', function (Blueprint $table) {
    $table->id();

    $table->foreignId('contact_section_id')
        ->constrained()
        ->cascadeOnDelete();

    $table->string('locale', 5); // az, en, ru
    $table->text('text');

    $table->string('list_1')->nullable();
    $table->string('list_2')->nullable();
    $table->string('list_3')->nullable();

    $table->unique(['contact_section_id', 'locale']);
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_section_translations');
    }
};
