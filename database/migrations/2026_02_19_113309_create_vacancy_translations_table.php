<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('vacancy_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vacancy_id')
                  ->constrained()
                  ->onDelete('cascade');

            $table->string('locale', 5)->index();

            $table->string('title');
            $table->text('description')->nullable();
            $table->text('requirements')->nullable();

            $table->string('location')->nullable();
            $table->string('category')->nullable();
            $table->string('employment_type')->nullable();

            $table->timestamps();

            $table->unique(['vacancy_id', 'locale']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vacancy_translations');
    }
};
