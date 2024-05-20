<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('home', compact('products'));
    }

    public function addToCart(Request $request)
    {
        $product = Product::find($request->product_id);
        // dd($request->product_id);
        $cart = session()->get('cart', []);

        if (isset($cart[$product->product_id])) {
            $cart[$product->product_id]['quantity']++;
        } else {
            $cart[$product->product_id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->sell_price,
                "image" => $product->image
            ];
        }

        session()->put('cart', $cart);
        return redirect()->route('home')->with('success', 'Product added to cart!');
    }

    public function viewCart()
    {
        $cart = session()->get('cart', []);
        // dd($cart);
        return view('cart', compact('cart'));
    }

    public function removeFromCart($product_id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$product_id])) {
            unset($cart[$product_id]);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.view')->with('success', 'Product removed from cart!');
    }
}


