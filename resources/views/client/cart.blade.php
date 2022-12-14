@extends('client.layout.main')

@section('content')
    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area other_bread">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="{{route('Home')}}">home</a></li>
                            <li>/</li>
                            <li>cart</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

    <!-- shopping cart area start -->
    <div class="shopping_cart_area">
        <div class="container">
            <form action="{{route('product_cart_update')}}">
                <div class="row">
                    <x-alert/>
                    @if($carts->count() >0)
                        <div class="col-12">
                            <div class="table_desc">
                                <div class="cart_page table-responsive">
                                    <table>
                                        <thead>
                                        <tr>
                                            <th class="product_name"><a
                                                    onclick="return confirm('Do you really want to delete this item?')"
                                                    href="{{route('product_cart_destroy')}}">Delete</a></th>
                                            <th class="product_thumb">Image</th>
                                            <th class="product_name">Name</th>
                                            <th class="product-price">Price</th>
                                            <th class="product_quantity">Quantity</th>
                                            <th class="product_quantity">Color</th>
                                            <th class="product_quantity">Size</th>
                                            <th class="product_total">Total</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($carts as $cart)
                                            <tr>
                                                <td style="width: 20px;" class="product_remove">
                                                    <a onclick="return confirm('Do you really want to delete this item?')"
                                                       href="{{route('product_cart_delete', $cart->rowId)}}">
                                                        <i class="fa fa-trash-o"></i></a></td>
                                                <td style="width: 80px;" class="product_thumb"><a href="#"><img
                                                            src="{{asset($cart->options->image)}}" width="100"
                                                            alt=""></a></td>
                                                <td class="product_name"><a href="#">{{$cart->name}}</a></td>
                                                <td style="width: 80px;"
                                                    class="product-price">{{number_format($cart->price)}} Đ
                                                </td>
                                                <td class="qua-col first-row">
                                                    <div class="quantity">
                                                        <div class="pro-qty">
                                                            <input type="text" value="{{$cart->qty}}" data-rowid="{{$cart->rowId}}">
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="product_total">{{$cart->options->color}}</td>
                                                <td class="product_total">{{$cart->options->size}}</td>
                                                <td style="width: 80px;"
                                                    class="product_total">{{number_format($cart->price * $cart->qty)}}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                </div>
                @else
                    <div class="cart_submit">
                        <a class="keep_shopping" href="{{route('Shop')}}">Keep shopping</a>
                    </div>
                @endif
                <!--coupon code area start-->
                <div class="coupon_area">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="coupon_code left">
                                <h3>Coupon</h3>
                                <div class="coupon_inner">
                                    <p>Enter your coupon code if you have one.</p>
                                    <input placeholder="Coupon code" type="text">
                                    <button type="submit">Apply coupon</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="coupon_code right">
                                <h3>Cart Totals</h3>
                                <div class="coupon_inner">
                                    <div class="cart_subtotal">
                                        <p>Subtotal</p>
                                        <p class="cart_amount">{{$total}} Đ</p>
                                    </div>
                                    <div class="cart_subtotal ">
                                        <p>Shipping</p>
                                        <p class="cart_amount"><span>Flat Rate:</span>{{ $total}} Đ</p>
                                    </div>
                                    <a href="#">Calculate shipping</a>

                                    <div class="cart_subtotal">
                                        <p>Total</p>
                                        <p class="cart_amount">{{$total}}</p>
                                    </div>
                                    <div class="checkout_btn">
                                        <a href="{{route('product_cart_checkout')}}">Proceed to Checkout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--coupon code area end-->

            </form>
        </div>
    </div>
    <!-- shopping cart area end -->
@endsection
