 <div class="fixed-sidebar-left">
     <ul class="nav navbar-nav side-nav nicescroll-bar">
         <li class="navigation-header">
             <span>Chủ Yếu</span>
             <i class="zmdi zmdi-more"></i>
         </li>
         <li>
             <a href="{{ route('S&D_Admin_Home') }}">
                 <div class="pull-left">
                     <i class="fa fa-home mr-20"></i><span class="right-nav-text">Trang Chủ</span>
                 </div>
                 <div class="clearfix"></div>
             </a>
         </li>
         <li>
             <a href="{{route('list_support_view')}}">
                 <div class="pull-left">
                     <i class="fa fa-envelope mr-20"></i><span class="right-nav-text">Hỗ Trợ Khách Hàng</span>
                 </div>
                 <div class="clearfix"></div>
             </a>
         </li>

         <li>
             <hr class="light-grey-hr mb-10" />
         </li>
         <li class="navigation-header">
             <span>Quản Lý</span>
             <i class="zmdi zmdi-more"></i>
         </li>
         <li>
             <a href="javascript:void(0);" data-toggle="collapse" data-target="#ui_dr">
                 <div class="pull-left">
                     <i class="fa fa-file-text-o mr-20"></i>
                     <span class="right-nav-text">Thủ Tục Hành Chính</span>
                 </div>
                 <div class="pull-right">
                     <i class="zmdi zmdi-caret-down"></i>
                 </div>
                 <div class="clearfix"></div>
             </a>
             <ul id="ui_dr" class="collapse collapse-level-1 two-col-list">
                 <li>
                     <a href="{{ route('list_Proce') }}">Danh Sách</a>
                 </li>
                 <li>
                     <a href="{{ route('view_create_Proce') }}">Thêm Mới</a>
                 </li>
                 <li>
                     <a href="{{ route('list_pProce', Auth::user()->linkText) }}">Bài Viết</a>
                 </li>
                 <li>
                     <a href="{{ route('view_create_pProce') }}">Tạo Bài Viết</a>
                 </li>
             </ul>
         </li>
         <li>
             <a href="javascript:void(0);" data-toggle="collapse" data-target="#form_dr">
                 <div class="pull-left">
                     <i class="fa fa-gavel mr-20"></i>
                     <span class="right-nav-text">Tư Vấn Pháp Luật</span>
                 </div>
                 <div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div>
                 <div class="clearfix"></div>
             </a>
             <ul id="form_dr" class="collapse collapse-level-1 two-col-list">
                 <li>
                     <a href="{{ route('list_lAdvice') }}">Danh Sách</a>
                 </li>
                 <li>
                     <a href="{{ route('view_create_lAdvice') }}">Thêm Mới</a>
                 </li>
                 <li>
                     <a href="{{ route('list_pAdvice', Auth::user()->linkText) }}">Bài Viết</a>
                 </li>
                 <li>
                     <a href="{{ route('view_create_pAdvice') }}">Tạo Bài Viết</a>
                 </li>
             </ul>
         </li>
         <li>
             <a href="javascript:void(0);" data-toggle="collapse" data-target="#app_drs">
                 <div class="pull-left">
                     <i class="fa fa-usd mr-20"></i><span class="right-nav-text">Giá Dịch Vụ</span>
                 </div>
                 <div class="pull-right"><i class="zmdi zmdi-caret-down"></i>
                 </div>
                 <div class="clearfix"></div>
             </a>
             <ul id="app_drs" class="collapse collapse-level-1">
                 <li>
                     <a href="{{ route('list_sPrice') }}">Danh Sách</a>
                 </li>
                 <li>
                     <a href="{{ route('view_create_sPrice') }}">Thêm Mới</a>
                 </li>
             </ul>
         </li>
         @if (Auth::user()->decentralization == '1')
             <li>
                 <a href="javascript:void(0);" data-toggle="collapse" data-target="#app_dr">
                     <div class="pull-left">
                         <i class="fa fa-user mr-20"></i><span class="right-nav-text">Quản Lý Tài Khoản</span>
                     </div>
                     <div class="pull-right"><i class="zmdi zmdi-caret-down"></i>
                     </div>
                     <div class="clearfix"></div>
                 </a>
                 <ul id="app_dr" class="collapse collapse-level-1">
                     <li>
                         <a href="{{ route('list_account') }}">Danh Sách Tài Khoản</a>
                     </li>
                     <li>
                         <a href="{{ route('view_create_account') }}">Thêm Mới</a>
                     </li>
                 </ul>
             </li>
         @endif
         {{-- <li>
             <a href="#">
                 <div class="pull-left">
                     <i class="fa fa-male mr-20"></i><span class="right-nav-text">Tuyển Dụng</span>
                 </div>
                 <div class="clearfix"></div>
             </a>
         </li> --}}
     </ul>
 </div>
