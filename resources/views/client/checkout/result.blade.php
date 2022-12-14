@extends('client.layout.master')
@section('content')
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="../index.html"><i class="fa fa-home"></i>Home</a>
                        <a href="">Shop</a>
                        <span>Check Out</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="checkout-section spad">
        <div class="container">
            <h3 style="color: red; margin: 0 auto" >{{$notification}}</h3>
            <a href="{{route('productShop')}}" class="primary-btn mt-5">Continue Shopping</a>
        </div>

    </div>
@endsection
