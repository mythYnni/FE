@extends ('admin_view.master')
@section('view_update_support')
<div class="container-fluid">
     <!-- Title -->
     <div class="row heading-bg">
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
               <h5 class="txt-dark">Cập Nhật Trạng Thái</h5>
          </div>

          <!-- Breadcrumb -->
          <div class="col-lg-8 col-sm-8 col-md-8 col-xs-12">
               <ol class="breadcrumb">
                    <li><a href="{{ route('S&D_Admin_Home') }}">Trang Chủ</a></li>
                    <li><a href="{{ route('list_support_view')}}"><span>Danh Sách Khách Hàng</span></a></li>
                    <li class="active"><span>Cập Nhật</span></li>
               </ol>
          </div>
          <!-- /Breadcrumb -->

     </div>
     <!-- /Title -->

     <!-- Row -->
     <div class="row">
          <div class="col-md-6 col-md-offset-3">
               <div class="panel panel-default card-view">
                    <div class="panel-heading">
                         <div class="pull-left">
                              <h6 class="panel-title txt-dark">Cập Nhật Trạng Thái</h6>
                         </div>
                         <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper collapse in">
                         <div class="panel-body">
                              <div class="row">
                                   <div class="col-md-12">
                                        <div class="form-wrap">
                                             <form data-toggle="validator" class="row no-gutters" role="form" method="post" enctype="multipart/form-data">
                                                  @csrf
                                                  <div class="form-group col-md-12">
                                                       <label class="control-label mb-10">Trạng Thái</label>
                                                       <select class="selectpicker" data-style="btn-primary btn-outline" name="status">
                                                            <option value="0" {{ $obj->status === 0 ? 'selected' : '' }}>Đang Chờ</option>
                                                            <option value="1" {{ $obj->status === 1 ? 'selected' : '' }}>Đang Xử Lý</option>
                                                            <option value="2" {{ $obj->status === 2 ?'selected' : '' }}>Thành Công</option>
                                                       </select>
                                                  </div>
                                                   <div class="form-group col-md-12">
                                                        <label for="exampleFormControlTextarea1">Tình Trạng</label>
                                                        <textarea class="form-control" id="exampleFormControlTextarea1" name="content" rows="5">{{ $obj->content}}</textarea>

                                                   </div>
                                                  <div class="form-group col-md-12">
                                                       <button type="submit" class="btn btn-success btn-anim"><i class="icon-rocket">
                                                            </i><span class="btn-text">Cập Nhật</span></button>
                                                  </div>
                                             </form>
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
     toastr.success('Chỉnh Sửa Trạng Thái Khách Hàng!');

</script>
@stop
