<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products', compact('products'));
    }

    public function productCart()
    {
        $cart = session()->get('cart', []);

        $total = 0;
        foreach ($cart as $item) {
            $total += $item['quantity'] * $item['price'];
        }

        return view('cart', compact('cart', 'total'));
    }

    public function addProductToCart($productId)
    {
        $product = Product::findOrFail($productId);
        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity']++;
        } else {
            $cart[$productId] = [
                "ProductName" => $product->name,
                "quantity" => 1,
                "Price" => $product->price,
                "image" => $product->image
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product has been added to cart!');
    }

    public function updateCart(Request $request)
    {
        if ($request->productId && $request->quantity) {
            $cart = session()->get('cart');

            if (isset($cart[$request->productId])) {
                $cart[$request->productId]["quantity"] = $request->quantity;
                session()->put('cart', $cart);
                session()->flash('success', 'Product added to cart.');
            }
        }
    }

    public function deleteProduct(Request $request)
    {
        if ($request->productId) {
            $cart = session()->get('cart');

            if (isset($cart[$request->productId])) {
                unset($cart[$request->productId]);
                session()->put('cart', $cart);
                session()->flash('success', 'Product successfully deleted.');
            }
        }
    }
}
