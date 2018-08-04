
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
                    <form action="{{route('postForgotFrontend')}}" class="form-horizontal" method="post">
                        @csrf
                    <div class="form-group">
                        <div class="col-md-12">
                            <input name="email" type="email" class="form-control" placeholder="Nhập Vào Email Của Bạn"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-info btn-block"> Gửi Yêu Cầu</button>
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