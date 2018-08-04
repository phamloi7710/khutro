@section('title')
Trình Quản Lý Hình Ảnh Hệ Thống
@stop
@extends('frontend.general.master')
@section('content')
<div class="page-content-wrap">
	<iframe src="{{url('')}}/uploads?type=image" style="width: 100%; height: 627px; overflow: hidden; border: none;"></iframe>
</div>
@stop