<h3>Ship to</h3>
<table class="table" border="1" cellpadding="10" cellspacing="0">
    <thead>
    <tr>
        <th scope="col">Name</th>
        <th scope="col">Phone</th>
        <th scope="col">Email</th>
        <th scope="col">Address</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <th scope="row">{{$order->name}}</th>
        <td>{{$order->phone}}</td>
        <td>{{$order->email}}</td>
        <td>{{$order->address}}</td>
    </tr>
    </tbody>
</table>
<h3>Order</h3>
<table class="table" border="1" cellpadding="20" cellspacing="0">
    <thead>
    <tr>
        <th scope="col">Name</th>
        <th scope="col">Quantity</th>
        <th scope="col">Color</th>
        <th scope="col">Size</th>
        <th scope="col">Price</th>
        <th scope="col">Total</th>
    </tr>
    </thead>
    <tbody> <?php $totalOrder = 0 ?>
    @foreach($order->orderDetails as $orderDetail)
    <tr>
            <th scope="row">{{$orderDetail->product->name}}</th>
            <td>{{$orderDetail->quantity}}</td>
            <td>{{$orderDetail->color}}</td>
            <td>{{$orderDetail->size}}</td>
            <td>{{number_format($orderDetail->price)}} Đ</td>
            <td>{{number_format($orderDetail->total)}} Đ</td>
            {{--           Tính tông giá đơn hàng--}}
                <?php $totalOrder += $orderDetail->total ?>
    </tr>
    @endforeach
    </tbody>
</table>
<div style="border: 1px solid; width: 250px;margin-top: 20px;padding: 0 20px">
    <h4>shipping fee : 30,000 Đ</h4>
    <h4>Date : {{date('M d Y', strtotime($order->created_at))}}</h4>
    <h4>Total Order : {{number_format($totalOrder)}} Đ</h4>
</div>

<div style="text-align: center">
    <p>Thank you for buy our product</p>
    <p>See you again</p>
</div>
