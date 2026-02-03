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
      Schema::create('languages', function (Blueprint $table) {
    $table->id();
    $table->string('code', 5)->unique();   // az, en, ru
    $table->string('label', 10);           // AZ, EN, RU
    $table->string('name');                // Azərbaycan, English
    $table->string('flag')->nullable();    // az.svg
    $table->boolean('is_active')->default(true);
    $table->integer('order')->default(0);
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('languages');
    }
};
