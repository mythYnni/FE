@extends ('admin_view.master')
@section('list_lAdvice')
    <div class="container-fluid">
        <!-- Title -->
        <div class="row heading-bg">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">Danh Sách Danh Mục Tư Vấn Pháp Luật</h5>
            </div>

            <!-- Breadcrumb -->
            <div class="col-lg-8 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="{{ route('S&D_Admin_Home') }}">Trang Chủ</a></li>
                    <li class="active"><span>Danh Sách Danh Mục Tư Vấn Pháp Luật</span></li>
                </ol>
            </div>
            <!-- /Breadcrumb -->

        </div>
        <!-- /Title -->

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default card-view">
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <div class="contact-list">
                                <div class="row">
                                    <aside class="col-lg-12 col-md-12">
                                        <div class="panel" style="border-left: 0px solid #dedede;">
                                            <div class="panel-wrapper collapse in">
                                                <div class="panel-body  pa-0">
                                                    <div class="table-responsive mb-30">
                                                        <table id="datable_1" class="table  display table-hover mb-30"
                                                            data-page-size="10">
                                                            <thead>
                                                                <tr>
                                                                    <th>No</th>
                                                                    <th>Tên Danh Mục</th>
                                                                    <th>Trạng Thái</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($list as $value)
                                                                    <tr>
                                                                        <td>{{ $loop->index + 1 }}</td>
                                                                        <td>{{ $value->name }}</td>
                                                                        <td><span class="label {{ $value->status == 1 ? 'label-success' : 'label-info' }}">{{ $value->status == 1 ? 'Hoạt Động' : 'Ẩn' }}</span></td>
                                                                        <td>
                                                                            <a href="{{ route('update_lAdvice', $value->linkText) }}"
                                                                                class="text-inverse pr-10" title="Edit"
                                                                                data-toggle="tooltip"><i
                                                                                    class="zmdi zmdi-edit txt-warning"></i>
                                                                            </a>
                                                                            <a href="{{ route('delete_lAdvice', $value->linkText) }}"
                                                                                class="text-inverse" title="Delete"
                                                                                data-toggle="tooltip" onclick="return confirm('Bạn Có Chắc Muốn Xóa Không?')">
                                                                                <i class="zmdi zmdi-delete txt-danger"></i>
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
                                    </aside>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('ToastrWellcom')
    <script>
        toastr.success('Trang Danh Sách Danh Mục Tư Vấn Pháp Luật!');
    </script>
@stop
