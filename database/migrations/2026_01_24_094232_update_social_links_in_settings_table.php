<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('settings', function (Blueprint $table) {

            // twitter silinir
            if (Schema::hasColumn('settings', 'twitter')) {
                $table->dropColumn('twitter');
            }

            // yeni social linklər
            $table->string('tiktok')->nullable()->after('instagram');
            $table->string('linkedin')->nullable()->after('tiktok');
            $table->string('telegram')->nullable()->after('linkedin');
            $table->string('whatsapp')->nullable()->after('telegram');
        });
    }

    public function down(): void
    {
        Schema::table('settings', function (Blueprint $table) {

            // geri qaytarmaq üçün
            $table->string('twitter')->nullable();

            $table->dropColumn(['tiktok', 'linkedin', 'telegram']);
        });
    }
};
