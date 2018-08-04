@section('title')
Điện tử
@stop
@extends('admin.general.master')
@section('content')
<ul class="breadcrumb">
    <li><a href="#">Home</a></li>
    <li><a href="#">Layouts</a></li>
    <li class="active">Top Navigation Fixed</li>
</ul>
<div class="page-title"> 
	<div class="row">
		<div class="col-md-10">
			<h2><span class="fa fa-arrow-circle-o-left"></span> Danh Sách Email Template </h2>
		</div>
		<div class="col-md-2">
			<div class="form-group pull-right">
	            <button  data-toggle="modal" data-target=".add-new" type="button" class="btn btn-info btn-rounded">Thêm Mới</button>
	        </div>
		</div>
	</div>                   
    
</div> 
<div class="page-content-wrap">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"></h3>
                </div>
                <div class="panel-body">
                    <table class="table table-hover">
				        <thead>
				            <tr>
				                <th>#</th>
				                <th>First Name</th>
				                <th>Last Name</th>
				                <th>Username</th>
				            </tr>
				        </thead>
				        <tbody>
				            <tr>
				                <td>1</td>
				                <td>Mark</td>
				                <td>Otto</td>
				                <td>@mdo</td>
				            </tr>
				            <tr>
				                <td>2</td>
				                <td>Jacob</td>
				                <td>Thornton</td>
				                <td>@fat</td>
				            </tr>
				            <tr>
				                <td>3</td>
				                <td>Larry</td>
				                <td>the Bird</td>
				                <td>@twitter</td>
				            </tr>
				        </tbody>
				    </table>
                </div>
            </div>
		</div>
	</div>
</div> 
<div class="modal fade add-new" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel"> Thêm Mới Phòng Trọ</h4>
            </div>
            <form class="form-horizontal" role="form" method="POST" action="{{route('postAddMailTemplate')}}" id="jvalidate" enctype="multipart/form-data">@csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-md-2 control-label">Tiêu Đề</label>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><input class="count-number" readonly type="text" name="countTitle" size=1 value="99" disabled="disabled">/99</span>
                                        <input name="txtTitle" id="txtTitle" type="text" class="form-control" placeholder="Nhập Tiêu Đề Của Email Gửi Đi" value="{{old('txtTitle')}}" onKeyDown="CountLeft(this.form.txtTitle, this.form.countTitle,99);" onKeyUp="CountLeft(this.form.txtTitle,this.form.countTitle,99);">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Key</label>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><input class="count-number" readonly type="text" name="countKey" size=1 value="50" disabled="disabled">/50</span>
                                        <input name="txtKey" id="txtKey" type="text" class="form-control" placeholder="Nhập Key Của Email Gửi Đi" value="{{old('txtKey')}}" onKeyDown="CountLeft(this.form.txtKey, this.form.countKey,50);" onKeyUp="CountLeft(this.form.txtKey,this.form.countKey,50);">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Nội Dung Mail</label>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <textarea name="content" cols="100" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-toggle="tooltip" data-placement="right" data-dismiss="modal" title="Huỷ Bỏ" data-original-title="Huỷ Bỏ">Đóng</button>
                    <button type="submit" class="btn btn-success" data-toggle="tooltip" data-placement="left" title="" data-original-title="Tiến Hành Thêm Mới Phòng Trọ">Thêm Mới</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection