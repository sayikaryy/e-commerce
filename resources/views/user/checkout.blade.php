@extends('layouts.app')

@section('title', 'Checkout')

@section('content')
<div class="container mt-4">
    <h1>Checkout</h1>

    @if(session('cart') && count(session('cart')) > 0)
    <table class="table table-striped mt-3">
        <thead>
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @php $total = 0; @endphp
            @foreach(session('cart') as $item)
            @php $total += $item['price'] * $item['quantity']; @endphp
            <tr>
                <td>{{ $item['name'] }}</td>
                <td>${{ $item['price'] }}</td>
                <td>{{ $item['quantity'] }}</td>
                <td>${{ $item['price'] * $item['quantity'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <h4 class="mt-3">Total: ${{ $total }}</h4>

    {{-- POST to process route, not receipt --}}
    <form action="{{ route('checkout.process') }}" method="POST" class="mt-3">
        @csrf
        <button type="submit" class="btn btn-success">Place Order</button>
    </form>
    @else
    <p class="mt-3">Your cart is empty.</p>
    @endif
</div>
@endsection
