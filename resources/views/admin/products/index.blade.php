@extends('layouts.admin')

@section('title', 'Admin - Products')

@section('content')
<div class="container-fluid py-4">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold" style="color:#5C3A3A;">Products</h2>
        <a href="{{ route('admin.products.create') }}" 
           class="btn px-4 py-2 shadow-sm" 
           style="background-color:Green; color:white; border-radius:8px;">
            + Add Product
        </a>
    </div>

    {{-- Products Table --}}
    <div class="card border-0 shadow rounded-3">
        <div class="card-header fw-bold" style="background:Navy; color:white">
            Product List
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table align-middle mb-0 table-hover">
                    <thead style="background-color: #FDE2E0; color:#5C3A3A;">
                        <tr>
                            <th class="px-3">#</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($products as $index => $product)
                        <tr>
                            <td class="px-3">{{ $index + 1 }}</td>
                            <td>
                                @if($product->image)
                                    <img src="{{ asset('storage/' . $product->image) }}" 
                                         alt="{{ $product->name }}" width="60" class="rounded shadow-sm">
                                @else
                                    <img src="{{ asset('images/placeholder.png') }}" 
                                         alt="No Image" width="60" class="rounded shadow-sm">
                                @endif
                            </td>
                            <td class="fw-semibold">{{ $product->name }}</td>
                            <td>${{ number_format($product->price, 2) }}</td>
                            <td class="text-center">
                                <a href="{{ route('admin.products.edit', $product->id) }}" 
                                   class="btn btn-sm me-2 shadow-sm" 
                                   style="background-color:Green; color:White; border-radius:6px;">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>
                                <form action="{{ route('admin.products.destroy', $product->id) }}" 
                                      method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm shadow-sm" 
                                            style="background-color:Red; color:white; border-radius:6px;"
                                            onclick="return confirm('Are you sure?')">
                                        <i class="bi bi-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center py-3 text-muted">
                                No products yet.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
