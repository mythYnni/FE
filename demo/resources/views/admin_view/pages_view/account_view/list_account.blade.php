@extends ('admin_view.master')
@section('list_account')
    <div class="container-fluid">
        <!-- Title -->
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">Danh Sách Tài Khoản</h5>
            </div>

            <!-- Breadcrumb -->
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="{{ route('S&D_Admin_Home') }}">Trang Chủ</a></li>
                    <li class="active"><span>Danh Sách Tài Khoản</span></li>
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
                                                                    <th>Họ và Tên</th>
                                                                    <th>Tài Khoản</th>
                                                                    <th>Phone</th>
                                                                    <th>Email</th>
                                                                    <th>Giới Tính</th>
                                                                    <th>Vai Trò</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($listAc as $value)
                                                                    <tr>
                                                                        <td>{{ $loop->index + 1 }}</td>
                                                                        <td>{{ $value->fullName }}</td>
                                                                        <td>{{ $value->accountName }}</td>
                                                                        <td>{{ $value->phone }}</td>
                                                                        <td>{{ $value->email }}</td>
                                                                        <td>
                                                                            {{ $value->sex == 0 ? 'Nam' : 'Nữ' }}
                                                                        </td>
                                                                        <td>
                                                                            <span
                                                                                class="label {{ $value->decentralization == 1 ? 'label-success' : 'label-info' }}">{{ $value->decentralization == 1 ? 'Nhà Phát Triển' : 'Nhà Thiết Kế' }}</span>
                                                                        </td>

                                                                        <td>
                                                                            <a class="text-inverse pr-10 showacc"
                                                                                title="Show" alt="default"
                                                                                data-toggle="tooltip"
                                                                                data-id="{{ $value->linkText }}">
                                                                                <i class="fa fa-eye txt-success"></i>
                                                                            </a>
                                                                            @if ($value->accountName != 'admin@99.s&d')
                                                                                <a href="{{ route('update-account', $value->linkText) }}"
                                                                                    class="text-inverse pr-10"
                                                                                    title="Edit" data-toggle="tooltip"><i
                                                                                        class="zmdi zmdi-edit txt-warning"></i>
                                                                                </a>
                                                                                <a href="{{route('detete_account', $value->linkText) }}" class="text-inverse" title="Delete" data-toggle="tooltip" onclick="return confirm('Bạn Có Chắc Muốn Xóa Không?')"><i
                                                                                        class="zmdi zmdi-delete txt-danger"></i>
                                                                                </a>
                                                                            @endif
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

    @include('admin_view.layouts_view.modal')
@stop
@section('ToastrWellcom')
    <script>
        toastr.success('Trang Danh Sách Tài Khoản!');
    </script>
@stop
