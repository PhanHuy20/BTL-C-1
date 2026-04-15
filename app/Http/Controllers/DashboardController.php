<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Motorcycle;
use App\Models\Order;
use App\Models\Role;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
{
    $monthlyRevenue = 0;

    $todayOrders = Order::whereDate('created_at', now()->toDateString())->count();

    $totalCustomers = Customer::count();
    $totalMotorcycles = Motorcycle::count();
    $totalUsers = User::count();
    $totalRoles = Role::count();

    // KHÔNG dùng status nữa
    $completedPayments = 0;
    $pendingOrders = 0;

    $recentOrders = Order::latest()
        ->take(5)
        ->get();

    $lowStockMotorcycles = Motorcycle::take(5)->get();

    return view('dashboard.index', compact(
        'monthlyRevenue',
        'todayOrders',
        'totalCustomers',
        'totalMotorcycles',
        'totalUsers',
        'totalRoles',
        'completedPayments',
        'pendingOrders',
        'recentOrders',
        'lowStockMotorcycles'
    ));
}
}