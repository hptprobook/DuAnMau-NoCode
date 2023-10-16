<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    function __construct()
    {
        $this->middleware(function ($request, $next) {
            session(['module_active' => 'dashboard']);

            return $next($request);
        });
    }

    public function index()
    {
        $orders = OrderDetail::with(['address'])
            ->orderBy('created_at', 'desc')
            ->where('status', 'Đang xác nhận')
            ->get();

        $successOrderCount = OrderDetail::where('status', 'Đã nhận hàng')->count();
        $handlingOrderCount = OrderDetail::whereIn('status', ['Đang xác nhận', 'Đã xác nhận', 'Đang giao hàng'])->count();
        $destroyedOrderCount = OrderDetail::where('status', 'Đã huỷ')->count();
        $totalRevenue = OrderDetail::where('status', 'Đã nhận hàng')->sum('total_amount');

        return view('admin.dashboard', compact('orders', 'successOrderCount', 'handlingOrderCount', 'destroyedOrderCount', 'totalRevenue'));
    }
}
