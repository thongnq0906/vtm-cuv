@extends('admin.partials.master')
@section('title', 'Sửa danh mục')
@section('content')
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="static-content-wrapper">
        <div class="static-content">
            <div class="page-content">
                <div class="page-heading">
                    <h1>Sửa danh mục</h1>
                    <div class="options">
                        <div class="btn-toolbar">
                            <a href="#" class="btn btn-default"><i class="fa fa-fw fa-plus"></i>Thêm mới</a>
                        </div>
                    </div>
                </div>
                <ol class="breadcrumb">
                    <li>Trang chủ</li>
                    <li>Danh mục</li>
                    <li class="active">Sửa</li>
                </ol>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                </div>
                                <div class="panel-body">
                                    <form role="form" class="form-horizontal" method="POST"
                                        action="{{ route('admin.cate_slide.postUpdate', $cate_slide->id) }}"
                                        enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="row">
                                            <div class="form-group{{ $errors->has('name') ? 'has-error' : '' }}">
                                                <label class="col-md-3 control-label">Tên danh mục: </label>
                                                <div class="col-md-8">
                                                        <input type="text" class="form-control" placeholder="Name"
                                                        name="name" value="{{ $cate_slide->name }}">
                                                    @if($errors->has('name'))
                                                        <strong>
                                                            <span class="help-block">{{ $errors->first('name') }}</span>
                                                        </strong>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Danh mục</label>
                                                <div class="col-md-9">
                                                    <select class="form-control" name="parent_id">
                                                        <?php $hihi = DB::table('cate_products')
                                                        ->where('id',$cate_slide->parent_id)->first(); ?>
                                                        @if(isset($hihi))
                                                        <option value="{{ $cate_slide->parent_id }}">
                                                            {{ $hihi->name }}
                                                        </option>
                                                        @else
                                                        <option value="0">
                                                            {{ $cate_slide->name }}
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
                                                    <a class="btn-default btn" href="{{ route('admin.cate_slide.home') }}">
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
</div><!-- /.content-wrapper -->
@endsection
