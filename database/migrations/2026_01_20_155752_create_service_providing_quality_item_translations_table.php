<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('service_providing_quality_item_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->id();

            // ❌ foreignId()->constrained() YOX
            $table->unsignedBigInteger('service_providing_quality_item_id');

            $table->string('locale', 5); // az, en, ru
            $table->string('title');
            $table->text('text')->nullable();

            // ✅ QISA UNIQUE INDEX ADI
            $table->unique(
                ['service_providing_quality_item_id', 'locale'],
                'spq_item_trans_locale_unique'
            );

            // ✅ QISA FOREIGN KEY ADI
            $table->foreign(
                'service_providing_quality_item_id',
                'spq_item_trans_fk'
            )->references('id')
             ->on('service_providing_quality_items')
             ->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('service_providing_quality_item_translations');
    }
};
