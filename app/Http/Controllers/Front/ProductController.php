<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::with(['translation', 'categories.translation'])
            ->where('is_active', true)
            ->when($request->filled('search'), function ($query) use ($request) {
                $query->whereHas('translations', function ($q) use ($request) {
                    $q->where('locale', app()->getLocale())
                        ->where('title', 'LIKE', '%' . $request->search . '%');
                });
            })
            ->paginate(9)
            ->withQueryString(); // search pagination-da itmir
        $categories = Category::with('translation')->get();

        return view('client.pages.products', compact('products', 'categories'));
    }
    public function show($locale, $slug)
    {
        $product = Product::with(['translation', 'categories.translation'])
            ->where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        return view('client.pages.product-details', compact('product'));
    }
    public function category($locale, $slug)
    {
        app()->setLocale($locale);

        $categories = Category::with('translation')->get();

        $category = Category::where('slug', $slug)->firstOrFail();

        $products = $category->products()
            ->with('translation')
            ->where('is_active', true)
            ->paginate(9)
            ->withQueryString();

        return view('client.pages.products', compact('products', 'categories'));
    }
}
