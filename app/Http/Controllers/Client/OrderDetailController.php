<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderDetailController extends Controller
{
    public function index($user_id)
    {

        $orders = Order::where('user_id', $user_id)->orderByDesc('created_at')->get();
        return view('client.orderDetail', compact('orders'));
    }

    public function update($order_id)
    {

        if (Order::find($order_id)->update(['status'=> 4])){
            return back()->with('success', 'You have successfully cancel orders');
        }

        return  abort(404);
    }
}
