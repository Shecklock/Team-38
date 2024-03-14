<?php

namespace App\Http\Controllers;

use App\Models\Order;

class OrderController extends Controller
{
    public function track($order_id)
    {
        $order = Order::findOrFail($order_id);
        return view('order.track', ['order' => $order]);
    }
}
