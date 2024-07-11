<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;

class CartController extends Controller
{
    public function index()
    {
        $userId = 1; // Assuming you have authentication
        $cartItems = Cart::all();
        $total = 0;

        foreach ($cartItems as $item) {
            $product = Product::find($item->product_id);
            $total += $product->price * $item->quantity;
            $item->product = $product;
        }

        return view('cart.index', compact('cartItems', 'total'));
    }

    public function add(Request $request)
    {
        $userId = 1; // Assuming you have authentication
        $productId = $request->input('product_id');
        $cartItem = Cart::create([
            'product_id' => $productId,
            'quantity' => 1, // Assuming a default quantity of 1
        ]);

        return redirect()->route('cart.index')->with('success', 'Product added to cart successfully.');
    }
}
