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

        // Locale mövcud deyilsə və ya səhvdirsə → 404
        if (!$locale || !in_array($locale, ['az', 'en', 'ru'])) {
            abort(404);
        }

        App::setLocale($locale);

        return $next($request);
    }
}