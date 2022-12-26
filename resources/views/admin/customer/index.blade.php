@extends('admin.layout.main')

@section('content')
    <table class="align-middle mb-0 table table-borderless table-striped table-hover">
        <thead>
        <tr>
            <th class="text-center">ID</th>
            <th>Full Name</th>
            <th class="text-center">Email</th>
            <th class="text-center">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($customers as $customer)
            <tr>
                <td class="text-center text-muted">{{$customer->id}}</td>
                <td>
                    <div class="widget-content p-0">
                        <div class="widget-content-wrapper">
                            @if($customer->path_image == null)
                                <div class="widget-content-left mr-3">
                                    <div class="widget-content-left">
                                        <img width="40" class="rounded-circle"
                                             data-toggle="tooltip" title="Image"
                                             data-placement="bottom"
                                             src="{{asset('/template/admin/css/assets/images/_default-customer.png')}}" alt="">
                                    </div>
                                </div>
                            @else
                                <div class="widget-content-left mr-3">
                                    <div class="widget-content-left">
                                        <img width="40" class="rounded-circle"
                                             data-toggle="tooltip" title="Image"
                                             data-placement="bottom"
                                             src="{{asset($customer->path_image) }}" alt="">
                                    </div>
                                </div>
                            @endif
                            <div class="widget-content-left flex2">
                                <div class="widget-heading">{{$customer->name}}</div>
                            </div>
                        </div>
                    </div>
                </td>
                <td class="text-center">{{$customer->email}}</td>
                <td class="text-center">
                    @can($model.'.show')
                    <a href="{{route($model.'.show', $customer->id)}}"
                       class="btn btn-hover-shine btn-outline-primary border-0 btn-sm">
                        Details
                    </a>
                    @endcan
                        @can($model.'.edit')
                    <a href="{{route($model.'.edit', $customer->id)}}" data-toggle="tooltip" title="Edit"
                       data-placement="bottom" class="btn btn-outline-warning border-0 btn-sm">
                                                        <span class="btn-icon-wrapper opacity-8">
                                                            <i class="fa fa-edit"></i>
                                                        </span>
                    </a>
                        @endcan
                        @can($model.'.destroy')
                    <form class="d-inline" action="{{route($model.'.destroy', $customer->id)}}" method="post">
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
        {{$customers->appends(request()->all())->links()}}
    </div>
@endsection
