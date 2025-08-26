@extends('layouts.app')

@section('title', 'Shopping Cart')

@section('content')
<div class="container mt-5">
    <h1>Shopping Cart</h1>

    @if(session('cart') && count(session('cart')) > 0)
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach(session('cart') as $id => $item)
            <tr>
                <td>{{ $item['name'] }}</td>
                <td>${{ $item['price'] }}</td>
                <td>
                    <div class="d-flex align-items-center">
                        <!-- Decrement -->
                        <form action="{{ route('cart.update', $id) }}" method="POST">
                            @csrf
                            <input type="hidden" name="quantity" value="{{ $item['quantity'] - 1 }}">
                            <button type="submit" class="btn btn-sm btn-secondary" @if($item['quantity'] <= 1) disabled @endif>-</button>
                        </form>

                        <span class="mx-2">{{ $item['quantity'] }}</span>

                        <!-- Increment -->
                        <form action="{{ route('cart.update', $id) }}" method="POST">
                            @csrf
                            <input type="hidden" name="quantity" value="{{ $item['quantity'] + 1 }}">
                            <button type="submit" class="btn btn-sm btn-secondary">+</button>
                        </form>
                    </div>
                </td>
                <td>${{ $item['price'] * $item['quantity'] }}</td>
                <td>
                    <form action="{{ route('cart.remove', $id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Remove</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <h4 class="mt-3">Total: ${{ $total }}</h4>
    <a href="{{ route('checkout.index') }}" class="btn btn-primary mt-3">Proceed to Checkout</a>

    @else
    <p>Your cart is empty.</p>
    <a href="{{ route('home') }}" class="btn btn-secondary mt-3">Continue Shopping</a>
    @endif
</div>
@endsection
