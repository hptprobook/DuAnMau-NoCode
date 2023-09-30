<?php

namespace App\Providers;

use App\Models\Website;
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
        View::composer('auth.login', function ($view) {
            $website_info = Website::all()[0];
            $view->with('website_info', $website_info);
        });

        View::composer('auth.register', function ($view) {
            $website_info = Website::all()[0];
            $view->with('website_info', $website_info);
        });
    }
}
