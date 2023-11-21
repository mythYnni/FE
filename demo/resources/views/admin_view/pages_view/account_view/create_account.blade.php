@extends ('admin_view.master')
@section('view_create_account')
    <div class="container-fluid">
        <!-- Title -->
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">Tạo Tài Khoản Nhân Sự</h5>
            </div>

            <!-- Breadcrumb -->
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="{{ route('S&D_Admin_Home') }}">Trang Chủ</a></li>
                    <li><a href="{{ route('list_account')}}"><span>Quản Lý Tài Khoản</span></a></li>
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
                                        <form action="{{route('create_account')}}" data-toggle="validator" class="row no-gutters" role="form" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="col-md-8" style="padding: 0px;">
                                                <div class="form-group col-md-8 @error('fullName') has-error has-danger @enderror">
                                                    <label for="inputName" class="control-label mb-10">Tên Người
                                                        Dùng</label>
                                                    <input type="text" class="form-control" id="slug"
                                                        onkeyup="ChangeToSlug();" placeholder="ví dụ: Lê Tiến Đạt" name="fullName" value="{{old('fullName')}}">
                                                    @error('fullName')
                                                        <div class="help-block with-errors" style=" color: #f33923;">
                                                            <ul class="list-unstyled">
                                                                <li>{{$message}}</li>
                                                            </ul>
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="control-label mb-10">Đường Dẫn Sạch</label>
                                                    <input type="text" class="form-control" id="convert_slug"
                                                        placeholder="ví dụ: le-tien-dat" readonly name="linkText" value="{{old('linkText')}}">
                                                </div>
                                                <div class="form-group col-md-5 @error('accountName') has-error has-danger @enderror">
                                                    <label for="inputAccount" class="control-label mb-10">Tên Tài
                                                        Khoản</label>
                                                    <input type="text" class="form-control" id="inputAccount"
                                                        placeholder="ví dụ: tiendat001.s&d" name="accountName" value="{{old('accountName')}}">
                                                    @error('accountName')
                                                        <div class="help-block with-errors" style=" color: #f33923;">
                                                            <ul class="list-unstyled">
                                                                <li>{{$message}}</li>
                                                            </ul>
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-7 @error('email') has-error has-danger @enderror">
                                                    <label for="inputEmail" class="control-label mb-10">Email</label>
                                                    <input type="email" class="form-control" id="inputEmail"
                                                        placeholder="user@gmail.com" name="email" value="{{old('email')}}">
                                                    @error('email')
                                                        <div class="help-block with-errors" style=" color: #f33923;">
                                                            <ul class="list-unstyled">
                                                                <li>{{$message}}</li>
                                                            </ul>
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-5 @error('phone') has-error has-danger @enderror">
                                                    <label for="inputPhone" class="control-label mb-10">Số Điện
                                                        Thoại</label>
                                                    <input type="text" class="form-control" id="inputPhone"
                                                        placeholder="Ví Dụ: 0897226868" name="phone" value="{{old('phone')}}">
                                                    @error('phone')
                                                        <div class="help-block with-errors" style=" color: #f33923;">
                                                            <ul class="list-unstyled">
                                                                <li>{{$message}}</li>
                                                            </ul>
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-7">
                                                    <label class="control-label mb-10">Phân Quyền</label>
                                                    <select class="selectpicker" data-style="btn-primary btn-outline" name="decentralization">
                                                        <option value="0">Nhà Thiết Kế"</option>
                                                        <option value="1">Nhà Phát Triển<tbody></tbody>
                                                        </option>
                                                    </select>

                                                </div>
                                                <div class="form-group col-md-12 @error('password') has-error has-danger @enderror" style="margin-bottom: 0px">
                                                    <label for="inputPassword" class="control-label mb-10">Mật
                                                        Khẩu</label>
                                                    <div class="row">
                                                        <div class="form-group col-sm-6">
                                                            <input type="password" data-minlength="6" class="form-control" placeholder="Mật khẩu" name="password" >
                                                            @error('password')
                                                                <div class="help-block with-errors">
                                                                    <ul class="list-unstyled">
                                                                        <li>{{$message}}</li>
                                                                    </ul>
                                                                </div>
                                                            @enderror
                                                            <div class="help-block">Tối Thiểu 6 Ký Tự</div>
                                                        </div>
                                                        <div class="form-group col-sm-6 @error('checkPassword') has-error has-danger @enderror">
                                                            <input type="password" class="form-control" placeholder="Nhập Lại Mật khẩu" name="checkPassword">
                                                            @error('checkPassword')
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
                                                        <input type="radio" id="box" name="sex" value="0" {{old('sex') == 0 ? 'checked' : ''}}>
                                                        <label for="box"> Nam </label>
                                                    </div>
                                                    <div class="radio">
                                                        <input type="radio" id="bri" name="sex" value="1" {{old('sex') == 1 ? 'checked' : ''}}>
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
                                                                <div>
                                                                    <input type="file" id="input-file-now-custom-1"
                                                                        class="dropify" name="imageAcount" value="{{old('imageAcount')}}"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @error('imageAcount')
                                                            <div class="help-block with-errors">
                                                                <ul class="list-unstyled">
                                                                    <li style="color: red;">{{$message}}</li>
                                                                </ul>
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group col-md-12">
                                                <button type="submit" class="btn btn-success btn-anim"><i
                                                        class="icon-rocket"></i><span class="btn-text">Tạo Tài
                                                        Khoản</span></button>
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
        toastr.success('Trang Thêm Mới Tài Khoản!');
    </script>
@stop