<?php

use App\Http\Controllers\Front\AboutController;
use App\Http\Controllers\Front\BlogsController;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\NewsController;
use App\Http\Controllers\Front\ProductController;
use App\Http\Controllers\Front\ServiceController;
use App\Http\Controllers\Front\SubscribeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return redirect('/az');
});

Route::group([
    'prefix' => '{locale}',
    'where' => ['locale' => 'az|en|ru'],
    'middleware' => 'applyLocale'
], function () {

    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/blogs', [BlogsController::class, 'index'])->name('blogs');
    Route::get('/blogs/{post}', [BlogsController::class, 'show'])
        ->name('blogs.show');
    Route::get('/about', [AboutController::class, 'index'])->name('about');
    Route::get('/services', [ServiceController::class, 'index'])->name('services');
    Route::get('/service/{slug}', [ServiceController::class, 'show'])->name('service.show');
    Route::get('/products/category/{slug}', [ProductController::class, 'category'])
        ->name('shop.category');
    Route::get('products', [ProductController::class, 'index'])->name('products');
    Route::get('products/{slug}', [ProductController::class, 'show'])->name('product.show');


    Route::get('/contact', [ContactController::class, 'index'])->name('contact');
    Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');
Route::post('/contact-test-post', function () {
    dd('POST ROUTE WORKS');
});




    Route::post('/subscribe', [SubscribeController::class, 'store'])
        ->name('subscribe.store');
});
