<?php

namespace App\Http\Controllers;


use App\Models\Order;
use App\Models\Product;
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

    public function process(Request $request)
{
    // Retrieve the products being purchased from the request
    $products = $request->input('products', []);

    // Start a database transaction
    \DB::beginTransaction();

    try {
        // Loop through each product being purchased
        foreach ($products as $productId => $quantity) {
            // Retrieve the product from the database
            $product = Product::findOrFail($productId);

            // Check if there's enough stock for this product
            if ($product->StockQuantity < $quantity) {
                throw new \Exception("Insufficient stock for product: {$product->ProductName}");
            }

            // Update the stock quantity of the product
            $product->StockQuantity -= $quantity; // Update stock quantity accordingly
            $product->save();
        }

        // Commit the transaction if all updates succeed
        \DB::commit();

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
        return redirect()->route('order.track', ['customer_id' => $customerId])->with('success', 'Order placed successfully!');
    } catch (\Exception $e) {
        // Rollback the transaction if an error occurs
        \DB::rollBack();

        // Redirect the user back to the checkout page with an error message
        return redirect()->route('checkout')->with('error', $e->getMessage());
    }
}
}