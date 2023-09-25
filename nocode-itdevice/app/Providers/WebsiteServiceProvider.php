<?php

namespace App\Providers;

use App\Models\Website;
use Illuminate\Support\ServiceProvider;

class WebsiteServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $website_info = Website::all()[0];
        view()->share('website_info', $website_info);
    }
}
