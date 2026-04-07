@extends('layouts.app')

@section('title', 'Cart')

@section('bg-image', asset('upload/cart-bg.jpg'))

@section('content')
    <div class="cart-container">
        <h1 class="page-title">Your Cart</h1>

        <div class="cart-card">

            @php $total = 0; @endphp

            @forelse ($cart as $item)
                <div class="cart-item" data-id="{{ $item['id'] }}">
                    <div>
                        <h4>{{ $item['name'] }}</h4>
                        <p>₹<span class="price">{{ $item['price'] }}</span></p>

                        <div class="qty-box">
                            <button class="qty-btn decrease">-</button>
                            <span class="qty">{{ $item['quantity'] }}</span>
                            <button class="qty-btn increase">+</button>
                        </div>
                    </div>

                    <button class="remove-btn">Remove</button>
                </div>

            @empty
                <p>Your cart is empty</p>
            @endforelse

            @if (count($cart) > 0)
                <div class="cart-total">
                    <h3>Total: ₹<span id="cart-total">0</span></h3>
                </div>
            @endif

        </div>
    </div>
@endsection
