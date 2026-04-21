<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Motorcycle;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = auth()->user()->cart;

        return view('cart.index', compact('cart'));
    }

    public function add($id)
    {
        $user = auth()->user();

        $cart = $user->cart ?? Cart::create(['user_id' => $user->id]);

        $item = $cart->items()->where('motorcycle_id', $id)->first();

        if ($item) {
            $item->increment('quantity');
        } else {
            CartItem::create([
                'cart_id' => $cart->id,
                'motorcycle_id' => $id,
                'quantity' => 1
            ]);
        }

        return back()->with('success', 'Đã thêm vào giỏ hàng');
    }
}