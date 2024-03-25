<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Support\Facades\Log;



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

     // Reduce stock for each basket item and create order details
        foreach ($basketItems as $item) {
    $product = Product::find($item['product_id']);
    if ($product) {
        // Accessing StockQuantity directly as per your database schema
        $currentStock = $product->StockQuantity;
        
        Log::info("Attempting to order '{$product->ProductName}' with quantity: {$item['quantity']}. Current stock: {$currentStock}.");

        if ($currentStock >= $item['quantity']) {
            $product->StockQuantity -= $item['quantity'];
            $product->save();
            
            Log::info("New stock for '{$product->ProductName}': {$product->StockQuantity}.");
        } else {
            Log::warning("Not enough stock for '{$product->ProductName}'.");
            // Return with error message or handle accordingly
        }
    } else {
        Log::error("Product not found with ID: {$item['product_id']}");
        // Handle product not found
    }
    $order->products()->attach($item['product_id'], ['Quantity' => $item['quantity']]);
}


    // Clear the session basket after successfully placing the order
    session()->forget('basket');

    // Redirect to the order tracking page with a success message
   // return redirect()->route('order.track', ['order_id' => $order->OrderID])->with('success', 'Order placed successfully!');
    // Redirect to the order tracking page with a success message, using the authenticated user's ID as the customer_id
    return redirect()->route('order.track', ['customer_id' => Auth::id()])->with('success', 'Order placed successfully!');

}

public function showCheckout() {
    $basketItems = session()->get('basketItems', []); // Assuming you store basket items in session
    foreach ($basketItems as $key => &$item) {
        if (is_array($item) && isset($item['id'])) {
            $product = Product::find($item['id']);
            if ($product && $product->stock_quantity > 0) {
                $product->stock_quantity -= $item['quantity']; // Decrease the stock by the quantity in the basket
                $product->save(); // Save the updated product
            } else {
                // Handle the case where there's not enough stock
                unset($basketItems[$key]); // Optional: remove the item from the basket if there's no stock
            }
        }
    }
    // Update the session with the potentially modified basket
    session()->put('basketItems', $basketItems);

    return view('checkout', compact('basketItems')); // Pass the updated basket items to the view
}


    public function checkout(Request $request)
    {
        $basketItems = session()->get('basket', []);
        // Pass basket items to the checkout view
        return view('checkout', ['basketItems' => $basketItems]);
    }
}