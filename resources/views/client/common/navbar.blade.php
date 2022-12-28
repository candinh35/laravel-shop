<!-- Main Wrapper Start -->
<!--Offcanvas menu area start-->
<div class="off_canvars_overlay">

</div>
<div class="offcanvas_menu">
    <div class="canvas_open">
        <a href="javascript:void(0)"><i class="ion-navicon"></i></a>
    </div>
    <div class="offcanvas_menu_wrapper">
        <div class="canvas_close">
            <a href="javascript:void(0)"><i class="ion-android-close"></i></a>
        </div>
        <div class="welcome_text">
            <ul>
                <li><span>Phone :</span> +84 3945 857 12</li>
                <li><span>Email :</span> wellcome@gmail.com</li>
            </ul>
        </div>


        <div class="cart_area">
            <div class="middel_links">
                <ul>
                    @if(Auth::guard('cus')->check())
                        <li>{{Auth::guard('cus')->user()->name}}</li>
                        <li><a href="{{route('client_check_logout')}}">Logout</a></li>
                        <li><a href="{{route('orderDetail',Auth::guard('cus')->id() )}}">Order Manager</a></li>
                    @else
                    <li><a href="{{route('client_login')}}">Login</a></li>
                    <li>/</li>
                    <li><a href="{{route('client_login')}}">Register</a></li>
                    @endif
                </ul>

            </div>
            <div class="cart_link">
                <a href="#"><i class="fa fa-shopping-basket"></i>{{Cart::content()->count()}} Items</a>
                <!--mini cart-->
                @if(Cart::content()->count() > 0)
                <div class="mini_cart">
                    @foreach(Cart::content() as $cartItem)
                        <div class="cart_item top">
                            <div class="cart_img">
                                <a href="#"><img src="{{asset($cartItem->options->image)}}" alt=""></a>
                            </div>
                            <div class="cart_info">
                                <a href="#">{{$cartItem->name}}</a>
                                <span>{{$cartItem->qty}} x {{number_format($cartItem->price) }} Đ</span>

                            </div>
                            <div class="cart_remove">
                                <a href="{{route('product_cart_delete', $cartItem->rowId)}}"><i
                                        class="ion-android-close"></i></a>
                            </div>
                        </div>
                    @endforeach
                    <div class="cart__table">
                        <table>
                            <tbody>
                            <tr>
                                <td class="text-left">Sub-Total :</td>
                                <td class="text-right">{{str_replace('.00','',Cart::subtotal()) }} Đ</td>
                            </tr>

                            <tr>
                                <td class="text-left">Total :</td>
                                <td class="text-right">{{str_replace('.00','',Cart::total())}} Đ</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="cart_button view_cart">
                        <a href="{{route('product_cart')}}">View Cart</a>
                    </div>
                    <div class="cart_button checkout">
                        <a href="{{route('product_cart_checkout')}}">Checkout</a>
                    </div>
                </div>
                @else
                    <div class="mini_cart text-center">Cart is Empty</div>
                @endif
                <!--mini cart end-->
            </div>
        </div>
        <div id="menu" class="text-left ">
            <ul class="offcanvas_main_menu">
                @foreach($menus as $menu)
                    <li class="{{request()->segment(1) == $menu->name ? 'active' : ''}}"><a
                            href="{{route($menu->name)}}">{{$menu->name}}</a></li>
                @endforeach
            </ul>
        </div>
        <div class="offcanvas_footer">
            <span><a href="#"><i class="fa fa-envelope-o"></i> info@yourdomain.com</a></span>
            <ul>
                <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li class="pinterest"><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
            </ul>
        </div>
    </div>
</div>
<header class="header_area header_three">
    <!--header top start-->
    <div class="header_top">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-7 col-md-12">
                    <div class="welcome_text">
                        <ul>
                            <li><span>Phone :</span> +84 3945 857 12</li>
                            <li><span>Email :</span> wellcome@gmail.com</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-5 col-md-12">
                    <div class="top_right text-right">
                        @if(Auth::guard('cus')->check())
                            <ul>
                                <li class="top_links">
                                    <a href="#"><i style="font-size: 17px; margin-right: 5px;color: white"
                                                   class="fa fa-user"></i>
                                      Hello :  {{Auth::guard('cus')->user()->name}}
                                        <i class="ion-chevron-down"></i> </a>
                                    <ul class="dropdown_links">
                                        <li><a href="{{route('client_check_logout')}}">Logout</a></li>
                                        <li><a href="{{route('orderDetail',Auth::guard('cus')->id() )}}">Order Management </a></li>
                                    </ul>
                                </li>
                            </ul>
                        @else
                            <a href="{{route('client_login')}}">
                                <i style="font-size: 15px; margin-right: 5px;color: white" class="fa fa-user"></i>
                                Login
                            </a>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--header top start-->

    <!--header middel start-->
    <div class="header_middel">
        <div class="container-fluid">
            <div class="middel_inner">
                <div class="row align-items-center">
                    <div class="col-lg-4">
                        <div class="search_bar">
                            <form action="{{route('Shop')}}">
                                <input name="search" placeholder="Search entire store here..." type="text"
                                       value="{{request('search')}}">
                                <button type="submit"><i class="ion-ios-search-strong"></i></button>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="logo">
                            <a href="{{route('Home')}}"><img src="/template/client/assets/img/logo/logo.png" alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="cart_area">
                            <div class="cart_link">
                                <a href="#"><i class="fa fa-shopping-basket"></i>{{Cart::content()->count()}} Items</a>
                                <!--mini cart-->
                                @if(Cart::content()->count() > 0)
                                    <div class="mini_cart">
                                        @foreach(Cart::content() as $cartItem)
                                            <div class="cart_item top">
                                                <div class="cart_img">
                                                    <a href="#"><img src="{{asset($cartItem->options->image)}}" alt=""></a>
                                                </div>
                                                <div class="cart_info">
                                                    <a href="#">{{$cartItem->name}}</a>
                                                    <span>{{$cartItem->qty}} x {{number_format($cartItem->price) }} Đ</span>

                                                </div>
                                                <div class="cart_remove">
                                                    <a href="{{route('product_cart_delete', $cartItem->rowId)}}"><i
                                                            class="ion-android-close"></i></a>
                                                </div>
                                            </div>
                                        @endforeach
                                        <div class="cart__table">
                                            <table>
                                                <tbody>
                                                <tr>
                                                    <td class="text-left">Sub-Total :</td>
                                                    <td class="text-right">{{str_replace('.00','',Cart::subtotal()) }} Đ</td>
                                                </tr>

                                                <tr>
                                                    <td class="text-left">Total :</td>
                                                    <td class="text-right">{{str_replace('.00','',Cart::total())}} Đ</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="cart_button view_cart">
                                            <a href="{{route('product_cart')}}">View Cart</a>
                                        </div>
                                        <div class="cart_button checkout">
                                            <a href="{{route('product_cart_checkout')}}">Checkout</a>
                                        </div>
                                    </div>
                                @else
                                    <div class="mini_cart text-center">Cart is Empty</div>
                                @endif
                                <!--mini cart end-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--header middel end-->

    <!--header bottom satrt-->
    <div class="header_bottom sticky-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="main_menu_inner">
                        <div class="main_menu">
                            <nav>
                                <ul>
                                    @foreach($menus as $menu)
                                        <li class="{{request()->segment(1) == $menu->name ? 'active' : ''}}"><a
                                                href="{{route($menu->name)}}">{{$menu->name}}</a></li>
                                    @endforeach

                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--header bottom end-->
</header>
