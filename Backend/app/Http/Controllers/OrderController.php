<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Size;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;



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
    $userId = Auth::id();
    // Find orders for the given customer ID
    $orders = Order::where('UserID', $userId)->get();
    
    // Pass the orders to the view
    return view('order.track', ['orders' => $orders]);
}

public function show($id)
{
    $order = Order::with(['products.sizes'])->findOrFail($id);

    $sizes = [];

    foreach ($order->products as $product) {
        // Get the size_id from the pivot data
        $sizeId = $product->pivot->size_id;
        $size = Size::find($sizeId);
    
        $uniqueKey = $product->id . '_' . $sizeId;
        $sizes[$uniqueKey] = $size ? $size->size : 'Size Not Specified';
    }

    return view('order.order-details', compact('order', 'sizes'));
}

    public function updateOrderStatusToProcessing($orderId)
{
    $order = Order::findOrFail($orderId);
    $order->Status = 'Shipped';
    $order->save();

    // Decrease stock only after updating the order status to 'shiped'
    $order->decreaseStock();

}

	public function refund($orderId) 
    {
    $order = Order::findOrFail($orderId);
    $order->Status = 'Returning';
    $order->save();
    
    return redirect()->back();
    }



public function showMore($orderId)
{
    // Fetch the order details
    $order = Order::findOrFail($orderId);
    
    // Fetch the order products and calculate subtotal
    $orderProducts = \Illuminate\Support\Facades\DB::table('order_product')
                        ->join('products', 'order_product.ProductID', '=', 'products.ProductID')
                        ->join('sizes', 'order_product.size_id', '=', 'sizes.id') // Join with sizes table
                        ->where('order_product.OrderID', $orderId)
                        ->get([
                            'order_product.ProductID', 
                            'order_product.Quantity', 
                            'order_product.size_id', 
                            'sizes.size', 
                            'ProductName', 
                            'products.description', 
                            'products.price', 
                            'products.image' 
                        ])
                        ->map(function ($item) {
                            $item->Subtotal = $item->Quantity * $item->price;
                            return $item;
                        });

    // Calculate overall total
    $overallT = $orderProducts->sum('Subtotal');
    $overallTotal = number_format($overallT, 2, '.', '');

    // Pass data to view
    return view('admin.orders.viewOrderInfo', compact('order', 'orderProducts', 'overallTotal'));
}

}