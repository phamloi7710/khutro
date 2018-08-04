@section('title')
Quản Lý Khách Thuê
@stop
@extends('frontend.pages.khachthue.general.master')
@section('contentKhachThue')
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
	        <div class="panel-body panel-body-table">
	            <table class="table table-hover table-bordered table-condensed">
                    <thead>
                        <tr>
                            <th>Tên Khách Thuê</th>
                            <th class="center">Số Điện Thoại</th>
                            <th class="center">Phòng</th>
                            <th class="center">Nghề Nghiệp</th>
                            <th class="center">Nơi Công Tác</th>
                            <th class="center">Đại Diện Phòng</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($getKhachThue as $value)
                        <tr>
                            <td>{{$value->ten}}</td>
                            <td>{{$value->sodienthoai}}</td>
                            <td>{{$value->phong}}</td>
                            <td>{{$value->nghenghiep}}</td>
                            <td>{{$value->noicongtac}}</td>
                            <td>{{$value->daidienphong}}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="#" data-toggle="dropdown" class="btn btn-primary dropdown-toggle" aria-expanded="false">Chọn Tác Vụ <span class="caret"></span></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#" data-toggle="modal" data-target=".token-{{$value->id}}">Chỉnh Sửa</a></li> 
                                        <li><a href="">Lịch Sử</a></li> 
                                        <li><a href="">Xuất Đăng Ký Tạm Trú</a></li> 
                                        <li><a href="javascript:;" onclick="return alertMsg('{{route('deleteKhachThueFrontend',['id'=>$value->id])}}','Bạn Có Chắc Chắn Xoá {{$value->ten}} Không?');">Xoá</a></li> 
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
	        </div>
	    </div>
	</div>
</div>
<!-- id="jvalidate" -->
<div class="modal fade add-new" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel"> Thêm Mới Khách Thuê (<span style="color: #00B79D"><?php  echo Session::get('khuvucName')?></span>)</h4>
            </div>
            <form class="form-horizontal" role="form" method="POST" action="{{route('postAddKhachThueFrontend')}}"  enctype="multipart/form-data">@csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Họ Tên</label>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><input class="count-number" readonly type="text" name="countName" size=1 value="50" disabled="disabled">/50</span>
                                        <input name="txtName" id="txtName" type="text" class="form-control" placeholder="Nhập Đầy Đủ Họ Tên" value="{{old('txtName')}}" onKeyDown="CountLeft(this.form.txtName, this.form.countName,50);" onKeyUp="CountLeft(this.form.txtName,this.form.countName,50);">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Số Điện Thoại</label>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><input class="count-number" readonly type="text" name="countPhone" size="1" value="11" disabled="disabled">/11</span>
                                        <input name="txtPhone" id="txtPhone" type="number" class="form-control" placeholder="Nhập Số Điện Thoại" value="{{old('txtPhone')}}" onKeyDown="CountLeft(this.form.txtPhone, this.form.countPhone,11);" onKeyUp="CountLeft(this.form.txtPhone,this.form.countPhone,11);">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Ngày Sinh</label>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                        <input name="txtBirthday" type="text" class="form-control datepicker">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Số CMND</label>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><input class="count-number" readonly type="text" name="countCMND" size="1" value="50" disabled="disabled">/50</span>
                                        <input name="txtCMND" id="txtCMND" type="text" class="form-control" placeholder="Nhập Số CMND" value="{{old('txtPhone')}}" onKeyDown="CountLeft(this.form.txtCMND, this.form.countCMND,50);" onKeyUp="CountLeft(this.form.txtCMND,this.form.countCMND,50);">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Nơi Cấp</label>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><input class="count-number" readonly type="text" name="countNoiCap" size=1 value="50" disabled="disabled">/50</span>
                                        <input name="txtNoiCap" id="txtNoiCap" type="text" class="form-control" placeholder="Nhập Nơi Cấp" value="{{old('txtNoiCap')}}" onKeyDown="CountLeft(this.form.txtNoiCap, this.form.countNoiCap,50);" onKeyUp="CountLeft(this.form.txtNoiCap,this.form.countNoiCap,50);">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Ngày Cấp</label>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                        <input name="ngaycap" type="text" class="form-control datepicker">

                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Đăng Ký Tạm Trú</label>
                                <div class="col-md-8">
                                    <div class="col-md-4">                                    
                                        <label class="check"><input type="checkbox" class="icheckbox" checked="checked"/> Checked</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Nghề Nghiệp</label>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><input class="count-number" readonly type="text" name="countNgheNghiep" size=1 value="50" disabled="disabled">/50</span>
                                        <input name="txtNgheNghiep" id="txtNgheNghiep" type="text" class="form-control" placeholder="Nhập Nghề Nghiệp" value="{{old('txtNgheNghiep')}}" onKeyDown="CountLeft(this.form.txtNgheNghiep, this.form.countNgheNghiep,50);" onKeyUp="CountLeft(this.form.txtNgheNghiep,this.form.countNgheNghiep,50);">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Nơi Công Tác</label>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><input class="count-number" readonly type="text" name="countNoiCongTac" size=1 value="99" disabled="disabled">/99</span>
                                        <input name="txtNoiCongTac" id="txtNoiCongTac" type="text" class="form-control" placeholder="Nhập Nơi Công Tác" value="{{old('txtNoiCongTac')}}" onKeyDown="CountLeft(this.form.txtNoiCongTac, this.form.countNoiCongTac,99);" onKeyUp="CountLeft(this.form.txtNoiCongTac,this.form.countNoiCongTac,99);">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Email</label>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><input class="count-number" readonly type="text" name="countEmail" size=1 value="99" disabled="disabled">/99</span>
                                        <input name="txtEmail" id="txtEmail" type="text" class="form-control" placeholder="Nhập Email" value="{{old('txtEmail')}}" onKeyDown="CountLeft(this.form.txtEmail, this.form.countEmail,99);" onKeyUp="CountLeft(this.form.txtEmail,this.form.countEmail,99);">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Giới Tính</label>
                                <div class="col-md-8">
                                    <div class="col-md-4">                                    
                                        <label class="check"><input type="radio" value="Nam" class="iradio" name="gioitinh"> Nam</label>
                                    </div>
                                    <div class="col-md-4">                                    
                                        <label class="check"><input type="radio" value="Nữ" class="iradio" name="gioitinh"> Nữ</label>
                                    </div>
                                    <div class="col-md-4">                                    
                                        <label class="check"><input type="radio" value="Khác" class="iradio" name="gioitinh"> Khác</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Hộ Khẩu</label>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><input class="count-number" readonly type="text" name="countHoKhau" size=1 value="99" disabled="disabled">/99</span>
                                        <input name="txtHoKhau" id="txtHoKhau" type="text" class="form-control" placeholder="Nhập Hộ Khẩu" value="{{old('txtHoKhau')}}" onKeyDown="CountLeft(this.form.txtHoKhau, this.form.countHoKhau,99);" onKeyUp="CountLeft(this.form.txtHoKhau,this.form.countHoKhau,99);">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Số Điện Thoại Liên Hệ</label>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><input class="count-number" readonly type="text" name="countSDTLienHe" size=1 value="11" disabled="disabled">/11</span>
                                        <input name="txtSoDienThoaiLienHe" id="txtSoDienThoaiLienHe" type="number" class="form-control" placeholder="Nhập Số Điện Thoại Liên Hệ" value="{{old('txtSoDienThoaiLienHe')}}" onKeyDown="CountLeft(this.form.txtSoDienThoaiLienHe, this.form.countSDTLienHe,11);" onKeyUp="CountLeft(this.form.txtSoDienThoaiLienHe,this.form.countSDTLienHe,11);">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"> Ghi Chú</label>
                                <div class="col-md-8">
                                    <textarea name="ghichu" class="form-control" rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                         <div class="col-md-12" style="margin-top: 20px;">
                            <div class="col-md-4">
                                <span class="label label-info label-form">Ảnh Đại Diện</span>
                                <div class="thumbnail">
                                    <img style="width: 218px; height: 150px;" id="previewAvatar" src="assets/assets/images/no-image.jpg" alt="">
                                </div>
                                <div class="center">
                                    <a data-input="avatar" data-preview="previewAvatar" class=" btn btn-info btn-rounded selectImage" data-toggle="tooltip" data-placement="bottom" data-original-title="Chọn Ảnh Đại Diện">Chọn Ảnh</a>
                                    <input id="avatar" name="avatar" class="form-control" type="hidden">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <span class="label label-info label-form">Ảnh CMND Mặt Trước</span>
                                <div class="thumbnail">
                                    <img style="width: 218px; height: 150px;" id="previewCMNDMatTruoc" src="assets/assets/images/no-image.jpg" alt="">
                                </div>
                                <div class="center">
                                    <a data-input="cmndMatTruoc" data-preview="previewCMNDMatTruoc" class=" btn btn-info btn-rounded selectImage" data-toggle="tooltip" data-placement="bottom" data-original-title="Chọn Ảnh CMND Mặt Trước">Chọn Ảnh</a>
                                    <input id="cmndMatTruoc" name="cmndMatTruoc" class="form-control" type="hidden" >
                                </div>
                            </div>
                            <div class="col-md-4">
                                <span class="label label-info label-form">Ảnh CMND Mặt Sau</span>
                                <div class="thumbnail">
                                    <img style="width: 218px; height: 150px;" id="previewCMNDMatSau" src="assets/assets/images/no-image.jpg" alt="">
                                </div>
                                <div class="center">
                                    <a data-input="cmndMatSau" data-preview="previewCMNDMatSau" class="btn btn-info btn-rounded selectImage" data-toggle="tooltip" data-placement="bottom" data-original-title="Chọn Ảnh CMND Mặt Sau">Chọn Ảnh</a>
                                    <input id="cmndMatSau" name="cmndMatSau" class="form-control" type="hidden" >
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
@foreach($getKhachThue as $value)
<div class="modal fade token-{{$value->id}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel"> Chỉnh Sửa Thông Tin Khách Thuê</h4>
            </div>
            <form class="form-horizontal" role="form" method="POST" action="{{route('postEditKhachThueFrontend',['id'=>$value->id])}}" id="jvalidate" enctype="multipart/form-data">@csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Họ Tên</label>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><input class="count-number" readonly type="text" name="countName" size=1 value="50" disabled="disabled">/50</span>
                                        <input name="txtName" id="txtName" type="text" class="form-control" placeholder="Nhập Đầy Đủ Họ Tên" value="{{$value->ten}}" onKeyDown="CountLeft(this.form.txtName, this.form.countName,50);" onKeyUp="CountLeft(this.form.txtName,this.form.countName,50);">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Số Điện Thoại</label>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><input class="count-number" readonly type="text" name="countPhone" size="1" value="11" disabled="disabled">/11</span>
                                        <input name="txtPhone" id="txtPhone" type="number" class="form-control" placeholder="Nhập Số Điện Thoại" value="{{$value->sodienthoai}}" onKeyDown="CountLeft(this.form.txtPhone, this.form.countPhone,11);" onKeyUp="CountLeft(this.form.txtPhone,this.form.countPhone,11);">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Ngày Sinh</label>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                        <input name="txtBirthday" type="text" class="form-control datepicker">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Số CMND</label>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><input class="count-number" readonly type="text" name="countCMND" size="1" value="50" disabled="disabled">/50</span>
                                        <input name="txtCMND" id="txtCMND" type="text" class="form-control" placeholder="Nhập Số CMND" value="{{$value->cmnd}}" onKeyDown="CountLeft(this.form.txtCMND, this.form.countCMND,50);" onKeyUp="CountLeft(this.form.txtCMND,this.form.countCMND,50);">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Nơi Cấp</label>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><input class="count-number" readonly type="text" name="countNoiCap" size=1 value="50" disabled="disabled">/50</span>
                                        <input name="txtNoiCap" id="txtNoiCap" type="text" class="form-control" placeholder="Nhập Nơi Cấp" value="{{$value->noicap}}" onKeyDown="CountLeft(this.form.txtNoiCap, this.form.countNoiCap,50);" onKeyUp="CountLeft(this.form.txtNoiCap,this.form.countNoiCap,50);">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Ngày Cấp</label>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                        <input name="ngaycap" type="text" class="form-control datepicker">

                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Đăng Ký Tạm Trú</label>
                                <div class="col-md-8">
                                    <div class="col-md-4">                                    
                                        <label class="check"><input type="checkbox" class="icheckbox" checked="checked"/> Checked</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Nghề Nghiệp</label>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><input class="count-number" readonly type="text" name="countNgheNghiep" size=1 value="50" disabled="disabled">/50</span>
                                        <input name="txtNgheNghiep" id="txtNgheNghiep" type="text" class="form-control" placeholder="Nhập Nghề Nghiệp" value="{{$value->nghenghiep}}" onKeyDown="CountLeft(this.form.txtNgheNghiep, this.form.countNgheNghiep,50);" onKeyUp="CountLeft(this.form.txtNgheNghiep,this.form.countNgheNghiep,50);">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Nơi Công Tác</label>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><input class="count-number" readonly type="text" name="countNoiCongTac" size=1 value="99" disabled="disabled">/99</span>
                                        <input name="txtNoiCongTac" id="txtNoiCongTac" type="text" class="form-control" placeholder="Nhập Nơi Công Tác" value="{{$value->noicongtac}}" onKeyDown="CountLeft(this.form.txtNoiCongTac, this.form.countNoiCongTac,99);" onKeyUp="CountLeft(this.form.txtNoiCongTac,this.form.countNoiCongTac,99);">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Email</label>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><input class="count-number" readonly type="text" name="countEmail" size=1 value="99" disabled="disabled">/99</span>
                                        <input name="txtEmail" id="txtEmail" type="text" class="form-control" placeholder="Nhập Email" value="{{$value->email}}" onKeyDown="CountLeft(this.form.txtEmail, this.form.countEmail,99);" onKeyUp="CountLeft(this.form.txtEmail,this.form.countEmail,99);">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Giới Tính</label>
                                <div class="col-md-8">
                                    <div class="col-md-4">                                    
                                        <label class="check"><input type="radio" value="Nam" class="iradio" name="gioitinh" @if($value->gioitinh=='Nam') checked @endif> Nam</label>
                                    </div>
                                    <div class="col-md-4">                                    
                                        <label class="check"><input type="radio" value="Nữ" class="iradio" name="gioitinh" @if($value->gioitinh=='Nữ') checked @endif> Nữ</label>
                                    </div>
                                    <div class="col-md-4">                                    
                                        <label class="check"><input type="radio" value="Khác" class="iradio" name="gioitinh" @if($value->gioitinh=='Khác') checked @endif> Khác</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Hộ Khẩu</label>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><input class="count-number" readonly type="text" name="countHoKhau" size=1 value="99" disabled="disabled">/99</span>
                                        <input name="txtHoKhau" id="txtHoKhau" type="text" class="form-control" placeholder="Nhập Hộ Khẩu" value="{{$value->hokhau}}" onKeyDown="CountLeft(this.form.txtHoKhau, this.form.countHoKhau,99);" onKeyUp="CountLeft(this.form.txtHoKhau,this.form.countHoKhau,99);">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Số Điện Thoại Liên Hệ</label>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><input class="count-number" readonly type="text" name="countSDTLienHe" size=1 value="11" disabled="disabled">/11</span>
                                        <input name="txtSoDienThoaiLienHe" id="txtSoDienThoaiLienHe" type="number" class="form-control" placeholder="Nhập Số Điện Thoại Liên Hệ" value="{{$value->sodienthoailienhe}}" onKeyDown="CountLeft(this.form.txtSoDienThoaiLienHe, this.form.countSDTLienHe,11);" onKeyUp="CountLeft(this.form.txtSoDienThoaiLienHe,this.form.countSDTLienHe,11);">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"> Ghi Chú</label>
                                <div class="col-md-8">
                                    <textarea name="ghichu" class="form-control" rows="3">{{$value->ghichu}}</textarea>
                                </div>
                            </div>
                        </div>
                         <div class="col-md-12" style="margin-top: 20px;">
                            <div class="col-md-4">
                                <span class="label label-info label-form">Ảnh Đại Diện</span>
                                <div class="thumbnail">
                                    @if($value->anhdaidien==NULL)
                                    <img style="width: 218px; height: 150px;" id="previewAvatarEdit" src="assets/assets/images/no-image.jpg" alt="">
                                    @else
                                    <img style="width: 218px; height: 150px;" id="previewAvatarEdit" src="{{url('')}}/{{$value->anhdaidien}}" alt="">
                                    @endif
                                </div>
                                <div class="center">
                                    <a data-input="avatarEdit" data-preview="previewAvatarEdit" class=" btn btn-info btn-rounded selectImage" data-toggle="tooltip" data-placement="bottom" data-original-title="Chọn Ảnh Đại Diện">Chọn Ảnh</a>
                                    <input id="avatarEdit" name="avatar" class="form-control" type="hidden">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <span class="label label-info label-form">Ảnh CMND Mặt Trước</span>
                                <div class="thumbnail">
                                    <img style="width: 218px; height: 150px;" id="previewCMNDMatTruocEdit" src="assets/assets/images/no-image.jpg" alt="">
                                </div>
                                <div class="center">
                                    <a data-input="cmndMatTruocEdit" data-preview="previewCMNDMatTruocEdit" class=" btn btn-info btn-rounded selectImage" data-toggle="tooltip" data-placement="bottom" data-original-title="Chọn Ảnh CMND Mặt Trước">Chọn Ảnh</a>
                                    <input id="cmndMatTruocEdit" name="cmndMatTruoc" class="form-control" type="hidden" >
                                </div>
                            </div>
                            <div class="col-md-4">
                                <span class="label label-info label-form">Ảnh CMND Mặt Sau</span>
                                <div class="thumbnail">
                                    <img style="width: 218px; height: 150px;" id="previewCMNDMatSauEdit" src="assets/assets/images/no-image.jpg" alt="">
                                </div>
                                <div class="center">
                                    <a data-input="cmndMatSauEdit" data-preview="previewCMNDMatSauEdit" class="btn btn-info btn-rounded selectImage" data-toggle="tooltip" data-placement="bottom" data-original-title="Chọn Ảnh CMND Mặt Sau">Chọn Ảnh</a>
                                    <input id="cmndMatSauEdit" name="cmndMatSau" class="form-control" type="hidden" >
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
<script>
    $(document).ready(function(){
        $('.selectImage').filemanager('image');
        var lfm = function(options, cb) {
            var route_prefix = (options && options.prefix) ? options.prefix : '/uplaods';
            window.open(route_prefix + '?type=' + options.type || 'file', 'FileManager', 'width=1200,height=600');
            window.SetUrl = cb;
        };
    });
</script>

@endsection