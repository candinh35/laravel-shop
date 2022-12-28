<!doctype html>
<html class="no-js" lang="en">

<head>
@include('client.common.header')

</head>

<body>

<!-- Main Wrapper Start -->
<!--Offcanvas menu area start-->
<div class="off_canvars_overlay">

</div>


<!--header area start-->
@include('client.common.navbar')
<!--header area end-->

<!--slider area start-->
@yield('content')

<!--footer area start-->
@include('client.common.footer')
</body>

</html>
