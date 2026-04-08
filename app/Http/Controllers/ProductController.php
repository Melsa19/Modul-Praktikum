<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function landing()
    {
        $products = Product::with('categories')->get();
        return view('landing', compact('products'));
    }

    public function index()
    {
        $products = Product::with('categories')->get();
        $categories = Category::all();
        return view('admin', compact('products', 'categories'));
    }

    public function store(Request $request)
    {
        $product = Product::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'price' => $request->price
        ]);
        $product->categories()->attach($request->category_id);
        return back()->with('success', 'Tiket ditambah!');
    }

    public function destroy($id)
    {
        Product::destroy($id);
        return back()->with('success', 'Tiket dihapus!');
    }

    public function setupCategory()
    {
        Category::firstOrCreate(['name' => 'Eksekutif']);
        Category::firstOrCreate(['name' => 'Ekonomi']);
        Category::firstOrCreate(['name' => 'Panoramic']);
        return redirect('/admin')->with('success', 'Kategori siap!');
    }
}