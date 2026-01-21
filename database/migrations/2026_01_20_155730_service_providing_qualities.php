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
        Schema::create('service_providing_qualities', function (Blueprint $table) {
            $table->id();

            $table->string('bg_image')->nullable();       // providing-quality-one-bg.png
            $table->string('main_image')->nullable();     // providing-quality-v1-img.jpg
            $table->string('logo_image')->nullable();     // providing-quality.png

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
        Schema::dropIfExists('service_providing_qualities');
    }
};
