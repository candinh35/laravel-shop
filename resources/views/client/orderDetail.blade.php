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
                            <li>orderDetail</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

    <!-- shopping orderDetail area start -->
    <div class="shopping_order_area">
        <div class="container">
            <div class="row">
                <x-alert/>
                @if($orders->count() >0)
                        <?php
//                           khai báo các biến để sử dụng
                        $i = 1;
                        ?>
                    <div class="col-12">
                        @foreach($orders as $order)
                                <?php $totalOrder = 0; ?>
                            <h2>Order {{$i++}}</h2>
                            <div class="table_desc">


                                <div class="cart_page table-responsive">
                                    <table>
                                        <thead>
                                        <tr>
                                            <th class="product_thumb">Image</th>
                                            <th class="product_name">Product</th>
                                            <th class="product-price">Price</th>
                                            <th class="product_quantity">Quantity</th>
                                            <th class="product_quantity">Color</th>
                                            <th class="product_quantity">Size</th>
                                            <th class="product_total">Total</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($order->orderDetails as $orderDetail)
                                            <tr>
                                                <td class="product_thumb"><a href="#"><img width="100"
                                                                                           src="{{asset($orderDetail->product->path_image)}}"
                                                                                           alt=""></a></td>
                                                <td class="product_name"><a
                                                        href="#">{{$orderDetail->product->name}}</a></td>
                                                <td class="product-price">{{number_format($orderDetail->price)}}Đ
                                                </td>
                                                <td class="product_quantity">{{$orderDetail->quantity}}</td>
                                                <td style="width: 50px"
                                                    class="product_quantity h-25">{{$orderDetail->color}}</td>
                                                <td style="width: 50px"
                                                    class="product_quantity">{{$orderDetail->size}}</td>
                                                <td style="width: 250px"
                                                    class="product_total">{{number_format($orderDetail->total)}} Đ
                                                </td>
                                                    <?php $totalOrder += $orderDetail->total ?>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="2">Total Order</td>
                                            <td colspan="2">{{number_format($totalOrder)}} Đ</td>
                                            @if($order->status == 1)
                                                <td colspan="2">wait for confirmation</td>
                                                <td>
                                                    <a
                                                        href="{{route('updateOrder',$order->id)}}"
                                                        class="btn btn-outline-dark"
                                                        onclick="return confirm('Do you really want to Cancel Order this item?')">
                                                        Cancel Order
                                                    </a>
                                                </td>
                                            @elseif($order->status == 2)
                                                <td colspan="3">Delivering</td>
                                            @elseif($order->status == 3)
                                                <td colspan="3" class="alert-success">Complete</td>
                                            @elseif($order->status == 4)
                                                <td colspan="3" class="alert-danger">Cancelled Order</td>
                                            @endif
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        @endforeach
                    </div>
            </div>
            @else
                <div class="order_submit">
                    <a class="keep_shopping" href="{{route('Shop')}}">Keep shopping</a>
                </div>
            @endif
        </div>
    </div>
    <!-- shopping orderDetail area end -->
@endsection
