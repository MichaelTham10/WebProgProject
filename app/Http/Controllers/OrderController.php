<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\KeyboardCategory;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    
    public function index()
    {
        $orders = Order::where('user_id', Auth::user()->id)->get();
        $categories = KeyboardCategory::all();
        return view('order.order-history', compact('orders', 'categories'));
       
    }

    public function detail($id)
    {
        $details = OrderDetail::where('order_id', $id)->get();
        $categories = KeyboardCategory::all();
        return view('order.order-detail', compact('details', 'categories'));
    }

   
    public function store(Request $request)
    {
        $order = Order::create([
            'user_id' => Auth::user()->id,
        ]);



        foreach (Auth::user()->carts as $cart) {
            OrderDetail::create([
                'order_id' => $order->id,
                'keyboard_id' => $cart->keyboard->id,
                'qty' => $cart->qty,
            ]);
        }



        Cart::where('user_id', Auth::user()->id)->delete();
        $orders = Order::where('user_id', Auth::user()->id)->get();
        return redirect()->route('history', ['orders' => $orders]);
    }

}
