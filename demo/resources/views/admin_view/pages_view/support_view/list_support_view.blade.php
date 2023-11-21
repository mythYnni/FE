@extends ('admin_view.master')
@section('list_support')
<div class="container-fluid">
     <!-- Title -->
     <div class="row heading-bg">
          <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
               <h5 class="txt-dark">Danh Sách Khách Hàng</h5>
          </div>

          <!-- Breadcrumb -->
          <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
               <ol class="breadcrumb">
                    <li><a href="{{ route('S&D_Admin_Home') }}">Trang Chủ</a></li>
                    <li class="active"><span>Danh Sách Khách Hàng</span></li>
               </ol>
          </div>
          <!-- /Breadcrumb -->

     </div>
     <!-- /Title -->

     <div class="row">
          <div class="col-sm-12">
               <div class="panel panel-default card-view">
                    <div class="panel-wrapper collapse in">
                         <div class="panel-body">
                              <div class="table-wrap">
                                   <div class="table-responsive">
                                        <table id="example" class="table table-hover display  pb-30">
                                             <thead>
                                                  <tr>
                                                       <th>#</th>
                                                       <th>Tên Khách Hàng</th>
                                                       <th>Phone</th>
                                                       <th>Email</th>
                                                       <th>Ngày Gửi</th>
                                                       <th>Trạng Thái</th>
                                                       <th>Khó Khăn/ Tình Trạng</th>
                                                       <th>Action</th>
                                                  </tr>
                                             </thead>
                                             <tfoot>
                                                  <tr>
                                                       <th>#</th>
                                                       <th>Tên Khách Hàng</th>
                                                       <th>Phone</th>
                                                       <th>Email</th>
                                                       <th>Ngày Gửi</th>
                                                       <th>Trạng Thái</th>
                                                       <th>Khó Khăn/ Tình Trạng</th>
                                                       <th>Action</th>
                                                  </tr>
                                             </tfoot>
                                             <tbody>
                                                   @foreach ($list as $value)
                                                   <tr>
                                                        <td>{{ $loop->index + 1 }}</td>
                                                        <td>{{ $value->name }}</td>
                                                        <td>{{ $value->phone }}</td>
                                                        <td>{{ $value->email }}</td>
                                                        <td>{{ $value->dateCreated }}</td>
                                                        <td>
                                                            @if ($value->status === 0)
                                                                 <span class="label label-info">Đang Chờ</span>
                                                            @elseif ($value->status === 1)
                                                                 <span class="label label-warning">Đang Xử Lý</span>
                                                            @elseif ($value->status === 2)
                                                                 <span class="label label-success">Thành Công</span>
                                                            @endif
                                                        </td>
                                                        <td>{{ $value->content }}</td>
                                                        <td>
                                                             <a href="{{ route('view_update_support', $value->linkText) }}" class="text-inverse pr-10" title="Edit" data-toggle="tooltip"><i class="zmdi zmdi-edit txt-warning"></i>
                                                             </a>
                                                             <a href="{{route('delete_support', $value->linkText) }}" class="text-inverse" title="Delete" data-toggle="tooltip" onclick="return confirm('Bạn Có Chắc Muốn Xóa Không?')"><i class="zmdi zmdi-delete txt-danger"></i>

                                                             </a>
                                                        </td>
                                                   </tr>
                                                   @endforeach
                                             </tbody>
                                        </table>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </div>
</div>

@include('admin_view.layouts_view.modal')
@stop
@section('ToastrWellcom')
<script>
     toastr.success('Trang Danh Sách Khách Hàng Cần Hỗ Trợ');
</script>
@stop

