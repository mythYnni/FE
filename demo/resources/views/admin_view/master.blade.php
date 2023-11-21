<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>S&D Admin - Công Ty TNHH Tư Vấn S&D Laws</title>

    <!-- :: Favicon -->
    <link rel="icon" type="image/png" href="{{url('asset')}}/images/logo/logo_05.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
        integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Data table CSS -->
    <link href="{{ url('asset') }}/vendors/bower_components/datatables/media/css/jquery.dataTables.min.css"
        rel="stylesheet" type="text/css" />
    <!-- vector map CSS -->
    <link href="{{ url('asset') }}/vendors/bower_components/jasny-bootstrap/dist/css/jasny-bootstrap.min.css"
        rel="stylesheet" type="text/css" />

    <!-- select2 CSS -->
    <link href="{{ url('asset') }}/vendors/bower_components/select2/dist/css/select2.min.css" rel="stylesheet"
        type="text/css" />

    <!-- bootstrap-select CSS -->
    <link href="{{ url('asset') }}/vendors/bower_components/bootstrap-select/dist/css/bootstrap-select.min.css"
        rel="stylesheet" type="text/css" />

    <!-- Bootstrap Dropify CSS -->
    <link href="{{ url('asset') }}/vendors/bower_components/dropify/dist/css/dropify.min.css" rel="stylesheet"
        type="text/css" />

    <!-- Bootstrap Wysihtml5 css -->
    <link rel="stylesheet"
        href="{{ url('asset') }}/vendors/bower_components/bootstrap3-wysihtml5-bower/dist/bootstrap3-wysihtml5.css" />

    <!-- Data table CSS -->
    <link href="{{ url('asset') }}/vendors/bower_components/datatables/media/css/jquery.dataTables.min.css"
        rel="stylesheet" type="text/css" />

    <!-- Custom CSS -->
    <link href="{{ url('asset') }}/elmer/full-width-light/dist/css/style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ url('asset') }}/vendors/bower_components/summernote/dist/summernote.css" />
    
</head>

<body>

    <!--Preloader-->
    <div class="preloader-it">
        <div class="la-anim-1"></div>
    </div>
    <!--/Preloader-->
    <div class="wrapper  theme-4-active pimary-color-blue">
        <!-- Top Menu Items -->
        @include('admin_view.layouts_view.top_menu_item')
        <!-- /Top Menu Items -->

        <!-- Left Sidebar Menu -->
        @include('admin_view.layouts_view.left_sidebar_menu')
        <!-- /Left Sidebar Menu -->

        <!-- Right Setting Menu -->
        @include('admin_view.layouts_view.right_setting_menu')
        <!-- /Right Setting Menu -->

        <!-- Right Sidebar Backdrop -->
        @include('admin_view.layouts_view.right_sidebar_backdrop')
        <!-- /Right Sidebar Backdrop -->

        <!-- Main Content -->
        <div class="page-wrapper">

            <!-- Page Content -->
            @yield('S&DAdminHome')
            <!-- Profile -->
            @yield('view_profile')
            @yield('view_create_password')
            <!-- Page Account -->
            @yield('list_account')
            @yield('view_create_account')
            <!-- Page Service Prices -->
            @yield('list_servicePrices')
            @yield('view_create_serviceprices')
            <!-- Page Legal Advice -->
            @yield('list_lAdvice')
            @yield('view_create_legalAdvice')
            @yield('view_update_legalAdvice')
            <!-- Page Post Advice -->
            @yield('view_create_pAdvice')
            @yield('view_update_pAdvice')
            <!-- /404 -->
            @yield('404')
            <!-- /Page Content -->

            <!-- Page list_support -->
            @yield('list_support')
            @yield('view_update_support')


            <!-- Footer -->
            @include('admin_view.layouts_view.footer')
            <!-- /Footer -->

        </div>
        <!-- /Main Content -->

    </div>
    <!-- /#wrapper -->


    <!-- JavaScript -->
    <!-- Summernote Plugin JavaScript -->
    
    <!-- jQuery -->
    <script src="{{ url('asset') }}/vendors/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ url('asset') }}/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="{{ url('asset') }}/vendors/bower_components/bootstrap-validator/dist/validator.min.js"></script>
    <!-- Bootstrap Daterangepicker JavaScript -->
    <script src="{{ url('asset') }}/vendors/bower_components/dropify/dist/js/dropify.min.js"></script>

    <!-- Form Flie Upload Data JavaScript -->
    <script src="{{ url('asset') }}/elmer/full-width-light/dist/js/form-file-upload-data.js"></script>


    <!-- Counter Animation JavaScript -->
    <script src="{{ url('asset') }}/vendors/bower_components/waypoints/lib/jquery.waypoints.min.js"></script>
    <script src="{{ url('asset') }}/vendors/bower_components/jquery.counterup/jquery.counterup.min.js"></script>

    <!-- Data table JavaScript -->
    <script src="{{ url('asset') }}/vendors/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="dist/js/productorders-data.js"></script>

    <!-- Owl JavaScript -->
    <script src="{{ url('asset') }}/vendors/bower_components/owl.carousel/dist/owl.carousel.min.js"></script>

    <!-- Switchery JavaScript -->
    <script src="{{ url('asset') }}/vendors/bower_components/switchery/dist/switchery.min.js"></script>

    <!-- Slimscroll JavaScript -->
    <script src="{{ url('asset') }}/elmer/full-width-light/dist/js/jquery.slimscroll.js"></script>

    <!-- Fancy Dropdown JS -->
    <script src="{{ url('asset') }}/elmer/full-width-light/dist/js/dropdown-bootstrap-extended.js"></script>

    <!-- Sparkline JavaScript -->
    <script src="{{ url('asset') }}/vendors/jquery.sparkline/dist/jquery.sparkline.min.js"></script>

    <!-- EChartJS JavaScript -->
    <script src="{{ url('asset') }}/vendors/bower_components/echarts/dist/echarts-en.min.js"></script>
    <script src="{{ url('asset') }}/vendors/echarts-liquidfill.min.js"></script>

    <!-- Init JavaScript -->
    <script src="{{ url('asset') }}/elmer/full-width-light/dist/js/init.js"></script>
    <script src="{{ url('asset') }}/elmer/full-width-light/dist/js/dashboard3-data.js"></script>

    <!-- Select2 JavaScript -->
    <script src="{{ url('asset') }}/vendors/bower_components/select2/dist/js/select2.full.min.js"></script>

    <!-- Bootstrap Select JavaScript -->
    <script src="{{ url('asset') }}/vendors/bower_components/bootstrap-select/dist/js/bootstrap-select.min.js"></script>

    <!-- wysuhtml5 Plugin JavaScript -->
    <script src="{{ url('asset') }}/vendors/bower_components/wysihtml5x/dist/wysihtml5x.min.js"></script>

    <script src="{{ url('asset') }}/vendors/bower_components/bootstrap3-wysihtml5-bower/dist/bootstrap3-wysihtml5.all.js">
    </script>

    <!-- Bootstrap Wysuhtml5 Init JavaScript -->
    <script src="{{ url('asset') }}/elmer/full-width-light/dist/js/bootstrap-wysuhtml5-data.js"></script>

    <!-- Data table JavaScript -->
    <script src="{{ url('asset') }}/vendors/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="{{ url('asset') }}/elmer/full-width-light/dist/js/dataTables-data.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="{{ url('asset') }}/js/ajaxView.js"></script>

    <script type="text/javascript">
        function ChangeToSlug() {
            var slug;
            // console.log(slug = $('#slug').val());
            //Lấy text từ thẻ input title
            slug = $('#slug').val();
            slug = slug.toLowerCase();
            //Đổi ký tự có dấu thành không dấu
            slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
            slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
            slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
            slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
            slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
            slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
            slug = slug.replace(/đ/gi, 'd');
            //Xóa các ký tự đặt biệt
            slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
            //Đổi khoảng trắng thành ký tự gạch ngang
            slug = slug.replace(/ /gi, "-");
            //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
            //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
            slug = slug.replace(/\-\-\-\-\-/gi, '-');
            slug = slug.replace(/\-\-\-\-/gi, '-');
            slug = slug.replace(/\-\-\-/gi, '-');
            slug = slug.replace(/\-\-/gi, '-');
            //Xóa các ký tự gạch ngang ở đầu và cuối
            slug = '@' + slug + '@';
            slug = slug.replace(/\@\-|\-\@|\@/gi, '');

            $('#convert_slug').val(slug);
        }
    </script>

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

    @if (Session::get('err'))
        <script>
            toastr.error('{{ Session::get('err') }}');

        </script>
    @endif
    @yield('ToastrWellcom')

    <script src="{{ url('asset') }}/vendors/bower_components/summernote/dist/summernote.min.js"></script>
    <!-- Summernote Wysuhtml5 Init JavaScript -->
    <script src="{{ url('asset') }}/elmer/full-width-light/dist/js/summernote-data.js"></script>

    <!-- Data table JavaScript -->
    <script src="{{ url('asset') }}/vendors/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="{{ url('asset') }}/vendors/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ url('asset') }}/vendors/bower_components/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="{{ url('asset') }}/vendors/bower_components/jszip/dist/jszip.min.js"></script>
    <script src="{{ url('asset') }}/vendors/bower_components/pdfmake/build/pdfmake.min.js"></script>
    <script src="{{ url('asset') }}/vendors/bower_components/pdfmake/build/vfs_fonts.js"></script>

    <script src="{{ url('asset') }}/vendors/bower_components/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ url('asset') }}/vendors/bower_components/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="{{ url('asset') }}/elmer/full-width-light/dist/js/export-table-data.js"></script>


</body>

</html>
