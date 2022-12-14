@extends('admin.layout.main')

@section('content')
    <form action="{{route($model.'.update', $role->id)}}" method="post" enctype="multipart/form-data" class="mt-4">
        @csrf
        @method('put')
        <div class="position-relative row form-group">
            <label for="name" class="col-md-3 text-md-right col-form-label">Name</label>
            <div class="col-md-9 col-xl-8">
                <input required="" name="name" id="name" placeholder="Name" type="text" class="form-control" value="{{$role->name}}">
            </div>
        </div>
        <div class="position-relative row form-group">
            <label for="display_name" class="col-md-3 text-md-right col-form-label">Display Name</label>
            <div class="col-md-9 col-xl-8">
                <input name="display_name" id="display_name" placeholder="display name" type="text" class="form-control"
                       value="{{$role->display_name}}">
            </div>
        </div>

        <div class="position-relative row form-group">
            <label for="name" class="col-md-3 text-md-right col-form-label">Permission</label>
            <div class="col-md-9 col-xl-8">
                <div class="row">
                    <div class="col-lg-12">
                        <label>
                            <input type="checkbox" class="checkall">
                            CheckAll
                        </label>
                    </div>
                </div>
                @foreach($permissions as $permission)
                    <div class="card border-primary mb-3">
                        <div class="card-header bg-happy-green">
                            <label>
                                <input type="checkbox" name="" class="checkbox_wrapper">
                                {{$permission->name}}
                            </label>
                        </div>
                        <div class="card-body text-primary d-flex justify-content-around">
                            @foreach($permission->getPermissionChild as $permissionChild)
                                <label>
                                    <input
                                        {{$role->permissions->contains('id',$permissionChild->id) ? 'checked' : ''}}
                                        type="checkbox"
                                        name="permission_id[]"
                                        class="checkbox_child"
                                        value="{{$permissionChild->id}}">
                                    {{$permissionChild->name}}
                                </label>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="position-relative row form-group mb-1">
            <div class="col-md-9 col-xl-8 offset-md-2">
                <a href="{{route($model.'.index')}}" class="border-0 btn btn-outline-danger mr-1">
                                                    <span class="btn-icon-wrapper pr-1 opacity-8">
                                                        <i class="fa fa-times fa-w-20"></i>
                                                    </span>
                    <span>Cancel</span>
                </a>

                <button type="submit" class="btn-shadow btn-hover-shine btn btn-primary">
                                                    <span class="btn-icon-wrapper pr-2 opacity-8">
                                                        <i class="fa fa-download fa-w-20"></i>
                                                    </span>
                    <span>Save</span>
                </button>
            </div>
        </div>
    </form>

@endsection
@section('footer')
    <script>
        $('.checkbox_wrapper').on('click', function () {
            $(this).parents('.card').find('.checkbox_child').prop('checked', $(this).prop('checked'));
        })
        $('.checkall').on('click', function () {
            $(this).parents('.position-relative').find('.checkbox_child').prop('checked', $(this).prop('checked'));
            $(this).parents('.position-relative').find('.checkbox_wrapper').prop('checked', $(this).prop('checked'));
        })
    </script>
@endsection
