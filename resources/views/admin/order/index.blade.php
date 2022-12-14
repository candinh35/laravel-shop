@extends('admin.layout.main')

@section('content')
    <table class="align-middle mb-0 table table-borderless table-striped table-hover">
        <thead>
        <tr>
            <th class="text-center">ID</th>
            <th class="text-center">Name</th>
        </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
            <tr>
                <td class="text-center text-muted">{{$order->id}}</td>
                <td class="text-center">{{$order->name}}</td>
                <td class="text-center">
                    @can($model.'.edit')
                        <a href="{{route($model.'.edit', $order->id)}}" data-toggle="tooltip" title="Edit"
                           data-placement="bottom" class="btn btn-outline-warning border-0 btn-sm">
                                                        <span class="btn-icon-wrapper opacity-8">
                                                            <i class="fa fa-edit"></i>
                                                        </span>
                        </a>
                    @endcan
                    @can($model.'.destroy')
                        <form class="d-inline" action="{{route($model.'.destroy', $order->id)}}" method="post">
                            @method('delete')
                            @csrf
                            <button class="btn btn-hover-shine btn-outline-danger border-0 btn-sm"
                                    type="submit" data-toggle="tooltip" title="Delete"
                                    data-placement="bottom"
                                    onclick="return confirm('Do you really want to delete this item?')">
                                                            <span class="btn-icon-wrapper opacity-8">
                                                                <i class="fa fa-trash fa-w-20"></i>
                                                            </span>
                            </button>
                        </form>
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
