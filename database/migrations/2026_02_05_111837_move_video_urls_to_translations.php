<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // 1️⃣ translations cədvəlinə columnlar əlavə et
        Schema::table('video_section_translations', function (Blueprint $table) {
            $table->string('button_url')->nullable();
            $table->string('video_url')->nullable();
        });

        // 2️⃣ Mövcud datanı köçür (ƏGƏR DATA VARSA)
        $sections = DB::table('video_sections')->get();

        foreach ($sections as $section) {
            DB::table('video_section_translations')
                ->where('video_section_id', $section->id)
                ->update([
                    'button_url' => $section->button_url,
                    'video_url'  => $section->video_url,
                ]);
        }

        // 3️⃣ Əsas cədvəldən columnları sil
        Schema::table('video_sections', function (Blueprint $table) {
            $table->dropColumn(['button_url', 'video_url']);
        });
    }

    public function down(): void
    {
        // rollback üçün geri qaytar
        Schema::table('video_sections', function (Blueprint $table) {
            $table->string('button_url')->nullable();
            $table->string('video_url')->nullable();
        });

        Schema::table('video_section_translations', function (Blueprint $table) {
            $table->dropColumn(['button_url', 'video_url']);
        });
    }
};
