@extends('layouts.app')

@section('title', $product->name)

@section('content')
<div class="container py-5">
    <div class="row g-5 align-items-center">
        
        {{-- Product Image --}}
        <div class="col-md-6 text-center">
            <div class="card shadow-sm border-0">
                @if($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" 
                         class="card-img-top rounded" 
                         alt="{{ $product->name }}" 
                         style="max-height: 400px; object-fit: contain;">
                @else
                    <img src="{{ asset('images/placeholder.png') }}" 
                         class="card-img-top rounded" 
                         alt="No Image"
                         style="max-height: 400px; object-fit: contain;">
                @endif
            </div>
        </div>

        {{-- Product Info --}}
        <div class="col-md-6">
            <h2 class="fw-bold mb-3" style="color:#5C3A3A;">{{ $product->name }}</h2>
            <h4 class="text-success fw-bold mb-4">${{ number_format($product->price, 2) }}</h4>
            <p class="text-muted mb-4">{{ $product->description }}</p>

            {{-- Action Buttons --}}
            <div class="d-flex gap-3">
                <form action="{{ route('cart.add', $product->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-success btn-lg px-4 shadow-sm">
                        <i class="bi bi-cart-plus"></i> Add to Cart
                    </button>
                </form>

                <form action="{{ route('cart.buyNow', $product->id) }}" method="GET">
                    @csrf
                    <button type="submit" class="btn btn-warning btn-lg px-4 shadow-sm">
                        <i class="bi bi-lightning-charge-fill"></i> Buy Now
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
