@section('title')
Quản Lý Đơn Vị
@stop
@extends('frontend.pages.hethong.general.master')
@section('contentHeThong')
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
            <div class="panel-body table-responsive">
                <table class="table table-hover table-bordered  table-condensed">
                    <thead>
                        <tr>
                            <th style="width: 25%;">Tên Đơn Vị</th>
                            <th style="width: 55%;">Mô Tả</th>
                            <th style="width: 10%;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($donvi as $value)
                        <tr style=line-height: auto;"">
                            <td>{{$value->ten}}</td>
                            <td>{{$value->mota}}</td>
                            <td class="center">
                                <div class="btn-group btn-group-xs">
                                    <button class="btn btn-danger btn-rounded" onclick="return alertMsg('{{route('deleteDonViFrontend',['id'=>$value->id])}}','Bạn Có Chắc Chắn Xoá {{$value->ten}} Không?');"><span class="glyphicon glyphicon-trash"></span></button>
                                    <a href="#" class="btn btn-info btn-rounded" data-toggle="modal" data-target=".token-{{$value->id}}"><span class="glyphicon glyphicon-pencil"></span></a>
                                </div> 
                            </td>
                            @endforeach
                        </tr>
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
                <h4 class="modal-title" id="myModalLabel"> Thêm Mới Đơn Vị</h4>
            </div>
            <form class="form-horizontal" role="form" method="POST" action="{{route('postAddDonViFrontend')}}" id="jvalidate" enctype="multipart/form-data">@csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-md-3 control-label">Tên Đơn Vị</label>
                        <div class="col-md-8">
                            <div class="input-group">
                                <span class="input-group-addon"><input class="count-number" readonly type="text" name="countName" size=1 value="20" disabled="disabled">/20</span>
                                <input name="txtName" id="txtName" type="text" class="form-control" placeholder="Nhập Tên Của Đơn Vị" value="{{old('txtName')}}" onKeyDown="CountLeft(this.form.txtName, this.form.countName,20);" onKeyUp="CountLeft(this.form.txtName,this.form.countName,20);">
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
                    <button type="button" class="btn btn-default pull-left" data-toggle="tooltip" data-placement="right" data-dismiss="modal" title="Huỷ Bỏ" data-original-title="Huỷ Bỏ">Đóng</button>
                    <button type="submit" class="btn btn-success" data-toggle="tooltip" data-placement="left" title="" data-original-title="Tiến Hành Thêm Mới Phòng Trọ">Thêm Mới</button>
                </div>
            </form>
        </div>
    </div>
</div>
@foreach($donvi as $value)
<div class="modal fade token-{{$value->id}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel"> Chỉnh Sửa Khu Vực / Toà Nhà</h4>
            </div>
            <form class="form-horizontal" role="form" method="POST" action="{{route('postEditDonViFrontend',['id'=>$value->id])}}" id="jvalidate" enctype="multipart/form-data">@csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-md-3 control-label">Tên Đơn Vị</label>
                        <div class="col-md-8">
                            <div class="input-group">
                                <span class="input-group-addon"><input class="count-number" readonly type="text" name="countName" size=1 value="20" disabled="disabled">/20</span>
                                <input name="txtName" id="txtName" type="text" class="form-control" placeholder="Nhập Tên Của Đơn Vị" value="{{$value->ten}}" onKeyDown="CountLeft(this.form.txtName, this.form.countName,20);" onKeyUp="CountLeft(this.form.txtName,this.form.countName,20);">
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
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-toggle="tooltip" data-placement="bottom" data-dismiss="modal" title="Huỷ Bỏ" data-original-title="Huỷ Bỏ">Đóng</button>
                    <button type="submit" class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Tiến Hành Chỉnh Sửa Khu Vực/Toà Nhà"> Cập Nhật</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
@endsection