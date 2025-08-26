<div class="sidebar d-flex flex-column flex-shrink-0 p-3">
    <h4 class="text-center fw-bold mb-4">Admin</h4>
    <a href="{{ route('admin.dashboard') }}" 
       class="mb-2 {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
        <i class="bi bi-speedometer2"></i> Dashboard
    </a>
    <a href="{{ route('admin.products.index') }}" 
       class="mb-2 {{ request()->routeIs('admin.products.*') ? 'active' : '' }}">
        <i class="bi bi-bag"></i> Products
    </a>
    <a href="{{ route('admin.orders.index') }}" 
       class="mb-2 {{ request()->routeIs('admin.orders.*') ? 'active' : '' }}">
        <i class="bi bi-receipt"></i> Orders
    </a>
    <a href="{{ route('admin.users.index') }}" 
       class="mb-2 {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
        <i class="bi bi-people"></i> Users
    </a>

    <a href="{{ route('logout') }}" class="mt-auto btn btn-sm" 
       style="background:#A2D2FF; color:#333;">
        <i class="bi bi-box-arrow-right"></i> Logout
    </a>
</div>
