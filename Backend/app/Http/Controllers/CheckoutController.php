<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function checkout(Request $request)
    {
        // Retrieve basket items from the session
        $basketItems = session()->get('basket', []);

        // Pass basket items to the checkout view
        return view('checkout', ['basketItems' => $basketItems]);
    }

    public function process(Request $request)
    {
        // Check if the user is authenticated
        if (!Auth::check()) {
            // If not authenticated, redirect to the login page with an error message
            return redirect()->route('login')->with('error', 'You must be logged in to place an order.');
        }

        // Create a new order and set its attributes
        $order = new Order();
        $order->CustomerID = Auth::id(); // Set the customer ID to the ID of the authenticated user
        $order->OrderDate = now(); // Set the current date as the order date
        $order->UserID = Auth::id(); // Use UserID instead of CustomerID

        // Calculate the total amount from the basket items
        $totalAmount = array_sum(array_column(session()->get('basket', []), 'price'));
        $order->TotalAmount = $totalAmount;

        $order->Status = 'Pending'; // Set the initial status of the order
        $order->save(); // Save the order to the database

        // Clear the basket after successfully creating the order
        session()->forget('basket');

        // Redirect the user to a page where they can track their order, passing the order ID
        // In CheckoutController.php
return redirect()->route('order.track', ['customer_id' => Auth::id()])->with('success', 'Order placed successfully!');

    }
}
