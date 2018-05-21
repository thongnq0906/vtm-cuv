@extends('admin.partials.master')
@section('title', 'Banner')
@section('content')
<div class="content-wrapper">
	<section class="content-header">
	  	<div class="static-content-wrapper">
		    <div class="static-content">
		        <div class="page-content">
		            <div class="page-heading">
		                <h1>Quản lý banner</h1>
		                <div class="options">
		                    <div class="btn-toolbar">
		                        <a href="{{ route('admin.banner.create') }}" class="btn btn-default">
		                        	<i class=" fa fa-fw fa-plus"></i>
		                        	Thêm mới
		                        </a>
		                    </div>
		                </div>
		            </div>
		            <ol class="breadcrumb">
		                <li>Trang chủ</li>
		                <li>Quản lý banner</li>
		                <li class="active">Banner</li>
		            </ol>
		            @if(Session::has('success'))
		                <div class="alert alert-success">{{ Session::get('success') }}</div>
		            @endif
		            <div class="container-fluid">
		                <div class="row">
		                    <div class="col-xs-12 col-sm-12 col-lg-12">
		                        <div class="panel panel-default">
		                            <div class="panel-heading">
		                                <div class="options">
		                                </div>
		                            </div>
		                            <div class="panel-body" style="overflow-x:auto;">
		                                <table class="table table-striped table-responsive">
		                                    <thead>
		                                        <tr>
		                                            <th>STT</th>
		                                            <th>Tên</th>
		                                            <th>Banner</th>
                                                    <th>Trạng thái</th>
		                                            <th>Cập nhật</th>
		                                            <th>Xử lý</th>
		                                        </tr>
		                                    </thead>
		                                    <tbody>
		                                        @foreach($banner as $key => $c)
		                                        <tr>
		                                            <td>{{ $key + 1 }}</td>
		                                            <td>{{ $c->name }}</td>
		                                            <td>
		                                            	<img src="{{ asset($c->image) }}">
		                                            </td>
		                                            <td>
		                                            	@if($c->status == 1)
															<button type="button" class="btn btn-danger .btn-sm">
																Hiện
															</button>
		                                            	@else
															<button type="button" class="btn btn .btn-sm">
																&nbsp;&nbsp;Ẩn &nbsp;
															</button>
		                                            	@endif
		                                            </td>
		                                            <td>{{ $c->updated_at }}</td>
		                                            <td>
		                                                <a href="{{ route('admin.banner.update', $c->id)}}">
		                                                    <i class="fa fa-pencil"></i>
		                                                </a>
		                                                <a href="{{ route('admin.banner.destroy', $c->id) }}"
                                                            type="button"
		                                                	onclick="return confirm_delete('Bạn có muốn xóa không ?')">
		                                                    <i class="fa fa-times-circle"></i>
		                                                </a>
		                                            </td>
		                                        </tr>
		                                        @endforeach
		                                    </tbody>
		                                </table>
		                                {{ $banner->links() }}
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