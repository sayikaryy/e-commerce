@extends('layouts.admin')

@section('content')
<div class="flex-grow-1 overflow-auto p-4" style="background-color: #fdf5e6;">

    {{-- Top Quick Access Cards --}}
    <div class="row g-4 mb-4">
        <div class="col-md-4">
            <div class="card shadow-sm border-0 h-100" style="border-radius: 16px;">
                <div class="card-body text-center">
                    <div class="mb-3">
                        <i class="fas fa-tshirt fa-2x text-primary"></i>
                    </div>
                    <h5 class="card-title fw-bold">Products</h5>
                    <p class="card-text text-muted">Manage and add products.</p>
                    <a href="{{ route('admin.products.index') }}" class="btn btn-primary px-4" style="border-radius: 8px;">
                        View Products
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm border-0 h-100" style="border-radius: 16px;">
                <div class="card-body text-center">
                    <div class="mb-3">
                        <i class="fas fa-shopping-bag fa-2x text-success"></i>
                    </div>
                    <h5 class="card-title fw-bold">Orders</h5>
                    <p class="card-text text-muted">Track customer orders.</p>
                    <a href="{{ route('admin.orders.index') }}" class="btn btn-success px-4" style="border-radius: 8px;">
                        View Orders
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm border-0 h-100" style="border-radius: 16px;">
                <div class="card-body text-center">
                    <div class="mb-3">
                        <i class="fas fa-users fa-2x text-danger"></i>
                    </div>
                    <h5 class="card-title fw-bold">Users</h5>
                    <p class="card-text text-muted">Manage user accounts.</p>
                    <a href="{{ route('admin.users.index') }}" class="btn btn-danger px-4" style="border-radius: 8px;">
                        View Users
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- Recent Activity --}}
    <div class="card shadow border-0" style="border-radius: 16px;">
        <div class="card-header fw-bold text-white" style="background: linear-gradient(135deg, #ac1d10ff);">
            <i class="fas fa-history me-2"></i> Recent Activity
        </div>
        <div class="card-body p-0">
            <ul class="list-group list-group-flush">

                {{-- Users --}}
                @foreach($recentUsers as $user)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        👤 New user registered: <strong>{{ $user->name }}</strong>
                        <span class="badge bg-primary rounded-pill">{{ $user->created_at->format('d M Y') }}</span>
                    </li>
                @endforeach

                {{-- Products --}}
                @foreach($recentProducts as $product)
                    <li class="list-group-item d-flex justify-content-between">
                        🛍️ Product "<strong>{{ $product->name }}</strong>" added
                        <span class="badge bg-success rounded-pill">{{ $product->created_at->format('d M Y') }}</span>
                    </li>
                @endforeach

                {{-- Orders --}}
                @foreach($recentOrders as $order)
                    <li class="list-group-item d-flex justify-content-between">
                        📦 Order #<strong>{{ $order->id }}</strong> placed by {{ $order->user->name ?? 'Guest' }}
                        <span class="badge bg-warning rounded-pill">{{ $order->created_at->format('d M Y') }}</span>
                    </li>
                @endforeach

            </ul>
        </div>
    </div>
</div>
@endsection
