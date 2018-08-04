@section('title')
Quản Lý Khu Vực Trọ / Toà Nhà 
@stop
@extends('frontend.pages.khutro.general.master')
@section('contentKhuTro')
<div class="content-frame-body">
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
            
            <a href="#" type="button" class="btn btn-info" data-toggle="modal" data-target=".search"><span class="fa fa-search"></span> Tìm Kiếm Phòng Trọ</a>
            <a href="#" type="button" class="btn btn-info" data-toggle="modal" data-target=".add-new"><span class="fa fa-plus"></span> Thêm Mới</a>
        </div>

	    <div class="panel panel-info">
	        <div class="panel-body panel-body-table table-responsive">
	            <table class="table table-hover table-bordered table-condensed">
                    <thead>
                        <tr>
                            <th class="center">Tầng(Lầu)</th>
                            <th class="center">Tên Phòng</th>
                            <th class="center">Số Người Tối Đa</th>
                            <th class="center">Giá Phòng</th>
                            <th class="center">Trạng Thái</th>
                            <th>Mô Tả</th>
                            <th class="center">Tạm Ngưng Sử Dụng</th>
                            <th><a href="#" class="panel-fullscreen">Chế Độ Toàn Màn Hình</a>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($getPhong as $value)
                        <tr>
                            <td class="center">Tầng {{$value->tang}}</td>
                            <td class="center">{{$value->ten}}</td>
                            <td class="center">{{$value->songuoi}}</td>
                            <td class="center">{{number_format($value->dongia, 0, ',', '.')}} (₫)</td>
                            <td class="center">{{$value->trangthai}}</td>
                            <td>{{$value->mota}}</td>
                            <td class="center"></td>
                            <td class="center">
                                <div class="btn-group btn-group-xs">
                                    <button style="margin-right: 1px;" class="btn btn-danger btn-rounded" onclick="return alertMsg('{{route('deletePhongFrontend',['id'=>$value->id])}}','Bạn Có Chắc Chắn Xoá {{$value->ten}} Không?');"><span class="glyphicon glyphicon-trash"></span></button>
                                    <a style="margin-left: 1px;" href="#" class="btn btn-info btn-rounded" data-toggle="modal" data-target=".token-{{$value->id}}"><span class="glyphicon glyphicon-pencil"></span></a>
                                </div>
                            </td>
                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="pull-right">{{$getPhong->links()}}</div>
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
            <form class="form-horizontal" role="form" method="POST" action="{{route('postAddPhongFrontend')}}" id="jvalidate" enctype="multipart/form-data">@csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Tên Phòng</label>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><input class="count-number" readonly type="text" name="countName" size=1 value="20" disabled="disabled">/20</span>
                                        <input name="txtName" id="txtName" type="text" class="form-control" placeholder="Nhập Tên Của Phòng" value="{{old('txtName')}}" onKeyDown="CountLeft(this.form.txtName, this.form.countName,20);" onKeyUp="CountLeft(this.form.txtName,this.form.countName,20);">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"> Khu Vực / Toà Nhà</label>
                                <div class="col-md-8">
                                    <select name="sltKhuVuc" class="form-control select">
                                        @foreach($getKhuVuc as $value)
                                        <option value="{{$value->id}}">{{$value->ten}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Số người Tối Đa</label>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><input class="count-number" readonly type="text" name="contPerson" size="1" value="2" disabled="disabled">/ &nbsp;2</span>
                                        <input name="txtSoNguoi" id="txtSoNguoi" type="number" class="form-control" placeholder="Nhập Số Người Tối Đa" value="{{old('txtSoNguoi')}}" onKeyDown="CountLeft(this.form.txtSoNguoi, this.form.contPerson,2);" onKeyUp="CountLeft(this.form.txtSoNguoi,this.form.contPerson,2);">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-3 control-label"> Tầng (Lầu)</label>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-addon"><input class="count-number" readonly type="text" name="countLevel" size="1" value="2" disabled="disabled">/ &nbsp;2</span>
                                        <input name="txtTang" id="txtTang" type="number" class="form-control" placeholder="Nhập Tầng (Lầu)" value="{{old('txtTang')}}" onKeyDown="CountLeft(this.form.txtTang, this.form.countLevel,2);" onKeyUp="CountLeft(this.form.txtTang,this.form.countLevel,2);">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"> Đơn Giá</label>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-addon"><input class="count-number" readonly type="text" name="countPrice" size="1" value="8" disabled="disabled">/ &nbsp;8</span>
                                        <input name="txtDonGia" id="txtDonGia" type="number" class="form-control" placeholder="Nhập Đơn Giá" value="{{old('txtDonGia')}}" onKeyDown="CountLeft(this.form.txtDonGia, this.form.countPrice,8);" onKeyUp="CountLeft(this.form.txtDonGia,this.form.countPrice,8);">
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
                    <button type="button" class="btn btn-default btn-rounded pull-left" data-toggle="tooltip" data-placement="right" data-dismiss="modal" title="Huỷ Bỏ" data-original-title="Huỷ Bỏ">Đóng</button>
                    <button type="submit" class="btn btn-success btn-rounded" data-toggle="tooltip" data-placement="left" title="" data-original-title="Tiến Hành Thêm Mới Phòng Trọ">Thêm Mới</button>
                </div>
            </form>
        </div>
    </div>
</div>
@foreach($getPhong as $value)
<div class="modal fade token-{{$value->id}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel"> Chỉnh Sửa Khu Vực / Toà Nhà</h4>
            </div>
            <form class="form-horizontal" role="form" method="POST" action="{{route('postEditPhongFrontend',['id'=>$value->id])}}" id="jvalidate" enctype="multipart/form-data">@csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Tên Phòng</label>
                                <div class="col-md-6">
                                    <input name="txtName" type="text" class="form-control" placeholder="Nhập Tên Của Phòng" value="{{$value->ten}}"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"> Khu Vực / Toà Nhà</label>
                                <div class="col-md-8">
                                    <select class="form-control select">
                                        @foreach($getKhuVuc as $kv)
                                        <option value="{{$kv->id}}" @if($value->khuvuc_id==$kv->id) selected @endif>{{$kv->ten}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Số gười Tối Đa</label>
                                <div class="col-md-6">
                                    <input name="txtSoNguoi" type="number" class="form-control" placeholder="Nhập Số Người Tối Đa" value="{{$value->songuoi}}"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-3 control-label"> Tầng (Lầu)</label>
                                <div class="col-md-6">
                                    <input name="txtTang" type="number" class="form-control" placeholder="Nhập Tầng (Lầu)" value="{{$value->tang}}"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"> Đơn Giá</label>
                                <div class="col-md-6">
                                    <input name="txtDonGia" type="text" class="form-control" placeholder="Nhập Đơn Giá" value="{{$value->dongia}}"/>
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
                    <button type="submit" class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Tiến Hành Chỉnh Sửa Khu Vực/Toà Nhà"> Cập Nhật</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
<div class="modal fade search" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel"> Tìm Kiếm Phòng Của <b style="color: #00B79D;"><?php echo Session::get('khuvucName'); ?></b></h4>
            </div>
            <form class="form-horizontal" role="form" method="GET" action="{{route('getListPhongFrontend')}}" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-3 control-label"> Tên Phòng</label>
                                <div class="col-md-8">                                 
                                    <select name="roomName" class="form-control select" data-live-search="true">
                                        <option>---Chọn Phòng---</option>
                                        @foreach($getAllPhong as $value)
                                        <option value="{{$value->ten}}"> {{$value->ten}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"> Trạng Thái</label>
                                <div class="col-md-8">                                 
                                    <select name="status" class="form-control select">
                                        <option>---Chọn Trạng Thái---</option>
                                        <option value="Còn Trống"> Còn Trống</option>
                                        <option value="Đã Được Thuê"> Đã Được Thuê</option>
                                        <option value="Đã Đặt Cọc"> Đã Đặt Cọc</option>
                                        <option value="Đang Thuê Và Đã Đặt Cọc"> Đang Thuê Và Đã Đặt Cọc</option>
                                        <option value="Tạm Dừng Sử Dụng"> Tạm Dừng Sử Dụng</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-3 control-label"> Giá Từ: </label>
                                <div class="col-md-8">                                 
                                    <div class="input-group">
                                        <span class="input-group-addon"><input class="count-number" readonly type="text" name="countStartPrice" size=1 value="11" disabled="disabled">/11</span>
                                        <input name="startPrice" id="startPrice" type="number" class="form-control" placeholder="Giá Nhỏ Nhất Muốn Tìm" value="{{old('startPrice')}}" onKeyDown="CountLeft(this.form.startPrice, this.form.countStartPrice,11);" onKeyUp="CountLeft(this.form.startPrice,this.form.countStartPrice,11);">
                                    </div>
                                </div>
                            </div>
                             <div class="form-group">
                                <label class="col-md-3 control-label"> Giá Đến: </label>
                                <div class="col-md-8">                                 
                                    <div class="input-group">
                                        <span class="input-group-addon"><input class="count-number" readonly type="text" name="countEndPrice" size=1 value="11" disabled="disabled">/11</span>
                                        <input name="endPrice" id="endPrice" type="number" class="form-control" placeholder="Giá Lớn Nhất Muốn Tìm" value="{{old('endPrice')}}" onKeyDown="CountLeft(this.form.endPrice, this.form.countEndPrice,11);" onKeyUp="CountLeft(this.form.endPrice,this.form.countEndPrice,11);">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-rounded pull-left" data-toggle="tooltip" data-placement="right" data-dismiss="modal" title="Huỷ Bỏ" data-original-title="Huỷ Bỏ">Đóng</button>
                    <button type="submit" class="btn btn-success btn-rounded" data-toggle="tooltip" data-placement="left" title="" data-original-title="Tiến Hành Tìm Kiếm Phòng Trọ"> Tìm Kiếm</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection