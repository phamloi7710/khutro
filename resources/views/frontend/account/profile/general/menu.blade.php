<ul class="breadcrumb push-down-0">
    <li><a href="{{route('getIndexFrontend')}}">Trang Chủ</a></li>
    <li><a href="{{route('getIndexProfile')}}">Tài Khoản</a></li>
    <li class="active">@yield('title')</li>
</ul>
<div class="content-frame">
    <div class="content-frame-top">
        <div class="page-title">
            <h2><span class="fa fa-arrow-circle-o-left"></span> {{Auth::user()->name}}</h2>
        </div>
        <div class="pull-right">
            <button class="btn btn-default content-frame-left-toggle"><span class="fa fa-bars"></span></button>
        </div>
    </div>
    <div class="content-frame-left">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="panel panel-default" id="loi">
                    <div class="panel-body profile" style="background: url('assets/images/gallery/music-4.jpg') center center no-repeat;">
                        <div class="profile-image">
                            <img src="assets/assets/images/users/user3.jpg" alt="Nadia Ali"/>
                        </div>
                        <div class="profile-data">
                            <div class="profile-data-name">Nadia Ali</div>
                            <div class="profile-data-title" style="color: #FFF;">Singer-Songwriter</div>
                        </div>
                        <div class="profile-controls">
                            <a href="#" class="profile-control-left twitter"><span class="fa fa-twitter"></span></a>
                            <a href="#" class="profile-control-right facebook"><span class="fa fa-facebook"></span></a>
                        </div>                                    
                    </div>                                
                    <div class="panel-body">                                    
                        <div class="row">
                            <div class="col-md-6">
                                <button class="btn btn-info btn-rounded btn-block"><span class="fa fa-check"></span> Following</button>
                            </div>
                            <div class="col-md-6">
                                <button class="btn btn-primary btn-rounded btn-block"><span class="fa fa-comments"></span> Chat</button>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body list-group">
                        <a href="{{route('getIndexProfile')}}" class="list-group-item"><span class="fa fa-info"></span> Thông Tin Cá Nhân</a>
                    </div>
                    <div class="panel-body list-group">
                        <a href="{{route('getChangePassUser')}}" class="list-group-item"><span class="fa fa-lock"></span> Thay Đổi Mật Khẩu</a>
                    </div>
                </div> 
            </div>
        </div>
    </div>