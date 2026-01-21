<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Partner;
use App\Models\Testimonials;
use App\Models\VideoSection;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $page = Page::where('slug', 'about')
            ->with('translation')
            ->where('is_active', true)
            ->firstOrFail();
        $partners = Partner::where('is_active', true)
            ->orderBy('order')
            ->get();
        $videoSection = VideoSection::where('is_active', true)->first();
         $testimonials = Testimonials::where('is_active', true)
            ->with(['translation'])
            ->orderBy('order')
            ->get();
        return view('client.pages.about', compact('page', 'partners', 'videoSection', 'testimonials'));
    }
}
