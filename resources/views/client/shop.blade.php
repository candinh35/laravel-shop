@extends('client.layout.main')
<?php
define('BASE_URL', "http://127.0.0.1:8000/");
?>
@section('content')
    <div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="{{route('Home')}}">home</a></li>
                            <li>/</li>
                            <li>shop</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="shop_area shop_reverse">
        <div class="container">
            <div class="shop_inner_area">
                <div class="row">
                    <div class="col-lg-3 col-md-12">
                        <!--sidebar widget start-->
                        <div class="sidebar_widget">
                                <div class="widget_list widget_filter">
                                    <h2>Filter by price</h2>
                                    <form action="#">
                                        <div id="slider-range"></div>
                                        <button type="submit">Filter</button>
                                        <input type="text" name="price" id="amount"/>

                                    </form>
                                </div>
                                <div class="widget_list widget_categories">
                                    <h2>Product categories</h2>
                                    <ul>
                                        @foreach($categories as $category)
                                            @if($category->products->count() == 0)
                                                <li><a class="hidden"
                                                       href="{{route('categoryName',$category->name)}}">{{$category->name}}
                                                        <span>{{$category->products->count()}}</span></a></li>
                                            @else
                                                <li><a href="{{route('categoryName',$category->name)}}">{{$category->name}}
                                                        <span>{{$category->products->count()}}</span></a></li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            <form action="">
                                <div class="widget_list widget_categories">
                                    <h2>Brand</h2>
                                    <ul>
                                        @foreach($brands as $brand)
                                            <div class="bc-item">
                                                <label for="bc-{{$brand->id}}">
                                                    {{$brand->name}}
                                                    <input type="checkbox"
                                                           {{(request('brand')[$brand->id] ?? '') == 'on' ? 'checked' : ''}}
                                                           id="bc-{{$brand->id}}"
                                                           name="brand[{{$brand->id}}]"
                                                           onchange="this.form.submit()">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                        @endforeach
                                    </ul>
                                </div>
                            </form>
                                <div class="widget_list widget_categories">
                                    <h2>Select By Color</h2>
                                    <ul>
                                        @foreach($colors as $color)
                                            @if($color->products->count() == 0)
                                                <li><a class="hidden" href="">{{$color->name}}</a></li>
                                            @else
                                                <li><a href="{{route('colorName',$color->id)}}">{{$color->name}}
                                                        <span>{{$color->products->count()}}</span></a></li>
                                            @endif
                                        @endforeach

                                    </ul>
                                </div>
                                <div class="widget_list tag-cloud">
                                    <h2>Sizes</h2>
                                    <div class="tag_widget">
                                        <ul>
                                            @foreach($sizes as $size)
                                                <li><a href="#">{{$size->name}}</a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                        </div>
                        <!--sidebar widget end-->
                    </div>
                    <div class="col-lg-9 col-md-12">
                        <!--shop wrapper start-->
                        <!--shop toolbar start-->
                        <div class="shop_title">
                            <h1>shop</h1>
                        </div>
                        <div class="shop_toolbar_wrapper">
                            <div class="shop_toolbar_btn">

                                <button data-role="grid_3" type="button" class="active btn-grid-3" data-toggle="tooltip"
                                        title="3"></button>

                                <button data-role="grid_4" type="button" class=" btn-grid-4" data-toggle="tooltip"
                                        title="4"></button>

                                <button data-role="grid_5" type="button" class="btn-grid-5" data-toggle="tooltip"
                                        title="5"></button>

                                <button data-role="grid_list" type="button" class="btn-list" data-toggle="tooltip"
                                        title="List"></button>
                            </div>
                            <div class=" niceselect_option">
                                <form action="" method="get">
                                    <select name="sort_by" class=" form-control" id="short"
                                            onchange="this.form.submit()">
                                        <option selected
                                                {{request('sort_by')=='latest' ? 'selected' : ''}} value="latest">
                                            Sorting: Latest
                                        </option>
                                        <option {{request('sort_by')=='oldest' ? 'selected' : ''}} value="oldest">
                                            Sorting: Oldest
                                        </option>
                                        <option
                                            {{request('sort_by')=='name-ascending' ? 'selected' : ''}}  value="name-ascending">
                                            Sorting: Name A - Z
                                        </option>
                                        <option
                                            {{request('sort_by')=='name-decrease' ? 'selected' : ''}} value="name-decrease">
                                            Sorting: Name Z - A
                                        </option>
                                        <option
                                            {{request('sort_by')=='price-ascending' ? 'selected' : ''}} value="price-ascending">
                                            Sorting: Price Ascending
                                        </option>
                                        <option
                                            {{request('sort_by')=='price-decrease' ? 'selected' : ''}} value="price-decrease">
                                            Sorting: Price Decrease
                                        </option>
                                    </select>
                                </form>
                            </div>
                        </div>
                        <!--shop toolbar end-->

                        <div class="row shop_wrapper">
                            @foreach($products as $product)
                                <div class="col-lg-4 col-md-4 col-12 ">
                                    <div class="single_product">
                                        <div class="product_thumb">
                                            <a class="primary_img" href="product-details.html"><img
                                                    src="{{ BASE_URL.$product->path_image}}" alt=""></a>
                                            @foreach($product->productImages as $proImage)
                                                <a class="secondary_img" href="{{route('product_detail', $product->id)}}"><img
                                                        src="{{ BASE_URL.$proImage->path_image}}" alt=""></a>
                                                @break(false)
                                            @endforeach
                                            <div class="quick_button">
                                                <a href="{{route('product_detail', $product->id)}}" title="quick_view">View products</a>

                                            </div>

                                            <div class="product_sale">
                                                @if($product->sale_price && number_format($product->sale_price / $product->price * 100) > 0)
                                                    <span>{{number_format($product->sale_price / $product->price * 100) }}%</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="product_content grid_content">
                                            <h3><a href="{{route('product_detail', $product->id)}}">{{$product->name}}</a></h3>
                                            @if($product->sale_price != null)
                                                <span class="current_price">{{number_format($product->price - $product->sale_price)}}Đ</span>
                                                <span class="old_price">{{number_format($product->price)}}Đ</span>
                                            @else
                                                <span class="current_price">{{number_format($product->price)}}Đ</span>
                                            @endif
                                        </div>


                                        <div class="product_content list_content">
                                            <h3><a href="product-details.html">{{$product->name}}</a></h3>
                                            <div class="product_ratting">
                                                <ul>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="product_price">
                                                @if($product->sale_price != null)
                                                    <span class="current_price">{{number_format($product->price - $product->sale_price)}}Đ</span>
                                                    <span class="old_price">{{number_format($product->price)}} Đ</span>
                                                @else
                                                    <span
                                                        class="current_price">{{number_format($product->price)}} Đ</span>
                                                @endif
                                            </div>
                                            <div class="product_desc">
                                                <p>{{$product->content}}</p>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            @endforeach
                        </div>
{{--                        {{$products->appends(request()->all())->links()}}--}}
                        <!--shop toolbar end-->
                        <!--shop wrapper end-->
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
@section('footer')
    <script>
        $(document).ready(function () {
            $('.sort_by').click(function () {
                console.log('a')
                $('.select_option').submit();
            });
        });
    </script>
@endsection
