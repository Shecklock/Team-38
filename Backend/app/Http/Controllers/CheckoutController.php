<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Size;
use App\Models\ProductSize;
use App\Models\OrderProduct;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;



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
        $totalAmount = array_sum(array_map(function ($item) {
            return $item['price'] * $item['quantity'];
        }, $basketItems));

        DB::beginTransaction();
        try {
            $order = new Order();
            $order->UserID = Auth::id();
            $order->OrderDate = now();
            $order->TotalAmount = $totalAmount;
            $order->Status = 'Pending';
            $order->save();
            
            foreach ($basketItems as $item) {
                $product = Product::with('sizes')->find($item['product_id']);
                if ($product) {
                    $size = $product->sizes->firstWhere('id', $item['size_id']);
                    if ($size && $size->pivot->quantity >= $item['quantity']) {
                        $order->products()->attach($item['product_id'], [
                            'Quantity' => $item['quantity'],
                            'size_id' => $item['size_id']
                        ]);

                        Log::info("Stock updated for product ID {$item['product_id']} size ID {$item['size_id']}.");
                    } else {
                        throw new Exception("Not enough stock for product ID {$item['product_id']} size ID {$item['size_id']}.");
                    }
                } else {
                    throw new Exception("Product not found with ID: {$item['product_id']}.");
                }
            }

            DB::commit();
            session()->forget('basket');
            return redirect()->route('pay.options', ['orderId' => $order->OrderID])
                             ->with('success', 'Order placed successfully! Please proceed to payment.');
        } catch (Exception $e) {
            DB::rollBack();
            Log::error("Order processing failed: " . $e->getMessage());
            return redirect()->route('basket')->with('error', 'An error occurred while processing your order: ' . $e->getMessage());
        }
    }

    public function checkout(Request $request)
    {
        $basketItems = session()->get('basket', []);
        return view('checkout', ['basketItems' => $basketItems]);
    }
}