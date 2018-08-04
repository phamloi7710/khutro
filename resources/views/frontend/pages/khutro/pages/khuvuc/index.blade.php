@section('title')
Quản Lý Khu Vực Trọ / Toà Nhà 
@stop
@extends('frontend.pages.khutro.general.master')
@section('contentKhuTro')
<div class="content-frame-body">
    <div class="col-md-12">
    	<div class="form-group">
	        <div class="col-md-12">
	            
	            <div class="pull-right">
	                <a href="#" type="button" class="btn btn-info" data-toggle="modal" data-target=".add-new"><span class="fa fa-plus"></span> Thêm Mới</a>
	            </div>                                    
	        </div>
	    </div>
	    <div class="panel panel-info">
	        <div class="panel-body">
	            <table class="table table-responsive">
	                <thead>
	                    <tr>
	                        <th>Tên Khu Vực/Toà Nhà</th>
	                        <th>Địa Chỉ</th>
	                        <th>Mô Tả</th>
	                        <th></th>
	                    </tr>
	                </thead>
	                <tbody>
	                    @foreach($khuvuc as $value)
	                    <tr>
	                        <td>{{$value->ten}}</td>
	                        <td>{{$value->diachi}}</td>
	                        <td>{{$value->mota}}</td>
	                        <td>
	                            <button type="button" class="btn btn-danger btn-rounded pull-right" onClick="notyConfirm();"> Xoá</button>
	                            <a href="#" type="button" class="btn btn-info btn-rounded pull-right" data-toggle="modal" data-target=".token-{{$value->id}}"> Sửa</a>
	                        </td>
	                        
	                        <script type="text/javascript">            
	                        function notyConfirm(){
	                            noty({
	                                text: 'Bạn Có Muốn Xoá?',
	                                layout: 'bottomRight',
	                                buttons: [
	                                    {addClass: 'btn btn-success btn-clean', text: 'Đồng Ý', onClick: function($noty) {
	                                            $.get("{{route('deleteKhuVuc',['id'=>$value->id])}}",function(){
	                                                $('tr:last').hide("slow",function(){
	                                                    noty({text: 'Xoá Thành Công', layout: 'bottomRight', type: 'success'});
	                                                });
	                                            })
	                                            $noty.close();
	                                        }
	                                    },
	                                    {addClass: 'btn btn-danger btn-clean', text: 'Huỷ Bỏ', onClick: function($noty) {
	                                        $noty.close();
	                                        noty({text: 'Dữ Liệu Được Dữ Nguyên', layout: 'bottomRight', type: 'success'});
	                                        }
	                                    }
	                                ]
	                            })                                                    
	                        }                                            
	                    </script>
	                    </tr>
	                    
	                    @endforeach
	                </tbody>
	            </table>
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
                <h4 class="modal-title" id="myModalLabel"> Thêm Mới Khu Vực / Toà Nhà</h4>
            </div>
            <form class="form-horizontal" role="form" method="POST" action="{{route('postAddKhuVucFrontend')}}" id="jvalidate" enctype="multipart/form-data">@csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-md-3 control-label">Tên Khu Vực / Toà Nhà</label>
                        <div class="col-md-6">
                            <div class="input-group">
                                <span class="input-group-addon"><input class="count-number" readonly type="text" name="countName" size=1 value="50" disabled="disabled">/50</span>
                                <input name="txtName" id="txtName" type="text" class="form-control" placeholder="Nhập Tên Của Khu Vực / Toà Nhà" value="{{old('txtName')}}" onKeyDown="CountLeft(this.form.txtName, this.form.countName,50);" onKeyUp="CountLeft(this.form.txtName,this.form.countName,50);">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"> Địa Chỉ</label>
                        <div class="col-md-8">
                            <div class="input-group">
                                <span class="input-group-addon"><input class="count-number" readonly type="text" name="countAddress" size=1 value="90" disabled="disabled">/90</span>
                                <input name="txtAddress" id="txtAddress" type="text" class="form-control" placeholder="Địa Chỉ" value="{{old('txtAddress')}}" onKeyDown="CountLeft(this.form.txtAddress, this.form.countAddress,90);" onKeyUp="CountLeft(this.form.txtAddress,this.form.countAddress,90);">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"> Mô Tả</label>
                        <div class="col-md-8">
                            <textarea name="mota" class="form-control" rows="3"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-toggle="tooltip" data-placement="bottom" data-dismiss="modal" title="Huỷ Bỏ" data-original-title="Huỷ Bỏ">Đóng</button>
                    <button type="submit" class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Tiến Hành Thêm Mới Khu Vực/Toà Nhà">Thêm Mới</button>
                </div>
            </form>
        </div>
    </div>
</div>
@foreach($khuvuc as $value)
<div class="modal fade token-{{$value->id}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel"> Chỉnh Sửa Khu Vực / Toà Nhà</h4>
            </div>
            <form class="form-horizontal" role="form" method="POST" action="{{route('postEditKhuVucFrontend',['id'=>$value->id])}}" id="jvalidate" enctype="multipart/form-data">@csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-md-3 control-label">Tên Khu Vực / Toà Nhà</label>
                        <div class="col-md-6">
                            <div class="input-group">
                                <span class="input-group-addon"><input class="count-number" readonly type="text" name="countName" size=1 value="??" disabled="disabled">/50</span>
                                <input name="txtName" id="txtNameEdit" type="text" class="form-control" placeholder="Nhập Tên Của Khu Vực / Toà Nhà" value="{{$value->ten}}" onKeyDown="CountLeft(this.form.txtNameEdit, this.form.countName,50);" onKeyUp="CountLeft(this.form.txtNameEdit,this.form.countName,50);">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"> Địa Chỉ</label>
                        <div class="col-md-8">
                            <div class="input-group">
                                <span class="input-group-addon"><input class="count-number" readonly type="text" name="countAddress" size=1 value="??" disabled="disabled">/90</span>
                                <input name="txtAddress" id="txtAddress" type="text" class="form-control" placeholder="Địa Chỉ" value="{{$value->diachi}}" onKeyDown="CountLeft(this.form.txtAddress, this.form.countAddress,90);" onKeyUp="CountLeft(this.form.txtAddress,this.form.countAddress,90);">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"> Mô Tả</label>
                        <div class="col-md-8">
                            <textarea name="mota" class="form-control" rows="3"> {{$value->mota}}</textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-toggle="tooltip" data-placement="bottom" data-dismiss="modal" title="Huỷ Bỏ" data-original-title="Huỷ Bỏ">Đóng</button>
                    <button type="submit" class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Tiến Hành Chỉnh Sửa Khu Vực/Toà Nhà">Cập Nhật</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
@endsection