<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function checkout(Request $request)
    {
        $basketItems = session()->get('basket', []);
        // Your checkout logic goes here
        return view('checkout', ['basketItems' => $basketItems]);
    }

    public function track($customer_id)
{
    // Find orders for the given customer ID
    $orders = Order::where('CustomerID', $customer_id)->get();
    
    // Pass the orders to the view
    return view('order.track', ['orders' => $orders]);
}

public function show($id)
{
    // Eager load products associated with the order along with pivot data
    $order = Order::with('products')->findOrFail($id);

    // Pass the order to the view
    return view('order.order-details', compact('order'));
}

}

