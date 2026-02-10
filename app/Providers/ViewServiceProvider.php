<?php

namespace App\Providers;

use App\Models\Post;
use App\Models\Setting;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\View; // ← DÜZGÜN IMPORT
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        View::composer('*', function ($view) {
            App::setLocale(request()->segment(1) ?? config('app.locale'));
            $settings = Setting::first();

            $footerPosts = Post::where('is_active', true)
                ->with('translation')
                ->orderByDesc('published_at')
                ->take(3)
                ->get();


            $view->with([
                'settings' => $settings,
                'footerPosts' => $footerPosts,
            ]);
        });
    }
}
