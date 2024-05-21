<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'buy_price' => 'required|numeric',
            'sell_price' => 'required|numeric',
            'image' => 'nullable|image',
        ]);

        $path =  $request->file('image')->store('images', 'public');

        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'buy_price' => $request->buy_price,
            'sell_price' => $request->sell_price,
            'discount_code' => $request->discount_code,
            'image' => $path,
        ]);

        return redirect()->route('products.index');
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'buy_price' => 'required|numeric',
            'sell_price' => 'required|numeric',
            'image' => 'nullable|image',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public');
            $product->image = $path;
        }

        $product->name = $request->name;
        $product->description = $request->description;
        $product->buy_price = $request->buy_price;
        $product->sell_price = $request->sell_price;
        $product->discount_code = $request->discount_code;
        $product->save();

        return redirect()->route('products.index');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }
}
