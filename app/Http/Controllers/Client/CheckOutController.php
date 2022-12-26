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
use Illuminate\Http\Request;

class CheckOutController extends Controller
{
    public function index()
    {
        if (Auth::user()) {
            $customer = Auth::guard('cus')->user();
            $carts = Cart::content();
            $total = Cart::total();
            $total = str_replace('.00', '', $total);
            $subTotal = Cart::subtotal();
            $subTotal = str_replace('.00', '', $subTotal);
            return view('client.checkout.index', compact('carts', 'subTotal', 'total', 'customer'));
        } else {
            return redirect()->back()->with('error', 'You Must Login Before Paying');
        }
    }

    public function addOrder(AddOrderRequest $request)
    {
        try {
            DB::beginTransaction();
            $total = $request->total;
            $total = str_replace(',','', $total);
            $dataOrder = [
                'customer_id' => $request->customer_id,
                'name' => $request->name,
                'email' => $request->email,
                'address' => $request->address,
                'phone' => $request->phone,
                'status' => $request->status,
                'payment_name' => $request->payment_name,
                'total'=>$total
            ];
            $order = Order::create($dataOrder);

            $carts = Cart::content();

            if ($request->payment_name == 'vnpay_payment') {

//              Gọi Hàm Thanh Toán VNPay
                $this->VNPay_payment($order->id);

            } elseif ($request->payment_name == 'momo_payment') {
//                Gọi Hàm thanh toán MOMO
                $this->momo_payment($order->total);
            }

//        thêm vào bảng order_detail
                foreach ($carts as $cart) {
                    $data = [
                        'product_id' => $cart->id,
                        'order_id' => $order->id,
                        'quantity' => $cart->qty,
                        'price' => $cart->price,
                        'total' => $cart->price * $cart->qty,
                        'color' => $cart->options->color,
                        'size' => $cart->options->size
                    ];
//                trừ đi số hàng tồn kho
                    $product = Product::find($cart->id);

                    $newAmount = $product->amount - $cart->qty;
                    if ($newAmount <= 0) {
                        return redirect()->back()->with('error', 'The product in stock is out of stock! Please choose another product');
                    }
                    $product->update(['amount' => $newAmount]);

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

//    thanh toan VNPay

    public function VNPay_payment($orderId){
//        01. ấy URL thanh toan của VNPay
                $data_url = VNPay::vnpay_create_payment([
                    'vnp_TxnRef' => $orderId,
                    'vnp_OrderInfo' => 'Mô tả về đơn hàng ở đây ...',
                    'vnp_Amount' => Cart::total(0, '', ''),
                ]);
//              02. chuyển hướng tới URL lấy được
                return redirect()->to($data_url);

    }


//    thanh toán bằng momo
    function execPostRequest($url, $data)
    {
        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data))
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        //execute post

        $result = curl_exec($ch);

        //close connection
        curl_close($ch);
        return $result;
    }

    public function momo_payment($total)
    {
        $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";

        $total = str_replace(',', '', $total);

        $partnerCode = 'MOMOBKUN20180529';
        $accessKey = 'klm05TvNBzhg7h7j';
        $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
        $orderInfo = "Thanh toán qua ATM MoMo";
        $amount = $total;
        $orderId = time() . "";
        $redirectUrl = "http://127.0.0.1:8000/checkout";
        $ipnUrl = "http://127.0.0.1:8000/checkout";
        $extraData = "";
        $requestId = time() . "";
        $requestType = "payWithATM";
//            $extraData = ($_POST["extraData"] ? $_POST["extraData"] : "");
        //before sign HMAC SHA256 signature
        $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
        $signature = hash_hmac("sha256", $rawHash, $secretKey);
        $data = array('partnerCode' => $partnerCode,
            'partnerName' => "Test",
            "storeId" => "MomoTestStore",
            'requestId' => $requestId,
            'amount' => $amount,
            'orderId' => $orderId,
            'orderInfo' => $orderInfo,
            'redirectUrl' => $redirectUrl,
            'ipnUrl' => $ipnUrl,
            'lang' => 'vi',
            'extraData' => $extraData,
            'requestType' => $requestType,
            'signature' => $signature);

        $result = $this->execPostRequest($endpoint, json_encode($data));
//        dd($result);

            $jsonResult = json_decode($result, true);  // decode json
//        dd($jsonResult['payUrl']);
            //Just a example, please check more in there
            return redirect($jsonResult['payUrl']);


    }


}
