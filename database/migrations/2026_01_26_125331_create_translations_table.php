<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('translations', function (Blueprint $table) {
            $table->id();

            $table->string('group');
            $table->string('key');

            // Nova dummy insert üçün default VERİLİR
                  // Nova dummy insert üçün
            $table->string('locale')->default('az');

            // TEXT default ola bilməz → nullable
            $table->text('value')->nullable();
            $table->timestamps();

            // Unikal kombinasiya
            $table->unique(['group', 'key', 'locale']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('translations');
    }
};
