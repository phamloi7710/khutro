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
                            <th>Phòng</th>
                            <th class="center">Người Đại Diện</th>
                            <th class="center">Thời Hạn Hợp Đồng</th>
                            <th class="center">Ngày Bắt Đầu</th>
                            <th class="center">Ngày Hết Hạn</th>
                            <th class="center">Tiền Đặt Cọc</th>
                            <th class="center">Trả Trước Còn</th>
                            <th class="center"></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
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
                <h4 class="modal-title" id="myModalLabel"> Tạo Mới Hợp Đồng (<span style="color: #00B79D"><?php  echo Session::get('khuvucName')?></span>)</h4>
            </div>
            <form class="form-horizontal" role="form" method="POST" action="{{route('postAddHopDongFrontend')}}"  enctype="multipart/form-data">@csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-3 control-label"> Chọn Phòng</label>
                                <div class="col-md-8">
                                    <select name="sltKhuVuc" class="form-control select">
                                        @foreach($phong as $value)
                                        <option value="{{$value->id}}">{{$value->ten}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 30px;">
                        <div class="col-md-12">
                            <!-- START TABS -->                                
                            <div class="panel panel-default tabs">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="active"><a href="#tab-first" role="tab" data-toggle="tab">1. Chọn Khách Thuê</a></li>
                                    <li><a href="#tab-second" role="tab" data-toggle="tab">2. Chọn Dịch Vụ</a></li>
                                </ul>
                                <div class="panel-body tab-content">
                                    <div class="tab-pane active" id="tab-first">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <table class="table table-hover table-bordered table-condensed">
                                                    <thead>
                                                        <tr>
                                                            <th class="center" style="font-size: 20px;"><a href=""><span class="fa fa-plus-square"></span></a></th>
                                                            <th>Tên Khách Thuê</th>
                                                            <th>SĐT</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <td class="center" style="font-size: 20px;"><a href=""><span class="fa fa-plus-square"></span></a></td>
                                                        <td>Phạm Văn Lợi</td>
                                                        <td>0963227710</td>
                                                        <td class="center" style="font-size: 20px;"><a id="addPeople" href=""><span class="fa fa-pencil-square-o"></span></a></td>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="col-md-6">
                                                <table class="table table-hover table-bordered table-condensed">
                                                    <thead>
                                                        <tr>
                                                            <th class="center" style="font-size: 20px;"><a href=""><span class="fa fa-plus-square"></span></a></th>
                                                            <th>Tên Khách Thuê</th>
                                                            <th>SĐT</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <td class="center" style="font-size: 20px;"><a href=""><span class="fa fa-plus-square"></span></a></td>
                                                        <td>Phạm Văn Lợi</td>
                                                        <td>0963227710</td>
                                                        <td class="center" style="font-size: 20px;"><a href=""><span class="fa fa-pencil-square-o"></span></a></td>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab-second">
                                        
                                    </div>
                                </div>
                            </div>
                            <script>
                                $(document).ready(function(){
                                    
                                });
                            </script>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Người Đại Diện</label>
                                <div class="col-md-8">
                                    <select name="" class="form-control select">
                                        <option value="">---Chọn Người Đại Diện---</option>
                                        <option value="1">Phạm Văn Lợi</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Thời Hạn Hợp Đồng</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Kì Thanh Toán</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-3 control-label"> Tiền Cọc</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Ngày Bắt Đầu</label>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                        <input name="" type="text" class="form-control datepicker">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Ngày Kết Thúc</label>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                        <input name="" type="text" class="form-control datepicker">
                                    </div>
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
@endsection







