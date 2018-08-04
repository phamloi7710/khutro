@section('title')
Quản Lý Khu Vực Trọ / Toà Nhà 
@stop
@extends('frontend.pages.khutro.general.master')
@section('contentKhuTro')
<div class="content-frame-body">
    <div class="col-md-12">
    	<div class="form-group">
	        <div class="col-md-12">
	            <div class="pull-left">
                    <div class="btn-group">
                        <a href="#" data-toggle="dropdown" class="btn btn-primary dropdown-toggle" aria-expanded="false">Chọn Khu Nhà Trọ <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            @foreach($getKhuVuc as $kv)
                            <li><a href="{{route('getSectionFrontend',['ten'=>$kv->ten])}}">{{$kv->ten}}</a></li>  
                            @endforeach     
                        </ul>
                    </div>
                </div> 
                <div class="pull-right">
                    <a href="#" type="button" class="btn btn-info" data-toggle="modal" data-target=".add-new"><span class="fa fa-plus"></span> Thêm Mới</a>
                </div>                                    
	        </div>
	    </div>
	    <div class="panel panel-info">
	        <div class="panel-body  table-responsive">
	            <table class="table table-hover  table-bordered">
                    <thead>
                        <tr>
                            <th>Tên Dịch Vụ</th>
                            <th class="center">Đơn Giá</th>
                            <th class="center">Đơn Giá Cố Định</th>
                            <th class="center">Đơn Vị</th>
                            <th>Mô Tả</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($getDichVu as $value)
                        <tr>
                            <td>{{$value->ten}}</td>
                            <td class="center">
                                @if($value->dongiatheodaunguoi!=NULL)
                                {{number_format($value->dongiatheodaunguoi, 0, ',', '.')}} (₫)
                                @endif
                            </td>
                            <td class="center">
                                @if($value->dongia!=NULL)
                                {{number_format($value->dongia, 0, ',', '.')}} (₫)
                                @endif
                            </td>
                            <td class="center">{{$value->donvi->ten}}</td>
                            <td>{{$value->mota}}</td>
                            <td>
                                <button type="button" class="btn btn-danger btn-rounded pull-right" onclick="return alertMsg('{{route('deleteDichVuFrontend',['id'=>$value->id])}}','Bạn Có Chắc Chắn Xoá {{$value->ten}} Không?');"> Xoá</button>
                                <a href="#" type="button" class="btn btn-info btn-rounded pull-right" data-toggle="modal" data-target=".token-{{$value->id}}"> Sửa</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                
                            </td>
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
                <h4 class="modal-title" id="myModalLabel"> Thêm Mới Dịch Vụ</h4>
            </div>
            <form class="form-horizontal" role="form" method="POST" action="{{route('postAddDichVuFrontend')}}" id="jvalidate" enctype="multipart/form-data">@csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Tên Dịch Vụ</label>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><input class="count-number" readonly type="text" name="countName" size=1 value="20" disabled="disabled">/20</span>
                                        <input name="txtName" id="txtName" type="text" class="form-control" placeholder="Nhập Tên Của Dịch Vụ" value="{{old('txtName')}}" onKeyDown="CountLeft(this.form.txtName, this.form.countName,20);" onKeyUp="CountLeft(this.form.txtName,this.form.countName,20);">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Đơn Giá</label>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><input class="count-number" readonly type="text" name="countDonGia" size="1" value="12" disabled="disabled">/ &nbsp;12</span>
                                        <input name="txtDonGia" id="txtDonGia" type="number" class="form-control" placeholder="Nhập Đơn Giá" value="{{old('txtDonGia')}}" onKeyDown="CountLeft(this.form.txtDonGia, this.form.countDonGia,12);" onKeyUp="CountLeft(this.form.txtDonGia,this.form.countDonGia,12);">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"> Đơn Vị Tính</label>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"></span>
                                        <select name="sltDonVi" class="form-control select">
                                            <option value="">---Chọn Đơn Vị Tính---</option>
                                            @foreach($donvi as $value)
                                            <option value="{{$value->id}}"> {{$value->ten}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label"> Đơn Giá Theo Đầu Người</label>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-addon"><input class="count-number" readonly type="text" name="countDauNguoi" size="1" value="12" disabled="disabled">/ &nbsp;12</span>
                                        <input name="txtDonGiaTheoDauNguoi" id="txtDonGiaTheoDauNguoi" type="number" class="form-control" placeholder="Nhập Đơn Giá Theo Đầu Người" value="{{old('txtDonGiaTheoDauNguoi')}}" onKeyDown="CountLeft(this.form.txtDonGiaTheoDauNguoi, this.form.countDauNguoi,12);" onKeyUp="CountLeft(this.form.txtDonGiaTheoDauNguoi,this.form.countDauNguoi,12);">
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
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-toggle="tooltip" data-placement="right" data-dismiss="modal" title="Huỷ Bỏ" data-original-title="Huỷ Bỏ">Đóng</button>
                    <button type="submit" class="btn btn-success" data-toggle="tooltip" data-placement="left" title="" data-original-title="Tiến Hành Thêm Mới Dịch Vụ">Thêm Mới</button>
                </div>
            </form>
        </div>
    </div>
</div>
@foreach($getDichVu as $value)
<div class="modal fade token-{{$value->id}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel"> Chỉnh Sửa Dịch Vụ</h4>
            </div>
            <form class="form-horizontal" role="form" method="POST" action="{{route('postEditDichVuFrontend',['id'=>$value->id])}}" id="jvalidate" enctype="multipart/form-data">@csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Tên Dịch Vụ</label>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><input class="count-number" readonly type="text" name="countName" size=1 value="20" disabled="disabled">/20</span>
                                        <input name="txtName" id="txtName" type="text" class="form-control" placeholder="Nhập Tên Của Dịch Vụ" value="{{$value->ten}}" onKeyDown="CountLeft(this.form.txtName, this.form.countName,20);" onKeyUp="CountLeft(this.form.txtName,this.form.countName,20);">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Đơn Giá</label>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><input class="count-number" readonly type="text" name="countDonGia" size="1" value="12" disabled="disabled">/ &nbsp;12</span>
                                        <input name="txtDonGia" id="txtDonGia" type="number" class="form-control" placeholder="Nhập Đơn Giá" value="{{$value->dongia}}" onKeyDown="CountLeft(this.form.txtDonGia, this.form.countDonGia,12);" onKeyUp="CountLeft(this.form.txtDonGia,this.form.countDonGia,12);">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"> Đơn Vị Tính</label>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"></span>
                                        <select name="sltDonVi" class="form-control select">
                                            <option value="">---Chọn Đơn Vị Tính---</option>
                                            @foreach($donvi as $dv)
                                            <option value="{{$dv->id}}" @if($dv->id==$value->donvi_id) selected @endif> {{$dv->ten}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label"> Đơn Giá Theo Đầu Người</label>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-addon"><input class="count-number" readonly type="text" name="countDauNguoi" size="1" value="12" disabled="disabled">/12</span>
                                        <input name="txtDonGiaTheoDauNguoi" id="txtDonGiaTheoDauNguoi" type="number" class="form-control" placeholder="Nhập Đơn Giá Theo Đầu Người" value="{{$value->dongiatheodaunguoi}}" onKeyDown="CountLeft(this.form.txtDonGiaTheoDauNguoi, this.form.countDauNguoi,12);" onKeyUp="CountLeft(this.form.txtDonGiaTheoDauNguoi,this.form.countDauNguoi,12);">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"> Mô Tả</label>
                                <div class="col-md-8">
                                    <textarea name="mota" class="form-control" rows="3">{{$value->mota}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-toggle="tooltip" data-placement="bottom" data-dismiss="modal" title="Huỷ Bỏ" data-original-title="Huỷ Bỏ">Đóng</button>
                    <button type="submit" class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Tiến Hành Chỉnh Sửa Dịch Vụ"> Cập Nhật</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
@endsection