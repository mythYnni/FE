@extends ('admin_view.master')
@section('view_create_password')
    <div class="container-fluid">
        <!-- Title -->
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">Quản Lý Thông Tin Cá Nhân</h5>
            </div>

            <!-- Breadcrumb -->
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="{{ route('S&D_Admin_Home') }}">Trang Chủ</a></li>
                    <li class="active"><span>Cập Nhật Mật Khẩu</span></li>
                </ol>
            </div>
            <!-- /Breadcrumb -->

        </div>
        <!-- /Title -->

        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default card-view">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <h6 class="panel-title txt-dark">Cập Nhật Mật Khẩu</h6>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-wrap">
                                        <form class="row no-gutters" role="form-password" method="post" id="form2">
                                            @csrf
                                            <div
                                                class="form-group col-md-12 @error('oldPassword') has-error has-danger @enderror">
                                                <label for="inputName" class="control-label mb-10">Mật Khẩu Cũ</label>
                                                <input type="password" class="form-control" name="oldPassword"
                                                    placeholder="Mật khẩu Cũ">
                                                @error('oldPassword')
                                                    <div class="help-block with-errors" style=" color: #f33923;">
                                                        <ul class="list-unstyled">
                                                            <li>{{ $message }}</li>
                                                        </ul>
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-12 @error('password') has-error has-danger @enderror"
                                                style="margin-bottom: 0px">
                                                <label for="inputPassword" class="control-label mb-10">Mật
                                                    Khẩu Mới</label>
                                                <div class="row">
                                                    <div class="form-group col-sm-6">
                                                        <input type="password" data-minlength="6" class="form-control"
                                                            placeholder="Mật khẩu Mới" name="password">
                                                        @error('password')
                                                            <div class="help-block with-errors">
                                                                <ul class="list-unstyled">
                                                                    <li>{{ $message }}</li>
                                                                </ul>
                                                            </div>
                                                        @enderror
                                                        <div class="help-block">Tối Thiểu 6 Ký Tự</div>
                                                    </div>
                                                    <div
                                                        class="form-group col-sm-6 @error('checkPassword') has-error has-danger @enderror">
                                                        <input type="password" class="form-control"
                                                            placeholder="Nhập Lại Mật khẩu" name="checkPassword">
                                                        @error('checkPassword')
                                                            <div class="help-block with-errors">
                                                                <ul class="list-unstyled">
                                                                    <li>{{ $message }}</li>
                                                                </ul>
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div>
                                                    <button type="submit" class="btn btn-success btn-anim"><i
                                                            class="icon-rocket"></i><span class="btn-text">Cập
                                                            Nhật</span></button>
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
    </div>
@stop
