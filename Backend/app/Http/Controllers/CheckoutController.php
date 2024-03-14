<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function checkout(Request $request)
    {
        // Retrieve basket items from session
        $basketItems = session()->get('basket', []);

        // Pass basket items to the checkout view
        return view('checkout', ['basketItems' => $basketItems]);
    }

//     public function process(Request $request)
//     {
//         // Process checkout logic here
//         // For example, create order in the database
        
//         // Clear the basket after checkout
//         session()->forget('basket');

//         // Redirect the user to a thank you page or any other appropriate page
        
//         return redirect()->route('order.track', ['order_id' => $orderId]);
//     }

public function process(Request $request)
{
    // Check if the user is authenticated
    if (auth()->check()) {
        // Process checkout logic here
        // For example, create order in the database

        // Assuming you have created an order in the database
        $order = new Order();
        $order->CustomerID = auth()->user()->id; // Access user ID only if authenticated
        $order->OrderDate = now();
        // Calculate total amount and set it
        $order->TotalAmount = array_sum(array_column(session()->get('basket', []), 'price'));
        $order->Status = 'Pending'; // Initial status
        $order->save();

        // Clear the basket after checkout
        session()->forget('basket');

        // Retrieve the ID of the newly created order
        $orderId = $order->OrderID;

        // Redirect the user to the order tracking page with the order ID
        return redirect()->route('order.track', ['order_id' => $orderId]);
    } else {
        // User is not authenticated, handle this case accordingly
        return redirect()->route('login')->with('error', 'You must be logged in to place an order.');
    }
}

}
