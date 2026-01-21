<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('service_providing_quality_items', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->id();

            // ❌ foreignId()->constrained() YOX
            $table->unsignedBigInteger('service_providing_quality_id');

            $table->string('icon_class')->nullable(); // icon-agriculture, icon-farm
            $table->boolean('is_active')->default(true);
            $table->integer('order')->default(0);

            $table->timestamps();

            // ✅ QISA FOREIGN KEY ADI
            $table->foreign(
                'service_providing_quality_id',
                'spq_items_fk'
            )->references('id')
             ->on('service_providing_qualities')
             ->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('service_providing_quality_items');
    }
};
