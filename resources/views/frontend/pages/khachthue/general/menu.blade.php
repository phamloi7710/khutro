<ul class="breadcrumb push-down-0">
    <li><a href="{{route('getIndexFrontend')}}">Trang Chủ</a></li>
    <li><a href="{{route('getIndexProfile')}}">Tài Khoản</a></li>
    <li class="active">@yield('title')</li>
</ul>
<div class="content-frame">
    <div class="content-frame-top">
        <div class="page-title">
            <h2><span class="glyphicon glyphicon-home"></span> <?php echo Session::get('khuvucName'); ?></h2>
        </div>
        <div class="pull-right">
            <button class="btn btn-default content-frame-left-toggle"><span class="fa fa-bars"></span></button>
        </div>
    </div>
    <div class="content-frame-left">
        <div class="block">
            <div class="list-group border-bottom">
                <a href="{{route('getListKhachThueFrontend')}}" class="list-group-item"><span class="fa fa-user"></span> Khách Thuê Phòng </a>
                <a href="{{route('getListHopDongFrontend')}}" class="list-group-item"><span class="fa fa-list"></span> Hợp Đồng </a>
                <a href="" class="list-group-item"><span class="fa fa-money"></span> Đặt Cọc Phòng</a>
                <a href="#" class="list-group-item"><span class="fa fa-flag"></span> Lịch Sử Khách Thuê Phòng</a>                      
            </div>                        
        </div>
    </div>