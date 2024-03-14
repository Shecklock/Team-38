<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; // Import the Product model
use App\Models\Order;
use App\Models\OrderDetail;

class CheckoutController extends Controller
{

    public function index()
    {
        $basketItems = session()->get('basket', []); // Retrieve basket items from session
        
        return view('basket', ['basketItems' => $basketItems]);
    }

    public function showProducts()
    {
        // Fetch products from the database
        $products = Product::all(); // Assuming Product is your model name
    
        // Pass the products to the view
        return view('products', ['products' => $products]);
    }

    public function checkout(Request $request)
    {
        $basketItems = session()->get('basket', []);
        
        // Ensure $basketItems is defined
        if (!isset($basketItems)) {
            return redirect()->route('basket')->with('error', 'No items in the basket!');
        }
        
        // Create a new order
        $order = new Order();
        $order->CustomerID = auth()->user()->id; // Assuming you have user authentication
        $order->OrderDate = now();
        $order->TotalAmount = array_sum(array_column($basketItems, 'price')); // Calculate total amount
        $order->Status = 'Pending'; // Initial status
        $order->save();

        // Save order details
        foreach ($basketItems as $item) {
            $orderDetail = new OrderDetail();
            $orderDetail->OrderID = $order->OrderID;
            $orderDetail->ProductID = $item['product_id']; // Assuming you have product IDs in the basket
            $orderDetail->Quantity = $item['quantity']; // Assuming you have quantity in the basket
            $orderDetail->Price = $item['price'];
            $orderDetail->save();
        }

        // Clear the basket after checkout
        session()->forget('basket');

        // Redirect the user to order tracking page
        return redirect()->route('order.track', ['order_id' => $order->OrderID])->with('success', 'Order placed successfully!');
    }

}