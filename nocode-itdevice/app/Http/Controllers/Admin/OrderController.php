<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    function __construct()
    {
        $this->middleware(function ($request, $next) {
            session(['module_active' => 'order']);

            return $next($request);
        });
    }

    public function index(Request $request)
    {

        $keyword = $request->input('keyword') ?? '';
        $countConfirming = OrderDetail::where('status', 'Đang xác nhận')->count() ?? 0;
        $countConfirmed = OrderDetail::where('status', 'Đã xác nhận')->count() ?? 0;
        $countShipping = OrderDetail::where('status', 'Đang giao hàng')->count() ?? 0;
        $countReceived = OrderDetail::where('status', 'Đã nhận hàng')->count() ?? 0;
        $countDestroyed = OrderDetail::where('status', 'Đã huỷ')->count() ?? 0;
        $status = $request->input('status');

        if ($status == 'Đang xác nhận') {
            $orders = OrderDetail::with(['address'])
                ->where('status', 'Đang xác nhận')->simplePaginate(10);
        } elseif ($status == 'Đã xác nhận') {
            $orders = OrderDetail::with(['address'])
                ->where('status', 'Đã xác nhận')->simplePaginate(10);
        } elseif ($status == 'Đang giao hàng') {
            $orders = OrderDetail::with(['address'])
                ->where('status', 'Đang giao hàng')->simplePaginate(10);
        } elseif ($status == 'Đã nhận hàng') {
            $orders = OrderDetail::with(['address'])
                ->where('status', 'Đã nhận hàng')->simplePaginate(10);
        } elseif ($status == 'Đã huỷ') {
            $orders = OrderDetail::with(['address'])
                ->where('status', 'Đã huỷ')->simplePaginate(10);
        } else {
            $orders = OrderDetail::with(['address', 'user'])
                ->where(function ($query) use ($keyword) {
                    $query->whereHas('address', function ($userQuery) use ($keyword) {
                        $userQuery->where('full_name', 'like', "%$keyword%");
                    })
                        ->orWhereHas('address', function ($addressQuery) use ($keyword) {
                            $addressQuery->where('street', 'like', "%$keyword%");
                        });
                })
                ->orderBy('created_at', 'desc')
                ->simplePaginate(10);
        }

        $count = [$countConfirming, $countConfirmed, $countShipping, $countReceived, $countDestroyed];

        return view('admin.order.index', compact('orders', 'keyword', 'count'));
    }

    public function confirmOrder($id)
    {
        OrderDetail::find($id)->update([
            'status' => 'Đã xác nhận'
        ]);

        return redirect()->route('admin.order.index')->with('success', 'Xác nhận thành công');
    }

    public function confirmShipping($id)
    {
        OrderDetail::find($id)->update([
            'status' => 'Đang giao hàng'
        ]);

        return redirect()->route('admin.order.index')->with('success', 'Xác nhận thành công');
    }

    public function confirmReceive($id)
    {
        OrderDetail::find($id)->update([
            'status' => 'Đã nhận hàng'
        ]);

        return redirect()->route('admin.order.index')->with('success', 'Xác nhận thành công');
    }

    public function destroyOrder($id)
    {
        OrderDetail::find($id)->update([
            'status' => 'Đã huỷ'
        ]);

        return redirect()->route('admin.order.index')->with('success', 'Xác nhận thành công');
    }

    public function action(Request $request)
    {

        $list_check = $request->input('list_check');

        if (empty($list_check)) {
            return redirect()->route('admin.order.index')->with('error', 'Không có bản ghi nào được chọn');
        }

        $act = $request->input('act');

        switch ($act) {
            case 'delete':
                OrderDetail::destroy($list_check);
                return redirect()->route('admin.order.index')->with('success', 'Xoá thành công');
            case 'submit':
                OrderDetail::whereIn('id', $list_check)->update(['status' => 'Đã xác nhận']);
                return redirect()->route('admin.order.index')->with('success', 'Xác nhận thành công');
            case 'shipping':
                OrderDetail::whereIn('id', $list_check)->update(['status' => 'Đang giao hàng']);
                return redirect()->route('admin.order.index')->with('success', 'Xác nhận thành công');
            case 'destroy':
                OrderDetail::whereIn('id', $list_check)->update(['status' => 'Đã huỷ']);
                return redirect()->route('admin.order.index')->with('success', 'Huỷ thành công');
            default:
                return redirect()->route('admin.order.index')->with('status', '');
        }
    }

    public function detail($ids)
    {
        $orders = [];

        foreach (json_decode($ids) as $id) {
            $orders[] = Cart::with('product')->find($id);
        }

        return view('admin.order.detail', compact('orders'));
    }
}
