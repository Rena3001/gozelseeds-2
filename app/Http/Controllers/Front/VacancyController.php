<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Vacancy;
use App\Models\VacancyTranslation;
use Illuminate\Http\Request;
use Laravel\Nova\Testing\Browser\Pages\Index;

class VacancyController extends Controller
{
    public function index(Request $request, $locale)
    {
        if (in_array($locale, ['az', 'en', 'ru'])) {
            app()->setLocale($locale);
        }
        $vacancies = Vacancy::with('translation')
            ->where('is_active', true)
            ->orderBy('order')
            ->latest()
            ->get();

        $page = Page::where('slug', 'about')
            ->with('translation')
            ->where('is_active', true)
            ->firstOrFail();


        return view('client.pages.vacancies', compact('page', 'vacancies'));
    }

    public function show($locale, $slug)
{
    if (in_array($locale, ['az', 'en', 'ru'])) {
        app()->setLocale($locale);
    }

    $translation = VacancyTranslation::where('slug', $slug)
        ->where('locale', app()->getLocale())
        ->firstOrFail();

    $vacancy = $translation->vacancy;

    if (!$vacancy->is_active) {
        abort(404);
    }

    $page = Page::where('slug', 'about')
        ->with('translation')
        ->where('is_active', true)
        ->firstOrFail();

    $latestVacancies = Vacancy::with('translation')
        ->where('id', '!=', $vacancy->id)
        ->where('is_active', true)
        ->latest()
        ->take(5)
        ->get();

    return view('client.pages.vacancy', compact(
        'vacancy',
        'latestVacancies',
        'page'
    ));
}
    
}
