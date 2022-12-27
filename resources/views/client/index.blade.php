@extends('client.layout.main')

@section('content')
    <div class="slider_area slider_style home_three_slider owl-carousel">
        @foreach($banners as $banner)
        <div class="single_slider" data-bgimg="{{asset($banner->path_image)}}">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="slider_content content_one">
                            <a href="">{{$banner->name}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <!--slider area end-->

    <!--banner area start-->
    <div class="banner_section banner_section_three">
        <div class="container-fluid">
            <div class="row ">
                @foreach($backgrounds as $background)
                <div class="col-lg-4 col-md-6">
                    <div class="banner_area">
                        <div class="banner_thumb">
                            <a href="shop.html"><img src="{{asset($background->path_image)}}" alt="#"></a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!--banner area end-->

    <!--product section area start-->
    <section class="product_section womens_product">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section_title">
                        <h2>Our products</h2>
                        <p>Latest, modern design products</p>
                    </div>
                </div>
            </div>
            <div class="product_area">
                <div class="row">
                    <div class="col-12">
                        <div class="product_tab_button">
                            <ul class="nav" role="tablist">
                                <li>
                                    <a class="active item" data-toggle="tab" data-tag="first" data-owl-filter="*"   role="tab" aria-controls="clothing" aria-selected="true">All</a>
                                </li>
                                @foreach($categories as $category)
                                <li>
                                    <a  style="cursor: pointer" data-toggle="tab" data-tag="first" data-owl-filter=".{{$category->name}}" class="category_id item" role="tab" data-postion="{{$category->id}}" aria-controls="clothing" aria-selected="true">{{$category->name}}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="clothing" role="tabpanel">
                        <div class="product_container">
                            <div class="row product_column4 first">
                                @foreach($products as $product)
                                <div class="col-lg-3 itemProduct {{$product->categories->name}}">
                                    <div class="single_product">
                                        <div class="product_thumb">
                                            <a class="primary_img" href="{{route('product_detail', $product->id)}}"><img src="{{$product->path_image}}" alt=""></a>
                                            @foreach($product->productImages as $proImage)
                                            <a class="secondary_img" href="{{route('product_detail', $product->id)}}"><img src="{{$proImage->path_image}}" alt=""></a>
                                                @break(false)
                                            @endforeach
                                            <div class="quick_button">
                                                <a href="{{route('product_detail', $product->id)}}" title="quick_view">View products</a>

                                            </div>

                                            <div class="product_sale">
                                                @if($product->sale_price != null && number_format($product->sale_price / $product->price * 100) > 0)
                                                <span>{{number_format($product->sale_price / $product->price * 100) }}%</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="product_content">
                                            <h3><a href="{{route('product_detail', $product->id)}}">{{$product->name}}</a></h3>
                                            @if($product->sale_price != null)
                                            <span class="current_price">{{number_format($product->price - $product->sale_price)}}Đ</span>
                                            <span class="old_price">{{number_format($product->price)}}Đ</span>
                                            @else
                                                <span class="current_price">{{number_format($product->price)}}Đ</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!--product section area end-->

    <!--banner area start-->
    <section class="banner_section banner_section_three">
        <div class="container-fluid">
            <div class="row ">
                @foreach($backgroundLate as $late)
                <div class="col-lg-6 col-md-6">
                    <div class="banner_area">
                        <div class="banner_thumb">
                            <a href=""><img src="{{asset($late['path_image'])}}" alt="#"></a>
                            <div class="banner_content">
                                <h1>{{$late['name']}}</h1>
                                <a href="">Discover Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--banner area end-->

    <!--product section area start-->
    <section class="product_section womens_product bottom">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section_title">
                        <h2>Popular products</h2>
                        <p>Impressive and best-selling products</p>
                    </div>
                </div>
            </div>
            <div class="product_area">
                <div class="row">
                    <div class="product_carousel product_three_column4 owl-carousel">
                        @foreach($bestSales as $bestSale)
                            <div class="col-lg-3 itemProduct">
                                <div class="single_product">
                                    <div class="product_thumb">
                                        <a class="primary_img" href="{{route('product_detail', $bestSale->id)}}"><img src="{{$bestSale->path_image}}" alt=""></a>
                                        @foreach($bestSale->productImages as $proImage)
                                            <a class="secondary_img" href="{{route('product_detail', $bestSale->id)}}"><img src="{{$proImage->path_image}}" alt=""></a>
                                            @break(false)
                                        @endforeach
                                        <div class="quick_button">
                                            <a href="{{route('product_detail', $bestSale->id)}}" title="quick_view">View products</a>

                                        </div>

                                        <div class="product_sale">
                                            @if($bestSale->sale_price != null && number_format($bestSale->sale_price / $bestSale->price * 100) > 0)
                                                <span>{{number_format($bestSale->sale_price / $bestSale->price * 100) }}%</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="product_content">
                                        <h3><a href="{{route('product_detail', $bestSale->id)}}">{{$bestSale->name}}</a></h3>
                                        @if($bestSale->sale_price != null)
                                          <span class="current_price">{{number_format($bestSale->price - $bestSale->sale_price)}}Đ</span>
                                            <span class="old_price">{{number_format($bestSale->price)}}Đ</span>
                                        @else
                                            <span class="current_price">{{number_format($bestSale->price)}}Đ</span>
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

    <!--blog section area start-->
    <section class="blog_section blog_section_three">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section_title">
                        <h2>New Post</h2>
                        <p>Update Fashion Trends</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="blog_wrapper blog_column3 owl-carousel">
                    @foreach($blogs as $blog)
                    <div class="col-lg-4">
                        <div class="single_blog">
                            <div class="blog_thumb">
                                <a href=""><img src="{{asset($blog->path_image)}}" alt=""></a>
                                <div class="blog_icon">
                                    <a href=""></a>
                                </div>
                            </div>
                            <div class="blog_content">
                                <h3><a href="blog-details.html">{{$blog->title}}</a></h3>
                                <div class="author_name">
                                    <p>
                                        <span class="post_by">by</span>
                                        <span class="themes">Căn Đinh</span> / {{ date('M d ,Y ', strtotime($blog->created_at)) }}
                                    </p>

                                </div>
                                <div class="post_desc">
                                    <p class="content-blog">{!! $blog->content !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!--blog section area end-->
@endsection
@section('footer')
    <script src="{{asset('template/client/assets/js/jsApi.js')}}"></script>
    <script src="https://huynhhuynh.github.io/owlcarousel2-filter/dist/owlcarousel2-filter.min.js"></script>
@endsection
