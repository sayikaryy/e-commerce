@extends('layouts.app')

@section('title', 'Order Receipt')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg border-0 rounded-3">
        <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
            <h3 class="mb-0">Order Receipt</h3>
            <span class="badge bg-light text-dark">Order #{{ $order->id }}</span>
        </div>

        <div class="card-body">
            {{-- Order Info --}}
            <div class="mb-4">
                <p><strong>Status:</strong> 
                    <span class="badge 
                        {{ $order->status === 'pending' ? 'bg-warning text-dark' : 'bg-success' }}">
                        {{ ucfirst($order->status) }}
                    </span>
                </p>
                <p><strong>Total:</strong> <span class="fw-bold text-success">${{ number_format($order->total, 2) }}</span></p>
            </div>

            {{-- Items Table --}}
            <h5 class="mb-3">Items</h5>
            <table class="table table-bordered align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Product</th>
                        <th class="text-end">Price</th>
                        <th class="text-center">Quantity</th>
                        <th class="text-end">Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order->items as $item)
                    <tr>
                        <td>{{ $item->product->name }}</td>
                        <td class="text-end">${{ number_format($item->price, 2) }}</td>
                        <td class="text-center">{{ $item->quantity }}</td>
                        <td class="text-end">${{ number_format($item->price * $item->quantity, 2) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            {{-- Total --}}
            <div class="d-flex justify-content-end mt-3">
                <h4 class="fw-bold">Grand Total: ${{ number_format($order->total, 2) }}</h4>
            </div>
        </div>

        <div class="card-footer text-end">
            <a href="{{ route('home') }}" class="btn btn-outline-secondary">Back to Shop</a>
            <a href="#" class="btn btn-primary">Download Invoice</a>
        </div>
    </div>
</div>
@endsection
