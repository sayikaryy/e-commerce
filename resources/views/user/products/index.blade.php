@extends('layouts.app')

@section('title', 'Shop')

@section('content')
<h1 class="mb-4">Clothing Store</h1>
<div class="row g-4">
    @foreach($products as $product)
        <div class="col-md-3">
            <div class="card h-100 shadow-sm">
                @if($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                @else
                    <img src="{{ asset('images/placeholder.png') }}" class="card-img-top" alt="No Image">
                @endif
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text">${{ $product->price }}</p>
                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary mt-auto">View</a>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
