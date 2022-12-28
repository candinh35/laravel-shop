@extends('client.layout.main')
@section('header')
    <link rel="stylesheet" href="{{asset('template/client/assets/css/checkout.css')}}">
@endsection
@section('content')
    <div class="breadcrumbs_area other_bread">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="{{route('Home')}}">home</a></li>
                            <li>/</li>
                            <li>Check Out</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="checkout-section spad">

        <div class="container">
            <x-alert/>
            <form action="{{route('addOrder')}}" method="post" class="checkout-form">
                @csrf
                <input type="hidden" name="customer_id" value="{{$customer->id}}">
                <input type="hidden" name="status" value="1">
                <input type="hidden" name="total" value="{{$total}}">
                <div class="row">
                    @if(Cart::count() > 0)
                        <div class="col-lg-6">
                            <h4>Biiling Detail</h4>
                            <div class="row">
                                <div class="col-lg-12">
                                    <label for="fir">Name</label>
                                    <input
                                        type="text"
                                        id="fir"
                                        class="@error('name') is-invalid @enderror"
                                        name="name"
                                        value="{{$customer->name}}"
                                    >
                                </div>


                                <div class="col-lg-6">
                                    <label for="email">Email Address <span>*</span></label>
                                    <input type="text"
                                           id="email"
                                           class="@error('email') is-invalid @enderror"
                                           name="email"
                                           value="{{$customer->email}}"
                                    >
                                </div>
                                <div class="col-lg-6">
                                    <label for="phone">Phone<span>*</span></label>
                                    <input type="text"
                                           id="phone"
                                           class="@error('phone') is-invalid @enderror"
                                           name="phone"
                                           value="{{$customer->phone}}"
                                    >
                                </div>
                                <div class="col-lg-12">
                                    <label for="street"> Address <span>*</span></label>
                                    <input type="text"
                                           class="@error('address') is-invalid @enderror"
                                           name="address"
                                           value="{{$customer->address}}"
                                    >
                                </div>

                            </div>

                        </div>
                        <div class="col-lg-6">
                            <div class="place-order">
                                <h4>Your Order</h4>
                                <div class="order-total">
                                    <ul class="order-table">
                                        @foreach($carts as $cart)
                                            <li class="fw-normal">{{$cart->name}} x {{$cart->qty}}<span>{{number_format($cart->price * $cart->qty) }} Đ</span>
                                            </li>
                                        @endforeach
                                        <li class="fw-normal">Subtotal x 1 <span>{{$subTotal}} Đ</span></li>
                                        <li class="total-price">Combination x 1 <span>{{$total}} Đ</span></li>
                                    </ul>
                                    <div class="payment-check">
                                        <div class="pc-item">
                                            <label for="pc-check">
                                                Pay Later
                                                <input type="radio" id="pc-check" name="payment_name" value="pay_last" checked>
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <div class="pc-item">
                                            <label for="pc-vnpay">
                                                VNpay Payment
                                                <input type="radio" id="pc-vnpay" name="payment_name"
                                                       value="vnpay_payment">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <div class="pc-item">
                                            <label for="pc-momo">
                                                Momo Payment
                                                <input type="radio" id="pc-momo" name="payment_name"
                                                       value="momo_payment">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="order-btn">
                                        <button type="submit" name="redirect" class="site-btn place-btn">Place Order</button>
                                    </div>


                                </div>
                            </div>

                        </div>
                    @else
                        <h3 style="color: red; margin: 0 auto">Bạn chưa có sản phẩm trong giở hàng vui lòng quay lại mua
                            sắm</h3>
                    @endif
                </div>
            </form>

        </div>
    </div>
@endsection

@section('footer')
    <script>
        $('.is-invalid').keydown(function () {
            $(this).removeClass('is-invalid')
        });
    </script>
@endsection
