<?php

namespace Vendor\OnlineStore\Http\Controllers;

use Vendor\OnlineStore\Models\Order;
use Illuminate\Http\Request;

class OrderController extends BaseController
{
    public function index()
    {
        return view('onlinestore::orders.index', ['orders' => Order::with('customer')->get()]);
    }

    public function show(Order $order)
    {
        return view('onlinestore::orders.show', compact('order'));
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('onlinestore.orders.index');
    }
}
