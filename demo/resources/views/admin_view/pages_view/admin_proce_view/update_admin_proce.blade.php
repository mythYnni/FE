@extends ('admin_view.master')
@section('view_update_legalAdvice')
    <div class="container-fluid">
        <!-- Title -->
        <div class="row heading-bg">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">Chỉnh Sửa Danh Mục Thủ Tục Hành Chính</h5>
            </div>

            <!-- Breadcrumb -->
            <div class="col-lg-8 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="{{ route('S&D_Admin_Home') }}">Trang Chủ</a></li>
                    <li><a href="{{ route('list_Proce')}}"><span>Quản Lý Danh Mục Thủ Tục Hành Chính</span></a></li>
                    <li class="active"><span>Chỉnh Sửa</span></li>
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
                            <h6 class="panel-title txt-dark">Thông Tin Danh Mục</h6>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-wrap">
                                        <form data-toggle="validator" class="row no-gutters" role="form" method="post">
                                            @csrf
                                            <div class="col-md-12" style="padding: 0px;">
                                                <div
                                                    class="form-group col-md-7 @error('name') has-error has-danger @enderror">
                                                    <label for="inputName" class="control-label mb-10">Tên Danh Mục</label>
                                                    <input type="text" class="form-control" id="slug"
                                                        onkeyup="ChangeToSlug();" placeholder="ví dụ: Hôn Nhân Gia Đình"
                                                        name="name" value="{{ $obj->name }}">
                                                    @error('name')
                                                        <div class="help-block with-errors" style="color: red;">
                                                            <ul class="list-unstyled">
                                                                <li>{{ $message }}</li>
                                                            </ul>
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-5">
                                                    <label class="control-label mb-10">Đường Dẫn Sạch</label>
                                                    <input type="text" class="form-control" id="convert_slug"
                                                        placeholder="ví dụ: hon-nhan-gia-dinh" readonly name="linkText"
                                                        value="{{ $obj->linkText }}">
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label for="inputRadio" class="control-label mb-10">Trạng Thái</label>
                                                    <div class="radio">
                                                        <input type="radio" id="box" name="status" value="1"
                                                            {{ $obj->status == 1 ? 'checked' : '' }}>
                                                        <label for="box"> Hoạt Động </label>
                                                    </div>
                                                    <div class="radio">
                                                        <input type="radio" id="bri" name="status" value="0"
                                                            {{ $obj->status == 0 ? 'checked' : '' }}>
                                                        <label for="bri"> Ẩn </label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group col-md-12">
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
        <!-- /Row -->
    </div>
@stop
@section('ToastrWellcom')
    <script>
        toastr.success('Trang Thêm Mới Danh Mục Tư Vấn Pháp Luật!');
    </script>
@stop
