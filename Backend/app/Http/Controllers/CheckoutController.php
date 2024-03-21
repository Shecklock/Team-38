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

    // Calculate the total amount from the basket items
    $totalAmount = array_sum(array_column($basketItems, 'price'));

    // Create a new order and set its attributes
    $order = new Order();
    $order->CustomerID = Auth::id(); // Assuming CustomerID and UserID refer to the same user
    $order->OrderDate = now();
    $order->TotalAmount = $totalAmount;
    $order->Status = 'Pending';
    $order->UserID = Auth::id(); // Assuming UserID refers to the authenticated user
    $order->save();

    // Create order details for each basket item
    foreach ($basketItems as $item) {
        //if (!isset($item['product_id'], $item['quantity'])) {
            // Handle the missing product_id case
            //continue; // This skips the current iteration and moves to the next item
        //}
        //$order->product()->attach($item['product_id'], ['quantity' => $item['quantity']]);
        $order->products()->attach($item['product_id'], ['Quantity' => $item['quantity']]);
    }

    // Clear the session basket after successfully placing the order
    session()->forget('basket');

    // Redirect to the order tracking page with a success message
   // return redirect()->route('order.track', ['order_id' => $order->OrderID])->with('success', 'Order placed successfully!');
    // Redirect to the order tracking page with a success message, using the authenticated user's ID as the customer_id
    return redirect()->route('order.track', ['customer_id' => Auth::id()])->with('success', 'Order placed successfully!');

}



    public function checkout(Request $request)
    {
        $basketItems = session()->get('basket', []);
        // Pass basket items to the checkout view
        return view('checkout', ['basketItems' => $basketItems]);
    }
}
