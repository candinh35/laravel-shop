@extends('client.layout.main')

@section('content')
    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area other_bread">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="{{route('Home')}}">home</a></li>
                            <li>/</li>
                            <li>blog</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

    <!--blog body area start-->
    <div class="blog_area blog_page blog_reverse">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-12">
                    <!--blog sidebar start-->
                    <aside class="blog_sidebar">
                        <!--search form start-->
                        <div class="sidebar_widget search_form">
                            <form action="#">
                                <input placeholder="Search..." type="text" name="search">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                        <!--search form end-->

                        <!--recent post start-->
                        <div class="sidebar_widget recent_post">
                            <h3 class="widget_title">Recent Posts</h3>
                            @foreach($newBlogs as $newBlog)
                            <div class="sidebar_post">
                                <div class="post_img">
                                    <a href="blog-details.html"><img src="{{$newBlog->path_image}}" alt=""></a>
                                </div>
                                <div class="post_text">
                                    <h3><a href="blog-details.html">{{$newBlog->title}}</a></h3>
                                    <span>{{date('M d Y', strtotime($newBlog->created_at))}}</span>
                                </div>

                            </div>
                            @endforeach
                        </div>
                        <!--recent post end-->

                        <!--recent post start-->
                        <div class="sidebar_widget recent_post">
                            <h3 class="widget_title">Comments</h3>
                            @foreach($blogComments as $blogComment)
                            <div class="sidebar_post">
                                <div class="post_img">
                                    <a href="blog-details.html"><img src="{{$blogComment->blog->path_image}}" alt=""></a>
                                </div>
                                <div class="post_text">
                                    <h3><a href="blog-details.html">{{$blogComment->blog->title}}</a></h3>
                                    <div>{{$blogComment->user->name}}</div>
                                    <span>{{ date('M d Y', strtotime($blogComment->created_at))}}</span>
                                </div>

                            </div>
                            @endforeach
                        </div>
                        <!--recent post end-->

                    </aside>

                    <!--blog sidebar start-->
                </div>
                <div class="col-lg-9 col-md-12">
                    <!--blog grid area start-->
                    <div class="blog_grid_area">
                        @foreach($blogs as $blog)
                        <div class="blog_grid">
                            <div class="blog_thumb">
                                <a href="{{route('blog_detail', $blog->id)}}"><img src="{{asset($blog->path_image)}}" alt=""></a>
                            </div>
                            <div class="blog_content">
                                <div class="post_date">
                                    <span class="day">{{ date('M ', strtotime($blog->created_at)) }}</span>
                                    <span class="month">/ {{ date('d  ', strtotime($blog->created_at)) }}</span>
                                </div>
                                <h3 class="post_title"><a href="{{route('blog_detail', $blog->id)}}">{{$blog->title}}</a></h3>
                                <p class="post_desc">{!! $blog->content !!}</p>
                                <a class="read_more" href="{{route('blog_detail', $blog->id)}}">read more</a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <!--blog grid area start-->
                </div>
            </div>
        </div>
    </div>
    <!--blog section area end-->

    <!--blog pagination area start-->
    <div class="blog_pagination">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="pagination">
                        <ul>
                            <li class="current">1</li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li class="next"><a href="#">next</a></li>
                            <li><a href="#">>></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--blog pagination area end-->
@endsection
