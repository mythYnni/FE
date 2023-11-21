@extends ('admin_view.master')
@section('view_update_pAdvice')
    <div class="container-fluid">
        <!-- Title -->
        <div class="row heading-bg">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">Sửa Bài Viết Tư Vấn Pháp Luật</h5>
            </div>

            <!-- Breadcrumb -->
            <div class="col-lg-8 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="{{ route('S&D_Admin_Home') }}">Trang Chủ</a></li>
                    <li><a href="{{ route('list_pAdvice', Auth::user()->linkText)}}"><span>Bài Viết Tư Vấn Pháp Luật</span></a></li>
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
                            <h6 class="panel-title txt-dark">Thông Tin Bài Viết</h6>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-wrap">
                                        <form data-toggle="validator" class="row no-gutters" role="form" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" value="{{ $postsAdvice->user }}" name="user_link">
                                            <input type="hidden" value="{{ $postsAdvice->dateCreated }}"
                                                name="dateCreated">
                                            <div class="col-md-4" style="padding: 0px;">
                                                <div
                                                    class="form-group col-md-12 @error('title') has-error has-danger @enderror">
                                                    <label for="inputName" class="control-label mb-10">Tiêu Đề</label>
                                                    <textarea class="form-control" rows="5" id="slug" onkeyup="ChangeToSlug();" name="title"
                                                        value="{{ $postsAdvice->title }}">{{ $postsAdvice->title }}</textarea>
                                                    @error('title')
                                                        <div class="help-block with-errors" style=" color: #f33923;">
                                                            <ul class="list-unstyled">
                                                                <li>{{ $message }}</li>
                                                            </ul>
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label class="control-label mb-10">Đường Dẫn Sạch</label>
                                                    <input type="text" class="form-control" id="convert_slug" readonly
                                                        name="linkText" value="{{ $postsAdvice->linkText }}">
                                                </div>
                                                <div
                                                    class="form-group col-md-12 @error('nameUser') has-error has-danger @enderror">
                                                    <label for="inputAccount" class="control-label mb-10">Người Tạo</label>
                                                    <input type="text" class="form-control" id="inputAccount"
                                                        name="nameUser" value="{{ $postsAdvice->nameUser }}" readonly>
                                                    @error('nameUser')
                                                        <div class="help-block with-errors" style=" color: #f33923;">
                                                            <ul class="list-unstyled">
                                                                <li>{{ $message }}</li>
                                                            </ul>
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label class="control-label mb-10">Danh Mục</label>
                                                    <select class="selectpicker" data-style="btn-primary btn-outline"
                                                        name="category_link">
                                                        @foreach ($listAdvice as $value)
                                                            <option value="{{ $value->linkText }}"
                                                                {{ $value->linkText == $postsAdvice->category ? 'selected' : '' }}>
                                                                {{ $value->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="control-label mb-10">Ảnh Quảng Cáo</label>
                                                    <div class="panel panel-default card-view"
                                                        style="margin-left: 0px; margin-right: 0px;">
                                                        <div class="panel-wrapper collapse in">
                                                            <div class="panel-body">
                                                                <div>
                                                                    <input type="file" id="input-file-now-custom-1"
                                                                        class="dropify" name="images"
                                                                        data-default-file="{{ $postsAdvice->image }}" />
                                                                </div>
                                                            </div>
                                                            <input type="hidden" name="img"
                                                                value="{{ $postsAdvice->image }}" />
                                                        </div>
                                                        @error('image')
                                                            <div class="help-block with-errors">
                                                                <ul class="list-unstyled">
                                                                    <li style="color: red;">{{ $message }}</li>
                                                                </ul>
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-12">
                                                     <label class="control-label mb-10">Link Quảng Cáo</label>
                                                     <input type="text" class="form-control" name="link" value="{{ $postsAdvice->link }}">
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label for="inputRadio" class="control-label mb-10">Trạng Thái</label>
                                                    <div class="radio">
                                                        <input type="radio" id="box" name="status" value="0"
                                                            {{ $postsAdvice->status == 0 ? 'checked' : '' }}>
                                                        <label for="box"> Hoạt Động </label>
                                                    </div>
                                                    <div class="radio">
                                                        <input type="radio" id="bri" name="status" value="1"
                                                            value="0"
                                                            {{ $postsAdvice->status == 1 ? 'checked' : '' }}>
                                                        <label for="bri"> Ẩn </label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-8">
                                                <div class="col-md-12">
                                                    @error('content')
                                                        <div class="alert alert-danger">
                                                            <strong>Cảnh Báo!</strong> {{ $message }}
                                                        </div>
                                                    @enderror
                                                    <div class="panel panel-default card-view">
                                                        <div class="panel-heading">
                                                            <div class="pull-left">
                                                                <h6 class="panel-title txt-dark">Nội Dung Bài Viết</h6>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                        </div>
                                                        <div class="panel-wrapper collapse in">
                                                            <div class="panel-body">
                                                                <textarea name="content" rows="20" class="summernote">{{ $postsAdvice->content }}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group col-md-12">
                                                <button type="submit" class="btn btn-success btn-anim"><i
                                                        class="icon-rocket"></i><span class="btn-text">Sửa Bài
                                                        Viết</span></button>
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
        toastr.success('Chỉnh Sửa Bài Viết!');
    </script>
@stop
