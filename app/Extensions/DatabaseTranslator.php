<?php

namespace App\Extensions;

use Illuminate\Translation\Translator;
use App\Support\DbTranslator;

class DatabaseTranslator extends Translator
{
    public function get($key, array $replace = [], $locale = null, $fallback = true)
    {
        $locale = $locale ?: $this->locale;

        // menu.home → group = menu, key = home
        if (str_contains($key, '.')) {
            [$group, $item] = explode('.', $key, 2);

            $value = DbTranslator::get($group, $item, $locale);

            if ($value) {
                return $this->makeReplacements($value, $replace);
            }
        }

        // tapılmadısa → default lang fayllara düşsün
        return parent::get($key, $replace, $locale, $fallback);
    }
}
