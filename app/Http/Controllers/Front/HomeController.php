<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\AboutSection;
use App\Models\ContactSection;
use App\Models\Feature;
use App\Models\Partner;
use App\Models\Post;
use App\Models\Project;
use App\Models\Service;
use App\Models\ServiceSection;
use App\Models\Setting;
use App\Models\Slider;
use App\Models\Testimonials;
use App\Models\VideoSection;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $locale = $request->segment(1);

        if (in_array($locale, ['az', 'en', 'ru'])) {
            app()->setLocale($locale);
        }

        $sliders = Slider::where('is_active', true)
            ->with('translation')
            ->orderBy('order')
            ->get();

        $settings = Setting::with('translation')->first();

        $about = AboutSection::where('is_active', true)
            ->with([
                'translation',
                'listItems' => function ($q) {
                    $q->where('locale', app()->getLocale())
                        ->where('is_active', true)
                        ->orderBy('order');
                }
            ])
            ->first();
        $features = Feature::where('is_active', true)
            ->with('translation')
            ->orderBy('order')
            ->get();
        $videoSection = VideoSection::where('is_active', true)->first();
        $serviceSection = ServiceSection::where('is_active', true)->first();

        $services = Service::where('is_active', true)
            ->orderBy('order')
            ->get();

        $projects = Project::where('is_active', true)
            ->with('translation')
            ->orderBy('order')
            ->get();

        $testimonials = Testimonials::where('is_active', true)
            ->with(['translation'])
            ->orderBy('order')
            ->get();
        $posts = Post::where('is_active', true)
            ->orderBy('order')
            ->orderByDesc('published_at')
            ->take(3)
            ->get();
        $contactSection = ContactSection::where('is_active', true)
            ->with('translation')
            ->first();
        $partners = Partner::where('is_active', true)
            ->orderBy('order')
            ->get();


        return view('client.home', compact('settings', 'locale', 'sliders', 'about', 'features', 'videoSection', 'services', 'serviceSection', 'projects', 'testimonials', 'posts', 'contactSection', 'partners'));
    }
}
