 @extends ('user_view.master')
 @section('headerBar')
 @include('user_view.layouts_view.headerBar')
 @stop
 @section('S&DContact')
 <!-- :: Breadcrumb Header -->
 <section class="breadcrumb-header" id="page">
      <div class="overlay"></div>
      <div class="container">
           <div class="breadcrumb-info">
                <h1>Thông Tin Doanh Nghiệp</h1>
                <ul class="list-breadcrumb">
                     <li><a href="{{ route('S&D_Home') }}">Trang Chủ</a></li>
                     <li><i class="fas fa-angle-right"></i></li>
                     <li>Liên Hệ</li>
                </ul>
           </div>
      </div>
 </section>

 <!-- :: Statistic -->
 <div class="statistic home-3">
      <div class="container">
           <div class="row box">
                <div class="col-sm-6 col-md-6 col-lg-3">
                     <div class="statistic-item">
                          <i class="flaticon-law-book"></i>
                          <div class="count">1682</div>
                          <div class="name-count">Hồ Sơ Tiếp Nhận</div>
                     </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-3">
                     <div class="statistic-item">
                          <i class="flaticon-judge"></i>
                          <div class="count">1456</div>
                          <div class="name-count">Hồ Sơ Xử Lý Thành Công</div>

                     </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-3">
                     <div class="statistic-item">
                          <i class="flaticon-sheriff"></i>
                          <div class="count">1211</div>
                          <div class="name-count">Khách Hàng Hài Lòng Và Quay Lại</div>
                     </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-3">
                     <div class="statistic-item">
                          <i class="flaticon-badge"></i>
                          <div class="count">265</div>
                          <div class="name-count">Khách Hàng/Tháng</div>
                     </div>
                </div>
           </div>
      </div>
 </div>

 <!-- :: Performance And Quote -->
 <section class="performance-and-quote py-100">
      <div class="overlay-3"></div>
      <div class="container">
           <div class="row">
                <div class="col-lg-6 no-gutters">
                     <div class="performance no-gutters">
                          <div class="sec-title">
                               <h2>Thông Tin Về Chúng Tôi</h2>
                               <h3>Thông Tin Liên Lạc</h3>
                          </div>
                          <div class="performance-item col-lg-12">
                               <i class="fas fa-archway"></i>
                               <div class="item-box">
                                    <h4>Công Ty TNHH Tư Vấn S&D Laws</h4>
                                    <p>S&D Là Một Tổ Chức Cung Cấp Dịch Vụ Tư Vấn Pháp Lý Chuyên Nghiệp Với Đội Ngũ Chuyên Môn Giàu Kinh Nghiệm, Hướng Tới Sự Hài Lòng Của Khách Hàng.</p>
                               </div>
                          </div>
                          <div class="performance-item col-lg-12">
                               <i class="fas fa-user-alt"></i>
                               <div class="item-box">
                                    <h4>(CEO) Tổng Giám Đốc</h4>
                                    <p>Nguyễn Hoàng Sơn</p>
                               </div>
                          </div>
                          <div class="performance-item col-lg-12">
                               <i class="fas fa-phone"></i>
                               <div class="item-box">
                                    <h4>Điện Thoại</h4>
                                    <p>Liên Lạc Trực Tiếp: 0903 236 618</p>
                               </div>
                          </div>
                          <div class="performance-item col-lg-12">
                               <i class="fas fa-envelope-open-text"></i>
                               <div class="item-box">
                                    <h4>Email Liên Hệ</h4>
                                    <p>congtytnhhsdl@gmail.com</p>
                               </div>
                          </div>
                          <div class="performance-item col-lg-12">
                               <i class="fas fa-map-marker-alt"></i>
                               <div class="item-box">
                                    <h4>Địa Chỉ Văn Phòng</h4>
                                    <p>Số 31, Ngõ 389 Trương Định, Quận Hoàng Mai, Thành Phố Hà Nội.</p>
                               </div>
                          </div>
                     </div>
                </div>
                <div class="col-lg-6">
                     <form class="quote" action="{{route('contact_support')}}" data-toggle="validator" role="form" method="post" enctype="multipart/form-data">
                          @csrf
                          <div class="sec-title">
                               <h2>Nhận Hỗ Trợ</h2>
                               <h3>Khách Hàng Cần Hỗ Trợ</h3>
                          </div>
                          <div class="quote-item">
                               <label>Họ và Tên</label>
                               <input type="text" name="name" value="{{old('name')}}" placeholder="Nhập Tên Đầy Đủ Của Bạn.">
                               <i class="fas fa-user-alt"></i>
                               @error('name')
                               <div class="help-block with-errors" style=" color: #f33923; margin: 5px 0px 0px 0px;">
                                    <ul class="list-unstyled">
                                         <li>{{$message}}</li>
                                    </ul>
                               </div>
                               @enderror
                          </div>
                          <div class="quote-item">
                               <label>Email</label>
                               <input type="email" name="email" value="{{old('name')}}" placeholder="Nhập Email Của Bạn.">
                               <i class="far fa-envelope"></i>
                               @error('email')
                               <div class="help-block with-errors" style=" color: #f33923; margin: 5px 0px 0px 0px;">
                                    <ul class="list-unstyled">
                                         <li>{{$message}}</li>
                                    </ul>
                               </div>
                               @enderror
                          </div>
                          <div class="quote-item">
                               <label>Phone</label>
                               <input type="text" name="phone" value="{{old('name')}}" placeholder="Nhập Phone Của Bạn.">
                               <i class="fas fa-phone"></i>
                               @error('phone')
                               <div class="help-block with-errors" style=" color: #f33923; margin: 5px 0px 0px 0px;">
                                    <ul class="list-unstyled">
                                         <li>{{$message}}</li>
                                    </ul>
                               </div>
                               @enderror
                          </div>
                          <div class="quote-item">
                               <label>Vấn Đề Cần Hỗ Trợ</label>
                               <textarea name="content" placeholder="Vấn Đề Cần Hỗ Trợ.">{{old('content')}}</textarea>
                               <i class="far fa-edit"></i>
                          </div>
                          <div class="quote-item">
                               <button type="submit" class="btn-1">Hỗ Trợ Tôi</button>
                          </div>
                     </form>
                </div>
           </div>
      </div>
 </section>

 <!-- :: Contact -->
 <section class="contact text-center py-100">
      <div class="overlay-4"></div>
      <div class="container">
           <div class="row">
                <div class="col-md-8 offset-md-2">
                     <div class="testimonials">
                          <div class="subscribe" style="width: 100%;">
                               <div class="sec-title">
                                    <h2>Cơ Hội</h2>
                                    <div style="text-align: center; margin: 15px 0px 10px 0px; color: black;">
                                         <h4 style="font-weight: 700;">PHÁT TRIỂN NGHỀ LUẬT</h4>
                                         <p style="margin: 20px 0px 0px 0px;font-size: 15px; font-weight: 600;color: black;">S&D
                                              cam kết và sẵn sàng hướng dẫn nghề nghiệp cho các sinh viên chuyên ngành liên
                                              quan cũng như những người mới tốt nghiệp. Bất kỳ sinh viên nào có tư duy tìm tòi và
                                              mong muốn tiến bộ đều có cơ hội thực tập để tiếp thu kinh nghiệm ở S&D. Thông qua
                                              chương trình thực tập tại S&D, chúng tôi không chỉ tạo cơ hội học tập cho các bạn
                                              trẻ mà chúng tôi cũng tiếp nhận được những quan điểm, tư duy mới mẻ và đầy sức sống
                                              từ thế hệ tương lai tài năng của nghề luật sư, nghiên cứu pháp lý, hoạt động thực
                                              tiễn, làm việc trong cơ quan nhà nước hay tòa án.
                                              <br />
                                              <br />
                                              Sinh viên mong muốn thực tập tại S&D vui lòng gửi sơ yếu lí lịch cá nhân và thư bày
                                              tỏ nguyện vọng tới địa chỉ hòm thư <span style="color: #ba1a1a; font-size: 20px; font-weight: 700;">
                                                   congtytnhhsdl@gmail.com</span>
                                         </p>
                                    </div>
                               </div>
                          </div>
                     </div>
                </div>
           </div>
      </div>
 </section>


 <!-- :: Blog -->
 <section class="blog py-100-70">
      <div class="container">
           <div class="row">
                <div class="col-md-8 offset-md-2">
                     <div class="sec-title text-center">
                          <h2>Bài Viết</h2>
                          <h3>Bài Viết Của Chúng Tôi</h3>
                     </div>
                </div>
           </div>
           <div class="row">
                @foreach ($list_lAdvice as $value)
                <div class="col-md-4">
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
 </section>
 @include('user_view.pages_view.modal_view.blog_modal_datail_IAdivice')
 @stop
 @section('ajax_blog_modal')
 <script src="{{url('asset')}}/js/blog_ajax/modal.js"></script>
 @stop
 @section('sweetalert')
     @if($errors->any() > 0)
          <script>
               swal("Thông Tin Bạn Cung Cấp Có Lỗi, Bạn Kiểm Tra Lại Xem Nhé!", "Thông Báo Chúng Tôi Gửi Đến Bạn!", 'error', {
                    button: true,
                    button: "OK",
                    timer: 50000,
                    dangerMode: true,
               })
          </script>
     @endif
 @stop
