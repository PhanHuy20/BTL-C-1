<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Customer;
use App\Models\Motorcycle;
use App\Models\Order;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $featuredMotorcycles = Motorcycle::with(['brand', 'category'])
            ->latest()
            ->take(6)
            ->get();

        $totalMotorcycles = Motorcycle::count();
        $totalCustomers = Customer::count();
        $totalOrders = Order::count();
        $totalBrands = Brand::count();

        return view('home.index', compact(
            'featuredMotorcycles',
            'totalMotorcycles',
            'totalCustomers',
            'totalOrders',
            'totalBrands'
        ));
    }

    public function motorcycles()
    {
        $motorcycles = Motorcycle::with(['brand', 'category'])
            ->latest()
            ->paginate(9);

        return view('home.motorcycles', compact('motorcycles'));
    }

    public function showMotorcycle($id)
    {
        $motorcycle = Motorcycle::with(['brand', 'category'])->findOrFail($id);

        return view('home.motorcycle-detail', compact('motorcycle'));
    }
}