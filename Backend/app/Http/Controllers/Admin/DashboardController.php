<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use App\Models\Order; // Import the Order model

class DashboardController extends Controller
{
    public function index()
    {
        // Calculate counts of incoming and outgoing orders
        $incomingOrdersCount = Order::where('Status', 'incoming')->count();
        $outgoingOrdersCount = Order::where('Status', 'outgoing')->count();

        // Pass the counts to the view
        return view('admin.dashboard', compact('incomingOrdersCount', 'outgoingOrdersCount'));
    }
}
