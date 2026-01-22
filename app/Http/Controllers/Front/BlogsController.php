<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;


class BlogsController extends Controller
{
    public function index(Request $request, $locale, Post $post)
    {
        if (in_array($locale, ['az', 'en', 'ru'])) {
            app()->setLocale($locale);
        }
        $posts = Post::where('is_active', true)
            ->orderBy('order')
            ->orderByDesc('published_at')
            ->get();

        return view('client.pages.blogs', compact('posts', 'locale'));
    }
    public function show($locale, $post)
    {
        app()->setLocale($locale);

        $post = Post::with('translation')
            ->where('id', $post)
            ->where('is_active', true)
            ->firstOrFail();

        $latestPosts = Post::with('translation')
            ->where('is_active', true)
            ->where('id', '!=', $post->id)
            ->latest()
            ->limit(3)
            ->get();

        return view('client.pages.blogs-details', compact('post', 'latestPosts'));
    }
}
