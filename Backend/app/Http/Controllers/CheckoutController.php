<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\OrderDetail;

class CheckoutController extends Controller
{

    public function process(Request $request)
    {
        // Check if the user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to place an order.');
        }

    $basketItems = session()->get('basket', []);
    if (empty($basketItems)) {
        return redirect()->route('basket')->with('error', 'Your basket is empty.');
    }

    // Create a new order and set its attributes
    $order = new Order();
    $order->CustomerID = Auth::id();
    $order->OrderDate = now();
    $order->TotalAmount = array_sum(array_column($basketItems, 'price'));
    $order->Status = 'Pending';
    $order->UserID = Auth::id();
    $order->save();

    // Create order details for each basket item
    foreach ($basketItems as $item) {

        if (!isset($item['product_id'])) {
            // Handle the missing product_id case, e.g., skip this item, show an error, etc.
            continue; // This will skip the current iteration and move to the next item.
        }
        // Ensure you have 'product_id' in your $item array
        $orderDetail = new OrderDetail();
        $orderDetail->OrderID = $order->id;
        $orderDetail->ProductID = $item['product_id'];
        $orderDetail->Quantity = $item['quantity'];
        $orderDetail->Price = $item['price'];
        $orderDetail->save();
    }

    session()->forget('basket');

    return redirect()->route('order.track', ['customer_id' => Auth::id()])->with('success', 'Order placed successfully!');
}


    public function checkout(Request $request)
    {
        $basketItems = session()->get('basket', []);
        // Pass basket items to the checkout view
        return view('checkout', ['basketItems' => $basketItems]);
    }
}
