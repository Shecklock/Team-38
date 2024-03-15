<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function checkout(Request $request)
    {
        // Retrieve the products being purchased from the request
        $products = $request->input('itemId', []);
        
        // Start a database transaction
        \DB::beginTransaction();
        
        try {
            // Loop through each product being purchased
            foreach ($products as $itemId => $quantity) {
                // Retrieve the product from the database
                $product = Product::findOrFail($itemId);

                // Check if there's enough stock for this product
                if ($product->StockQuantity < $quantity) {
                    throw new \Exception("Insufficient stock for product: {$product->ProductName}");
                }

                // Update the stock quantity of the product
                $product->decrement('StockQuantity', $quantity);
            }

            // Commit the transaction if all updates succeed
            \DB::commit();

            // Retrieve the updated basket items
            $basketItems = session()->get('basket', []);

            // Return the checkout view with the updated basket items
            return view('checkout', ['basketItems' => $basketItems])->with('success', 'Order placed successfully!');
        } catch (\Exception $e) {
            // Rollback the transaction if an error occurs
            \DB::rollBack();

            // Redirect the user back to the basket page with an error message
            return redirect()->route('basket')->with('error', $e->getMessage());
        }
    }

    public function purchase($itemId)
    {
        $product = Product::findOrFail($itemId);

        if ($product->StockQuantity > 0) {
            $product->decrement('StockQuantity');
            // Process purchase here
            return redirect()->back()->with('success', 'Product purchased successfully!');
        } else {
            return redirect()->back()->with('error', 'Product is out of stock!');
        }
    }

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

            // Get the ID of the authenticated user
            $customerId = auth()->id();

            // Redirect the user to the order tracking page with the customer ID
            return redirect()->route('order.track', ['customer_id' => $customerId]);

        } else {
            // User is not authenticated, handle this case accordingly
            return redirect()->route('login')->with('error', 'You must be logged in to place an order.');
        }
    }
}
