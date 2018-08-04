
<!DOCTYPE html>
<html lang="en" class="body-full-height">
    <head>
        <title> Khôi phục mật khẩu</title>
        <base href="{{asset('')}}">            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="icon" href="assets/favicon.ico" type="image/x-icon" />
        <link rel="stylesheet" type="text/css" id="theme" href="assets/css/theme-default.css"/>
    </head>
    <body>
        <div class="login-container">
        @if(Session('error'))
        <div id="thongbao" class="error message">
            <h3>Error !</h3>
            <h5>{{Session('error')}}</h5>
        </div>
        @endif
        @if(Session('success'))
        <div id="thongbao" class="success message">
            <h3>Success !</h3>
            <h5>{{Session('success')}}</h5>
        </div>
        @endif
            <div class="login-box animated fadeInDown">
                <div class="login-logo"></div>
                <div class="login-body">
                    <div class="login-title"> Khôi Phục Mật Khẩu Của Bạn</div>
                    <form action="{{route('postResetPassFrontend')}}" class="form-horizontal" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="form-group  {{ $errors->has('email') ? ' has-error' : '' }}">
                            <div class="col-md-12">
                                <input id="email" value="{{ $email or old('email') }}" name="email" type="email" class="form-control" placeholder="Nhập Vào Email Của Bạn" required autofocus>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                            <div class="col-md-12">
                                <input id="password" name="password" type="text" class="form-control" placeholder="Nhập Vào Mật Khẩu Mới Của Bạn"/>
                                @if($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <div class="col-md-12">
                                <input id="password-confirm" name="password_confirmation" type="text" class="form-control" placeholder="Nhập Lại Mật Khẩu Mới Của Bạn"/>
                                @if($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-info btn-block"> Khôi Phục</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="login-footer">
                    <div class="pull-left">
                        &copy; 2018 Hệ Thống Quản Lý Nhà Trọ Thông Minh
                    </div>
                </div>
            </div>
            
        </div>
        
    </body>
</html>