<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class PaymentController extends Controller
{
    public function showPaymentOptions($orderId)
{
    $order = Order::where('OrderID', $orderId)->firstOrFail();

    // Now pass the order to your view
    return view('order.pay', ['order' => $order]);
}

    
    // Handles immediate payment
public function payNow($orderId)
{
    $order = Order::find($orderId);

    if (!$order) {
        return back()->with('error', 'Order not found.');
    }

    // Here, you would typically integrate with a payment gateway
    // For demonstration, let's assume the payment was successful

    $order->Status = 'Processing'; // Update order status
    $order->save();

    // Redirect to order tracking page with a success message
    return redirect()->route('order.track', ['user_id' => $order->UserID])->with('success', 'Payment successful. Your order is now being processed.');
}

// Marks the order to be paid later
public function payLater($orderId)
{
    $order = Order::find($orderId);

    if (!$order) {
        return back()->with('error', 'Order not found.');
    }

    // Since the process method already sets the status to 'Pending', you might just redirect
    // However, if you want to ensure it's set to 'Pending' again or log this action, you can do it here

    // Redirect to order tracking page with a message
    return redirect()->route('order.track', ['user_id' => $order->UserID])->with('message', 'Order placed. Please pay at your earliest convenience.');
}
}
