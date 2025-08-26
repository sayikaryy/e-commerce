@extends('layouts.admin')

@section('title', 'Admin - Edit Product')

@section('content')
<h1>Edit Product</h1>
<form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT') <!-- important: for update -->

    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" class="form-control" value="{{ $product->name }}" required>
    </div>

    <div class="mb-3">
        <label>Description</label>
        <textarea name="description" class="form-control" required>{{ $product->description }}</textarea>
    </div>

    <div class="mb-3">
        <label>Price</label>
        <input type="number" name="price" step="0.01" class="form-control" value="{{ $product->price }}" required>
    </div>

    <div class="mb-3">
        <label>Current Image</label><br>
        @if($product->image)
            <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" width="100">
        @else
            <p>No image uploaded</p>
        @endif
    </div>

    <div class="mb-3">
        <label>Change Image</label>
        <input type="file" name="image" class="form-control">
    </div>

    <button class="btn btn-primary">Update Product</button>
</form>
@endsection
