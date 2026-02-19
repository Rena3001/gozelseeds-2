<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // 1. setting_translations cədvəlinə əlavə edirik
        Schema::table('setting_translations', function (Blueprint $table) {
            $table->string('catalog_link')->nullable()->after('address');
        });

        // 2. Köhnə məlumatları köçürmək (əgər lazımdırsa)
        $settings = DB::table('settings')->get();

        foreach ($settings as $setting) {
            DB::table('setting_translations')
                ->where('setting_id', $setting->id)
                ->update([
                    'catalog_link' => $setting->catalog_link
                ]);
        }

        // 3. settings cədvəlindən silirik
        Schema::table('settings', function (Blueprint $table) {
            $table->dropColumn('catalog_link');
        });
    }

    public function down(): void
    {
        // Geri qaytarmaq üçün

        Schema::table('settings', function (Blueprint $table) {
            $table->string('catalog_link')->nullable();
        });

        $translations = DB::table('setting_translations')->get();

        foreach ($translations as $translation) {
            DB::table('settings')
                ->where('id', $translation->setting_id)
                ->update([
                    'catalog_link' => $translation->catalog_link
                ]);
        }

        Schema::table('setting_translations', function (Blueprint $table) {
            $table->dropColumn('catalog_link');
        });
    }
};
