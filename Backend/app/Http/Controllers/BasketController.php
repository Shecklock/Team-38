<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BasketController extends Controller
{
    /**
     * Display the contents of the basket.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // You can retrieve and display the basket contents here
        return view('basket');
    }

    /**
     * Add an item to the basket.
     *
     * @param  int  $productId
     * @return \Illuminate\Http\Response
     */
<<<<<<< Updated upstream
    public function addItem($productId)
    {
        // Logic to add an item to the basket (you need to implement this)
        // You might want to use a service to handle basket-related operations

        // For example:
        // BasketService::addItem($productId);

        return redirect()->route('basket')->with('success', 'Item added to the basket successfully!');
    }

=======

     public function productCart()
{
    $basket = session()->get('basket', []);

    $total = 0;
    foreach ($basket as $item) {
        // Check if 'quantity' key exists, otherwise set it to 1
        $quantity = isset($item['quantity']) ? $item['quantity'] : 1;

        $total += $quantity * $item['price'];
    }

    return view('basket', compact('basketItems', 'total'));
}



public function addItem($productId)
{
    $basket = session()->get('basket', []); // Retrieve basket from session or initialize as an empty array

    // Fetch product details using $productId (replace this with your actual logic)
    $product = Product::find($productId);

    // Check if the product details are valid before adding to the basket
    if ($product) {
        // Ensure that the product details have the expected structure
        $existingItemKey = array_search($productId, array_column($basket, 'product_id'));

        if ($existingItemKey !== false) {
            // Product is already in the basket, increment the quantity
            $basket[$existingItemKey]['quantity'] = isset($basket[$existingItemKey]['quantity']) ? $basket[$existingItemKey]['quantity'] + 1 : 1;
        } else {
            // Product is not in the basket, add it with a quantity of 1
            $basket[] = [
                'product_id' => $productId,
                'name' => $product->ProductName, // Replace 'ProductName' with the correct field from your product details
                'price' => $product->Price, // Replace 'Price' with the correct field from your product details
                'image' => $product->image,
                'quantity' => 1,  // Set the quantity to 1 for a new product
            ];
        }

        // Store the updated basket in the session
        session()->put('basket', $basket);

        return redirect()->route('basket')->with('success', 'Item added to the basket successfully!');
    } else {
        return redirect()->route('basket')->with('error', 'Failed to add item to the basket!');
    }
}


    
>>>>>>> Stashed changes
    /**
     * Remove an item from the basket.
     *
     * @param  int  $itemId
     * @return \Illuminate\Http\Response
     */
<<<<<<< Updated upstream
    public function removeItem($itemId)
    {
        // Logic to remove an item from the basket (you need to implement this)
        // You might want to use a service to handle basket-related operations

        // For example:
        // BasketService::removeItem($itemId);

        return redirect()->route('basket')->with('success', 'Item removed from the basket successfully!');
    }
=======
>>>>>>> Stashed changes

    /**
     * Clear all items from the basket.
     *
     * @return \Illuminate\Http\Response
     */
    public function deleteProduct(Request $request)
    {
<<<<<<< Updated upstream
        // Logic to clear all items from the basket (you need to implement this)
        // You might want to use a service to handle basket-related operations

        // For example:
        // BasketService::clearBasket();
=======
        if ($request->id) {
            $basket = session()->get('basket');
>>>>>>> Stashed changes

            if (isset($basket[$request->id])) {
                unset($basket[$request->id]);
                session()->put('basket', $cart);
                session()->flash('success', 'Product successfully deleted.');
            }
        }
    }
}


// <?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use App\Models\Product;

// class ProductController extends Controller
// {
//     public function index()
//     {
//         $products = Product::all();
//         return view('products', compact('products'));
//     }

//     public function productCart()
//     {
//         $cart = session()->get('cart', []);

//         $total = 0;
//         foreach ($cart as $item) {
//             $total += $item['quantity'] * $item['price'];
//         }

//         return view('cart', compact('cart', 'total'));
//     }

//     public function addProductToCart($id)
//     {
//         $product = Product::findOrFail($id);
//         $cart = session()->get('cart', []);

//         if (isset($cart[$id])) {
//             $cart[$id]['quantity']++;
//         } else {
//             $cart[$id] = [
//                 "name" => $product->name,
//                 "quantity" => 1,
//                 "price" => $product->price,
//                 "photo" => $product->photo
//             ];
//         }

//         session()->put('cart', $cart);
//         return redirect()->back()->with('success', 'Product has been added to cart!');
//     }

//     public function updateCart(Request $request)
//     {
//         if ($request->id && $request->quantity) {
//             $cart = session()->get('cart');

//             if (isset($cart[$request->id])) {
//                 $cart[$request->id]["quantity"] = $request->quantity;
//                 session()->put('cart', $cart);
//                 session()->flash('success', 'Product added to cart.');
//             }
//         }
//     }

//     public function deleteProduct(Request $request)
//     {
//         if ($request->id) {
//             $cart = session()->get('cart');

//             if (isset($cart[$request->id])) {
//                 unset($cart[$request->id]);
//                 session()->put('cart', $cart);
//                 session()->flash('success', 'Product successfully deleted.');
//             }
//         }
//     }
// }
