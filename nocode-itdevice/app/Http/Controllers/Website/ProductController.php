<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\MainCategory;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Lấy các tham số truy vấn từ URL
        $mainCatId = $request->input('mainCat');
        $catId = $request->input('category');
        $childCatId = $request->input('childCat');

        // Truy vấn danh sách sản phẩm dựa trên các tham số truy vấn
        $productsQuery = Product::query();

        if ($mainCatId) {
            $productsQuery->whereHas('category.category.childCategories.category.mainCategory', function ($query) use ($mainCatId) {
                $query->where('id', $mainCatId);
            });
        }

        if ($catId) {
            $productsQuery = Product::whereHas('category.category.childCategories', function ($query) use ($catId) {
                $query->where('cat_id', $catId);
            });
        }

        if ($childCatId) {
            $productsQuery->where('cat_id', $childCatId);
        }

        $products = $productsQuery->get();

        return view('website.product.index', compact('products'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $product = Product::find($id);
        $images = Product::find($id)->images;

        return view('website.product.detail', compact('product', 'images'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function mainCat(string $id)
    {
        return view('website.product.list');
    }
}
