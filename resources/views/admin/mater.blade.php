@if(\Illuminate\Support\Facades\Auth::check())
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('assets/admin/images/favicon.ico')}}" type="image/ico" />

    <title>@yield('namepage') | Thư Viện </title>

    <!-- Bootstrap -->
    <link href="{{ asset('assets/admin/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('assets/admin/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('assets/admin/vendors/nprogress/nprogress.css')}}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{ asset('assets/admin/vendors/iCheck/skins/flat/green.css')}}" rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link href="{{ asset('assets/admin/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet">
    <!-- JQVMap -->
    <link href="{{ asset('assets/admin/vendors/jqvmap/dist/jqvmap.min.css')}}" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="{{ asset('assets/admin/vendors/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ asset('assets/admin/build/css/custom.min.css')}}" rel="stylesheet">
    <!-- Datatables -->
    <link href="{{ asset('assets/admin/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/admin/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/admin/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/admin/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/admin/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css')}}" rel="stylesheet">
    <!-- PNotify -->
    <link href="{{ asset('assets/admin/vendors/pnotify/dist/pnotify.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/admin/vendors/pnotify/dist/pnotify.buttons.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/admin/vendors/pnotify/dist/pnotify.nonblock.css')}}" rel="stylesheet">
</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="{!! route('admin.getdashboard') !!}" class="site_title"><i class="fa fa-star-half-o"></i> <span>Library!</span></a>
                </div>

                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                <div class="profile clearfix">
                    <div class="profile_pic">
                        <img src="{{ asset('assets/admin/images/'.\Illuminate\Support\Facades\Auth::user()->image)}}" class="img-circle profile_img">
                    </div>
                    <div class="profile_info">
                        <span>Xin Chào,</span>
                        <h2>{!! \Illuminate\Support\Facades\Auth::user()->name !!}</h2>
                    </div>
                </div>
                <!-- /menu profile quick info -->

                <br />

                @include('admin.template.leftpnl')
            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <nav>
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <img src="{{ asset('assets/admin/images/'.\Illuminate\Support\Facades\Auth::user()->image)}}" alt="">{!! \Illuminate\Support\Facades\Auth::user()->name !!}
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                                <li>
                                    <a href="{!! route('admin.account.getprofileadmin',['id'=>\Illuminate\Support\Facades\Auth::id()]) !!}"><i class="fa fa-user pull-right"></i> Tài Khoản</a>
                                </li>
                                <li><a href="{!! route('admin.getlogoutadmin') !!}"><i class="fa fa-sign-out pull-right"></i> Đăng Xuất</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
            <div class="row">
                @yield('content')
            </div>
            <!-- top tiles -->

        </div>
        <!-- /page content -->


    </div>
</div>

<!-- jQuery -->
<script src="{{ asset('assets/admin/vendors/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{ asset('assets/admin/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- FastClick -->
<script src="{{ asset('assets/admin/vendors/fastclick/lib/fastclick.js')}}"></script>
<!-- NProgress -->
<script src="{{ asset('assets/admin/vendors/nprogress/nprogress.js')}}"></script>
<!-- Chart.js -->
<script src="{{ asset('assets/admin/vendors/Chart.js/dist/Chart.min.js')}}"></script>
<!-- gauge.js -->
<script src="{{ asset('assets/admin/vendors/gauge.js/dist/gauge.min.js')}}"></script>
<!-- bootstrap-progressbar -->
<script src="{{ asset('assets/admin/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js')}}"></script>
<!-- iCheck -->
<script src="{{ asset('assets/admin/vendors/iCheck/icheck.min.js')}}"></script>
<!-- Skycons -->
<script src="{{ asset('assets/admin/vendors/skycons/skycons.js')}}"></script>
<!-- Flot -->
<script src="{{ asset('assets/admin/vendors/moment/min/moment.min.js')}}"></script>
<script src="{{ asset('assets/admin/vendors/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<script src="{{ asset('assets/admin/vendors/raphael/raphael.min.js')}}"></script>
<script src="{{ asset('assets/admin/vendors/morris.js/morris.min.js')}}"></script>
<script src="{{ asset('assets/admin/vendors/Flot/jquery.flot.js')}}"></script>
<script src="{{ asset('assets/admin/vendors/Flot/jquery.flot.pie.js')}}"></script>
<script src="{{ asset('assets/admin/vendors/Flot/jquery.flot.time.js')}}"></script>
<script src="{{ asset('assets/admin/vendors/Flot/jquery.flot.stack.js')}}"></script>
<script src="{{ asset('assets/admin/vendors/Flot/jquery.flot.resize.js')}}"></script>
<!-- Flot plugins -->
<script src="{{ asset('assets/admin/vendors/flot.orderbars/js/jquery.flot.orderBars.js')}}"></script>
<script src="{{ asset('assets/admin/vendors/flot-spline/js/jquery.flot.spline.min.js')}}"></script>
<script src="{{ asset('assets/admin/vendors/flot.curvedlines/curvedLines.js')}}"></script>
<!-- DateJS -->
<script src="{{ asset('assets/admin/vendors/DateJS/build/date.js')}}"></script>
<!-- JQVMap -->
<script src="{{ asset('assets/admin/vendors/jqvmap/dist/jquery.vmap.js')}}"></script>
<script src="{{ asset('assets/admin/vendors/jqvmap/dist/maps/jquery.vmap.world.js')}}"></script>
<script src="{{ asset('assets/admin/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js')}}"></script>
<!-- bootstrap-daterangepicker -->
<script src="{{ asset('assets/admin/vendors/moment/min/moment.min.js')}}"></script>
<script src="{{ asset('assets/admin/vendors/bootstrap-daterangepicker/daterangepicker.js')}}"></script>

<!-- Custom Theme Scripts -->
<script src="{{ asset('assets/admin/build/js/custom.min.js')}}"></script>
<!-- Datatables -->
<script src="{{ asset('assets/admin/vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('assets/admin/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script src="{{ asset('assets/admin/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{ asset('assets/admin/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js')}}"></script>
<script src="{{ asset('assets/admin/vendors/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
<script src="{{ asset('assets/admin/vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{ asset('assets/admin/vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{ asset('assets/admin/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')}}"></script>
<script src="{{ asset('assets/admin/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
<script src="{{ asset('assets/admin/vendors/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('assets/admin/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')}}"></script>
<script src="{{ asset('assets/admin/vendors/datatables.net-scroller/js/dataTables.scroller.min.js')}}"></script>
<script src="{{ asset('assets/admin/vendors/jszip/dist/jszip.min.js')}}"></script>
<script src="{{ asset('assets/admin/vendors/pdfmake/build/pdfmake.min.js')}}"></script>
<script src="{{ asset('assets/admin/vendors/pdfmake/build/vfs_fonts.js')}}"></script>
<!-- PNotify -->
<script src="{{ asset('assets/admin/endors/pnotify/dist/pnotify.js')}}"></script>
<script src="{{ asset('assets/admin/vendors/pnotify/dist/pnotify.buttons.js')}}"></script>
<script src="{{ asset('assets/admin/vendors/pnotify/dist/pnotify.nonblock.js')}}"></script>
<script src="{{ asset('assets/admin/js/customjs.js')}}"></script>
</body>
</html>

@else
    @include('admin.account.login')
@endif
