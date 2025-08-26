<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = Session::get('cart', []);
        $total = array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $cart));
        return view('user.checkout', compact('cart', 'total'));
    }

   public function process(Request $request)
{
    $cart = Session::get('cart', []);
    if (!$cart || count($cart) == 0) {
        return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
    }

    // Save order in database
    $order = \App\Models\Order::create([
        'user_id' => auth()->id(),
        'total' => array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $cart)),
        'status' => 'pending',
    ]);

    // Save each item
    foreach ($cart as $id => $item) {
        \App\Models\OrderItem::create([
            'order_id' => $order->id,
            'product_id' => $id,
            'quantity' => $item['quantity'],
            'price' => $item['price'],
        ]);
    }

    // Clear cart
    Session::forget('cart');

    // Redirect to receipt page
    return redirect()->route('checkout.receipt', $order->id);
}
public function receipt($orderId)
{
    $order = \App\Models\Order::with('items.product')->findOrFail($orderId);
    return view('user.receipt', compact('order'));
}




}
