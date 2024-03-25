<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $searchTerm = $request->input('search');
        $filter = $request->input('filter', '');
        $allProducts = $request->input('all_products', false);

        $query = Product::query();

        if (!empty($searchTerm)) {
            // Assuming 'ProductName' is correct; adjust if your column name is different, like 'name'
            $query->where('ProductName', 'like', "%{$searchTerm}%");
        }

        if (!$allProducts) { // Only apply filters if 'all_products' is not set
            switch ($filter) {
                case 'lowStock':
                    $query->where('stockQuantity', '<=', 10); // Assuming your column is 'stock_quantity'
                    break;
                case 'outOfStock':
                    $query->where('stockQuantity', '=', 0);
                    break;
            }
        }

        // Decide on the logic for $showWarning based on your application's needs
        $showWarning = ($filter == 'lowStock' || $filter == 'outOfStock');

        $stockItems = $query->get();

        return view('admin.dashboard', compact('stockItems', 'searchTerm', 'filter', 'showWarning'));
    }
}
