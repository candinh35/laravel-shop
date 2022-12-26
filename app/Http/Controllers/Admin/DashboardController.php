<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        try {
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
            $customers = DB::table('customers')
                ->join('orders', 'customers.id', 'orders.customer_id')
                ->selectRaw('count(orders.customer_id) as totalOrder, SUM(orders.total) as totalPrice, customers.name')
                ->groupBy('customers.name')
                ->orderBy('total', 'DESC')
                ->limit(5)
                ->get();

//            dd($customers);
            return view('admin.dashboard',[
                'title'=>'dashboard',
                'model'=>'dashboard',
                'data'=>$data,
                'customers'=>$customers
            ]);
        }catch (\Exception $err){

        }

    }
}
