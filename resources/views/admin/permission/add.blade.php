@extends('admin.layout.main')

@section('content')
    <form action="{{route($model.'.store')}}" method="post" enctype="multipart/form-data" class="mt-4">
        @csrf
        <div class="position-relative row form-group">
            <label for="name" class="col-md-3 text-md-right col-form-label">Name</label>
            <div class="col-md-9 col-xl-8">
                    <div class="form-group">
                        <label>Phân Quyền Cha</label>
                        <select name="name" data-url="{{route('permission.create')}}"
                                class="form-control module_parent">
                            <option value="">Chọn Tên Module</option>
                            @foreach(config('permissions.table_module') as $module)
                                <option value="{{$module}}">{{$module}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <div class="row permission">

                        </div>
                        <div class="position-relative row form-group mb-1 mt-3">
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
        </div>


        </div>
    </form>

@endsection
@section('footer')
    <script>
        $(document).ready(function (){
            $('.module_parent').change(function (){
                let value = $(this).val();
                $.ajax({
                    type:'GET',
                    url:'http://127.0.0.1:8000/api/callPermission/' + value,
                    success: function (res) {
                        console.log(res)
                        let _html = '';

                        for (let pro of res) {
                            _html += ' <div class="col-lg-3">';
                            _html += ' <lable>';
                            _html += '<input class="mr-2" type="checkbox" value="' + pro + '" name="module_child[]">';
                            _html += pro;
                            _html += '</lable>';
                            _html += ' </div>';
                        }
                        $('.permission').html(_html)
                    }
                })
            })
        })
    </script>
@endsection
