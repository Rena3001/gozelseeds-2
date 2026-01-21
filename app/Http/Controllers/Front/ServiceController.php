<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Feature;
use App\Models\Partner;
use App\Models\Service;
use App\Models\ServiceProvidingQuality;
use App\Models\ServiceSection;
use App\Models\Setting;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        $locale = $request->segment(1);

        if (in_array($locale, ['az', 'en', 'ru'])) {
            app()->setLocale($locale);
        }

        $serviceSection = ServiceSection::where('is_active', true)->first();
        $features = Feature::where('is_active', true)
            ->with('translation')
            ->orderBy('order')
            ->get();
        $services = Service::where('is_active', true)
            ->orderBy('order')
            ->get();
        $partners = Partner::where('is_active', true)
            ->orderBy('order')
            ->get();
        $section = ServiceProvidingQuality::where('id', 1)
            ->where('is_active', true)
            ->with([
                'translation',
                'items' => function ($q) {
                    $q->where('is_active', true)
                        ->orderBy('order')
                        ->with('translation');
                }
            ])
            ->first();
        $settings = Setting::with('translation')->first();

        return view('client.pages.services', compact('serviceSection', 'features', 'services', 'partners', 'section'));
    }

  public function show($locale,$slug)
{
    $feature = Feature::withoutGlobalScopes()
        ->with('translation')
        ->where('slug', $slug)
        ->first();

    return view('client.pages.service-detail', compact('feature'));
}

}
