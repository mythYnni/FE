<!-- :: Header Bar -->
<header class="header-bar fixed-top">

    <!-- :: Top Bar -->
    <div class="top-bar">
        <div class="container">
            <ul class="left-top-bar">
                <li><a href="#" style="font-size: 16px;">Công Ty TNHH Tư Vấn S&D Laws</a></li>
            </ul>
            <ul class="right-top-bar">
                <li><a href="#" style="border-right: 1px solid rgba(255, 255, 255, 0.2); font-size: 16px;">Hotline: 0903236618</a></li>
                <li><a href="#" style="font-size: 16px;">congtytnhhsdl@gmail.com</a></li>
                {{-- <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                <li><a href="#"><i class="fab fa-behance"></i></a></li> --}}
            </ul>
        </div>
    </div>

    <!-- :: Nav Bar -->
    <nav id="nav-bar" class="nav-bar">
        <div class="container">
            <div class="brand">
                <a href="{{ route('S&D_Home') }}" class="website-logo">
                    <img class="img-fluid one" src="{{ url('asset') }}/images/logo/SD-01.png" alt="01 Logo">
                    <img class="img-fluid two" src="{{ url('asset') }}/images/logo/SD-01.png" alt="02 Logo">
                </a>
                <a href="#open-nav-bar-menu" class="nav-bar-menu">
                    <span></span>
                    <span></span>
                    <span></span>
                </a>
            </div>
            <div id="open-nav-bar-menu" class="collapse-nav-bar">
                <ul class="level-1">
                    <li><a href="{{ route('S&D_Home') }}">Trang Chủ</a></li>
                    <li><a href="{{ route('S&D_About') }}">Giới Thiệu</a></li>
                    <li class="has-menu">
                        <a href="#">Thủ Tục Hành Chính</a>
                        <ul class="level-2">
                            @foreach ($category_aProce as $value)
                                <li><a href="{{route('category_blog_aProce', $value->linkText)}}">{{$value->name}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="has-menu">
                        <a href="#">Tư Vấn Pháp Luật</a>
                        <ul class="level-2">
                            @foreach ($category_lAdvice as $value)
                                <li><a href="{{route('category_blog_lAdvice', $value->linkText)}}">{{$value->name}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li><a href="{{ route('S&D_Contact') }}">Liên Hệ</a></li>
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
    </nav>
</header>
