<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\WebsiteController;
use App\Http\Controllers\AttributeController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\Website\HomeController;
use App\Http\Controllers\Website\CartController;
use App\Http\Controllers\Website\PostController as WebsitePostController;
use App\Http\Controllers\Website\ProductController as WebsiteProductController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('website.home');
// });

Route::prefix('website')->name('website.')->group(function () {
    Route::get('/', [HomeController::class, 'home'])->name('home');

    Route::get('/showroom', function () {
        return view('website.showroom');
    })->name('showroom');

    Route::prefix('/product')->name('product.')->group(function () {
        Route::get('/list', [WebsiteProductController::class, 'index'])->name('index');
        Route::get('/detail/{id}', [WebsiteProductController::class, 'show'])->name('detail');
    });

    Route::prefix('/cart')->name('cart.')->middleware('auth')->group(function () {
        Route::get('/', [CartController::class, 'index'])->name('index');
        Route::post('/add', [CartController::class, 'add'])->name('add');
        Route::post('/store', [CartController::class, 'store'])->name('store');
        Route::get('/delete/{id}', [CartController::class, 'destroy'])->name('delete');
        Route::post('/update', [CartController::class, 'update'])->name('update');
        Route::post('/address', [CartController::class, 'address'])->name('address');

        Route::post('/order', [CartController::class, 'order'])->name('order');
        Route::post('/order/coupon', [CartController::class, 'coupon'])->name('coupon');

        Route::post('/getDistrict', [CartController::class, 'getDistrict'])->name('getDistrict');
        Route::post('/getWard', [CartController::class, 'getWard'])->name('getWard');
    });

    Route::prefix('/customer')->name('customer.')->middleware('auth')->group(function () {
        Route::get('/', [CustomerController::class, 'index'])->name('index');
        Route::get('/address', [CustomerController::class, 'address'])->name('address');
        Route::get('/order', [CustomerController::class, 'order'])->name('order');
        Route::get('/order-detail/{id}', [CustomerController::class, 'orderDetail'])->name('orderDetail');
        Route::post('/info', [CustomerController::class, 'info'])->name('info');
        Route::get('/reset', [CustomerController::class, 'reset'])->name('reset');
        Route::get('/order-destroy/{id}', [CustomerController::class, 'orderDestroy'])->name('orderDestroy');

        Route::get('/change-password', [CustomerController::class, 'change'])->name('change');
        Route::post('/change-password-', [CustomerController::class, 'changePassword'])->name('changePassword');
    });

    Route::prefix('/post')->name('post.')->group(function () {
        Route::get('/', [WebsitePostController::class, 'index'])->name('index');
    });
});


Route::get('/', [HomeController::class, 'home'])->name('home');

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
Route::prefix('admin')->name('admin.')->middleware('auth', 'checkRole:ADMIN')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('product')->name('product.')->group(function () {
        /*
        |--------------------------------------------------------------------------
        | Category Main
        |--------------------------------------------------------------------------
        */
        Route::get('/', [ProductController::class, 'index'])->name('index');
        Route::get('/create', [ProductController::class, 'create'])->name('create');
        Route::get('/child-category', [ProductController::class, 'childCategory'])->name('childCategory');
        Route::post('/create-child-category', [ProductController::class, 'createChildCategory'])->name('createChildCategory');
        Route::get('/category', [ProductController::class, 'category'])->name('category');
        Route::post('/create-category', [ProductController::class, 'createCategory'])->name('createCategory');
        Route::get('/main-category', [ProductController::class, 'mainCategory'])->name('mainCategory');
        Route::post('/create-main-category', [ProductController::class, 'createMainCategory'])->name('createMainCategory');
        /*
        |--------------------------------------------------------------------------
        | Product
        |--------------------------------------------------------------------------
        */
        Route::post('/store', [ProductController::class, 'store'])->name('store');
        Route::get('/delete/{id}', [ProductController::class, 'destroy'])->name('delete');
        Route::post('/action', [ProductController::class, 'action'])->name('action');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [ProductController::class, 'update'])->name('update');
        Route::get('/edit-img/{id}', [ProductController::class, 'images'])->name('images');
        Route::post('/update-img/{id}', [ProductController::class, 'updateImage'])->name('updateImage');

        /*
        |--------------------------------------------------------------------------
        | Category Handle
        |--------------------------------------------------------------------------
        */
        Route::get('/edit-childcat/{id}', [ProductController::class, 'editChildCat'])->name('editChildCat');
        Route::post('/update-childcat/{id}', [ProductController::class, 'updateChildCat'])->name('updateChildCat');
        Route::get('/delete-childcat/{id}', [ProductController::class, 'deleteChildCat'])->name('deleteChildCat');
        Route::get('/edit-category/{id}', [ProductController::class, 'editCategory'])->name('editCategory');
        Route::post('/update-category/{id}', [ProductController::class, 'updateCategory'])->name('updateCategory');
        Route::get('/delete-category/{id}', [ProductController::class, 'deleteCategory'])->name('deleteCategory');
        Route::get('/edit-main-category/{id}', [ProductController::class, 'editMainCat'])->name('editMainCat');
        Route::post('/update-main-category/{id}', [ProductController::class, 'updateMainCat'])->name('updateMainCat');
        Route::get('/delete-main-category/{id}', [ProductController::class, 'deleteCategory'])->name('deleteMainCat');
    });

    /*
    |--------------------------------------------------------------------------
    | Attributes
    |--------------------------------------------------------------------------
    */

    Route::prefix('/attribute')->name('attribute.')->group(function () {
        Route::get('/', [AttributeController::class, 'index'])->name('index');
        Route::post('/create', [AttributeController::class, 'create'])->name('create');
        Route::get('/add/{id}', [AttributeController::class, 'add'])->name('add');
        Route::post('/store', [AttributeController::class, 'store'])->name('store');
        Route::get('/list/{id}', [AttributeController::class, 'list'])->name('list');
    });

    Route::prefix('/coupon')->name('coupon.')->group(function () {
        Route::get('/', [CouponController::class, 'index'])->name('index');
        Route::get('/create', [CouponController::class, 'create'])->name('create');
        Route::post('/store', [CouponController::class, 'store'])->name('store');
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

    Route::prefix('website')->name('website.')->group(function () {
        Route::get('/', [WebsiteController::class, 'info'])->name('info');
        Route::post('/update-info', [WebsiteController::class, 'updateInfo'])->name('updateInfo');
        Route::get('/image', [WebsiteController::class, 'image'])->name('image');
    });

    Route::prefix('order')->name('order.')->group(function () {
        Route::get('/', [OrderController::class, 'index'])->name('index');
        Route::get('/confirm/{id}', [OrderController::class, 'confirmOrder'])->name('confirmOrder');
        Route::get('/confirmShipping/{id}', [OrderController::class, 'confirmShipping'])->name('confirmShipping');
        Route::get('/confirmReceive/{id}', [OrderController::class, 'confirmReceive'])->name('confirmReceive');
        Route::get('/destroyOrder/{id}', [OrderController::class, 'destroyOrder'])->name('destroyOrder');
        Route::get('/action', [OrderController::class, 'action'])->name('action');
        Route::get('/orderDetail/{id}', [OrderController::class, 'detail'])->name('orderDetail');
    });
});
