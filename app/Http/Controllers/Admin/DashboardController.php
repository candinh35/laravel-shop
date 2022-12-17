<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $results = DB::table('products')
            ->join('order_details', 'products.id', 'order_details.product_id')
            ->selectRaw('count(order_details.product_id) as total, products.name')
            ->groupBy('products.name')
            ->orderBy('total', 'DESC')
            ->limit(5)
            ->get();
        $data = "";
        foreach ($results as $result){
            $data .= "['".$result->name."',    ".$result->total."],";
        }

        $users = DB::table('users')
            ->join('orders', 'users.id', 'orders.user_id')
            ->join('order_details', 'orders.id', 'order_details.order_id')
            ->selectRaw('count(orders.user_id) as totalOrder, SUM(order_details.total) as totalPrice, users.name')
            ->groupBy('users.name')
            ->orderBy('total', 'DESC')
            ->limit(5)
            ->get();
        return view('admin.dashboard',[
            'title'=>'dashboard',
            'model'=>'dashboard',
            'data'=>$data,
            'users'=>$users
        ]);
    }
}
