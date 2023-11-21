<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from hencework.com/theme/elmer/full-width-light/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 16 Mar 2023 03:32:27 GMT -->

<head>
   <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>S&D Login Admin - Công Ty TNHH Tư Vấn S&D Laws</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ url('asset') }}/images/favicon.png">

    <!-- vector map CSS -->
    <link href="{{ url('asset') }}/vendors/bower_components/jasny-bootstrap/dist/css/jasny-bootstrap.min.css"
        rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
        integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Custom CSS -->
    <link href="{{ url('asset') }}/elmer/full-width-light/dist/css/style.css" rel="stylesheet" type="text/css">
</head>

<body>
    <!--Preloader-->
    <div class="preloader-it">
        <div class="la-anim-1"></div>
    </div>
    <!--/Preloader-->

    <div class="wrapper  pa-0">
        <header class="sp-header">
            <div class="sp-logo-wrap pull-left">
                <a href="index.html">
                    <img class="brand-img mr-10" src="{{ url('asset') }}/elmer/img/logo.png" alt="brand" />
                    <span class="brand-text">ADMIN</span>
                </a>
            </div>
            <div class="clearfix"></div>
        </header>

        <!-- Main Content -->
        <div class="page-wrapper pa-0 ma-0 auth-page">
            <div class="container-fluid">
                <!-- Row -->
                <div class="table-struct full-width full-height">
                    <div class="table-cell vertical-align-middle auth-form-wrap">
                        <div class="auth-form  ml-auto mr-auto no-float">
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <div class="mb-30">
                                        <h3 class="text-center txt-dark mb-10">Đăng Nhập Quản Trị</h3>
                                        <h6 class="text-center nonecase-font txt-grey">Nhập Thông Tin Tài Khoản Của Bạn
                                            Dưới Đây!</h6>
                                    </div>
                                    <div class="form-wrap">
                                        <form action="{{ route('login_admin') }}" data-toggle="validator" rrole="form"
                                            method="post">
                                            @csrf
                                            <div
                                                class="form-group @error('accountName') has-error has-danger @enderror">
                                                <label class="control-label mb-10" for="exampleInputEmail_2">Tên Tài
                                                    Khoản</label>
                                                <input type="text" class="form-control" required=""
                                                    name="accountName" id="exampleInputEmail_2"
                                                    placeholder="Tên Tài Khoản...">
                                                @error('accountName')
                                                    <div class="help-block with-errors" style=" color: #f33923;">
                                                        <ul class="list-unstyled">
                                                            <li>{{ $message }}</li>
                                                        </ul>
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group @error('password') has-error has-danger @enderror">
                                                <label class="pull-left control-label mb-10" for="exampleInputpwd_2">Mật
                                                    Khẩu</label>
                                                {{-- <a class="capitalize-font txt-primary block mb-10 pull-right font-12" href="forgot-password.html">forgot password ?</a> --}}
                                                <div class="clearfix"></div>
                                                <input type="password" class="form-control" required=""
                                                    id="exampleInputpwd_2" name="password" placeholder="Mật Khẩu...">
                                                @error('password')
                                                    <div class="help-block with-errors" style=" color: #f33923;">
                                                        <ul class="list-unstyled">
                                                            <li>{{ $message }}</li>
                                                        </ul>
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="form-group text-center">
                                                <button type="submit" class="btn btn-primary  btn-rounded">Đăng
                                                    Nhập</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Row -->
            </div>

        </div>
        <!-- /Main Content -->

    </div>
    <!-- /#wrapper -->

    <!-- JavaScript -->

    <!-- jQuery -->
    <script src="{{ url('asset') }}/vendors/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ url('asset') }}/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="{{ url('asset') }}/vendors/bower_components/jasny-bootstrap/dist/js/jasny-bootstrap.min.js"></script>

    <!-- Slimscroll JavaScript -->
    <script src="{{ url('asset') }}/elmer/full-width-light/dist/js/jquery.slimscroll.js"></script>

    <!-- Init JavaScript -->
    <script src="{{ url('asset') }}/elmer/full-width-light/dist/js/init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-bottom-left",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
    </script>

    @if (Session::get('success'))
        <script>
            toastr.success('{{ Session::get('success') }}');
        </script>
    @endif

    @if (session::get('err'))
        <script>
            toastr.error('{{ session::get('err') }}');
        </script>
    @endif
</body>

<!-- Mirrored from hencework.com/theme/elmer/full-width-light/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 16 Mar 2023 03:32:27 GMT -->

</html>
