<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    // Show cart page
    public function index()
    {
        $cart = Session::get('cart', []);
        $total = array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $cart));
        return view('user.cart', compact('cart', 'total'));
    }

    // Add product to cart
    public function add($id)
    {
        $product = Product::findOrFail($id);
        $cart = Session::get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
                'image' => $product->image,
            ];
        }

        Session::put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart!');
    }

    // Update quantity
   public function update(Request $request, $id)
{
    $cart = Session::get('cart', []);
    if (isset($cart[$id])) {
        $quantity = max(1, (int) $request->quantity); // prevent < 1
        $cart[$id]['quantity'] = $quantity;
        Session::put('cart', $cart);
    }
    return redirect()->back();
}

    // Remove product from cart
    public function remove($id)
    {
        $cart = Session::get('cart', []);
        if (isset($cart[$id])) {
            unset($cart[$id]);
            Session::put('cart', $cart);
        }
        return redirect()->back();
    }
    public function buyNow($id)
{
    $product = Product::findOrFail($id);
    $cart = Session::get('cart', []);

    if (isset($cart[$id])) {
        $cart[$id]['quantity']++;
    } else {
        $cart[$id] = [
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => 1,
            'image' => $product->image,
        ];
    }

    Session::put('cart', $cart);

    // Redirect directly to checkout
    return redirect()->route('cart.index');
}

}
