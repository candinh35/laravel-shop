@extends('client.layout.main')
<?php
define('BASE_URL', "http://127.0.0.1:8000/");
?>
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
                            <li>blog details</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

    <!--blog body area start-->
    <div class="blog_area blog_details">
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
                                        <a href="blog-details.html"><img src="{{BASE_URL.$newBlog->path_image}}" alt=""></a>
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
                            @foreach($blogDetailComments as $blogComment)
                            <div class="sidebar_post">
                                <div class="post_img">
                                    <a href=""><img src="{{BASE_URL. $blogComment->blog->path_image}}" alt=""></a>
                                </div>
                                <div class="post_text">
                                    <h3><a href="">{{$blogComment->user->name}}</a></h3>
                                    <span>{{date('M d Y', strtotime($blogComment->created_at))}}</span>
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
                    <div class="blog_details_wrapper">
                        @if($blogDetail->path_image == null)
                            asd
                            <div class="blog__thumb">
                                <a href="#"><img src="{{asset('/template/admin/css/assets/images/_default-user.png')}}" alt=""></a>
                            </div>
                        @else
                        <div class="blog__thumb">
                            <a href="#"><img src="{{asset($blogDetail->path_image) }}" alt=""></a>
                        </div>
                        @endif
                        <div class="blog_info_wrapper">
                            <div class="blog_info_inner">
                                <div class="post__date">
                                    <span class="day">{{date('M', strtotime($blogDetail->created_at))}}</span>
                                    <span class="month">{{date('d', strtotime($blogDetail->created_at))}}</span>
                                </div>
                                <div class="post__info">
                                    <div class="post_header">
                                        <h3>{{$blogDetail->title}}</h3>
                                    </div>
                                    <div class="post_content">
                                        <p>{!! $blogDetail->content !!}</p>
                                    </div>

                                </div>
                            </div>

                            <div class="comments_box">
                                <h3>{{$blogDetailComments->count()}} Comments	</h3>
                                @foreach($blogDetailComments as $blogComment)
                                <div class="comment_list">
                                    <div class="comment-author-thumb">
                                        <img src="{{asset($blogComment->user->path_image) }}" alt="">
                                    </div>
                                    <div class="comment_content">
                                        <div class="comment_meta">
                                            <div class="comment_title">
                                                <h5><a href="#">{{$blogComment->user->name}}</a></h5>
                                                <span>{{date('M d Y', strtotime($blogComment->created_at))}}</span>
                                            </div>
                                        </div>
                                        <p>{{$blogComment->message}}</p>
                                        @if( Auth::guard('cus')->id() == $blogComment->user_id)
                                        <div class="comment_reply">
                                            <a href="{{route('deleteComment',$blogComment->id)}}">Delete</a>
                                        </div>
                                        @endif
                                    </div>

                                </div>
                                @endforeach
                            </div>

                            <div class="comments_form">
                                <h3>Leave a Reply </h3>
                                <p>Your email address will not be published.</p>
                                <form action="{{route('postComment')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{Auth::guard('cus')->id()}}">
                                    <input type="hidden" name="blog_id" value="{{$blogDetail->id}}">
                                    <div class="row">
                                        <div class="col-12">
                                            <label for="review_comment">Comment </label>
                                            <textarea name="message" id="review_comment" ></textarea>
                                        </div>
                                    </div>
                                    <button class="button" type="submit">Post Comment</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--blog grid area start-->
                </div>
            </div>
        </div>
    </div>
@endsection
