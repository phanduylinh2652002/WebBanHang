<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<head>
<title>Admin</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="{{asset('web/css/bootstrap.min.css')}}" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="{{asset('web/css/style.css')}}" rel='stylesheet' type='text/css' />
<link href="{{asset('web/css/style-responsive.css')}}" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="{{asset('web/css/font.css')}}" type="text/css"/>
<link href="{{asset('web/css/font-awesome.css')}}" rel="stylesheet">
<link rel="stylesheet" href="{{asset('web/css/morris.css')}}" type="text/css"/>
<!-- calendar -->
<link rel="stylesheet" href="{{asset('web/css/monthly.css')}}">
<!-- //calendar -->
<!-- //font-awesome icons -->
<script src="{{asset('web/js/jquery2.0.3.min.js')}}"></script>
<script src="{{asset('web/js/raphael-min.js')}}"></script>
<script src="{{asset('web/js/morris.js')}}"></script>
</head>
<body>
<section id="container">
<!--header start-->
<header class="header fixed-top clearfix">
<!--logo start-->
<div class="brand">
    <a href="index.html" class="logo">
        ADMIN
    </a>
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
</div>

<div class="top-nav clearfix">
    <!--search & user info start-->
    <ul class="nav pull-right top-menu">
<!--         <li>
            <input type="text" class="form-control search" placeholder=" Search">
        </li> -->
        <!-- user login dropdown start-->
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <img alt="" src="{{asset('web/images/2.png')}}">
                <span class="username">{{ Auth::user()->name }}</span>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
               <!--  <li><a href="#"><i class=" fa fa-suitcase"></i>Profile</a></li> -->
                <li><a href="{{ url('logout') }}"><i class="fa fa-key"></i> Đăng xuất</a></li>
            </ul>
        </li>
        <!-- user login dropdown end -->

    </ul>
    <!--search & user info end-->
</div>
</header>
<!--header end-->
<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a class="active" href="{{ url('home') }}">
                        <i class="fa fa-dashboard"></i>
                        <span>Trang chủ</span>
                    </a>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-users"></i>
                        <span>Hóa đơn</span>    
                    </a>
                    <ul class="sub">
                        <li><a href="{{url('admin/bill')}}">Hóa đơn</a></li>

                    </ul>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-gift"></i>
                        <span>Loại & Sản phẩm</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{route('category.index')}}">Loại sản phẩm</a></li>
                        <li><a href="{{route('product.index')}}">Sản phẩm</a></li>
                    </ul>
                </li>

                <li>
                    <a href="{{route('slide.index')}}">
                        <i class="fa fa-gift"></i>
                        <span>Slide</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('customer.index')}}">
                        <i class="fa fa-users"></i>
                        <span>Danh sách khách hàng</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <!-- //market-->
        <!-- //market-->

      @yield("do-du-lieu")



</section>
 <!-- footer -->
          <div class="footer" style="margin-top: 450px">
            <div class="wthree-copyright">
              <p>Website bán cây cảnh <a href="http://localhost/shopping/public/">Thế giới cây</a></p>
            </div>
          </div>
  <!-- / footer -->
</section>
<!--main content end-->
</section>
<style>
</style>
<script src="{{asset('web/js/bootstrap.js')}}"></script>
<script src="{{asset('web/js/jquery.dcjqaccordion.2.7.js')}}"></script>
<script src="{{asset('web/js/scripts.js')}}"></script>
<script src="{{asset('web/js/jquery.slimscroll.js')}}"></script>
<script src="{{asset('web/js/jquery.nicescroll.js')}}"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="{{asset('web/js/jquery.scrollTo.js')}}"></script>

</body>
</html>
