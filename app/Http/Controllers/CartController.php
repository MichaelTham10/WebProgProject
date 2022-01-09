<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\KeyboardCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
  
    public function index()
    {
        $carts = Cart::simplePaginate(1);
        $categories = KeyboardCategory::all();
        return view('cart.cart', compact('carts', 'categories'));
    }

  
    public function store($user_id, $keyboard_id, Request $request)
    {
        $this->validate($request, [

            'quantity' => 'required|gt:0',

        ]);

        $cart = Cart::where('user_id', $user_id)->where('keyboard_id', $keyboard_id)->first();
        if ($cart != null) {
            $cart->update([
                'qty' => $cart->qty += $request->quantity
            ]);
            return redirect('/carts')->with('success', 'Keyboard quantity has been changed');
        }

        Cart::create([
            'user_id' => $user_id,
            'keyboard_id' => $keyboard_id,
            'qty' => $request->quantity

        ]);

        return redirect('/carts')->with('success', 'Keyboard has been added to cart');
    }


    public function update($cart_id, Request $request){
        Cart::findOrFail($cart_id)->update([
            'qty' => $request->quantity,
        ]);

        return back()->with('success', 'Cart has been updated');
    }
}
