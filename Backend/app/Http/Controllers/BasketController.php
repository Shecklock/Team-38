<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; // Import the Product model
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Size;
use Illuminate\Support\Facades\DB;



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

    public function addItem($productId, Request $request)
    {
        $basket = session()->get('basket', []); // Retrieve basket from session or initialize as an empty array
    
        // Fetch product details using $productId (replace this with your actual logic)
        $product = Product::find($productId);
    
    	// Logic to find what size the user selected
    	$sizeID = $request->input('size');
    	$size = Size::find($sizeID);
    	if ($size) { $selectedSize = $size->size; }
    	else { $selectedSize = "Unknown"; }
    
        // Check if the product details are valid before adding to the basket
        if ($product) {
            // Ensure that the product details have the expected structure
        $foundInBasket = false;
        foreach ($basket as $index => $item) {
            if ($item['product_id'] == $productId) {
                $basket[$index]['quantity'] += 1; // Increment the quantity
                $foundInBasket = true;
                break;
            }
        }
        
        if (!$foundInBasket) {

        $basket[] = [
                'name' => $product->ProductName, // Replace 'ProductName' with the correct field from your product details
                'size' => $selectedSize,
		        'price' => $product->Price, // Replace 'Price' with the correct field from your product details
                'image' => $product->image,
                'product_id' => $product->ProductID,
                'quantity' => 1,
                // Add more necessary keys and values
            ];
        }
    
            // Store the updated basket in the session
            session()->put('basket', $basket);
    
            return redirect()->route('basket')->with('success', 'Item added to the basket successfully!');
        } else {
            return redirect()->route('basket')->with('error', 'Failed to add item to the basket!');
        }
    }

    public function showProducts()
    {
        // Fetch products from the database
        $products = Product::all(); // Assuming Product is your model name
    
        // Pass the products to the view
        return view('products', ['products' => $products]);
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

        public function updateQuantity(Request $request, $itemId)
        {
        $basket = session()->get('basket', []);
        $newQuantity = $request->input('quantity', 1); // Default to 1 if not set

        if (isset($basket[$itemId])) {
            $basket[$itemId]['quantity'] = max(1, $newQuantity); // Ensure quantity is at least 1
            session()->put('basket', $basket);
        }

        return redirect()->back();
        }

        public function checkout(Request $request)
{
    $basketItems = session()->get('basket', []);
        
        if (session()->has('basket') && count(session('basket')) > 0) {
        // Proceed with the checkout process

    } else {
        // Redirect back to the basket page with a warning message
        return redirect()->route('basket')->with('warning', 'You don\'t have anything in your basket. Please add something and try again.');
    }

    // Pass basket items to the checkout view
    return view('checkout', ['basketItems' => $basketItems]);
}

}