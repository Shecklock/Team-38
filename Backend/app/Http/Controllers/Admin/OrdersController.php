<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Requests\OrdersFormRequest;

class OrdersController extends Controller
{
    // Allows the page to be displayed
    public function index(Request $request) {
        $searchTerm = $request->query('search');
    
        if (!empty($searchTerm)) {
            // Adjust the query to search by the desired attributes, e.g., customer name, order ID, etc.
            $orders = Order::where('OrderID', 'LIKE', '%' . $searchTerm . '%')
                            ->orWhereHas('customer', function ($query) use ($searchTerm) {
                                $query->where('name', 'LIKE', '%' . $searchTerm . '%');
                            })
                            ->get();
        } else {
            $orders = Order::all();
        }
    
        return view('admin.orders.index', compact('orders'));
    }
    

    // Finds an order with the ID OrderID
    // If one is found, returns in an array called 'order' and passes it to admin.order.edit
    public function edit($OrderID) {
        $order = Order::findOrFail($OrderID);
        return view('admin.orders.edit', compact('order'));
    }

    // Updates the database entry (if successful) and returns the admin to the /orders page
    public function update(OrdersFormRequest $request, $order) {
        $order = Order::findOrFail($order);
        $input = $request->all();
        $order->update($input);
        return redirect()->route('orders')->with('success', 'Order updated successfully');
    }

    public function showOrderDetails($orderId)
    {
        // Retrieve the order with eager loaded orderDetails and products
        $order = Order::with('orderDetails.product')->find($orderId);

        // Pass the order details to the view
        return view('order-details', ['order' => $order, 'details' => $order->orderDetails]);
    }
}
