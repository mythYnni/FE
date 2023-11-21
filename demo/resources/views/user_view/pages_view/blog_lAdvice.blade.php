 @extends ('user_view.master')
 @section('headerBar')
 @include('user_view.layouts_view.headerBar')
 @stop
 @section('S&DBlog')
 <!-- :: Breadcrumb Header -->
 <section class="breadcrumb-header" id="page">
      <div class="overlay"></div>
      <div class="container">
           <div class="breadcrumb-info">
                <h1>Tư Vấn Pháp Luật</h1>
                <ul class="list-breadcrumb">
                     <li><a href="{{ route('S&D_Home') }}">Trang Chủ</a></li>
                     <li><i class="fas fa-angle-right"></i></li>
                     <li>Tư Vấn Pháp Luật</li>
                </ul>
           </div>
      </div>
 </section>

 <!-- :: Blog Style 1 -->
 <section class="blog py-100">
      <div class="container">
           <div class="row">
                <div class="col-lg-8">
                     <div class="row">
                          @foreach ($list_lAdvice as $value)
                          <div class="col-md-6">
                               <div class="blog-item">
                                   <div class="text-box">
                                        <div class="admin-post">
                                             <img class="img-fluid" src="{{ $value->imgUser }}" alt="01 Admin Post">
                                             <div class="info-post">
                                                  <span>{{ $value->nameUser }}</span>
                                                  <span><i class="flaticon-calendar-1"></i> {{ $value->dateCreated }}</span>
                                             </div>
                                        </div>
                                        <div class="post">
                                             <h5 class="title-post">
                                                  <a style="cursor: pointer;" class="blog_detail" data-id="{{ $value->linkText }}">{{ $value->title }}</a>
                                             </h5>
                                             <p style="width: 100%;overflow: hidden;text-overflow: ellipsis;line-height: 25px;-webkit-line-clamp: 3;height: 75px;display: -webkit-box;-webkit-box-orient: vertical;">
                                                  {{ strip_tags($value->content) }}
                                             </p>
                                             <a style="cursor: pointer;" class="blog_detail more" data-id="{{ $value->linkText }}">Chi Tiết</a>
                                        </div>
                                   </div>
                               </div>
                          </div>
                          @endforeach
                     </div>
                </div>
                <div class="col-lg-4">
                     <div class="widget">
                          <div class="widget-title">
                               <h3>Danh Mục</h3>
                          </div>
                          <div class="categories">
                               <ul>
                                    @foreach ($category_lAdvice as $value)
                                    <li>
                                         <a href="{{route('category_blog_lAdvice', $value->linkText)}}"><i class="fas fa-folder-open"></i> {{ $value->name }}
                                              @if ($value->PostsAdvice)
                                                  <span>({{$value->PostsAdvice->count()}})</span>
                                              @else
                                                  <span>(0)</span>
                                              @endif
                                         </a>
                                    </li>
                                    @endforeach

                               </ul>
                          </div>
                     </div>
                     <div class="widget">
                          <div class="widget-title">
                               <h3>Tags</h3>
                          </div>
                          <div class="widget-body">
                               <div class="tags">
                                    <ul>
                                         @foreach ($category_lAdvice as $value)
                                         <li><a href="{{route('category_blog_lAdvice', $value->linkText)}}">{{ $value->name }}</a></li>
                                         @endforeach
                                    </ul>
                               </div>
                          </div>
                     </div>
                     @if(!empty($list_qc) && count($list_qc) > 0)
                     <div class="widget">
                          <div class="widget-title">
                               <h3>Quảng Cáo</h3>
                          </div>
                          <div class="widget-body">
                               <div class="testimonials">
                                    <div class="testimonials-box testimonials-box-home-1 owl-carousel owl-theme">

                                         @foreach ($list_qc as $value)

                                         <div class="box-item">
                                              <a class="item" target="_blank" href="{{$value->link}}"><img src="{{$value->image}}" class="rounded" alt="Cinque Terre" style="width: 100%;"></a>

                                         </div>

                                         @endforeach
                                    </div>
                               </div>
                          </div>
                     </div>
                     @endif
                </div>
                <div class="col-lg-12">
                     <div class="pagination-blog-area">
                          <ul class="pagination">
                               @if (ceil($list_lAdvice->total() / 8) > 1)
                               <?php
                                 $current_page = isset($_GET['page']) ? $_GET['page'] : '1';
                                 $page = $current_page - 1;
                                 $pages = $current_page + 1;
                                 $maxPage = ceil($list_lAdvice->total() / 8);
                                 $check = $current_page;
                                 ?>
                               <div>
                                    @if ($check > 1)
                                    <a href="?page={{ $page }}">«</a>
                                    @else
                                    @endif

                                    @for ($i = 1; $i <= ceil($list_lAdvice->total() / 8); $i++)
                                         <a class="page-item {{ $i == $list_lAdvice->currentPage() ? 'active' : '' }}" href="?page={{ $i }}">{{ $i }}</a>
                                         @endfor

                                         @if ($check < $maxPage) <a href="?page={{ $pages }}">»</a>
                                              @else
                                              @endif
                               </div>
                               @else
                               @endif
                          </ul>
                     </div>
                </div>
           </div>
      </div>
 </section>
 @include('user_view.pages_view.modal_view.blog_modal_datail_IAdivice')
 @stop
 @section('ajax_blog_modal')
 <script src="{{url('asset')}}/js/blog_ajax/modal.js"></script>

 @stop
