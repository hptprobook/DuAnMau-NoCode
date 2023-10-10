<?php

namespace App\Providers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\ChildCategory;
use App\Models\MainCategory;
use App\Models\Website;
use Illuminate\Support\Facades\Auth;
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

        $mainCats = MainCategory::with('categories.childCategories')->get();
        view()->share('mainCats', $mainCats);

        if (Auth::check()) {
            $user = Auth::user();
            $user_id = $user->id;
        } else {
            $user_id = 0;
        }

        view()->share('cartCount', $user_id);
    }
}
