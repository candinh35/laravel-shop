@extends('admin.layout.main')

@section('content')
    <form action="{{route($model.'.update', $menu->id)}}" method="post" enctype="multipart/form-data" class="mt-4">
        @csrf
        @method('put')
        <div class="position-relative row form-group">
            <label for="name" class="col-md-3 text-md-right col-form-label">Name</label>
            <div class="col-md-9 col-xl-8">
                <input required="" name="name" id="name" placeholder="Name" type="text" class="form-control" value="{{$menu->name}}">
            </div>
        </div>
        <div class="position-relative row form-group">
            <label for="parent_id" class="col-md-3 text-md-right col-form-label">Danh Mục Cha</label>
            <div class="col-md-9 col-xl-8">
                <select class="form-control" id="parent_id" name="parent_id">
                    <option value="0">Danh Mục Cha</option>
                    {!! $menus !!}
                </select>
            </div>
        </div>
        <div class="position-relative row form-group">
            <label for="display" class="col-md-3 text-md-right col-form-label">Hiện</label>
            <input required="" name="status" id="display" placeholder="Name" type="radio" value="1" {{$menu->status == 1 ? 'checked' : ''}}>
            <label for="hidden" class="mx-3 col-form-label">Ẩn</label>
            <input required="" name="status" id="hidden" placeholder="Name" type="radio" value="0" {{$menu->status == 0 ? 'checked' : ''}}>
        </div>
        <div class="position-relative row form-group mb-1">
            <div class="col-md-9 col-xl-8 offset-md-2">
                <a href="{{route($model.'.index')}}" class="border-0 btn btn-outline-danger mr-1">
                                                    <span class="btn-icon-wrapper pr-1 opacity-8">
                                                        <i class="fa fa-times fa-w-20"></i>
                                                    </span>
                    <span>Cancel</span>
                </a>

                @can($model.'.update')
                    <button type="submit" class="btn-shadow btn-hover-shine btn btn-primary">
                                                    <span class="btn-icon-wrapper pr-2 opacity-8">
                                                        <i class="fa fa-download fa-w-20"></i>
                                                    </span>
                        <span>Save</span>
                    </button>
                @endcan
            </div>
        </div>
    </form>

@endsection
