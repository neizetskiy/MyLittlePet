<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;



Route::controller(IndexController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/home', 'home')->name('home');
    Route::get('/catalog', 'catalog')->name('catalog');
    Route::get('/{id}/product', 'product')->name('product');
    Route::get('/about', 'about')->name('about');
    Route::get('/profile', 'profile')->name('profile')->middleware('auth');
    Route::get('/successorder', 'successOrder')->name('success.order')->middleware('auth');
});

Route::controller(\App\Http\Controllers\CartController::class)->middleware('auth')->prefix('/cart')->group(function (){
    Route::get('/', 'cartPage')->name('cart');
    Route::post('/{productVariant}/add', 'addToCart')->name('cart.add');
    Route::post('/{cart}/increase', 'increaseQuantity')->name('cart.increase');
    Route::post('/{cart}/reduce', 'reduceQuantity')->name('cart.reduce');
    Route::delete('/{cart}/remove', 'destroyFromCart')->name('cart.destroy');
    Route::get('/checkout', 'checkoutPage')->name('checkout.page');
    Route::post('/checkout', 'checkout')->name('checkout');
    Route::post('/applypromo', 'applyPromo')->name('apply.promo');
});

Route::controller(\App\Http\Controllers\OrderController::class)->middleware('auth')->prefix('/order')->group(function (){
    Route::patch('/{order}/cancel', 'cancel')->name('order.cancel');
    Route::patch('/{order}/cancelbyadmin', 'cancelByAdmin')->name('order.cancelbyadmin');
    Route::patch('/{order}/confirm', 'confirm')->name('order.confirm')->middleware('admin');
});


Route::controller(\App\Http\Controllers\SubController::class)->group(function (){
    Route::post('/sub', 'store')->name('sub.store');
});

Route::controller(\App\Http\Controllers\AuthController::class)->group(function () {
    Route::middleware('guest')->group(function (){
        Route::get('/register', 'register')->name('registerPage');
        Route::post('/register', 'store')->name('register');

        Route::get('/login', 'login')->name('login');
        Route::post('/login', 'auth')->name('auth');
    });
    Route::get('/logout', 'logout')->name('logout')->middleware('auth');
});

Route::controller(\App\Http\Controllers\ProfileController::class)->prefix('/profile')->middleware('auth')->group(function (){
    Route::get('/edit', 'edit')->name('profile.edit');
    Route::patch('/edit', 'update')->name('profile.update');

    Route::get('/change/password', 'changePassword')->name('password.change');
    Route::patch('/change/password', 'updatePassword')->name('password.update');
});


Route::middleware('admin')->group(function (){
    Route::controller(\App\Http\Controllers\SubcategoryController::class)->prefix('/subcategory')->group(function (){
        Route::get('/create', 'create')->name('subcategory.create');
        Route::post('/create', 'store')->name('subcategory.store');
        Route::get('/{subcategory}/delete', 'delete')->name('subcategory.delete');
        Route::delete('/{subcategory}/delete', 'destroy')->name('subcategory.destroy');
    });

    Route::controller(\App\Http\Controllers\ProductController::class)->prefix('/product')->group(function (){
        Route::get('/create', 'create')->name('product.create');
        Route::post('/create', 'store')->name('product.store');
        Route::get('/{product}/edit', 'edit')->name('product.edit');
        Route::patch('/{product}/update', 'update')->name('product.update');
        Route::get('/{product}/delete', 'delete')->name('product.delete');
        Route::delete('/{product}/delete', 'destroy')->name('product.destroy');
    });

    Route::controller(\App\Http\Controllers\ProductVariantController::class)->prefix('/product/variant')->group(function (){
        Route::get('/{id}/add', 'create')->name('variant.add');
        Route::post('/{id}/add', 'store')->name('variant.store');
        Route::get('/{productVariant}/delete', 'delete')->name('variant.delete');
        Route::delete('/{productVariant}/delete', 'destroy')->name('variant.destroy');
    });

    Route::controller(\App\Http\Controllers\PromocodeController::class)->prefix('/promocode')->group(function (){
        Route::get('/add', 'create')->name('promocode.create');
        Route::post('/add', 'store')->name('promocode.store');
        Route::get('/{promocode}/delete', 'delete')->name('promocode.delete');
        Route::delete('/{promocode}/delete', 'destroy')->name('promocode.destroy');
    });

    Route::controller(\App\Http\Controllers\EmailController::class)->prefix('/email')->group(function (){
        Route::get('/send', 'sendPage')->name('email.sendPage');
        Route::post('/send', 'send')->name('email.send');
    });

});
