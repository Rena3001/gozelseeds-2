<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('setting_translations', function (Blueprint $table) {
            // artıq olan
            // $table->string('address'); // Azərbaycan

            // yeni əlavə olunanlar
            $table->string('address_turkey')->nullable()->after('address');
            $table->string('address_spain')->nullable()->after('address_turkey');
            $table->string('address_uzbekistan')->nullable()->after('address_spain');
        });
    }

    public function down(): void
    {
        Schema::table('setting_translations', function (Blueprint $table) {
            $table->dropColumn([
                'address_turkey',
                'address_spain',
                'address_uzbekistan',
            ]);
        });
    }
};
