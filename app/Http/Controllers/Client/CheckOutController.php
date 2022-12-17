<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddOrderRequest;
use App\Models\Order;
use App\Models\Order_detail;
use App\Models\Product;
use App\Utilities\VNPay;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Request;

class CheckOutController extends Controller
{
    public function index()
    {
        if (Auth::user()) {
            $user = Auth::user();
            $carts = Cart::content();
            $total = Cart::total();
            $total = str_replace('.00', '', $total);
            $subTotal = Cart::subtotal();
            $subTotal = str_replace('.00', '', $subTotal);
            return view('client.checkout.index', compact('carts', 'subTotal', 'total', 'user'));
        } else {
            return redirect()->back()->with('error', 'You Must Login Before Paying');
        }
    }

    public function addOrder(AddOrderRequest $request)
    {
        try {
            DB::beginTransaction();
            $userId = Auth::id();
            $dataOrder = [
                'user_id' => $userId,
                'name' => $request->name,
                'email' => $request->email,
                'address' => $request->address,
                'phone' => $request->phone,
                'status'=>$request->status,
                'payment_name' => $request->payment_name
            ];
            $order = Order::create($dataOrder);

            $carts = Cart::content();
            //        thêm vào bảng order
            if ($request->payment_name == 'pay_last') {




//        thêm vào bảng order_detail
                foreach ($carts as $cart) {
                    $data = [
                        'product_id' => $cart->id,
                        'order_id' => $order->id,
                        'quantity' => $cart->qty,
                        'price' => $cart->price,
                        'total' => $cart->price * $cart->qty,
                        'color'=>$cart->options->color,
                        'size'=>$cart->options->size
                    ];
//                trừ đi số hàng tồn kho
                    $product = Product::find($cart->id);

                    $newAmount = $product->amount - $cart->qty;
                    if ($newAmount >= 0){
                        return redirect()->back()->with('error', 'The product in stock is out of stock! Please choose another product');
                    }
                    $product->update(['amount'=>$newAmount]);

                    Order_detail::create($data);
                }
//            gửi Email
                $total = Cart::total();
                $subtotal = Cart::subtotal();
                $this->sendEmail($order, $total, $subtotal);
                //         xóa rỏ hàng

                Cart::destroy();
                DB::commit();
                return redirect()->route('product_cart')->with('success', 'Your order has been successfully placed ');
            } elseif ($request->payment_name == 'online_payment') {
//             01. ấy URL thanh toan của VNPay
                $data_url = VNPay::vnpay_create_payment([
                    'vnp_TxnRef' => $order->id,
                    'vnp_OrderInfo' => 'Mô tả về đơn hàng ở đây ...',
                    'vnp_Amount' => Cart::total(0, '', ''),
                ]);
//              02. chuyển hướng tới URL lấy được
                return redirect()->to($data_url);

            } else {
                return redirect()->back()->with('error', 'Your order Failed ');
            }
        } catch (\Exception $err) {
            DB::rollBack();
            Log::error('Message' . $err->getMessage() . 'Line :' . $err->getLine());
            return redirect()->back()->with('error', 'Your order Failed ');
        }

    }

    public function vnPayCheck(Request $request)
    {
//      01. Lấy data từ URL (do vnPay gừi về)

        $vnp_ResponseCode = $request->get('vnp_ResponseCode');
        $vnp_TxnRef = $request->get('vnp_TxnRef');
        $vnp_Amount = $request->get('vnp_Amount');

        if ($vnp_ResponseCode != null) {
//            Nếu Thành Công
            if ($vnp_ResponseCode == 00) {
//                 gửi Email
                $order = Order::find($vnp_TxnRef);
                $total = Cart::total();
                $subtotal = Cart::subtotal();
                $this->sendEmail($order, $total, $subtotal);

//                Xóa Giỏ Hàng
                Cart::destroy();
//                Thông Báo Kết Quả

                return redirect()->route('Home')->with('success', 'Your order has been successfully placed ');
            } else {
//                Nếu Thất Bại
//                 Xóa ơn hàng vừa thêm vào database
                Order::find($vnp_TxnRef)->delete();

                return redirect()->back()->with('error', 'Your order Failed ');
            }
        }

    }

    public function sendEmail($order, $total, $subtotal)
    {
        $email_to = $order->email;
        Mail::send('client.checkout.email', compact('order', 'total', 'subtotal'), function ($message) use ($email_to) {
            $message->from('dinhcan355@gmail.com', 'Căn Đinh');
            $message->to($email_to, $email_to);
            $message->subject('Order Notification');
        });
    }


}
