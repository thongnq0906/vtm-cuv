@extends('admin.partials.master')
@section('title', 'Quản lý bài viết')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>Bài viết</h1>
        <ol class="breadcrumb">
            <li><i class="fa fa-dashboard"></i>Trang chủ</li>
            <li>Quản lý Bài viết</li>
            <li class="active">Bài viết</li>
        </ol>
    </section>
    <section class="content-header">
        <div class="static-content-wrapper">
            <div class="static-content">
                <div class="page-content">
                    @if(Session::has('success'))
                        <div class="alert alert-success">{{ Session::get('success') }}</div>
                    @endif
                    <div class="search">
                        <form class="" method="get" enctype="multipart/form-data" action="{{ route('admin.post.search') }}">
                        {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-8">
                                </div>
                                <div class="col-md-3">
                                    <select name="cate_post" class="form-control" id="target">
                                        <?php  menu($data);?>
                                    </select>
                                </div>
                                <div class="col-md-1">
                                    <button class="btn-primary btn">Tìm</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-lg-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <div class="options">
                                        </div>
                                    </div>
                                    <div class="panel-body" style="overflow-x:auto;">
                                        <table id="datatable_post" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>STT</th>
                                                    <th>Ảnh</th>
                                                    <th>Tên sản phẩm</th>
                                                    <th>Danh mục</th>
                                                    <th>Giới thiệu</th>
                                                    <th>Sản phẩm trang chủ</th>
                                                    <th>Trạng thái</th>
                                                    <th>Cập nhật</th>
                                                    <th>Xử lý</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($post as $key => $c)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>
                                                        <img src="{{ asset($c->image) }}"
                                                        style="height: 60px; width: 60px;">
                                                    </td>
                                                    <td>{{ $c->name }}</td>
                                                    <td>{{ $c->Cate_post->name }}</td>
                                                    <td>{{ $c->title }}</td>
                                                    <td>{{ $c->is_home }}</td>
                                                    <td>
                                                        @if($c->status == 1)
                                                            <span class="label label-success">Hiện</span>
                                                        @else
                                                            <span class="label label-danger">Ẩn</span>
                                                        @endif
                                                    </td>
                                                    <td>{{ $c->updated_at }}</td>
                                                    <td>
                                                        <a href="{{ route('admin.post.update', $c->slug)}}">
                                                            <i class="fa fa-pencil"></i>
                                                        </a>
                                                        <a href="{{ route('admin.post.destroy', $c->id) }}"
                                                            type="button"
                                                            onclick="return confirm_delete('Bạn có muốn xóa không ?')">
                                                            <i class="fa fa-times-circle"></i>
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
    </section>
</div><!-- /.content-wrapper -->
@endsection
@section('script')
<script type="text/javascript">
    $(function () {
        $("#datatable_post").DataTable();
    });
</script>
@endsection