@extends('admin.layout.main')

@section('content')
    <div class="row">
        <div class="col-lg-8">



    <html>
    <head>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            google.charts.load("current", {packages:["corechart"]});
            google.charts.setOnLoadCallback(drawChart);
            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['Task', 'Hours per Day'],
                    {!! $data !!}
                ]);

                var options = {
                    title: 'Thống Kê Sản Phẩm Bán Chạy Nhất Trong Tháng Tháng',
                    is3D: true,
                };

                var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
                chart.draw(data, options);
            }
        </script>
    </head>
    <body>
    <div id="piechart_3d" style="width: 900px; height: 500px;"></div>
    </body>
    </html>
    </div>
    <div class="col-lg-4">
       <h6 class="mt-5"><strong>Top 5 Người Mua Hàng Nhiều Nhất</strong></h6>
        <table class="table table-active">
            <thead>
            <tr>
                <th>Name</th>
                <th>Tổng Đơn</th>
                <th>Tổng Tiền</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->totalOrder}}</td>
                <td>{{number_format($user->totalPrice)}} Đ</td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    </div>
@endsection
