
<!DOCTYPE html>
<html lang="en" class="body-full-height">
    <head>        
        <!-- META SECTION -->
        <title> Đăng Nhập Quản Trị Hệ Thống Nhà Trọ</title>
        <base href="{{asset('')}}">            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="icon" href="assets/favicon.ico" type="image/x-icon" />
        <link rel="stylesheet" type="text/css" id="theme" href="assets/css/theme-default.css"/>
    </head>
    <body>
        
        <div class="login-container">
        
            <div class="login-box animated fadeInDown">
                <div class="login-logo"></div>
                <div class="login-body">
                    <div class="login-title"> Đăng Nhập Hệ Thống</div>
                    <form action="{{route('postLoginFrontend')}}" class="form-horizontal" method="post">
                        @csrf
                    <div class="form-group">
                        <div class="col-md-12">
                            <input name="email" type="email" class="form-control" placeholder="Email Đăng Nhập"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input name="password" type="password" class="form-control" placeholder="Mật Khẩu"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <a href="{{route('getForgotFrontend')}}" class="btn btn-link btn-block"> Quên Mật Khẩu?</a>
                        </div>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-info btn-block"> Đăng Nhập</button>
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






