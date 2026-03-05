<?php

namespace App\Providers;

use App\Models\ContactInfoSmtp;
use App\Models\Translation;
use App\Models\Language;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use App\Extensions\DatabaseTranslator;
use App\Models\Category;
use App\Observers\TranslationObserver;
use Illuminate\Translation\FileLoader;
use Illuminate\Pagination\Paginator;

use Illuminate\Filesystem\Filesystem;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register services
     */
 public function register()
{
    $this->app->extend('translator', function ($translator, $app) {

        $loader = new \Illuminate\Translation\FileLoader(
            new \Illuminate\Filesystem\Filesystem,
            $app['path.lang']
        );

        $customTranslator = new \App\Extensions\DatabaseTranslator(
            $loader,
            $app->getLocale()
        );

        $customTranslator->setFallback(
            $app['config']['app.fallback_locale']
        );

        return $customTranslator;
    });
}

    /**
     * Bootstrap services
     */
  public function boot(): void
{
    Paginator::useBootstrapFive();

    // SMTP settings
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

    Translation::observe(TranslationObserver::class);

    View::composer('*', function ($view) {

        $languages = Language::where('is_active', true)
            ->orderBy('order')
            ->get();

        $segments = request()->segments();

        $cleanPath = isset($segments[1])
            ? '/' . implode('/', array_slice($segments, 1))
            : '/';

        $view->with(compact('languages', 'cleanPath'));
    });

    View::composer('*', function ($view) {
        $view->with('categories', Category::get());
    });

    View::composer('*', function ($view) {
        $view->with(
            'menuCategories',
            Category::with(['children.translation', 'translation'])
                ->whereNull('parent_id')
                ->get()
        );
    });
}
}
