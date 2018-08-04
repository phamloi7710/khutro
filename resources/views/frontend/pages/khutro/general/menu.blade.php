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
                <a href="{{route('getListKhuVucFrontend')}}" class="list-group-item"><span class="glyphicon glyphicon-home"></span> Khu Vực / Toà Nhà </a>
                <a href="{{route('getListPhongFrontend')}}" class="list-group-item"><span class="glyphicon glyphicon-user"></span> Phòng Trọ </a>
                <a href="{{route('getListDichVuFrontend')}}" class="list-group-item"><span class="fa fa-money"></span> Dịch Vụ</a>
                <a href="#" class="list-group-item"><span class="fa fa-flag"></span> Thiết Bị</a>                      
            </div>                        
        </div>
    </div>