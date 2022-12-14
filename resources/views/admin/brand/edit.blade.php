@extends('admin.layout.main')

@section('content')
    <form action="{{route($model.'.update', $brand->id)}}" method="post" enctype="multipart/form-data" class="mt-4">
        @csrf
        @method('put')
        <div class="position-relative row form-group">
            <label for="name" class="col-md-3 text-md-right col-form-label">Image</label>
            <div class="col-md-9 col-xl-8">
                <input required="" name="name" id="name" placeholder="Name" type="text" class="form-control" value="{{$brand->name}}">
            </div>
        </div>
        <div class="position-relative row form-group">
            <label for="image" class="col-md-3 text-md-right col-form-label">Avatar</label>
            <div class="col-md-9 col-xl-8">
                    <img style="height: 150px; width: 200px; cursor: pointer;" class="thumbnail rounded-circle" data-toggle="tooltip"
                         title="" data-placement="bottom" src="{{asset($brand->path_image)}}"
                         alt="Avatar" data-original-title="Click to change the image">

                <input name="path_image" type="file" onchange="changeImg(this)" class="image form-control-file"
                       style="display: none;" value="">
                <small class="form-text text-muted">
                    Click on the image to change (required)
                </small>
            </div>
        </div>
        <div class="position-relative row form-group">
            <label for="display" class="col-md-3 text-md-right col-form-label">Hiện</label>
            <input required="" name="status" id="display" placeholder="Name" type="radio" value="1" {{$background->status == 1 ? 'checked' : ''}}>
            <label for="hidden" class="mx-3 col-form-label">Ẩn</label>
            <input required="" name="status" id="hidden" placeholder="Name" type="radio" value="0" {{$background->status == 0 ? 'checked' : ''}}>
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
