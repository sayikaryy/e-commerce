<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;

class DashboardController extends Controller
{
    // This method will handle /admin/dashboard
    public function index()
    {
        // Get latest 5 users
        $recentUsers = User::latest()->take(5)->get();

        // Get latest 5 products
        $recentProducts = Product::latest()->take(5)->get();

        // Get latest 5 orders
        $recentOrders = Order::latest()->take(5)->get();

        // Pass all data to the dashboard view
        return view('admin.dashboard', compact('recentUsers', 'recentProducts', 'recentOrders'));
    }
}
