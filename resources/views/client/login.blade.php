@extends('client.layout.main')

@section('content')

    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area other_bread">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="index.html">home</a></li>
                            <li>/</li>
                            <li>sign</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

    <!-- customer login start -->
    <div class="customer_login">
        <div class="container">
            <x-alert/>
            <div class="row">
                <!--login area start-->
                <div class="col-lg-6 col-md-6">
                    <div class="account_form">
                        <h2>login</h2>
                        <form action="{{route('client_check_login')}}" method="post">
                            @csrf
                            <p>
                                <label>Username or email <span>*</span></label>
                                <input type="text" name="email" class="@error('email') is-invalid @enderror" value="{{old('email')}}">
                            </p>
                            <p>
                                <label>Passwords <span>*</span></label>
                                <input type="password" name="password" class="@error('password') is-invalid @enderror" value="{{old('password')}}">
                            </p>
                            <div class="login_submit">
                                <a href="#">Lost your password?</a>
                                <label for="remember">
                                    <input id="remember" type="checkbox" name="remember">
                                    Remember me
                                </label>
                                <button type="submit">login</button>

                            </div>

                        </form>
                    </div>
                </div>
                <!--login area start-->

                <!--register area start-->
                <div class="col-lg-6 col-md-6">
                    <div class="account_form register">
                        <h2>Register</h2>
                        <form action="#">
                            <p>
                                <label>Email address  <span>*</span></label>
                                <input type="text">
                            </p>
                            <p>
                                <label>Passwords <span>*</span></label>
                                <input type="password">
                            </p>
                            <div class="login_submit">
                                <button type="submit">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!--register area end-->
            </div>
        </div>
    </div>
    <!-- customer login end -->

@endsection
@section('footer')
    <script>
        $('.is-invalid').keydown(function(){
            $(this).removeClass('is-invalid')
        });
    </script>
@endsection
