@extends('admin.layout.main')

@section('content')
    <ul style="border-bottom: 1px solid;margin: 25px 0;padding: 20px 40px">
        <li>Name: <strong>{{$order->name}}</strong></li>
        <li>Phone: <strong>{{$order->phone}}</strong></li>
        <li>Address: <strong>{{$order->address}}</strong></li>
        <li>Email: <strong>{{$order->email}}</strong></li>
    </ul>
    <table class="align-middle mb-0 table table-borderless table-striped table-hover text-center ">
        <thead>
        <tr>
            <th class="text-center">ID</th>
            <th class="text-center">Name</th>
            <th class="text-center">Image</th>
            <th class="text-center">Quantity</th>
            <th class="text-center">Price</th>
            <th class="text-center">Color</th>
            <th class="text-center">Size</th>
            <th class="text-center">Total</th>
            <th class="text-center">Action</th>
        </tr>
        </thead>
        <tbody>
        <?php $totalOrder = 0 ?>
        @foreach($order->orderDetails as $orderDetail)
            <tr>

                <td class="text-center">{{$orderDetail->id}}</td>
                <td class="text-center">{{$orderDetail->product->name}}</td>
                <td class="text-center"><img width="80" src="{{asset($orderDetail->product->path_image)}}" alt=""></td>
                <td class="text-center">{{$orderDetail->quantity}}</td>
                <td class="text-center">{{$orderDetail->color}}</td>
                <td class="text-center">{{$orderDetail->size}}</td>
                <td class="text-center"> {{number_format($orderDetail->price) }} Đ</td>
                <td class="text-center">{{number_format($orderDetail->total)}} Đ</td>
                <td>  @can($model.'.edit')
                        <a href="{{route($model.'.edit', $order->id)}}" data-toggle="tooltip" title="Edit"
                           data-placement="bottom" class="btn btn-outline-warning border-0 btn-sm">
                                                        <span class="btn-icon-wrapper opacity-8">
                                                            <i class="fa fa-edit"></i>
                                                        </span>
                        </a>
                    @endcan</td>
            </tr>

            {{--           Tính tông giá đơn hàng--}}
                <?php $totalOrder += $orderDetail->total ?>
        @endforeach
        <tr>
            <td style="height: 100px" colspan="3"><strong>Total Order :</strong></td>
            <td colspan="3"><strong>{{number_format($totalOrder)}} Đ</strong></td>
            <td><a href="{{route($model.'.index')}}"
                   class="btn btn-hover-shine btn-outline-primary border-0 btn-sm">
                    Back
                </a>
                <a href="{{route($model.'.inPdf',$order->id)}}"
                   class="btn btn-hover-shine btn-outline-info border-0 btn-sm">
                    In PDF
                </a>
            </td>
        </tr>
        </tbody>

    </table>
@endsection
