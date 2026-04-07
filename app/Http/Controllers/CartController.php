<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);

        return view('cart', compact('cart'));
    }

    public function add(Request $request, $id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'id' => $id,
                'name' => $request->name,
                'price' => (int) $request->price,
                'quantity' => 1,
            ];
        }

        session()->put('cart', $cart);

        return response()->json([
            'message' => 'Package added to cart!',
        ]);
    }

    public function update(Request $request, $id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = max(1, $cart[$id]['quantity'] + $request->change);
        }

        session()->put('cart', $cart);

        return response()->json([
            'success' => true,
            'cart' => $cart,
        ]);
    }

    public function remove($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
        }

        session()->put('cart', $cart);

        return response()->json(['success' => true]);
    }

    public function getCart()
    {
        $cart = session()->get('cart', []);

        $total = 0;

        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        return response()->json([
            'cart' => $cart,
            'total' => $total,
            'count' => array_sum(array_column($cart, 'quantity')),
        ]);
    }
}
