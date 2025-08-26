<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body>
<div class="d-flex vh-100">

    {{-- Sidebar --}}
    <div class="text-white p-3 d-flex flex-column" 
         style="width: 250px; background-color: #001f3f;"> {{-- Navy --}}
        <h4 class="text-center mb-4 text-warning">Admin Panel</h4>
        <ul class="nav flex-column flex-grow-1">
            <li class="nav-item mb-2">
                <a href="{{ route('admin.dashboard') }}" 
                   class="nav-link text-white {{ request()->routeIs('admin.dashboard') ? 'fw-bold text-warning' : '' }}">
                    <i class="bi bi-speedometer2"></i> Dashboard
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="{{ route('admin.products.index') }}" 
                   class="nav-link text-white {{ request()->routeIs('admin.products.*') ? 'fw-bold text-warning' : '' }}">
                    <i class="bi bi-box-seam"></i> Products
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="{{ route('admin.orders.index') }}" 
                   class="nav-link text-white {{ request()->routeIs('admin.orders.*') ? 'fw-bold text-warning' : '' }}">
                    <i class="bi bi-bag-check"></i> Orders
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="{{ route('admin.users.index') }}" 
                   class="nav-link text-white {{ request()->routeIs('admin.users.*') ? 'fw-bold text-warning' : '' }}">
                    <i class="bi bi-people"></i> Users
                </a>
            </li>
        </ul>

        <form action="{{ route('logout') }}" method="POST" class="mt-3">
            @csrf
            <button class="btn w-100 text-white fw-bold" style="background-color: #8B0000;">
                <i class="bi bi-box-arrow-right"></i> Logout
            </button>
        </form>
    </div>

    {{-- Main Content --}}
    <div class="flex-grow-1 d-flex flex-column">
        {{-- Top Navbar --}}
        <nav class="navbar px-4 shadow-sm" style="background-color: #002147;"> {{-- Dark Navy --}}
            <span class="navbar-brand mb-0 h1 text-warning">Dashboard</span>
            <span class="fw-bold text-white">Welcome, {{ Auth::user()->name }}</span>
        </nav>

        {{-- Body --}}
        <div class="flex-grow-1 overflow-auto p-4" style="background-color: #fdf5e6;"> {{-- Cream --}}
            @yield('content')
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
