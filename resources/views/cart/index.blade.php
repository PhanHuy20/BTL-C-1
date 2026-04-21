@extends('layouts.guest')

@section('content')
<div class="container py-5">
    <h2>Giỏ hàng của bạn</h2>

    @if($cart && $cart->items->count())
        <ul class="list-group">
            @foreach($cart->items as $item)
                <li class="list-group-item d-flex justify-content-between">
                    {{ $item->motorcycle->name }}
                    <span>Số lượng: {{ $item->quantity }}</span>
                </li>
            @endforeach
        </ul>
    @else
        <p>Giỏ hàng trống</p>
    @endif
</div>
@endsection