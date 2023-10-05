<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $customer = Auth::user();

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

        $orders = OrderDetail::where('user_id', $customer->id)->get();

        return view('website.customer.order', compact('customer', 'orders'));
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
