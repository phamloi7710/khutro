<ul class="x-navigation x-navigation-horizontal">
    <li class="xn-logo">
        <a href="index.html">Nhà Trọ</a>
        <a href="#" class="x-navigation-control"></a>
    </li>
    <li class="xn-openable">
        <a href="#"><span class="fa fa-building-o"></span><span class="xn-text"> Khu Nhà Trọ</span></a>
        <ul class="animated zoomIn">
            <li><a href="{{route('getListKhuVucFrontend')}}"><span class="fa fa-building-o"></span> Khu Trọ/Toà Nhà</a></li>
            <li><a href="{{route('getListPhongFrontend')}}"><span class="fa fa-home"></span> Phòng Trọ</a></li>
            <li><a href="{{route('getListDichVuFrontend')}}"><span class="fa fa-cloud"></span> Dịch Vụ</a></li>
            <li><a href="#"><span class="fa fa-desktop"></span>Thiết Bị</a></li>
        </ul>
    </li>
    <li class="xn-openable">
        <a href="#"><span class="fa fa-files-o"></span> <span class="xn-text"> Hợp Đồng</span></a>
        <ul class="animated zoomIn">
            <li><a href="{{route('getListKhachThueFrontend')}}"><span class="fa fa-image"></span>Khách Thuê Phòng</a></li>
            <li><a href="{{route('getListHopDongFrontend')}}"><span class="fa fa-image"></span>Hợp Đồng</a></li>
            <li><a href="#"><span class="fa fa-image"></span>Đặt Cọc Phòng</a></li>
            <li><a href="#"><span class="fa fa-image"></span>Lịch Sử Khách Thuê Phòng</a></li>
        </ul>
    </li>
    <li class="xn-openable">
        <a href="#"><span class="fa fa-files-o"></span> <span class="xn-text"> Hoá Đơn</span></a>
        <ul class="animated zoomIn">
            <li><a href="#"><span class="fa fa-image"></span>Điện Nước</a></li>
            <li><a href="#"><span class="fa fa-image"></span>Xuất Hoá Đơn</a></li>
            <li><a href="#"><span class="fa fa-image"></span>Trả Phòng</a></li>
            <li><a href="#"><span class="fa fa-image"></span>Hàng Tháng</a></li>
            <li><a href="#"><span class="fa fa-image"></span>Tiền Trả Trước</a></li>
            <li><a href="#"><span class="fa fa-image"></span>Đặt Cọc</a></li>
            <li><a href="#"><span class="fa fa-image"></span>Đặt Cọc Phòng</a></li>
            <li><a href="#"><span class="fa fa-image"></span>Phiếu Chi</a></li>
        </ul>
    </li>
    <li class="xn-openable">
        <a href="#"><span class="fa fa-files-o"></span> <span class="xn-text"> Báo Cáo</span></a>
        <ul class="animated zoomIn">
            <li><a href="#"><span class="fa fa-image"></span>Chung</a></li>
            <li><a href="#"><span class="fa fa-image"></span>Thu Chi</a></li>
            <li><a href="#"><span class="fa fa-image"></span>Kỳ</a></li>
            <li><a href="#"><span class="fa fa-image"></span>Doanh Thu</a></li>
            <li><a href="#"><span class="fa fa-image"></span>Dịch Vụ</a></li>
            <li><a href="#"><span class="fa fa-image"></span>Dư Nợ</a></li>
            <li><a href="#"><span class="fa fa-image"></span>Dự Báo</a></li>
            <li><a href="#"><span class="fa fa-image"></span>Phòng Trống</a></li>
            <li><a href="#"><span class="fa fa-image"></span>Hợp Đồng</a></li>
            <li><a href="#"><span class="fa fa-image"></span>Khách Thuê</a></li>
        </ul>
    </li>
    <li class="xn-openable">
        <a href="#"><span class="fa fa-cogs"></span><span class="xn-text"> Cài Đặt Hệ Thống</span></a>
        <ul class="animated zoomIn">
            <li><a href="#"><span class="fa fa-user"></span>Hồ Sơ Cá Nhân</a></li>
            <li><a href="#"><span class="fa fa-cog"></span>Cấu Hình Chung</a></li>
            <li><a href="#"><span class="fa fa-cloud"></span>Danh Sách Dịch Vụ</a></li>
            <li><a href="#"><span class="fa fa-calendar"></span>Công Thức</a></li>
            <li><a href="{{route('getListDonViFrontend')}}"><span class="fa fa-legal"></span>Đơn Vị</a></li>
        </ul>
    </li>
    <li class="xn-openable">
        <a href="{{route('getImageManager')}}"><span class="fa fa-file"></span><span class="xn-text"> Quản Lý File</span></a>
    </li>
    <li class="xn-icon-button pull-right">
        <a href="#" title="Thông Báo"><span class="fa fa-volume-up"></span></a>
        <div class="informer informer-danger">4</div>
        <div class="panel panel-primary animated zoomIn xn-drop-left xn-panel-dragging">
            <div class="panel-heading">
                <h3 class="panel-title"><span class="fa fa-comments"></span> Messages</h3>
                <div class="pull-right">
                    <span class="label label-danger">4 new</span>
                </div>
            </div>
            <div class="panel-body list-group list-group-contacts scroll" style="height: 200px;">
                <a href="#" class="list-group-item">
                    <div class="list-group-status status-online"></div>
                    <img src="assets/images/users/user2.jpg" class="pull-left" alt="John Doe"/>
                    <span class="contacts-title">John Doe</span>
                    <p>Praesent placerat tellus id augue condimentum</p>
                </a>
                <a href="#" class="list-group-item">
                    <div class="list-group-status status-away"></div>
                    <img src="assets/images/users/user.jpg" class="pull-left" alt="Dmitry Ivaniuk"/>
                    <span class="contacts-title">Dmitry Ivaniuk</span>
                    <p>Donec risus sapien, sagittis et magna quis</p>
                </a>
                <a href="#" class="list-group-item">
                    <div class="list-group-status status-away"></div>
                    <img src="assets/images/users/user3.jpg" class="pull-left" alt="Nadia Ali"/>
                    <span class="contacts-title">Nadia Ali</span>
                    <p>Mauris vel eros ut nunc rhoncus cursus sed</p>
                </a>
                <a href="#" class="list-group-item">
                    <div class="list-group-status status-offline"></div>
                    <img src="assets/images/users/user6.jpg" class="pull-left" alt="Darth Vader"/>
                    <span class="contacts-title">Darth Vader</span>
                    <p>I want my money back!</p>
                </a>
            </div>
            <div class="panel-footer text-center">
                <a href="pages-messages.html">Show all messages</a>
            </div>
        </div>
    </li>
    <li class="xn-icon-button pull-right">
        <a href="#" title="Thông Báo"><span class="fa fa-volume-up"></span></a>
        <div class="informer informer-danger">4</div>
        <div class="panel panel-primary animated zoomIn xn-drop-left xn-panel-dragging">
            <div class="panel-heading">
                <h3 class="panel-title"><span class="fa fa-comments"></span> Messages</h3>
                <div class="pull-right">
                    <span class="label label-danger">4 new</span>
                </div>
            </div>
            <div class="panel-body list-group list-group-contacts scroll" style="height: 200px;">
                <a href="#" class="list-group-item">
                    <div class="list-group-status status-online"></div>
                    <img src="assets/images/users/user2.jpg" class="pull-left" alt="John Doe"/>
                    <span class="contacts-title">John Doe</span>
                    <p>Praesent placerat tellus id augue condimentum</p>
                </a>
                <a href="#" class="list-group-item">
                    <div class="list-group-status status-away"></div>
                    <img src="assets/images/users/user.jpg" class="pull-left" alt="Dmitry Ivaniuk"/>
                    <span class="contacts-title">Dmitry Ivaniuk</span>
                    <p>Donec risus sapien, sagittis et magna quis</p>
                </a>
                <a href="#" class="list-group-item">
                    <div class="list-group-status status-away"></div>
                    <img src="assets/images/users/user3.jpg" class="pull-left" alt="Nadia Ali"/>
                    <span class="contacts-title">Nadia Ali</span>
                    <p>Mauris vel eros ut nunc rhoncus cursus sed</p>
                </a>
                <a href="#" class="list-group-item">
                    <div class="list-group-status status-offline"></div>
                    <img src="assets/images/users/user6.jpg" class="pull-left" alt="Darth Vader"/>
                    <span class="contacts-title">Darth Vader</span>
                    <p>I want my money back!</p>
                </a>
            </div>
            <div class="panel-footer text-center">
                <a href="pages-messages.html">Show all messages</a>
            </div>
        </div>
    </li>
    <li class="xn-openable pull-right">
        <a href="#"><span class="fa fa-user"></span> <span class="xn-text">Tài Khoản </span></a>
        <ul class="animated zoomIn">
            <li><a href="{{route('getIndexProfile')}}"><span class="fa fa-info"></span> Thông Tin Tài Khoản</a></li>
            <li><a href="{{route('getChangePassUser')}}"><span class="fa fa-lock"></span> Đổi Mật Khẩu</a></li>
            <li><a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span> Đăng Xuất</a></li>
        </ul>
    </li>
    
</ul>