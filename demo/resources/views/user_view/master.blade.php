<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>S&D - Công Ty TNHH Tư Vấn S&D Laws</title>

     <!-- :: Favicon -->
     <link rel="icon" type="image/png" href="{{url('asset')}}/images/logo/logo_05.png">

     <!-- :: Google Fonts -->
     <link rel="stylesheet" href="{{url('asset')}}/fonts/googlefonts/googleFonts.css">
     <link rel="stylesheet" href="{{url('asset')}}/fonts/googlefonts/googleFonts2.css">

     <!-- :: Flaticon CSS -->
     <link rel="stylesheet" href="{{url('asset')}}/fonts/flaticon/css/flaticon.css">

     <!-- :: Fontawesome CSS -->
     <link rel="stylesheet" href="{{url('asset')}}/fonts/fontawesome/css/all.min.css">

     <!-- :: Bootstrap CSS -->
     <link rel="stylesheet" href="{{url('asset')}}/css/bootstrap.min.css">

     <!-- :: Owl Carousel CSS -->
     <link rel="stylesheet" href="{{url('asset')}}/css/owl.carousel.min.css">
     <link rel="stylesheet" href="{{url('asset')}}/css/owl.theme.default.css">

     <!-- :: Animate CSS -->
     <link rel="stylesheet" href="{{url('asset')}}/css/animate.css">

     <!-- :: Style CSS -->
     <link rel="stylesheet" href="{{url('asset')}}/css/style.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

     <!-- :: Style Responsive CSS -->
     <link rel="stylesheet" href="{{url('asset')}}/css/responsive.css">

     <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
     <![endif]-->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
     <!-- :: Loading -->
     @include('user_view.layouts_view.loadingView')
     <!-- :: Header Bar -->
     {{-- @include('user_view.layouts_view.headerBar') --}}
     @yield('headerBar')
     <!-- :: Search Box -->
     @include('user_view.layouts_view.searchBox')

     <!-- :: PAGES -->
     @yield('S&DHome')
     @yield('S&DAbout')
     @yield('S&DBlog')
     @yield('Blog_Detail')
     @yield('S&DContact')

     <!-- :: END PAGES -->

     <!-- :: Footer -->
     @include('user_view.layouts_view.footer')
     <!-- :: Scroll Up -->
     @include('user_view.layouts_view.scrollUp')

     @include('user_view.pages_view.modal_price_view.modal_price')

     <!-- :: JS -->
     <!-- :: jQuery -->
     <script src="{{url('asset')}}/js/jquery-3.5.1.min.js"></script>

     <!-- :: Popper -->
     <script src="{{url('asset')}}/js/popper.min.js"></script>

     <!-- :: Bootstrap -->
     <script src="{{url('asset')}}/js/bootstrap.min.js"></script>

     <!-- :: Owl Carousel -->
     <script src="{{url('asset')}}/js/owl.carousel.min.js"></script>

     <!-- :: Waypoints -->
     <script src="{{url('asset')}}/js/jquery.waypoints.min.js"></script>

     <!-- :: CounterUp -->
     <script src="{{url('asset')}}/js/jquery.counterup.min.js"></script>

     <!-- :: Main -->
     <script src="{{url('asset')}}/js/main.js"></script>

     <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

     @yield('javascrip_blog')

     @yield('ajax_blog_modal')

     @yield('sweetalert')

     @if (Session::get('success'))
          <script>
               swal("Gửi Thông Tin Thành Công, Cảm Ơn Bạn Chúng Tôi Sẽ Liên Hệ Sớm Tới Bạn Trong Vài Giờ Tới...", "Thông Báo Chúng Tôi Gửi Đến Bạn!", 'success', {
                    button: true,
                    button: "OK",
                    timer: 50000,
                    dangerMode: true,
               })

          </script>
     @endif

     @if (Session::get('err'))
          <script>
               swal("Gửi Thông Tin Thất Bại, Bạn Không Phiền Hãy Gửi Lại Thông Tin Giúp Chúng Tôi Nhé", "Thông Báo Chúng Tôi Gửi Đến Bạn!", 'error', {
                    button: true,
                    button: "OK",
                    timer: 50000,
                    dangerMode: true,
               })
          </script>
     @endif
</body>

</html>
