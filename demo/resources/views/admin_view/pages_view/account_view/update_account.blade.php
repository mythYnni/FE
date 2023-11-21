@extends ('admin_view.master')
@section('view_create_account')
    <div class="container-fluid">
        <!-- Title -->
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">Cập Nhật Tài Khoản </h5>
            </div>

            <!-- Breadcrumb -->
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="{{ route('S&D_Admin_Home') }}">Trang Chủ</a></li>
                    <li><a href="{{ route('list_account') }}"><span>Quản Lý Tài Khoản</span></a></li>
                    <li class="active"><span>Thêm Mới</span></li>
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
                            <h6 class="panel-title txt-dark">Thông Tin Tài Khoản</h6>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-wrap">
                                        <form data-toggle="validator"
                                            class="row no-gutters" role="form" method="post">
                                            @csrf
                                            <div class="col-md-8" style="padding: 0px;">
                                                <div
                                                    class="form-group col-md-8 ">
                                                    <label for="inputName" class="control-label mb-10">Tên Người
                                                        Dùng</label>
                                                    <input type="text" class="form-control" placeholder="ví dụ: Lê Tiến Đạt"
                                                        readonly value="{{ $account->fullName }}">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="control-label mb-10">Đường Dẫn Sạch</label>
                                                    <input type="text" class="form-control"
                                                        placeholder="##########" readonly>
                                                </div>
                                                <div
                                                    class="form-group col-md-5">
                                                    <label for="inputAccount" class="control-label mb-10">Tên Tài
                                                        Khoản</label>
                                                    <input type="text" class="form-control" id="inputAccount"
                                                        placeholder="ví dụ: tiendat001.s&d" readonly
                                                        value="{{ $account->accountName }}">
                                                </div>
                                                <div
                                                    class="form-group col-md-7">
                                                    <label for="inputEmail" class="control-label mb-10">Email</label>
                                                    <input type="email" class="form-control" id="inputEmail"
                                                        placeholder="user@gmail.com"
                                                        value="{{ $account->email }}" readonly>
                                                </div>
                                                <div
                                                    class="form-group col-md-5 @error('phone') has-error has-danger @enderror">
                                                    <label for="inputPhone" class="control-label mb-10">Số Điện
                                                        Thoại</label>
                                                    <input type="text" class="form-control" id="inputPhone"
                                                        placeholder="Ví Dụ: 0897226868"
                                                        value="{{ $account->phone }}" readonly>
                                                    @error('phone')
                                                        <div class="help-block with-errors">
                                                            <ul class="list-unstyled">
                                                                <li>{{ $message }}</li>
                                                            </ul>
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-7">
                                                    <label class="control-label mb-10">Phân Quyền</label>
                                                    <select class="selectpicker" data-style="btn-primary btn-outline"
                                                        name="decentralization">
                                                        <option value="0"
                                                            {{ $account->decentralization == 0 ? 'selected' : '' }}>Nhà
                                                            Thiết Kế</option>
                                                        <option value="1"
                                                            {{ $account->decentralization == 1 ? 'selected' : '' }}>Nhà
                                                            Phát Triển<tbody></tbody>
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-12 @error('checkPass') has-error has-danger @enderror" style="margin-bottom: 0px">
                                                    <label for="inputPassword" class="control-label mb-10">Mật
                                                        Khẩu</label>
                                                    <div class="row">
                                                        <div class="form-group col-sm-6">
                                                            <input type="password" data-minlength="6" class="form-control" placeholder="Mật khẩu" name="updatePass" >
                                                            @error('updatePass')
                                                                <div class="help-block with-errors">
                                                                    <ul class="list-unstyled">
                                                                        <li>{{$message}}</li>
                                                                    </ul>
                                                                </div>
                                                            @enderror
                                                            <div class="help-block">Tối Thiểu 6 Ký Tự</div>
                                                        </div>
                                                        <div class="form-group col-sm-6 @error('checkPass') has-error has-danger @enderror">
                                                            <input type="password" class="form-control" placeholder="Nhập Lại Mật khẩu" name="checkPass">
                                                            @error('checkPass')
                                                                <div class="help-block with-errors">
                                                                    <ul class="list-unstyled">
                                                                        <li>{{$message}}</li>
                                                                    </ul>
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label for="inputRadio" class="control-label mb-10">Giới
                                                        Tính</label>
                                                    <div class="radio">
                                                        <input type="radio" id="box" value="0"
                                                            {{ $account->sex == 0 ? 'checked' : '' }} readonly>
                                                        <label for="box"> Nam </label>
                                                    </div>
                                                    <div class="radio">
                                                        <input type="radio" id="bri"
                                                            value="1" value="0"
                                                            {{ $account->sex == 1 ? 'checked' : '' }} readonly>
                                                        <label for="bri"> Nữ </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="col-sm-12 ol-md-12 col-xs-12">
                                                    <div class="panel panel-default card-view ">
                                                        <div class="panel-heading">
                                                            <div class="pull-left">
                                                                <h6 class="panel-title txt-dark">Ảnh Đại Diện</h6>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                        </div>
                                                        <div class="panel-wrapper collapse in">
                                                            <div class="panel-body">
                                                                <div style="text-align: center;">
                                                                    <img src="{{ $account->imageAcount}}" class="rounded" alt="Cinque Terre" style="padding: 5px;width: 300px; border-radius: 50%; border: 2px solid gray; object-fit: cover; height: 300px;"> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @error('imageAcount')
                                                            <div class="help-block with-errors">
                                                                <ul class="list-unstyled">
                                                                    <li style="color: red;">{{ $message }}</li>
                                                                </ul>
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group col-md-12">
                                                <button type="submit" class="btn btn-success btn-anim"><i class="icon-rocket"></i><span class="btn-text">Cập Nhật</span></button>
                                            
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
        toastr.success('Trang Cập Nhật Tài Khoản!');
    </script>
@stop