<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('product')->name('product.')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('index');
        Route::get('/create', [ProductController::class, 'create'])->name('create');
        Route::get('/child-category', [ProductController::class, 'childCategory'])->name('childCategory');
        Route::get('/category', [ProductController::class, 'category'])->name('category');
        Route::post('/create-category', [ProductController::class, 'createCategory'])->name('createCategory');
        Route::get('/main-category', [ProductController::class, 'mainCategory'])->name('mainCategory');
        Route::post('/create-main-category', [ProductController::class, 'createMainCategory'])->name('createMainCategory');

        Route::post('/store', [ProductController::class, 'store'])->name('store');
        Route::get('/delete/{id}', [ProductController::class, 'destroy'])->name('delete');
        Route::post('/action', [ProductController::class, 'action'])->name('action');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [ProductController::class, 'update'])->name('update');
    });

    Route::prefix('post')->name('post.')->group(function () {
        Route::get('/', [PostController::class, 'index'])->name('index');
        Route::get('/create', [PostController::class, 'create'])->name('create');
        Route::post('/store', [PostController::class, 'store'])->name('store');
        Route::get('/category', [PostController::class, 'category'])->name('category');
        Route::get('/delete/{id}', [PostController::class, 'destroy'])->name('delete');
        Route::get('/edit/{id}', [PostController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [PostController::class, 'update'])->name('update');
        Route::post('/action', [PostController::class, 'action'])->name('action');
    });

    Route::get('order', [OrderController::class, 'index'])->name('order');

    Route::prefix('user')->name('user.')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('/create', [UserController::class, 'create'])->name('create');
        Route::post('/store', [UserController::class, 'store'])->name('store');
        Route::post('/delete/{id}', [UserController::class, 'destroy'])->name('delete');
        Route::post('/action', [UserController::class, 'action'])->name('action');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [UserController::class, 'update'])->name('update');
    });

    Route::prefix('page')->name('page.')->group(function () {
        Route::get('/', [PageController::class, 'index'])->name('index');
        Route::get('/create', [PageController::class, 'create'])->name('create');
    });
});

Route::group(['prefix' => 'laravel-filemanager'], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
