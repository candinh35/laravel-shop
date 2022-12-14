@extends('admin.layout.main')
@section('header')
    <script src="{{asset('ckeditor/ckeditor.js')}}"></script>
@endsection
@section('content')
    <form action="{{route($model.'.store')}}" method="post" enctype="multipart/form-data" class="mt-4">
        @csrf
        <input type="hidden" name="user_id" value="{{Auth::id()}}">
        <div class="position-relative row form-group">
            <label for="title" class="col-md-3 text-md-right col-form-label">Title</label>
            <div class="col-md-9 col-xl-8">
                <input required="" name="title" id="title" placeholder="title" type="text" class="form-control" value="{{old('title')}}">
            </div>
        </div>
        <div class="position-relative row form-group">
            <label for="image" class="col-md-3 text-md-right col-form-label">Image</label>
            <div class="col-md-9 col-xl-8">
                <img style="height: 200px; cursor: pointer;" class="thumbnail" data-toggle="tooltip"
                     title="" data-placement="bottom" src="{{asset('template/admin/css/assets/images/add-image-icon.jpg')}}"
                     alt="Avatar" data-original-title="Click to change the image">
                <input name="path_image" type="file" onchange="changeImg(this)" class="image form-control-file"
                       style="display: none;" value="">
                <small class="form-text text-muted">
                    Click on the image to change (required)
                </small>
            </div>
        </div>
        <div class="position-relative row form-group">
            <label for="content" class="col-md-3 text-md-right col-form-label">Content</label>
            <div class="col-md-9 col-xl-8">
               <textarea name="content" id="content">{{old('content')}}</textarea>
            </div>
        </div>
        <div class="position-relative row form-group">
            <label for="display" class="col-md-3 text-md-right col-form-label">Hiện</label>
            <input required="" name="status" id="display" placeholder="Name" type="radio" value="1" checked>
            <label for="hidden" class="mx-3 col-form-label">Ẩn</label>
            <input required="" name="status" id="hidden" placeholder="Name" type="radio" value="0">
        </div>
        <div class="position-relative row form-group mb-1">
            <div class="col-md-9 col-xl-8 offset-md-2">
                <a href="{{route($model.'.index')}}" class="border-0 btn btn-outline-danger mr-1">
                                                    <span class="btn-icon-wrapper pr-1 opacity-8">
                                                        <i class="fa fa-times fa-w-20"></i>
                                                    </span>
                    <span>Cancel</span>
                </a>

                @can($model.'.store')
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

@section('footer')
<script>
    CKEDITOR.replace( 'content' );
</script>
@endsection
