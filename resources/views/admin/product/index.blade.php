@extends('admin.layout.main')

@section('content')
    <table class="align-middle mb-0 table table-borderless table-striped table-hover">
        <thead>
        <tr>
            <th class="text-center">ID</th>
            <th class="text-center">Name</th>
            <th class="text-center">Image</th>
            <th class="text-center">Price</th>
            <th class="text-center">Category</th>
            <th class="text-center">Brand</th>
            <th class="text-center">Actions</th>
        </tr>
        </thead>
        <tbody>
@foreach($products as $product)
        <tr>
            <td class="text-center text-muted">{{$product->id}}</td>
            <td class="text-center">{{$product->name}}</td>
            <td class="text-center"><img src="{{asset($product->path_image) }}" width="100" alt=""> </td>
            <td class="text-center">{{number_format($product->price)}}</td>
            <td class="text-center">{{optional($product->categories)->name}}</td>
            <td class="text-center">{{$product->brands->name}}</td>
            <td class="text-center">
                @can($model.'.show')
                    <a href="{{route($model.'.show', $product->id)}}"
                       class="btn btn-hover-shine btn-outline-primary border-0 btn-sm">
                        Details
                    </a>
                @endcan
                @can($model.'.edit')
                    <a href="{{route($model.'.edit', $product->id)}}" data-toggle="tooltip" title="Edit"
                       data-placement="bottom" class="btn btn-outline-warning border-0 btn-sm">
                                                        <span class="btn-icon-wrapper opacity-8">
                                                            <i class="fa fa-edit"></i>
                                                        </span>
                    </a>
                @endcan
                @can($model.'.destroy')
                    <form class="d-inline" action="{{route($model.'.destroy', $product->id)}}" method="post">
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
        {{$products->appends(request()->all())->links()}}
    </div>
@endsection
