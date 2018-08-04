<ul class="x-navigation">
    <li class="xn-logo">
        <a href="index.html">Joli Admin</a>
        <a href="#" class="x-navigation-control"></a>
    </li>
    <li class="xn-profile">
        <a href="#" class="profile-mini">
            <img src="assets/images/users/avatar.jpg" alt="John Doe"/>
        </a>
        <div class="profile">
            <div class="profile-image">
                <img src="assets/images/users/avatar.jpg" alt="John Doe"/>
            </div>
            <div class="profile-data">
                <div class="profile-data-name">{{Auth::user()->name}}</div>
                <div class="profile-data-title">Web Developer/Designer</div>
            </div>
            <div class="profile-controls">
                <a href="pages-profile.html" class="profile-control-left"><span class="fa fa-info"></span></a>
                <a href="pages-messages.html" class="profile-control-right"><span class="fa fa-envelope"></span></a>
            </div>
        </div>                                                                        
    </li>
    <li class="xn-title">Navigation</li>
    <li>
        <a href="index.html"><span class="fa fa-desktop"></span> <span class="xn-text">Dashboard</span></a>                        
    </li>                    
    <li class="xn-openable">
        <a href="#"><span class="fa fa-files-o"></span> <span class="xn-text">Email Template</span></a>
        <ul>
            <li><a href="{{route('getListMailTemplate')}}"><span class="fa fa-image"></span> Danh Sách</a></li>
            <li><a href=""><span class="fa fa-image"></span> Thêm Mới</a></li>
        </ul>
    </li>                   
</ul>