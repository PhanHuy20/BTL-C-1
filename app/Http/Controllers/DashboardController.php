<?php

namespace App\Http\Controllers;

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

    $totalUsers = User::count();
    $totalMotorcycles = Motorcycle::count();
    $totalUsers = User::count();
    $totalRoles = Role::count();

    $completedPayments = 0;
    $pendingOrders = 0;

    $recentOrders = Order::latest()
        ->take(5)
        ->get();

    $lowStockMotorcycles = Motorcycle::take(5)->get();

    return view('dashboard.index', compact(
        'monthlyRevenue',
        'todayOrders',
        'totalUsers',
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