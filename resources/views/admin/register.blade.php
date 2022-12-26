<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Login | Admin</title>
    <meta name="viewport"
          content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="CodeLean Design">

    <!-- Disable tap highlight on IE -->
    <meta name="msapplication-tap-highlight" content="no">

    <link href="{{asset('template/admin/css/main.css')}}" rel="stylesheet">
</head>

<body>
<div class="app-container app-theme-white body-tabs-shadow">
    <div class="app-container">
        <div class="h-100 bg-plum-plate bg-animation">
            <div class="d-flex h-100 justify-content-center align-items-center">
                <div class="mx-auto app-login-box col-md-8">
                    <div class="modal-dialog w-100 mx-auto">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="h5 modal-title text-center">
                                    <h4 class="mt-2">
                                        <div>Welcome back,</div>
                                        <span>Please sign in to your account below.</span>
                                        <x-alert></x-alert>
                                    </h4>
                                </div>
                                <form class="" method="post" action="{{route('register_store')}}">
                                    @csrf
                                        <div class="position-relative row form-group">
                                            <label for="name" class="col-md-3 text-md-right col-form-label">Name</label>
                                            <div class="col-md-9 col-xl-8">
                                                <input required="" name="name" id="name" placeholder="Name" type="text" class="form-control" value="">
                                            </div>
                                        </div>

                                        <div class="position-relative row form-group">
                                            <label for="email" class="col-md-3 text-md-right col-form-label">Email</label>
                                            <div class="col-md-9 col-xl-8">
                                                <input required="" name="email" id="email" placeholder="Email" type="email" class="form-control @error('email') infinite @enderror"
                                                       value="">
                                            </div>
                                        </div>

                                        <div class="position-relative row form-group">
                                            <label for="password" class="col-md-3 text-md-right col-form-label">Password</label>
                                            <div class="col-md-9 col-xl-8">
                                                <input name="password" id="password" placeholder="Password" type="password" class="form-control "
                                                       value="">
                                            </div>
                                        </div>

                                        <div class="position-relative row form-group">
                                            <label for="password_confirmation" class="col-md-3 text-md-right col-form-label">Confirm Password</label>
                                            <div class="col-md-9 col-xl-8">
                                                <input name="password_confirmation" id="password_confirmation" placeholder="Confirm Password"
                                                       type="password" class="form-control" value="">
                                            </div>
                                        </div>


                                        <div class="position-relative row form-group">
                                            <label for="phone" class="col-md-3 text-md-right col-form-label">Phone</label>
                                            <div class="col-md-9 col-xl-8">
                                                <input required="" name="phone" id="phone" placeholder="Phone" type="tel" class="form-control" value="">
                                            </div>
                                        </div>

                                        <div class="position-relative row form-group">
                                            <label for="address" class="col-md-3 text-md-right col-form-label">Address</label>
                                            <div class="col-md-9 col-xl-8">
                                                <input required="" name="address" id="address" placeholder="address" type="text" class="form-control" value="">
                                            </div>
                                        </div>

                                    <div class="modal-footer clearfix">
                                        <div class="float-right">
                                            <button type="submit" class="btn btn-primary btn-lg">Register</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                    <div class="text-center text-white opacity-8 mt-3">Copyright © CanDinh 2022</div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="./assets/scripts/main.js"></script>
</body>

</html>
