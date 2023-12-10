<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; // Import the Product model

class BasketController extends Controller
{
    protected $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * Display the contents of the basket.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $basket = session()->get('basket', []); // Retrieve basket items from session

        return view('basket', ['basket' => $basket]);
    }

    /**
     * Add an item to the basket.
     *
     * @param  int  $productId
     * @return \Illuminate\Http\Response
     */
    public function addItem($productId)
    {
        $product = $this->product->findOrFail($productId);
        $basket = session()->get('basket', []);

        // Check if the product details are valid before adding to the basket
        if ($product) {
            // Check if the item already exists in the basket
            $existingItem = collect($basket)->firstWhere('id', $productId);

            if ($existingItem) {
                // Increment the quantity if the item already exists
                $existingItem['quantity']++;
            } else {
                // Add a new item to the basket
                $basket[] = [
                    'id' => $productId,
                    'name' => $product->ProductName,
                    'quantity' => 1, // Set quantity to 1 for a new item in the basket
                    'price' => $product->Price,
                    'photo' => $product->image,
                ];
            }

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
     * @param  int  $productId
     * @return \Illuminate\Http\Response
     */
    public function deleteProductFromBasket($productId)
    {
        $basket = session()->get('basket');

        if (isset($basket[$productId])) {
            unset($basket[$productId]);
            session()->put('basket', $basket);
            session()->flash('success', 'Product successfully deleted from basket.');
        }
    }
}
