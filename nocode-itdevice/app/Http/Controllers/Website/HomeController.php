<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\ChildCategory;
use App\Models\Product;
use App\Models\Website;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        // Lấy tất cả sản phẩm
        $products = Product::all();

        // Định rõ mainCatID
        $mainCatID = 4;

        // Lấy các child categories của mainCatID
        $childCategories = ChildCategory::whereHas('category', function ($query) use ($mainCatID) {
            $query->where('main_cat_id', $mainCatID);
        })->pluck('cat_id');
        $childCategoryIds = ChildCategory::whereIn('cat_id', $childCategories)->pluck('id');
        // Kiểm tra xem có dữ liệu trong childCategories hay không
        if (!empty($childCategories)) {
            // Sử dụng eager loading để nạp child categories của sản phẩm
            $pcProducts = Product::whereIn('cat_id', $childCategoryIds)->get();
        } else {
            $pcProducts = [];
        }

        $mainCatID2 = 1;

        $childCategories = ChildCategory::whereHas('category', function ($query) use ($mainCatID2) {
            $query->where('main_cat_id', $mainCatID2);
        })->pluck('cat_id');

        $childCategoryIds = ChildCategory::whereIn('cat_id', $childCategories)->pluck('id');

        if (!empty($childCategories)) {
            $laptopProducts = Product::whereIn('cat_id', $childCategoryIds)->get();
        } else {
            $laptopProducts = [];
        }

        return view('home', compact('products', 'pcProducts', 'childCategories', 'childCategoryIds', 'laptopProducts'));
    }
}
