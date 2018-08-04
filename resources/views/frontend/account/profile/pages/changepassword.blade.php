@section('title')
Thay Đổi Mật Khẩu Tài Khoản
@stop
@extends('frontend.account.profile.general.master')
@section('contentProfile')

<div class="content-frame-body">
    <div class="panel panel-default">
        <div class="panel-body">
            <form id="jvalidate"  method="POST" action="{{route('postChangePassUser')}}" role="form" class="form-horizontal">
            	@csrf
                <div class="panel-body">                                    
                    <div class="form-group">
                        <label class="col-md-3 control-label">Mật Khẩu Cũ: </label>  
                        <div class="col-md-6">
                            <input type="password" class="form-control" name="txtOldPassword">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Mật Khẩu Mới: </label>  
                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control" name="txtNewPassword">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Nhập Lại Mật Khẩu Mới: </label>  
                        <div class="col-md-6">
                            <input type="password" class="form-control" name="txtReNewPassword">
                        </div>
                    </div>                    
                    <div class="btn-group pull-right">
                        <button class="btn btn-success" type="submit">Lưu Lại Thay Đổi</button>
                    </div>                                 
                </div>                                               
            </form>
        </div>
    </div>
</div>

@endsection