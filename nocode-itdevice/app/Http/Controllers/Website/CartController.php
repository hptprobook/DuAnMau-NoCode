<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Attribute;
use App\Models\AttributeValue;
use App\Models\Cart;
use App\Models\District;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Province;
use App\Models\User;
use App\Models\Ward;
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
        $provinces = Province::all();

        $userCarts = $user->carts()->where('status', 0)->with('product')->get();

        return view('website.cart.index', compact('userCarts', 'provinces'));
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

        // return response()->json(['message' => 'Success']);
    }

    public function getDistrict(Request $request)
    {

        $province_id = sprintf('%02d', $request->input('province_id'), '0');

        $districts = District::where('parent_code', $province_id)->get();

        return response()->json(['districts' => $districts]);
    }

    public function getWard(Request $request)
    {
        $district_id = sprintf('%03d', $request->input('district_id'), '00');

        $wards = Ward::where('parent_code', $district_id)->get();

        return response()->json(['wards' => $wards]);
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
            ->where('status', 0)
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

    public function order(Request $request)
    {
        $request->validate(
            [
                'fullname' => ['required', 'string', 'max:191', 'min:3'],
                'phone' => ['required', 'regex:/^[0-9]{10,11}$/'],
                'province' => ['required'],
                'district' => ['required'],
                'ward' => ['required'],
                'street' => ['required', 'max:255', 'min: 5'],
                'note' => ['max: 255']
            ],
            [
                'required' => ':attribute không được để trống',
                'max' => ':attribute không vượt quá :max ký tự',
                'min' => ':attribute phải lớn hơn :min ký tự',
                'regex' => 'Định dạng không chính xác',
            ],
            [
                'fullname' => 'Tên khách hàng',
                'phone' => 'Số điện thoại',
                'province' => 'Trường này',
                'district' => 'Trường này',
                'ward' => 'Trường này',
                'street' => 'Trường này',
                'note' => 'Trường này'
            ]
        );

        $ward = Ward::find($request->input('ward'));
        $street = $request->input('street') . ', ' . $ward->path_with_type;

        $address = Address::create(
            [
                'user_id' => Auth::user()->id,
                'full_name' => $request->input('fullname'),
                'phone' => $request->input('phone'),
                'ward_id' => $request->input('ward'),
                'street' => $street,
                'note' => $request->input('note'),
            ]
        );

        $total_amount = 0;

        foreach ($request->input('cart_id') as $cardId) {
            Cart::where('id', $cardId)->update([
                'status' => 1
            ]);

            $cart = Cart::find($cardId);
            $total_amount += ($cart->provision * $cart->quantity);

            Order::create(
                [
                    'cart_id' => $cart->id,
                    'quantity' => $cart->quantity,
                    'price' => $cart->provision,
                ]
            );
        }

        OrderDetail::create(
            [
                'user_id' => Auth::user()->id,
                'status' => 0,
                'total_amount' => $total_amount,
                'address_id' => $address->id
            ]
        );

        return view('website.cart.success', compact('total_amount'));
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
    public function update(Request $request)
    {

        $cart_id = $request->input('cart_id');
        $quantity = $request->input('quantity');

        if (json_decode($request->input('plus'))) {
            $quantity++;
        } else {
            $quantity--;
        }

        Cart::where('id', $cart_id)->update([
            'quantity' => $quantity,
        ]);

        return response()->json(['message' => 'success']);
    }

    public function address(Request $request)
    {



        return view('website.cart.address');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $cartItem = Cart::find($id);

        $cartItem->delete();

        $user = Auth::user();
        $userCarts = $user->carts()->where('status', 0)->with('product')->get();

        return view('website.cart.index', compact('userCarts'));
    }
}
