<?php

namespace App\Providers;

use App\Models\Translation;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (Schema::hasTable('translations')) {
            $locale = App::getLocale();

            $translations = Cache::remember(
                "translations_{$locale}",
                3600,
                function () use ($locale) {
                    return Translation::where('locale', $locale)->get();
                }
            );

            foreach ($translations as $item) {
                Lang::addLines([
                    "{$item->group}.{$item->key}" => $item->value
                ], $locale);
            }
        }
        
    }
}
