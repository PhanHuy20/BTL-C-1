<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Motorcycle;
use App\Models\Order;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        $featuredMotorcycles = Motorcycle::with(['brand', 'category'])
            ->latest()
            ->take(6)
            ->get();

        $totalMotorcycles = Motorcycle::count();
        $totalUsers = User::count();
        $totalOrders = Order::count();
        $totalBrands = Brand::count();

        return view('home.index', compact(
            'featuredMotorcycles',
            'totalMotorcycles',
            'totalUsers',
            'totalOrders',
            'totalBrands'
        ));
    }
}