<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('service_providing_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->id();

            $table->unsignedBigInteger('service_providing_id');

            $table->string('locale', 5); // az, en, ru
            $table->string('tagline')->nullable();
            $table->string('title');

            // 🔹 QISA UNIQUE INDEX ADI
            $table->unique(
                ['service_providing_id', 'locale'],
                'sp_trans_locale_unique'
            );

            // 🔹 QISA FOREIGN KEY ADI
            $table->foreign(
                'service_providing_id',
                'sp_trans_fk'
            )->references('id')
             ->on('service_providing_qualities')
             ->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('service_providing_translations');
    }
};
