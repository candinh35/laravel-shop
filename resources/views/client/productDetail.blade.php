@extends('client.layout.main')
<?php
define('BASE_URL', "http://127.0.0.1:8000/");
?>
@section('content')
    <div class="breadcrumbs_area product_bread">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="index.html">home</a></li>
                            <li>/</li>
                            <li>product details</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--product details start-->
    <div class="product_details">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-5">
                    <div class="product-details-tab">

                        <div id="img-1" class="zoomWrapper single-zoom">
                            <a href="#">
                                <img id="zoom1" src="{{BASE_URL.$product->path_image}}"
                                     data-zoom-image="{{BASE_URL.$product->path_image}}" alt="big-1">
                            </a>
                        </div>

                        <div class="single-zoom-thumb">
                            <ul class="s-tab-zoom owl-carousel single-product-active" id="gallery_01">
                                <li>
                                    <a href="#" class="elevatezoom-gallery active" data-update=""
                                       data-image="{{BASE_URL.$product->path_image}}"
                                       data-zoom-image="{{BASE_URL.$product->path_image}}">
                                        <img src="{{BASE_URL.$product->path_image}}" alt="zo-th-1"/>
                                    </a>

                                </li>
                                @foreach($product->productImages as $image)
                                    <li>
                                        <a href="#" class="elevatezoom-gallery active" data-update=""
                                           data-image="{{BASE_URL.$image->path_image}}"
                                           data-zoom-image="{{BASE_URL.$image->path_image}}">
                                            <img src="{{BASE_URL.$image->path_image}}" alt="zo-th-1"/>
                                        </a>

                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-md-7">
                    <div class="product_d_right">
                        <form action="{{route('product_cart_add')}}" method="post">
                            @csrf
                            <input type="hidden" name="product_id" value="{{$product->id}}">
                            <h1>{{$product->name}}</h1>
                            <div class=" product_ratting">
                                <ul>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li class="review"><a href="#"> 1 review </a></li>
                                    <li class="review"><a href="#"> Write a review </a></li>
                                </ul>
                            </div>
                            <div class="product_price">
                                @if($product->sale_price != null)
                                    <span class="current_price">{{number_format($product->price - $product->sale_price)}}Đ</span>
                                    <span class="old_price">{{number_format($product->price)}}Đ</span>
                                @else
                                    <span class="current_price">{{number_format($product->price)}}Đ</span>
                                @endif
                            </div>
                            <div class="product_desc">
                                <p>{{$product->content}}</p>
                            </div>

                            <div class="product_variant color">
                                <h3>color</h3>
                                <select class="niceselect_option form-control" id="color" name="color">
                                    @foreach($product->productColors  as $color)
                                        <option value="{{$color->id}}">{{$color->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="product_variant size">
                                <h3>size</h3>
                                <select class="niceselect_option form-control" id="color1" name="size">
                                    @foreach($product->productSizes  as $size)
                                        <option value="{{$size->id}}">{{$size->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="product_variant quantity">
                                <label>quantity</label>
                                <input min="1" max="100" value="1" type="number" name="quantity">
                                <button class="button" type="submit">add to cart</button>
                            </div>
                        </form>
                        <div class="priduct_social">
                            <h3>Share on:</h3>
                            <ul>
                                <li><a href="#"><i class="fa fa-rss"></i></a></li>
                                <li><a href="#"><i class="fa fa-vimeo"></i></a></li>
                                <li><a href="#"><i class="fa fa-tumblr"></i></a></li>
                                <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--product details end-->

    <!--product info start-->
    <div class="product_d_info">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="product_d_inner">
                        <div class="product_info_button">
                            <ul class="nav" role="tablist">
                                <li>
                                    <a class="active" data-toggle="tab" href="#info" role="tab" aria-controls="info"
                                       aria-selected="false">More info</a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#sheet" role="tab" aria-controls="sheet"
                                       aria-selected="false">Data sheet</a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews"
                                       aria-selected="false">Reviews</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="info" role="tabpanel">
                                <div class="product_info_content">
                                    <p>{!!  $product->description!!}</p>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="sheet" role="tabpanel">
                                <div class="product_d_table">
                                    <form action="#">
                                        <table>
                                            <tbody>
                                            <tr>
                                                <td class="first_child">Category</td>
                                                <td>{{$product->categories->name}} </td>
                                            </tr>
                                            <tr>
                                                <td class="first_child">Brand</td>
                                                <td>{{$product->brands->name}} </td>
                                            </tr>
                                            <tr>
                                                <td class="first_child">Color</td>
                                                <td>
                                                    @foreach($product->productColors as $colorItem)
                                                        {{$colorItem->name}} ,
                                                    @endforeach
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="first_child">Size</td>
                                                <td>
                                                    @foreach($product->productSIzes as $sizeItem)
                                                        {{$sizeItem->name}} ,
                                                    @endforeach
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="first_child">Properties</td>
                                                <td>Short Dress</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </form>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="reviews" role="tabpanel">
                                <div class="product_info_inner">

                                </div>
                                <div class="product_review_form">
                                    <form action="">
                                        @csrf
                                        <input type="hidden" id="product_id" value="{{$product->id}}">
                                        <input type="hidden" id="user_id" value="{{Auth::id()}}">
                                        <h2>Add a review </h2>
                                        <p>Your email address will not be published. Required fields are marked </p>
                                        <div class="row">
                                            <div class="col-12">
                                                <label for="review_comment">Your review </label>
                                                <textarea name="message" id="message"></textarea>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <label for="author">Name</label>
                                                <input id="name" name="name" type="text">

                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <label for="email">Email </label>
                                                <input id="email" name="email" type="text">
                                            </div>
                                        </div>
{{--                                        <div class="personal-rating">--}}
{{--                                            <h6>Your Rating</h6>--}}
{{--                                            <div class="rate">--}}
{{--                                                <input type="radio" id="star5" class="rating"--}}
{{--                                                       value="5"/>--}}
{{--                                                <label for="star5" title="text">5 stars</label>--}}
{{--                                                <input type="radio" id="star4" class="rating"--}}
{{--                                                       value="4"/>--}}
{{--                                                <label for="star4" title="text">4 stars</label>--}}
{{--                                                <input type="radio" id="star3" class="rating"--}}
{{--                                                       value="3"/>--}}
{{--                                                <label for="star3" title="text">3 stars</label>--}}
{{--                                                <input type="radio" id="star2" class="rating"--}}
{{--                                                       value="2"/>--}}
{{--                                                <label for="star2" title="text">2 stars</label>--}}
{{--                                                <input type="radio" id="star1" class="rating"--}}
{{--                                                       value="1"/>--}}
{{--                                                <label for="star1" title="text" class="rating">1 star</label>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
                                        <button type="submit" id="btn-comment">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--product info end-->

    <!--product section area start-->
    <section class="product_section relatedd_product">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section_title">
                        <h2>relatedd Products</h2>
                        <p>Contemporary, minimal and modern designs embody the Lavish Alice handwriting</p>
                    </div>
                </div>
            </div>
            <div class="product_area">
                <div class="row">
                    <div class="product_carousel product_three_column4 owl-carousel">
                        @foreach($relatedProducts as $relatedProduct)
                            <div class="col-lg-3">
                                <div class="single_product">
                                    <div class="product_thumb">
                                        <a class="primary_img"
                                           href="{{route('product_detail', $relatedProduct->id)}}"><img
                                                src="{{BASE_URL.($relatedProduct->path_image)}}" alt=""></a>
                                        @foreach($relatedProduct->productImages as $relatedImage)
                                            <a class="secondary_img"
                                               href="{{route('product_detail', $relatedProduct->id)}}"><img
                                                    src="{{BASE_URL.($relatedImage->path_image)}}" alt=""></a>
                                        @endforeach

                                        <div class="product_action">
                                            <div class="hover_action">
                                                <a href="#"><i class="fa fa-plus"></i></a>
                                                <div class="action_button">
                                                    <ul>

                                                        <li><a title="add to cart"
                                                               href="{{route('product_cart',  $relatedProduct->id)}}"><i
                                                                    class="fa fa-shopping-basket"
                                                                    aria-hidden="true"></i></a></li>
                                                        <li><a href="wishlist.html" title="Add to Wishlist"><i
                                                                    class="fa fa-heart-o" aria-hidden="true"></i></a>
                                                        </li>

                                                        <li><a href="compare.html" title="Add to Compare"><i
                                                                    class="fa fa-sliders" aria-hidden="true"></i></a>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="quick_button">
                                            <a href="#" data-toggle="modal" data-target="#modal_box" title="quick_view">+
                                                quick view</a>
                                        </div>

                                        <div class="product_sale">
                                            @if($relatedProduct->sale_price != null && number_format($relatedProduct->sale_price / $relatedProduct->price * 100) > 0)
                                                <span>{{number_format($relatedProduct->sale_price / $relatedProduct->price * 100) }}%</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="product_content">
                                        <h3>
                                            <a href="{{route('product_detail', $relatedProduct->id)}}">{{$relatedProduct->name}}</a>
                                        </h3>
                                        @if($relatedProduct->sale_price != null)
                                            <span class="current_price">{{number_format($relatedProduct->price - $relatedProduct->sale_price)}}Đ</span>
                                            <span class="old_price">{{number_format($relatedProduct->price)}}Đ</span>
                                        @else
                                            <span
                                                class="current_price">{{number_format($relatedProduct->price)}}Đ</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!--product section area end-->

@endsection
@section('footer')
    <script>
        $(document).ready(function () {
            $('.sort_by').click(function () {
                $('.select_option').submit();
            });

            //    get Api
            load_data();

            function load_data() {
                let id = {{$product->id}};
                $.get('http://127.0.0.1:8000/api/product/comment/' + id, function (res) {
                    let comments = res.data;
                    console.log(res)
                    let _li = '';
                    comments.forEach(function (item) {

                        _li += '<div class="co-item">'

                        _li += '<div class="avatar-pic">'

                        _li += '<img src="{{asset('template/client/assets/img/user/_default-user.png')}}" alt="">'

                        _li += '</div>'
                        _li += '<div class="avatar-text">'
                        _li += '<div class="at-rating">'
                        for (let i = 0; i < 5; i++) {
                            if (i < item.rating) {
                                _li += '<i class="fa fa-star"></i>'
                            } else {
                                _li += '<i class="fa fa-star-o"></i>'
                            }
                        }
                        _li += '</div>'
                        _li += '<h5>' + item.name + ''
                        _li += ' <span>' + item.created_at + '</span>'
                        _li += '</h5>'
                        _li += '<div class="at-reply">' + item.message + '</div>'
                        _li += ' </div>'
                        _li += '</div>'

                        $('.product_info_inner').html(_li);
                    })
                })
            }


            $('#btn-comment').click(function (e) {
                e.preventDefault();
                let email = $('#email').val();
                let name = $('#name').val();
                let message = $('#message').val();
                let productId = $('#product_id').val();
                let userId = $('#user_id').val();
                let rating = $('.rate').val();
                console.log(rating)
                $.ajax({
                    url: 'http://127.0.0.1:8000/product/addComment',
                    type: 'POST',
                    data: {
                        _token: "{{ csrf_token() }}",
                        productId: productId,
                        userId: userId,
                        email: email,
                        name: name,
                        message: message
                    },
                    success: function (res) {
                        load_data();
                        email.val(null);
                        name.val(null);
                        message.val(null)
                    }
                })
            });
        });
    </script>
@endsection
