<?php

namespace App\Support;

use App\Models\Translation;
use Illuminate\Support\Facades\Cache;

class DbTranslator
{
    public static function get(string $group, string $key, string $locale)
    {
        return Cache::remember(
            "trans.{$locale}.{$group}.{$key}",
            3600,
            function () use ($group, $key, $locale) {

                // əvvəl cari dili yoxla
                $value = Translation::where('group', $group)
                    ->where('key', $key)
                    ->where('locale', $locale)
                    ->value('value');

                // fallback AZ
                if (!$value && $locale !== 'az') {
                    $value = Translation::where('group', $group)
                        ->where('key', $key)
                        ->where('locale', 'az')
                        ->value('value');
                }

                return $value;
            }
        );
    }
}
