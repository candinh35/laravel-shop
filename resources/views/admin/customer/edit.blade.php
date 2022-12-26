@extends('admin.layout.main')
@section('header')
    <link href="{{asset('vendors/select2/select2.min.css')}}" rel="stylesheet"/>
    <link rel="stylesheet" href="{{asset('template/admin/customer/add/add.css')}}">
@endsection
@section('content')
    <form action="{{route($model.'.update', $customer->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="position-relative row form-group">
            <label for="image" class="col-md-3 text-md-right col-form-label">Avatar</label>
            <div class="col-md-9 col-xl-8">
                @if($customer->path_image != null)
                    <img style="height: 200px; cursor: pointer;" class="thumbnail rounded-circle" data-toggle="tooltip"
                         title="" data-placement="bottom" src="{{asset($customer->path_image)}}"
                         alt="Avatar" data-original-title="Click to change the image">
                @else
                    <img style="height: 200px; cursor: pointer;" class="thumbnail rounded-circle" data-toggle="tooltip"
                         title="" data-placement="bottom"
                         src="{{asset('template/admin/css/assets/images/add-image-icon.jpg')}}"
                         alt="Avatar" data-original-title="Click to change the image">
                @endif
                <input name="path_image" type="file" onchange="changeImg(this)" class="image form-control-file"
                       style="display: none;" value="">
                <small class="form-text text-muted">
                    Click on the image to change (required)
                </small>
            </div>
        </div>

        <div class="position-relative row form-group">
            <label for="name" class="col-md-3 text-md-right col-form-label">Name</label>
            <div class="col-md-9 col-xl-8">
                <input required="" name="name" id="name" placeholder="Name" type="text" class="form-control"
                       value="{{$customer->name}}">
            </div>
        </div>

        <div class="position-relative row form-group">
            <label for="email" class="col-md-3 text-md-right col-form-label">Email</label>
            <div class="col-md-9 col-xl-8">
                <input required="" name="email" id="email" placeholder="Email" type="email" class="form-control"
                       value="{{$customer->email}}">
            </div>
        </div>


        <div class="position-relative row form-group">
            <label for="phone" class="col-md-3 text-md-right col-form-label">Phone</label>
            <div class="col-md-9 col-xl-8">
                <input required="" name="phone" id="phone" placeholder="Phone" type="tel" class="form-control"
                       value="{{$customer->phone}}">
            </div>
        </div>

        <div class="position-relative row form-group">
            <label for="address" class="col-md-3 text-md-right col-form-label">Address</label>
            <div class="col-md-9 col-xl-8">
                <input required="" name="address" id="address" placeholder="address" type="text" class="form-control"
                       value="{{$customer->address}}">
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
@section('footer')
    <script src="{{asset('vendors/select2/select2.min.js')}}"></script>
    <script src="{{asset('template/admin/customer/add/add.js')}}"></script>
@endsection
