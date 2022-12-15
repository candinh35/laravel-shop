@extends('admin.layout.main')

@section('content')
    <form action="{{route($model.'.update', $order->id)}}" method="post" enctype="multipart/form-data" class="mt-4">
        @csrf
        @method('put')
        <input type="hidden" name="payment_name" value="{{$order->payment_name}}}">
        <div class="position-relative row form-group">
            <label for="name" class="col-md-3 text-md-right col-form-label">Name</label>
            <div class="col-md-9 col-xl-8">
                <input required="" name="name" id="name" placeholder="Name" type="text" class="form-control" value="{{$order->name}}">
            </div>
        </div>
        <div class="position-relative row form-group">
            <label for="email" class="col-md-3 text-md-right col-form-label">Email</label>
            <div class="col-md-9 col-xl-8">
                <input required="" name="email" id="email" placeholder="email" type="text" class="form-control" value="{{$order->email}}">
            </div>
        </div>
        <div class="position-relative row form-group">
            <label for="phone" class="col-md-3 text-md-right col-form-label">Phone</label>
            <div class="col-md-9 col-xl-8">
                <input required="" name="phone" id="phone" placeholder="phone" type="text" class="form-control" value="{{$order->phone}}">
            </div>
        </div>
        <div class="position-relative row form-group">
            <label for="address" class="col-md-3 text-md-right col-form-label">Address</label>
            <div class="col-md-9 col-xl-8">
                <input required="" name="address" id="address" placeholder="address" type="text" class="form-control" value="{{$order->address}}">
            </div>
        </div>
        <div class="position-relative row form-group">
            <label for="status" class="col-md-3 text-md-right col-form-label">Status</label>
            <div class="col-md-9 col-xl-8">
                <select name="status"  class="form-control">
                    <option {{$order->status == 1 ? 'selected' : ''}} value="1">wait for confirmation</option>
                    <option {{$order->status == 2 ? 'selected' : ''}} value="2">Delivering</option>
                    <option {{$order->status == 3 ? 'selected' : ''}} value="3">Complete</option>
                    <option {{$order->status == 4 ? 'selected' : ''}} value="4">Cancelled Order</option>
                </select>
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
