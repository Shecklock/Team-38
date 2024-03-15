<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Requests\OrdersFormRequest;

class OrdersController extends Controller
{
    public function index() {
        $orders = Order::all();
        return view('admin.orders.index')->with('orders', $orders);
    }
    
    public function edit($OrderID) {
        $order = Order::findOrFail($OrderID);
        return view('admin.orders.edit', compact('order'));
    }

    public function update(OrdersFormRequest $request, $order) {
        $order = Order::findOrFail($order);
        $input = $request->all();
        $order->update($input);
        return redirect()->back()->with('success', 'Order updated successfully');
    }
}
