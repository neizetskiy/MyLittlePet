<?php

namespace App\Providers;

use App\Models\Cart;
use App\Models\Category;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Blade::if('admin', function () {
            return auth()->check()&&auth()->user()->role=='admin';
        });

       if($categories = Category::all()) {
           View::share('categories', $categories);
       }

        if(auth()->check()) {
            $cartcount = Cart::query()->where('user_id', auth()->id())->count();
            View::share('cartcount', $cartcount);
        }
    }
}
