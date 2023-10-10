<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $customer = Auth::user();

        view()->share(compact('customer'));

        return view('website.customer.index', compact('customer'));
    }

    public function address()
    {
        $customer = Auth::user();

        $address = Address::where('user_id', $customer->id)->get();

        return view('website.customer.address', compact('customer', 'address'));
    }

    public function order()
    {

        $customer = Auth::user();

        $orders = OrderDetail::where('user_id', $customer->id)
            ->with('address')
            ->simplePaginate(4);

        return view('website.customer.order', compact('customer', 'orders'));
    }

    public function orderDetail(string $id)
    {

        $customer = Auth::user();

        $cart_ids = json_decode(OrderDetail::find($id)->cart_id);

        $orders = Cart::whereIn('id', $cart_ids)->with('product')->get();

        return view('website.customer.orderDetail', compact('cart_ids', 'customer', 'orders', 'id'));
    }

    public function orderDestroy(string $id)
    {

        OrderDetail::where('id', $id)->update(['status' => 'Đã huỷ']);

        $customer = Auth::user();

        $orders = OrderDetail::where('user_id', $customer->id)
            ->where('status', '!=', 'Đã huỷ')
            ->with('address')
            ->simplePaginate(4);

        return view('website.customer.order', compact('customer', 'orders'));
    }

    public function info(Request $request)
    {

        $request->validate(
            [
                'fullname' => ['required', 'string', 'min:3', 'max:255'],
                'phone' => ['regex:/^[0-9]{10,11}$/', 'required'],
                'email' => ['email', 'required', 'max:255']
            ],
            [
                'required' => ':attribute không được để trống',
                'min' => ':attribute phải có ít nhất :min ký tự',
                'max' => ':attribute phải có ít nhất :max ký tự',
                'regex' => 'Định dạng :attribute không chính xác',
                'email' => 'Trường này phải là email'
            ],
            [
                'fullname' => 'Tên đầy đủ',
                'phone' => 'Số điện thoại',
                'email' => 'Email'
            ]
        );

        User::where('id', Auth::user()->id)->update(
            [
                'name' => $request->input('fullname'),
                'phone_number' => $request->input('phone'),
                'email' => $request->input('email'),
            ]
        );

        $customer = Auth::user();
        return redirect()->route('website.customer.index', compact('customer'))->with('success', 'Cập nhật thông tin thành công!');
    }

    public function change()
    {
        return view('auth.passwords.change');
    }

    public function changePassword(Request $request)
    {

        $request->validate(
            [
                'old-password' => ['required'],
                'new-password' => ['required', 'min:8', 'max:50'],
                'confirm-password' => ['required', 'same:new-password'],
            ],
            [
                'required' => 'Trường này không được để trống',
                'min' => ':attribute phải có ít nhất :min ký tự',
                'max' => ':attribute phải có ít nhất :max ký tự',
                'same' => ':attribute không chính xác'
            ],
            [
                'old-password' => 'Mật khẩu cũ',
                'new-password' => 'Mật khẩu mới',
                'confirm-password' => 'Xác nhận mật khẩu mới'
            ]
        );

        $user = Auth::user();

        if (!Hash::check($request->input('old-password'), $user->password)) {
            return back()->withErrors(['old-password' => 'Mật khẩu cũ không đúng.']);
        }

        $user->password = Hash::make($request->input('new-password'));
        $user->save();

        Auth::logout();

        return view('auth.login');
    }
}
