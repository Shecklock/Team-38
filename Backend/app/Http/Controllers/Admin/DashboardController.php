<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Size;
use App\Models\Order;


class DashboardController extends Controller
{
     public function index(Request $request)
    {
        $filter = $request->input('filter', '');

        $outgoingStatuses = ['processing', 'shipped', 'delivered'];
        $incomingStatuses = ['pending', 'on hold', 'returning'];

        // Fetch 5 newest outgoing and incoming orders for the dashboard summary
        $outgoingOrdersSummary = Order::whereIn('Status', $outgoingStatuses)->orderBy('created_at', 'desc')->take(5)->get();
        $incomingOrdersSummary = Order::whereIn('Status', $incomingStatuses)->orderBy('created_at', 'desc')->take(5)->get();

        // Determine which set of orders to display based on the filter
        if ($filter === 'outgoing') {
            $orders = Order::whereIn('Status', $outgoingStatuses)->orderBy('created_at', 'desc')->get();
        } elseif ($filter === 'incoming') {
            $orders = Order::whereIn('Status', $incomingStatuses)->orderBy('created_at', 'desc')->get();
        } else {
            // If no filter or 'all', fetch all orders
            $orders = Order::orderBy('created_at', 'desc')->get();
        }

        return view('admin.dashboard', compact('orders', 'outgoingOrdersSummary', 'incomingOrdersSummary', 'filter'));
    }
}
