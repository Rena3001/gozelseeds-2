<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;


class NewsController extends Controller
{
    public function show(Request $request, $locale, Post $post)
    {
        if (in_array($locale, ['az', 'en', 'ru'])) {
            app()->setLocale($locale);
        }

        return view('client.news-detail', compact('post', 'locale'));
    }
}
