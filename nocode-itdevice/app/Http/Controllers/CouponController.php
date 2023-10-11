<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    function __construct()
    {
        $this->middleware(function ($request, $next) {
            session(['module_active' => 'coupon']);

            return $next($request);
        });
    }

    public function index()
    {

        $coupons = Coupon::all();
        return view('admin.coupon.index', compact('coupons'));
    }

    public function create()
    {
        return view('admin.coupon.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate(
            [
                'code' => ['required', 'min:3', 'max:20'],
                'amount' => 'required',
                'quantity' => ['required'],
                'start_date' => ['required'],
                'end_date' => ['required', 'end_date_after_start'],
            ],
            [
                'required' => ':attribute không được để trống',
                'min' => ':attribute phải chứa ít nhất :min ký tự',
                'max' => ':attribute phải chứa ít nhất :max ký tự',
                'end_date_after_start' => 'Ngày bắt đầu lớn hơn ngày kết thúc'
            ],
            [
                'code' => 'Mã giảm giá',
                'amount' => 'Giảm giá',
                'quantity' => 'Số lượng',
                'start_date' => 'Ngày bắt đầu',
                'end_date' => 'Ngày kết thúc'
            ]
        );

        Coupon::create(
            [
                'code' => $request->input('code'),
                'discount_type' => $request->input('type'),
                'discount_amount' => $request->input('amount'),
                'quantity' => $request->input('quantity'),
                'start_date' => $request->input('start_date'),
                'end_date' => $request->input('end_date'),
            ]
        );

        return redirect()->route('admin.coupon.create')->with('success', 'Thêm thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
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
