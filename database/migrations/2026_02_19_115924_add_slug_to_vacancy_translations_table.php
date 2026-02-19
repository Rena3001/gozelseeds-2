<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

return new class extends Migration
{
    public function up(): void
    {
        // 1) Column əlavə et (nullable)
        Schema::table('vacancy_translations', function (Blueprint $table) {
            $table->string('slug')->nullable()->after('locale');
        });

        // 2) Mövcud record-lar üçün slug generasiya et
        $translations = DB::table('vacancy_translations')
            ->select('id', 'title')
            ->get();

        foreach ($translations as $translation) {

            $baseSlug = Str::slug($translation->title ?? 'vacancy');
            $slug = $baseSlug;
            $i = 1;

            while (
                DB::table('vacancy_translations')
                    ->where('slug', $slug)
                    ->where('id', '!=', $translation->id)
                    ->exists()
            ) {
                $slug = $baseSlug . '-' . $i;
                $i++;
            }

            DB::table('vacancy_translations')
                ->where('id', $translation->id)
                ->update(['slug' => $slug]);
        }

        // 3) Unique index əlavə et
        Schema::table('vacancy_translations', function (Blueprint $table) {
            $table->unique('slug', 'vacancy_translations_slug_unique');
        });
    }

    public function down(): void
    {
        Schema::table('vacancy_translations', function (Blueprint $table) {
            $table->dropUnique('vacancy_translations_slug_unique');
            $table->dropColumn('slug');
        });
    }
};
