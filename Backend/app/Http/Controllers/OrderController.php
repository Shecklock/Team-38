<?php 
namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
    $orders = Order::where('customer_id', Auth::id()) // Assuming you have a customer_id column
                  ->with(['products' => function($query) {
                      $query->with(['photos' => function($query) {
                          $query->first(); // Adjust this according to your actual relationship/method to get the first photo
                      }]);
                  }])
                  ->get();

    return view('orders.index', compact('orders'));
    }

    // OrderController.php

public function show(Order $order)
{
    // Authorization check to ensure users can only see their own orders
    if ($order->user_id !== Auth::id()) {
        abort(403);
    }

    return view('orders.show', compact('order'));
}

}