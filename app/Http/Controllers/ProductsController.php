<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('dashboard', compact('products'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'NamaProduk' => 'required|string',
            'Harga' => 'required|numeric',
            'Stok' => 'required|integer',
            'KodeProduk' => 'required|string|unique:products,KodeProduk',
        ]);

        Product::create($request->all());
        return redirect()->route('dashboard')->with('success', 'Product created successfully.');
    }
}