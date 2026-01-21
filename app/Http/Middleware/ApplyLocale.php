<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class ApplyLocale
{
    public function handle(Request $request, Closure $next)
    {
        $locale = $request->route('locale');

        // Əgər URL-də locale varsa → onu istifadə et
        if (in_array($locale, ['az', 'en', 'ru'])) {
            App::setLocale($locale);
        } else {
            App::setLocale('en'); // fallback
        }

        return $next($request);
    }
}
