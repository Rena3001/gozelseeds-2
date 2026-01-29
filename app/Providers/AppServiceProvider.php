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
use App\Observers\TranslationObserver;
use Illuminate\Translation\FileLoader;
use Illuminate\Filesystem\Filesystem;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register services
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
                App::getLocale()
            );

            $translator->setFallback(
                $app['config']['app.fallback_locale']
            );

            return $translator;
        });
    }

    /**
     * Bootstrap services
     */
    public function boot(): void
    {
        // 1️⃣ Locale-ni erkən set et
        App::setLocale(request()->segment(1) ?? config('app.locale'));

        // 2️⃣ DB translations varsa – Lang-ə yüklə (cache YOX)
        if (Schema::hasTable('translations')) {
            $locale = App::getLocale();

            $translations = Translation::where('locale', $locale)->get();

            foreach ($translations as $item) {
                Lang::addLines([
                    "{$item->group}.{$item->key}" => $item->value
                ], $locale);
            }
        }

        // 3️⃣ SMTP settings
        if (Schema::hasTable('contact_info_smtps')) {
            $smtp = ContactInfoSmtp::first();

            if ($smtp) {
                Config::set('mail.default', 'smtp');

                Config::set('mail.mailers.smtp', [
                    'transport' => 'smtp',
                    'host'       => $smtp->host,
                    'port'       => $smtp->port,
                    'encryption' => $smtp->encryption,
                    'username'   => $smtp->client_id,
                    'password'   => $smtp->client_secret,
                ]);

                Config::set('mail.from.address', $smtp->from_email);
                Config::set('mail.from.name', $smtp->from_name);
            }
        }

        // 4️⃣ Translation observer
        Translation::observe(TranslationObserver::class);
    }
}
