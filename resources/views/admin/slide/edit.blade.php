@extends('admin.partials.master')
@section('title', 'Sửa Slide')
@section('content')
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="static-content-wrapper">
        <div class="static-content">
            <div class="page-content">
                <div class="page-heading">
                    <h1>Sửa Slide</h1>
                    <div class="options">
                        <div class="btn-toolbar">
                        </div>
                    </div>
                </div>
                <ol class="breadcrumb">
                    <li>Trang chủ</li>
                    <li>Slide</li>
                    <li class="active">Sửa</li>
                </ol>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                </div>
                                <div class="panel-body">
                                    <form role="form" class="form-horizontal" method="POST"
                                    action="{{ route('admin.slide.postUpdate', $slide->id) }}"
                                    enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="row">
                                            <div class="form-group{{ $errors->has('name') ? 'has-error' : '' }}">
                                                <label class="col-md-3 control-label">Tên: </label>
                                                <div class="col-md-8">
                                                        <input type="text" class="form-control"
                                                        placeholder="Nhập tên" name="name" value="{{ $slide->name }}">
                                                    @if($errors->has('name'))
                                                        <strong>
                                                            <span class="help-block">
                                                                {{ $errors->first('name') }}
                                                            </span>
                                                        </strong>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group{{ $errors->has('position') ? 'has-error' : '' }}">
                                                <label class="col-md-3 control-label">Vị trí: </label>
                                                <div class="col-md-8">
                                                    <input type="number" class="form-control"
                                                    placeholder="Nhập vị trí" name="position"
                                                    value="{{ $slide->position }}">
                                                    @if($errors->has('position'))
                                                        <strong>
                                                            <span class="help-block">
                                                                {{ $errors->first('position') }}
                                                            </span>
                                                        </strong>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group{{ $errors->has('image') ? 'has-error' : '' }}">
                                                <label class="col-md-3 control-label">Ảnh bìa: </label>
                                                <div class="col-md-8">
                                                        <input type="file" class="form-control" name="image">
                                                    @if($errors->has('image'))
                                                        <strong>
                                                            <span class="help-block">
                                                                {{ $errors->first('image') }}
                                                            </span>
                                                        </strong>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-3"></div>
                                                <div class="col-md-8">
                                                    <img src="{{ asset($slide->image) }}"
                                                    style="height: 50px; width: 50px">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Trạng thái: </label>
                                                <label class="switch">
                                                    <input type="checkbox" name="status"
                                                    {{ ($slide->status) ? 'checked': '' }}>

                                                    <span class="slider round"></span>
                                                    <input type="hidden" name="id" value="1">
                                                </label>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Danh mục: </label>
                                                <div class="col-md-8">
                                                    <select class="form-control" name="cate_slide_id">
                                                        <?php $hihi = DB::table('cate_slides')
                                                        ->where('id',$slide->cate_slide_id)->first(); ?>
                                                        @if(isset($hihi))
                                                        <option value="{{ $slide->cate_slide_id }}">
                                                            {{ $hihi->name }}
                                                        </option>
                                                        @else
                                                        <option value="0">
                                                            {{ $slide->name }}
                                                        </option>
                                                        @endif
                                                        <?php  menu($data);?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel-footer">
                                            <div class="row">
                                                <div class="col-sm-8 col-sm-offset-2">
                                                    <button class="btn-success btn">Lưu</button>
                                                    <a class="btn-default btn"
                                                    href="{{ route('admin.slide.create') }}">
                                                        Hủy
                                                    </a>
                                                    <a class="btn-default btn" href='javascript:goback()'>Quay lại</a>
                                                </div>
                                            </div>
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
</section>
<!-- Main content -->
</div><!-- /.content-wrapper -->
@endsection
@section('script')
<script>
    CKEDITOR.replace( 'editor1', {
    filebrowserBrowseUrl: '{{ asset('ckfinder/ckfinder.html') }}',
    filebrowserImageBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Images') }}',
    filebrowserFlashBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Flash') }}',
    filebrowserUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
    filebrowserImageUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
    filebrowserFlashUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
} );
</script>
@endsection