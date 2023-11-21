@extends ('admin_view.master')
@section('view_create_serviceprices')
<div class="container-fluid">
     <!-- Title -->
     <div class="row heading-bg">
          <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
               <h5 class="txt-dark">Chỉnh Sửa Gói Dịch Vụ</h5>
          </div>

          <!-- Breadcrumb -->
          <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
               <ol class="breadcrumb">
                    <li><a href="{{ route('S&D_Admin_Home') }}">Trang Chủ</a></li>
                    <li><a href="{{ route('list_sPrice') }}"><span>Quản Lý Gói Dịch Vụ</span></a></li>
                    <li class="active"><span>Chỉnh Sửa</span></li>
               </ol>
          </div>
          <!-- /Breadcrumb -->

     </div>
     <!-- /Title -->

     <!-- Row -->
     <div class="row">
          <div class="col-md-12">
               <div class="panel panel-default card-view">
                    <div class="panel-heading">
                         <div class="pull-left">
                              <h6 class="panel-title txt-dark">Thông Tin Gói</h6>
                         </div>
                         <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper collapse in">
                         <div class="panel-body">
                              <div class="row">
                                   <div class="col-md-12">
                                        <div class="form-wrap">
                                             <div class="row no-gutters">
                                                  <div class="col-md-5" style="padding: 0px;">
                                                       <div class="form-group col-md-7 @error('nameService') has-error has-danger @enderror">
                                                            <label for="inputName" class="control-label mb-10">Tên Gói</label>
                                                            <input type="text" class="form-control" id="slug" onkeyup="ChangeToSlug();" readonly placeholder="ví dụ: Gói 1" name="nameService" value="{{ $obj->nameService }}">
                                                            @error('nameService')
                                                            <div class="help-block with-errors" style="color: red;">
                                                                 <ul class="list-unstyled">
                                                                      <li>{{ $message }}</li>
                                                                 </ul>
                                                            </div>
                                                            @enderror
                                                       </div>
                                                       <div class="form-group col-md-5">
                                                            <label class="control-label mb-10">Đường Dẫn Sạch</label>
                                                            <input type="text" class="form-control" id="convert_slug" placeholder="ví dụ: goi-1" readonly name="linkText" value="{{ $obj->linkText }}">
                                                       </div>
                                                       <div class="form-group col-md-12 @error('begin') has-error has-danger @enderror" style="margin-bottom: 0px">
                                                            <label for="inputPassword" class="control-label mb-10">Thời Gian Thực
                                                                 Hiện</label>
                                                            <div class="row">
                                                                 <div class="form-group col-sm-6">
                                                                      <input type="number" readonly class="form-control" placeholder="Thời Gian 1" readonly name="begin" step="1" min="1" value="{{ $begin }}">
                                                                      @error('begin')
                                                                      <div class="help-block with-errors" style="color: red;">
                                                                           <ul class="list-unstyled">
                                                                                <li>{{ $message }}</li>
                                                                           </ul>
                                                                      </div>
                                                                      @enderror
                                                                      <div class="help-block">Thời Gian Dự Tính Ban Đầu!</div>
                                                                 </div>
                                                                 <div class="form-group col-sm-6 @error('end') has-error has-danger @enderror">
                                                                      <input type="number" readonly class="form-control" placeholder="Thời Gian 2" name="end" step="1" min="1" value="{{ $end }}">
                                                                      @error('end')
                                                                      <div class="help-block with-errors" style="color: red;">
                                                                           <ul class="list-unstyled">
                                                                                <li>{{ $message }}</li>
                                                                           </ul>
                                                                      </div>
                                                                      @enderror
                                                                      <div class="help-block">Thời Gian Dự Tính Hoàn Thành!</div>
                                                                 </div>
                                                            </div>
                                                       </div>
                                                       <div class="form-group col-md-12 @error('price') has-error has-danger @enderror">
                                                            <label for="inputAccount" class="control-label mb-10">Giá Gói</label>
                                                            <input type="number" readonly class="form-control" id="inputAccount" placeholder="ví dụ: 500000(vnđ)" name="price" min="50" value="{{ $price }}" max="100000000000">
                                                            @error('price')
                                                            <div class="help-block with-errors" style="color: red;">
                                                                 <ul class="list-unstyled">
                                                                      <li>{{ $message }}</li>
                                                                 </ul>
                                                            </div>
                                                            @enderror
                                                            <div class="help-block">Viết Đúng và Đử Chữ Số Giá Tiền Bạn Mong Muốn!
                                                                 <br /> Ví Dụ: 500000 (Hiểu Là 5 Trăm Nghìn)
                                                            </div>
                                                       </div>
                                                       <div class="form-group col-md-12">
                                                            <a href="{{ route('view_update_sPrice', $obj->linkText) }}" class="btn btn-success btn-anim"><i class="icon-rocket"></i><span class="btn-text">Chỉnh
                                                                      Sửa</span></a>
                                                       </div>
                                                  </div>
                                                  <div class="col-md-7">
                                                       @error('content')
                                                       <div class="alert alert-danger">
                                                            <strong>Cảnh Báo!</strong> {{ $message }}
                                                       </div>
                                                       @enderror
                                                       <div class="panel panel-default card-view">
                                                            <div class="panel-heading">
                                                                 <div class="pull-left">
                                                                      <h6 class="panel-title txt-dark">Chi Tiết Dịch Vụ</h6>
                                                                 </div>
                                                                 <div class="clearfix"></div>
                                                            </div>
                                                            <div class="panel-wrapper collapse in">
                                                                 <div class="panel-body">
                                                                      <textarea name="content" rows="20" readonly class="summernote">{{ $obj->content }}</textarea>
                                                                 </div>
                                                            </div>
                                                       </div>
                                                  </div>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </div>
     <!-- /Row -->
</div>
@stop
@section('ToastrWellcom')
<script>
     toastr.success('Trang Chi Tiết Gói Dịch Vụ!');
</script>
@stop

