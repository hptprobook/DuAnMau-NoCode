<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\AttributeValue;
use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        $userCarts = $user->carts()->with('product')->get();

        return view('website.cart.index', compact('userCarts'));
    }

    public function add(Request $request)
    {
        $attributes = $request->input('attributes');
        $product = Product::find(json_decode($request->input('product_id')));

        $productPrice = $product->price;

        foreach ($attributes as $attributeName => $attributeValueId) {
            $bonus = AttributeValue::where('id', $attributeValueId)->value('percent');

            $attributePrice = $bonus;
            $productPrice += $attributePrice;
        }

        $productNewPrice = $productPrice - ($productPrice * $product->discount / 100);

        return response()->json(['bonusPrice' => $productPrice - $product->price, 'productPrice' => $productPrice, 'productNewPrice' => $productNewPrice]);
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
        $product_id = $request->input('product_id');
        $attributeValues = $request->input('attributeValues');
        $user = Auth::user();

        $existingCart = Cart::where('user_id', $user->id)
            ->where('product_id', $product_id)
            ->where('attributes', json_encode($attributeValues))
            ->first();

        if ($existingCart) {
            $existingCart->increment('quantity');
        } else {
            $price = intval($request->input('price'));

            Cart::create([
                'user_id' => $user->id,
                'product_id' => $product_id,
                'quantity' => 1,
                'provision' => $price,
                'status' => 0,
                'attributes' => json_encode($attributeValues)
            ]);
        }
        return response()->json(['message' => 'success']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
}
