
<!DOCTYPE html>
<html lang="en" class="body-full-height">
    <head>        
        <!-- META SECTION -->
        <title>Joli Admin - Responsive Bootstrap Admin Template</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <!-- END META SECTION -->
        <base href="{{url('')}}">
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="assets/css/theme-default.css"/>
        <link rel="stylesheet" type="text/css" id="theme" href="assets/css/custom.css"/>  
        <script type="text/javascript" src="assets/js/plugins/jquery/jquery.min.js"></script>

        <script type="text/javascript" src="assets/js/custom.js"></script>                                     
    </head>
    <body>
        
        <div class="login-container">
        
            <div class="login-box animated fadeInDown">
                <!-- <div class="login-logo"></div> -->
                <div class="login-body">
                    <div class="login-title">Đăng Ký Sử Dụng Dịch Vụ</div>
                    <form id="jvalidate" action="{{route('postRegisterUser')}}" class="form-horizontal" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input name="txtEmail" type="text" class="form-control" placeholder="Nhập Email"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input name="txtName" type="text" class="form-control" placeholder="Nhập Họ Và Tên"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input name="txtPhone" type="text" class="form-control" placeholder="Nhập Số Điện Thoại"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <select name="sltGoiDichVu" class="form-control">
                                            <option value="">---Chọn Gói Dịch Vụ---</option>
                                            <option value="1">Gói 1 (Quy mô từ 05 đến 10 phòng)</option>
                                            <option value="2">Gói 2 (Quy mô từ 11 đến 20 phòng)</option>
                                            <option value="3">Gói 3 (Quy mô từ 21 đến 40 phòng)</option>
                                            <option value="4">Gói 4 (Quy mô từ 41 đến 60 phòng)</option>
                                            <option value="5">Gói 5 (Quy mô từ 61 đến 90 phòng)</option>
                                            <option value="6">Gói VIP (Không giới hạn số phòng)</option>
                                            <option value="7">Gói Miễn Phí (Quy mô từ 01 đến 05 phòng)</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <!-- <a href="#" class="btn btn-link btn-block">Đăng Nhập</a> -->
                                    </div>
                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-info btn-block">Đăng Ký</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="login-footer">
                    <div class="pull-left">
                        &copy;2019 Hệ Thống Quản Lý Nhà Trọ Thông Minh
                    </div>
                </div>
            </div>
            
        </div>
        <!-- START PLUGINS -->
        <script type="text/javascript" src="assets/js/plugins/jquery/jquery-ui.min.js"></script>
        <script type="text/javascript" src="assets/js/plugins/bootstrap/bootstrap.min.js"></script> 
        <script type="text/javascript" src="assets/js/plugins/icheck/icheck.min.js"></script>
        <script type="text/javascript" src="assets/js/plugins/bootstrap/bootstrap-select.js"></script>
        <script type="text/javascript" src="assets/js/plugins.js"></script>
        <!-- validation -->
        <script type="text/javascript" src="assets/js/plugins/maskedinput/jquery.maskedinput.min.js"></script>
        <script type="text/javascript" src="assets/js/plugins/validationengine/languages/jquery.validationEngine-vi.js"></script>
        <script type="text/javascript" src="assets/js/plugins/validationengine/jquery.validationEngine.js"></script>        

        <script type="text/javascript" src="assets/js/plugins/jquery-validation/jquery.validate.js"></script>
    </body>
</html>






