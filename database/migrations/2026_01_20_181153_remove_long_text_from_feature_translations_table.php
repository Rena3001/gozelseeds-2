<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('feature_translations', function (Blueprint $table) {
            if (Schema::hasColumn('feature_translations', 'long_text')) {
                $table->dropColumn('long_text');
            }
        });
    }

    public function down(): void
    {
        Schema::table('feature_translations', function (Blueprint $table) {
            $table->longText('long_text')->nullable()->after('description');
        });
    }
};

