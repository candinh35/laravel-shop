@extends('admin.layout.main')

@section('content')
    <table class="align-middle mb-0 table table-borderless table-striped table-hover text-center">
        <thead>
        <tr>
            <th class="text-center">ID</th>
            <th class="text-center">Name</th>
            <th class="text-center">Detail Image</th>
            <th class="text-center">Sale Price</th>
            <th class="text-center">Amount</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td class="text-center text-muted">{{$product->id}}</td>
                <td class="text-center">{{$product->name}}</td>
                <td class="d-flex justify-content-around mr-2">
                @foreach($product->productImages as $image)
                <img src="{{asset($image->path_image) }}" width="100" alt="">
                @endforeach
                </td>
                <td class="text-center">{{number_format($product->sale_price) }}</td>
                <td class="text-center">{{$product->amount}}</td>
            </tr>
        </tbody>
    </table>
    <table class="align-middle mb-0 table table-borderless table-striped table-hover">
        <thead>
        <tr>
            <th class="text-center">Colors</th>
            <th class="text-center">Sizes</th>
            <th class="text-center">Content</th>
            <th class="text-center">Description</th>
            <th class="text-center">Actions</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="text-center w-25">
            @foreach($product->productColors as $color)
               {{$color->name}}
            @endforeach
            </td>
            <td class="text-center w-25">
                @foreach($product->productSizes as $size)
                    {{$size->name}}
                @endforeach
            </td>
            <td class="text-center"><div class="description1">{{$product->content}}</div></td>
            <td class="text-center"><div class="description1">{!! $product->description !!}</div> </td>
            <td class="text-center w-25">
                <a href="{{route($model.'.index')}}"
                   class="btn btn-hover-shine btn-outline-primary border-0 btn-sm">
                    Back
                </a>
                <a href="{{route($model.'.edit', $product->id)}}" data-toggle="tooltip" title="Edit"
                   data-placement="bottom" class="btn btn-outline-warning border-0 btn-sm">
                                                        <span class="btn-icon-wrapper opacity-8">
                                                            <i class="fa fa-edit"></i>
                                                        </span>
                </a>
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
            </td>
        </tr>
        </tbody>
    </table>
@endsection
