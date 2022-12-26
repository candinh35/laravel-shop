@extends('admin.layout.main')

@section('content')
    <table class="align-middle mb-0 table table-borderless table-striped table-hover">
        <thead>
        <tr>
            <th class="text-center">ID</th>
            <th>Full Name</th>
            <th class="text-center">Email</th>
            <th class="text-center">Phone</th>
            <th class="text-center">Address</th>
            <th class="text-center">Actions</th>
        </tr>
        </thead>
        <tbody>
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
                                         src="{{asset('/template/admin/assets/images/_default-customer.png')}}" alt="">
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
                <td class="text-center">{{$customer->phone}}</td>
                <td class="text-center w-25">{{$customer->address}}</td>
                <td class="text-center">
                    <a href="{{route($model.'.index')}}"
                       class="btn btn-hover-shine btn-outline-primary border-0 btn-sm">
                        Back
                    </a>
                    <a href="{{route($model.'.edit',$customer->id)}}" data-toggle="tooltip" title="Edit"
                       data-placement="bottom" class="btn btn-outline-warning border-0 btn-sm">
                                                        <span class="btn-icon-wrapper opacity-8">
                                                            <i class="fa fa-edit"></i>
                                                        </span>
                    </a>
                    <form class="d-inline" action="{{route($model.'.destroy',$customer->id)}}" method="post">
                        @method('delete')
                        <button class="btn btn-hover-shine btn-outline-danger border-0 btn-sm"
                                type="submit" data-toggle="tooltip" title="Delete"
                                data-placement="bottom"
                                onclick="return confirm('Do you really want to delete this item?')">
                                                            <span class="btn-icon-wrapper opacity-8">
                                                                <i class="fa fa-trash fa-w-20"></i>
                                                            </span>
                        </button>
                    </form>
                </td>
            </tr>
        </tbody>
    </table>
@endsection
