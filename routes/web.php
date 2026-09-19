<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\HomePageController;
use App\Http\Controllers\Admin\AboutPageController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\ContactPageQueryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\QualityFacilityController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\StatisticController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\AboutController;

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])
        ->name('login')->middleware('guest');
    Route::post('/login', [AuthController::class, 'login'])
        ->name('login.submit');
    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');
    Route::middleware('admin')->group(function () {
        Route::get('/', [DashboardController::class, 'dashboard']);
        Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

        Route::get('/home', [HomePageController::class, 'edit'])
            ->name('home');
        Route::put('/home', [HomePageController::class, 'update'])
            ->name('home.update');

        Route::get('/queries', [ContactPageQueryController::class, 'index'])
            ->name('queries');
        Route::get(
            'queries/{query}',
            [ContactPageQueryController::class, 'show']
        )->name('queries.show');

        Route::put(
            'queries/{query}/status',
            [ContactPageQueryController::class, 'updateStatus']
        )->name('queries.status');

        Route::get('/about', [AboutPageController::class, 'edit'])
            ->name('about.edit');

        Route::put('/about', [AboutPageController::class, 'update'])
            ->name('about.update');

        Route::get('/settings', [SettingController::class, 'index'])
            ->name('settings');
        Route::post('/settings', [SettingController::class, 'update'])
            ->name('settings.update');

        Route::resource('/services', ServiceController::class)->except(['show']);
        Route::resource('/products', ProductController::class)->except(['show']);
        Route::resource('/galleries', GalleryController::class)->except(['show']);
        Route::delete('product-gallery/{gallery}', [ProductController::class, 'destroyGallery'])->name('product-gallery.destroy');
        Route::resource('/blogs', BlogController::class)->except(['show']);

        Route::resource('/clients', ClientController::class)->except(['show']);
        Route::resource('/testimonials', TestimonialController::class)->except(['show']);
        Route::resource('/statistics', StatisticController::class)->except(['show']);
        Route::resource('/quality-facilities', QualityFacilityController::class)->except(['show']);
        Route::resource('/sliders', SliderController::class)->except(['show']);
    });
});

Route::get('/', [HomeController::class, 'index']);
Route::get('/about', [AboutController::class, 'index']);
Route::view('/contact', 'frontend/contact');
Route::post('/contact', [ContactPageQueryController::class,'store'])->name('frontend.contact.query')->middleware('throttle:5,1');
Route::get('/services', [ServiceController::class, 'services']);
Route::get('/products', [ProductController::class, 'products']);
Route::get('/products/{slug}', [ProductController::class, 'show']);

Route::get('/blogs', [BlogController::class, 'blogs']);
Route::get('/blog/{slug}', [BlogController::class, 'show']);
Route::get('/gallery', [GalleryController::class, 'gallery']);
