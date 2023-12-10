<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; // Import the Product model

class BasketController extends Controller
{
    /**
     * Display the contents of the basket.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $basketItems = session()->get('basket', []); // Retrieve basket items from session
        
        return view('basket', ['basketItems' => $basketItems]);
    }
    /**
     * Add an item to the basket.
     *
     * @param  int  $productId
     * @return \Illuminate\Http\Response
     */

    public function addItem($productId)
    {
        $basket = session()->get('basket', []); // Retrieve basket from session or initialize as an empty array
    
        // Fetch product details using $productId (replace this with your actual logic)
        $product = Product::find($productId);
    
        // Check if the product details are valid before adding to the basket
        if ($product) {
            // Ensure that the product details have the expected structure
            $basket[] = [
                'name' => $product->ProductName, // Replace 'ProductName' with the correct field from your product details
                'price' => $product->Price, // Replace 'Price' with the correct field from your product details
                'image' => $product->image,
                // Add more necessary keys and values
            ];
    
            // Store the updated basket in the session
            session()->put('basket', $basket);
    
            return redirect()->route('basket')->with('success', 'Item added to the basket successfully!');
        } else {
            return redirect()->route('basket')->with('error', 'Failed to add item to the basket!');
        }
    }
    
    /**
     * Remove an item from the basket.
     *
     * @param  int  $itemId
     * @return \Illuminate\Http\Response
     */
    public function removeItem($itemId)
    {
        $basket = session()->get('basket', []);

        if (array_key_exists($itemId, $basket)) {
            unset($basket[$itemId]);
            session()->put('basket', $basket);
            return redirect()->route('basket')->with('success', 'Item removed from the basket successfully!');
        } else {
            return redirect()->route('basket')->with('error', 'Failed to remove item from the basket');
        }
    }


    /**
     * Clear all items from the basket.
     *
     * @return \Illuminate\Http\Response
     */
    public function clearBasket()
    {
        // Logic to clear all items from the basket
        // Replace this with your actual logic to clear the basket
        // BasketService::clearBasket();

        return redirect()->route('basket')->with('success', 'Basket cleared successfully!');
    }
}
