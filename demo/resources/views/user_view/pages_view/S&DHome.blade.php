 @extends ('user_view.master')
 @section('headerBar')
 @include('user_view.layouts_view.headerBar')
 @stop
 @section('S&DHome')
 <!-- :: Header -->
 @include('user_view.layouts_view.header')

 <!-- :: Features -->
 @include('user_view.layouts_view.features')

 <!-- :: About Us -->
 <section class="about py-100" id="about">
      <div class="overlay-2"></div>
      <div class="container">
           <div class="row">
                <div class="col-lg-6">
                     <div class="text-box">
                          <div class="sec-title">
                               <h2>Thông Tin Về Chúng Tôi</h2>
                               <h3>LÍ DO NÊN LỰA CHỌN S&D LAWS</h3>
                          </div>
                          <p> Làm việc trong lĩnh vực pháp lý đa dạng, thực hiện những dịch vụ pháp lý chuyên nghiệp, hỗ trợ
                               khách hàng đạt được các mục tiêu kinh doanh và cá nhân; xác định và quản lý rủi ro; đàm phán
                               giao dịch và hợp đồng; và giải quyết tranh chấp. Bằng việc lắng nghe khách hàng và thấu hiểu
                               mục tiêu kinh doanh, chúng tôi bố trí đội ngũ luật sư phù hợp với từng dự án một cách hiệu quả
                               và tiết kiệm chi phí...</p>
                          <ul class="core-about-us">
                               <li><i class="fas fa-check"></i>
                                    <h4>Đội Ngũ Chuyên Nghiệp</h4>
                               </li>
                               <li><i class="fas fa-check"></i>
                                    <h4>Chi Phí Hợp Lý</h4>
                               </li>
                               <li><i class="fas fa-check"></i>
                                    <h4>Quy Trình Hiệu Quả</h4>
                               </li>
                               <li><i class="fas fa-check"></i>
                                    <h4>Bảo Mật Thông Tin</h4>
                               </li>
                               <li><i class="fas fa-check"></i>
                                    <h4>Mạng Lưới Mạnh Mẽ</h4>
                               </li>
                               <li><i class="fas fa-check"></i>
                                    <h4>Đối Tác Tin Cậy</h4>
                               </li>
                               <li><i class="fas fa-check"></i>
                                    <h4>Hỗ Trợ 24/7</h4>
                               </li>
                          </ul>
                     </div>
                </div>
                <div class="col-lg-6">
                     <div class="img-box">
                          <div class="about-img">
                               <img class="img-fluid" src="{{ url('asset') }}/images/about/Ceo.jpg" alt="01 About">
                          </div>
                          <div class="atterney-grow">
                               <i class="flaticon-lawyer"></i>
                               <div class="atterney-grow-box">
                                    <h5>CEO - Tổng Giám Đốc</h5>
                                    <span style="font-size: 16px;color: black;font-weight: 500;">Nguyễn Hoàng Sơn</span>

                               </div>
                          </div>
                     </div>
                </div>
           </div>
      </div>
 </section>

 <!-- :: Services -->
 <section class="portfolio py-100-70">
      <div class="container">
           <div class="row">
                <div class="col-md-8 offset-md-2">
                     <div class="sec-title text-center">
                          <h2>Danh Mục Của Chúng Tôi</h2>
                          <h3>Tư Vấn Pháp Luật</h3>
                     </div>
                </div>
           </div>
           <div class="row">
                @foreach ($category_lAdvice as $value)
                <div class="col-md-6 col-lg-4">
                     <div class="portfolio-item">
                          <i class="fas fa-check"></i>
                          <div class="item-box">
                               <span>Bài Viết</span>
                               <h4>{{ $value->name }}</h4>
                               <p style="font-size: 12px;font-weight: 600;line-height: 25px;color: #2c2b2b;">Bài viết từ S&D LAWS hướng tới việc cung cấp pháp lý toàn diện trên tất cả lĩnh vực, đảm bảo cả các vấn đề chuyên môn và kinh nghiệm thực tiễn.
                               </p>
                               <a href="{{route('category_blog_lAdvice', $value->linkText)}}">Xem Thêm</a>
                          </div>
                     </div>
                </div>
                @endforeach
           </div>
      </div>
 </section>

 <!-- :: Performance And Quote -->
 <section class="performance-and-quote py-100">
      <div class="overlay-3"></div>
      <div class="container">
           <div class="row">
                <div class="col-lg-5">
                     <div class="performance">
                          <div class="sec-title">
                               <h2>Hỗ Trợ</h2>
                               <h3>Hỗ Trợ Khách Hàng</h3>
                          </div>
                          <div class="performance-item">
                               <i class="flaticon-handcuffs"></i>
                               <div class="item-box">
                                    <h4>S&D - Công Ty TNHH Tư Vấn S&D Laws.</h4>
                                    <p style="font-weight: 600; margin-bottom: 20px;">Nếu Bạn Có Khắc Mắc Hay Khó Khăn Gì Cần Hỗ Trợ. Xin Hãy Để Lịa
                                         Thông Tin <span style="color: rgb(255, 204, 0); font-size: 15px;">Tại Đây!</span>.</p>
                                    <div style="">
                                         <a href="{{ route('S&D_Contact') }}" class="btn-1">Liên Hệ</a>
                                    </div>
                               </div>
                          </div>
                     </div>
                </div>
                <div class="col-lg-7">
                     <div class="quote">
                          <div class="sec-title">
                               <h2>Thông Tin</h2>
                               <h3>Giá Gói Dịch Vụ</h3>
                          </div>
                          @foreach ($list_sPrice as $value)
                          <div class="sPrice">
                               <h4>{{ $value->nameService }}</h4>
                               <h5>Thời Gian: {{ $value->workingTime }}<span>Giá:
                                         {{ $value->price }}</span></h5>
                          </div>
                          @endforeach
                          <a style="cursor: pointer;" class="blog_detail_price more btn-1">Xem Chi Tiết Bảng Giá Dịch Vụ</a>

                     </div>
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
                     <img class="img-fluid logo-contact" src="{{ url('asset') }}/images/logo/logo_05.png" alt="Logo Contact">
                     <div class="sec-title">
                          <h2>LUẬT SƯ KINH NGHIỆM</h2>
                          <h3>Cần Lời Khuyên Từ Luật Sư Chuyên Gia</h3>
                     </div>
                     <div class="phone-number">+ 2107 Người Cần Lời Khuyên</div>
                     <div class="buttons">
                          <a href="{{ route('S&D_Contact') }}" class="btn-1">Liên Hệ Ngay</a>
                     </div>
                </div>
           </div>
      </div>
 </section>

 <!-- :: Portfolio -->
 <section class="portfolio py-100-70">
      <div class="container">
           <div class="row">
                <div class="col-md-8 offset-md-2">
                     <div class="sec-title text-center">
                          <h2>Danh Mục Của Chúng Tôi</h2>
                          <h3>Thủ Tục Hành Chính</h3>
                     </div>
                </div>
           </div>
           <div class="row">
                @foreach ($category_aProce as $value)
                <div class="col-md-6 col-lg-4">
                     <div class="portfolio-item">
                          <i class="fas fa-check"></i>
                          <div class="item-box">
                               <span>Bài Viết</span>
                               <h4>{{ $value->name }}</h4>
                               <p style="font-size: 12px;font-weight: 600;line-height: 25px;color: #2c2b2b;">Bài viết từ S&D LAWS hướng tới việc cung cấp pháp lý toàn diện trên tất cả lĩnh vực, đảm bảo cả các vấn đề chuyên môn và kinh nghiệm thực tiễn.
                               </p>
                               <a href="{{route('category_blog_aProce', $value->linkText)}}">Xem Thêm</a>
                          </div>
                     </div>
                </div>
                @endforeach
           </div>
      </div>
 </section>

 <!-- :: Testimonials And Subscribe -->
 <section class="testimonials-and-subscribe py-100">
      <div class="container">
           <div class="row">
                <div class="col-lg-8 offset-lg-2">
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
 <script src="{{url('asset')}}/js/blog_ajax/price.js"></script>
 @stop
