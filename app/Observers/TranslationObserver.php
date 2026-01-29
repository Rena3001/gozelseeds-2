<?php

namespace App\Observers;

use App\Models\Translation;
use Illuminate\Support\Facades\Cache;

class TranslationObserver
{
    protected function clearCache(Translation $translation)
    {
        Cache::forget(
            "trans.{$translation->locale}.{$translation->group}.{$translation->key}"
        );

        // fallback AZ üçün də sil
        if ($translation->locale !== 'az') {
            Cache::forget(
                "trans.az.{$translation->group}.{$translation->key}"
            );
        }
    }

    public function created(Translation $translation)
    {
        $this->clearCache($translation);
    }

    public function updated(Translation $translation)
    {
        $this->clearCache($translation);
    }

    public function deleted(Translation $translation)
    {
        $this->clearCache($translation);
    }
}
