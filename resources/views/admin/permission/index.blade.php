@extends('admin.layout.main')

@section('content')
    <table class="align-middle mb-0 table table-borderless table-striped table-hover">
        <thead>
        <tr>
            <th class="text-center">ID</th>
            <th class="text-center">Name</th>
            <th class="text-center">Display Name</th>
            <th class="text-center">Action</th>
        </tr>
        </thead>
        <tbody>@foreach($permissions as $permission)
        @foreach($permission->getPermissionChild as $permissionChild)
            <tr>
                <td class="text-center text-muted">{{$permissionChild->id}}</td>
                <td class="text-center">{{$permissionChild->name}}</td>
                <td class="text-center">{{$permissionChild->parent_id}}</td>
                <td class="text-center">{{$permissionChild->key_code}}</td>
{{--                <td class="text-center">--}}

{{--                    <a href="{{route($model.'.edit', $permissionChild->id)}}" data-toggle="tooltip" title="Edit"--}}
{{--                       data-placement="bottom" class="btn btn-outline-warning border-0 btn-sm">--}}
{{--                                                        <span class="btn-icon-wrapper opacity-8">--}}
{{--                                                            <i class="fa fa-edit"></i>--}}
{{--                                                        </span>--}}
{{--                    </a>--}}
{{--                    <form class="d-inline" action="{{route($model.'.destroy', $permissionChild->id)}}" method="post">--}}
{{--                        @method('delete')--}}
{{--                        @csrf--}}
{{--                        <button class="btn btn-hover-shine btn-outline-danger border-0 btn-sm"--}}
{{--                                type="submit" data-toggle="tooltip" title="Delete"--}}
{{--                                data-placement="bottom"--}}
{{--                                onclick="return confirm('Do you really want to delete this item?')">--}}
{{--                                                            <span class="btn-icon-wrapper opacity-8">--}}
{{--                                                                <i class="fa fa-trash fa-w-20"></i>--}}
{{--                                                            </span>--}}
{{--                        </button>--}}
{{--                    </form>--}}
{{--                </td>--}}
            </tr>

        @endforeach
        @endforeach
        </tbody>
    </table>
<div class="my-3">
    {{$permissions->appends(request()->all())->links()}}
</div>

@endsection
