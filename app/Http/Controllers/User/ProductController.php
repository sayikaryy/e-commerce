<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Display all products (catalog)
    public function index()
    {
        $products = Product::all(); // get all products
        return view('user.products.index', compact('products'));
    }

    // Display single product details
    public function show($id)
    {
        $product = Product::findOrFail($id); // find product or 404
        return view('user.products.show', compact('product'));
    }
}
