    <?php

    use App\Http\Controllers\Front\AboutController;
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
        Route::get('/news', [NewsController::class, 'index'])->name('news');
        Route::get('/news/{post}', [NewsController::class, 'show'])
            ->name('news.show');
        Route::get('/about', [AboutController::class, 'index'])->name('about');
        Route::get('/services', [ServiceController::class, 'index'])->name('services');
        Route::get('/service/{slug}', [ServiceController::class, 'show'])->name('service.show');

        Route::get('products', [ProductController::class, 'index'])->name('products');
        Route::get('/contact', [ContactController::class, 'index'])->name('contact');
        Route::post('/contact/send', [ContactController::class, 'send'])
            ->where(['locale' => 'az|en|ru'])
            ->name('contact.send');
        Route::post('/subscribe', [SubscribeController::class, 'store'])
            ->name('subscribe.store');
    });
