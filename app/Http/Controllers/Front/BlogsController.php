<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Post;
use Illuminate\Http\Request;


class BlogsController extends Controller
{
    public function index(Request $request, $locale)
{
    if (in_array($locale, ['az','en','ru'])) {
        app()->setLocale($locale);
    }

    $search = $request->search;

    $posts = Post::with('translations')
        ->where('is_active', true)

        ->when($search, function ($query) use ($search, $locale) {

            $query->whereHas('translations', function ($q) use ($search, $locale) {

                $q->where(function ($sub) use ($search, $locale) {

                    $sub->where('locale', $locale)
                        ->orWhere('locale','az');

                })
                ->where('title','like',"%{$search}%");

            });

        })

        ->latest("published_at")
        ->get();

    $page = Page::where('slug','about')
        ->with('translation')
        ->where('is_active',true)
        ->firstOrFail();

    return view('client.pages.blogs', compact('posts','locale','page'));
}
    public function show($locale, $post)
    {
        app()->setLocale($locale);
        $page = Page::where('slug', 'about')
            ->with('translation')
            ->where('is_active', true)
            ->firstOrFail();
        $post = Post::with('translations')
            ->where('id', $post)
            ->latest('published_at')
            ->where('is_active', true)
            ->firstOrFail();

        $latestPosts = Post::with('translations')
            ->where('is_active', true)
            ->where('id', '!=', $post->id)
            ->latest('published_at')
            ->limit(3)
            ->get();

        return view('client.pages.blogs-details', compact('post', 'latestPosts', 'page'));
    }
}
