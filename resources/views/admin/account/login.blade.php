@if(\Illuminate\Support\Facades\Auth::check())
    @include('admin.home.dashboard')
    @else
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Đăng Nhập | </title>

    <!-- Bootstrap -->
    <link href="{{ asset('assets/admin/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('assets/admin/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('assets/admin/vendors/nprogress/nprogress.css')}}" rel="stylesheet">
    <!-- Animate.css -->
    <link href="{{ asset('assets/admin/vendors/animate.css/animate.min.css')}}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ asset('assets/admin/build/css/custom.min.css')}}" rel="stylesheet">
</head>

<body class="login">
<div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>

    <div class="login_wrapper">
        <div class="animate form login_form">

            <section class="login_content">
                <form action="{!! route('admin.postloginadmin') !!}" method="post">
                    {!! csrf_field() !!}
                    <h1>Đăng Nhập</h1>
                    @include('admin.block.alert')
                    <div>
                        <input type="text" class="form-control" placeholder="Tài Khoản" value="admin" name="username" />
                    </div>
                    <div>
                        <input type="password" class="form-control" placeholder="Mật Khẩu" value="duytan1998" name="password"  />
                    </div>
                    <div>
                        <button class="btn btn-default" type="submit">Đăng Nhập</button>
                        <a class="reset_pass" href="#">Quên Mật Khẩu?</a>
                    </div>

                    <div class="clearfix"></div>

                    <div class="separator">
                        <p class="change_link">Bạn Chưa Có Tài Khoản?
                            <a href="#signup" class="to_register">  Tạo Tài Khoản </a>
                        </p>
                        <div class="clearfix"></div>
                        <br />
                    </div>
                </form>
            </section>
        </div>

        <div id="register" class="animate form registration_form">
            <section class="login_content">
                <form>
                    <h1>Tạo Tài Khoản</h1>
                    <div>
                        <input type="text" class="form-control" placeholder="Tài Khoản" />
                    </div>
                    <div>
                        <input type="email" class="form-control" placeholder="Email" />
                    </div>
                    <div>
                        <input type="password" class="form-control" placeholder="Mật Khẩu"  />
                    </div>
                    <div>
                        <input type="password" class="form-control" placeholder="Nhập Lại Mật Khẩu" />
                    </div>
                    <div>
                        <button class="btn btn-default" type="submit">Đăng Ký</button>
                    </div>

                    <div class="clearfix"></div>

                    <div class="separator">
                        <p class="change_link">Bạn Đã Có Tài Khoản ?
                            <a href="#signin" class="to_register"> Đăng Nhập </a>
                        </p>

                        <div class="clearfix"></div>
                        <br />

                    </div>
                </form>
            </section>
        </div>
    </div>
</div>
<!-- jQuery -->
<script src="{{ asset('assets/admin/vendors/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{ asset('assets/admin/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
</body>
</html>

@endif
