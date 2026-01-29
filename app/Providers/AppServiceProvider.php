<?php

namespace App\Providers;

use App\Models\ContactInfoSmtp;
use App\Models\Translation;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Extensions\DatabaseTranslator;
use Illuminate\Translation\FileLoader;
use Illuminate\Filesystem\Filesystem;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function register()
    {
        $this->app->singleton('translator', function ($app) {
            $loader = new FileLoader(
                new Filesystem,
                $app['path.lang']
            );

            $translator = new DatabaseTranslator(
                $loader,
                App::getLocale() // ✅
            );

            $translator->setFallback($app['config']['app.fallback_locale']);

            return $translator;
        });
    }
    public function boot(): void
    {
        App::setLocale(request()->segment(1) ?? config('app.locale'));
        if (Schema::hasTable('translations')) {
            $locale = App::getLocale();

            $translations = Cache::remember(
                "translations_db_{$locale}",
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

        if (Schema::hasTable('contact_info_smtps')) {

            $smtp = ContactInfoSmtp::first();

            if ($smtp) {

                Config::set('mail.default', 'smtp');

                Config::set('mail.mailers.smtp', [
                    'transport' => 'smtp',
                    'host' => $smtp->host,
                    'port' => $smtp->port,
                    'encryption' => $smtp->encryption,
                    'username' => $smtp->client_id, // OAuth üçün
                    'password' => $smtp->client_secret,
                ]);

                Config::set('mail.from.address', $smtp->from_email);
                Config::set('mail.from.name', $smtp->from_name);
            }
        }
    }
}
