<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Attribute;
use App\Models\AttributeValue;
use App\Models\Cart;
use App\Models\Coupon;
use App\Models\CouponUsage;
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
                'status' => '0',
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
        $cart_ids = [];

        foreach ($request->input('cart_id') as $cardId) {
            Cart::where('id', $cardId)->update([
                'status' => 1
            ]);

            $cart = Cart::find($cardId);
            $total_amount += ($cart->provision * $cart->quantity);

            $order = Order::create(
                [
                    'product_id' => $cart->product_id,
                    'quantity' => $cart->quantity,
                    'price' => $cart->provision,
                ]
            );

            $cart_ids[] = intval($cardId);
        }

        $orderDetail = OrderDetail::create(
            [
                'user_id' => Auth::user()->id,
                'cart_id' => json_encode($cart_ids),
                'status' => 'Đang xác nhận',
                'total_amount' => $total_amount,
                'address_id' => $address->id
            ]
        );

        $orderDetailId = $orderDetail->id;

        return view('website.cart.success', compact('total_amount', 'orderDetailId'));
    }

    public function coupon(Request $request)
    {
        $orderDetailId = $request->input('order_id');
        $orderDetail = OrderDetail::find($orderDetailId);
        $code = $request->input('code');
        $now = now();
        $success = 'Thành công';
        $error = '';
        $coupon = Coupon::where('code', $code)->first();
        $couponUsage = CouponUsage::where('coupon_id', $coupon->id);


        if (!$coupon) {
            $error = "Mã không hợp lệ";
            return view('website.cart.success', compact('orderDetailId', 'error', 'orderDetail'));
        } else {
            if ($coupon->quantity <= 0) {
                $error = 'Mã đã sử dụng hết';
                return view('website.cart.success', compact('orderDetailId', 'error', 'orderDetail'));
            } elseif ($coupon->start_date > $now) {
                $error = 'Mã không tồn tại';
                return view('website.cart.success', compact('orderDetailId', 'error', 'orderDetail'));
            } elseif ($coupon->end_date < $now) {
                $error = 'Mã đã hết hạn';
                return view('website.cart.success', compact('orderDetailId', 'error', 'orderDetail'));
            } elseif (!empty($couponUsage)) {
                $error = 'Mã đã được sử dụng';
                return view('website.cart.success', compact('orderDetailId', 'error', 'orderDetail'));
            } else {
                // Áp dụng giảm giá vào đơn hàng tại đây
                if ($coupon->discount_type == 'fixed') {
                    $orderDetailNewPrice = $orderDetail->total_amount - $coupon->discount_amount;
                } else {
                    $orderDetailNewPrice = $orderDetail->total_amount - ($orderDetail->total_amount * ($coupon->discount_amount / 100));
                }

                OrderDetail::where('id', $orderDetail->id)->update(['total_amount' => $orderDetailNewPrice]);

                CouponUsage::create(
                    [
                        'coupon_id' => $coupon->id,
                        'order_id' => $orderDetailId,
                    ]

                );

                return view('website.cart.success', compact('orderDetailId', 'success', 'orderDetail'));
            }
        }
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
