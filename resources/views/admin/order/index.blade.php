@extends('admin.layout.main')

@section('content')
    <table class="align-middle mb-0 table table-borderless table-striped table-hover">
        <thead>
        <tr>
            <th class="text-center">ID</th>
            <th class="text-center">Name</th>
            <th class="text-center">Email</th>
            <th class="text-center">Status</th>
            <th class="text-center">PayMent Name</th>
            <th class="text-center">Date</th>
            <th class="text-center">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
            <tr>
                <td class="text-center text-muted">{{$order->id}}</td>
                <td class="text-center">{{$order->name}}</td>
                <td class="text-center">{{$order->email}}</td>
                <td width="180">
                    <select name="status" onchange="updateData({{$order->id}})" id="{{$order->id}}"  data-id="{{$order->id}}" class="form-control statusOrder">
                        <option {{$order->status == 1 ? 'selected' : ''}} value="1">wait for confirmation</option>
                        <option {{$order->status == 2 ? 'selected' : ''}} value="2">Delivering</option>
                        <option {{$order->status == 3 ? 'selected' : ''}} value="3">Complete</option>
                        <option {{$order->status == 4 ? 'selected' : ''}} value="4">Cancelled Order</option>
                    </select>
                </td>
                <td class="text-center">{{$order->payment_name}}</td>
                <td class="text-center">{{date('Y d M', strtotime($order->created_at))}}</td>
                <td class="text-center">
                    @can($model.'.show')
                        <a href="{{route($model.'.show', $order->id)}}"
                           class="btn btn-hover-shine btn-outline-primary border-0 btn-sm">
                            Details
                        </a>
                    @endcan
                    @can($model.'.edit')
                        <a href="{{route($model.'.edit', $order->id)}}" data-toggle="tooltip" title="Edit"
                           data-placement="bottom" class="btn btn-outline-warning border-0 btn-sm">
                                                        <span class="btn-icon-wrapper opacity-8">
                                                            <i class="fa fa-edit"></i>
                                                        </span>
                        </a>
                    @endcan
                </td>
            </tr>

        @endforeach
        </tbody>
    </table>
    <div class="my-3">
        {{$orders->appends(request()->all())->links()}}
    </div>

@endsection
@section('footer')
    <script>


            let status = document.querySelectorAll('.statusOrder');

           function updateData(id){
                let status =  $('#'+id).val();
                   console.log(status)
                   $.ajax({
                       type:'PUT',
                       url:'http://127.0.0.1:8000/api/orderStatus/'+id + '/'+ status,
                   })
           }


    </script>

@endsection
