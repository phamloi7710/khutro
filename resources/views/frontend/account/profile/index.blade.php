@section('title')
Tài Khoản Của Bạn
@stop
@extends('frontend.account.profile.general.master')
@section('contentProfile')
<div class="content-frame-body">
    <div class="panel panel-default">
        <div class="panel-body">
            <!-- START TIMELINE -->
				<div class="timeline timeline-right">
				    <!-- START TIMELINE ITEM -->
				    <div class="timeline-item timeline-main">
				        <div class="timeline-date">Today</div>
				    </div>
				    <!-- END TIMELINE ITEM -->                                                  
				    <!-- START TIMELINE ITEM -->
				    <div class="timeline-item timeline-item-right">
				        <div class="timeline-item-info">21:37</div>
				        <div class="timeline-item-icon"><span class="fa fa-users"></span></div>
				        <div class="timeline-item-content">
				            <div class="timeline-heading" style="padding-bottom: 10px;">
				                <img src="assets/assets/images/users/user3.jpg"/>
				                <a href="#">Nadia Ali</a> added to friends 
				                <img src="assets/assets/images/users/user.jpg"/>
				                <img src="assets/assets/images/users/user2.jpg"/>
				                <img src="assets/assets/images/users/user4.jpg"/>
				            </div>
				            <div class="timeline-body comments">
				                <div class="comment-item">
				                    <img src="assets/assets/images/users/user.jpg"/>
				                    <p class="comment-head">
				                        <a href="#">Dmitry Ivaniuk</a> <span class="text-muted">@Aqvatarius</span>
				                    </p>
				                    <p>Thank you so much... I would like to meet you :)</p>
				                    <small class="text-muted">15min ago</small>
				                </div>
				                <div class="comment-item">
				                    <img src="assets/assets/images/users/user3.jpg"/>
				                    <p class="comment-head">
				                        <a href="#">Nadia Ali</a> <span class="text-muted">@nadiaAli</span>
				                    </p>
				                    <p>Sure, i will contact you ;)</p>
				                    <small class="text-muted">16min ago</small>
				                </div>
				                <div class="comment-write">                                                
				                    <textarea class="form-control" placeholder="Write a comment" rows="1"></textarea>                                                
				                </div>
				            </div>
				        </div>
				    </div>
				    <!-- END TIMELINE ITEM -->
				    <!-- START TIMELINE ITEM -->
				    <div class="timeline-item timeline-item-right">
				        <div class="timeline-item-info">20:23</div>
				        <div class="timeline-item-icon"><span class="fa fa-reply"></span></div>
				        <div class="timeline-item-content">
				            <div class="timeline-heading padding-bottom-0">
				                <img src="assets/assets/images/users/user2.jpg"/> <a href="#">John Doe</a> posted article <a href="#">How to...?</a>
				            </div>
				            <div class="timeline-body">
				                <img src="assets/images/gallery/nature-6.jpg" width="200" class="img-text" align="left"/> 
				                <h4>Lorem ipsum dolor</h4>
				                <p>Aenean ultricies condimentum pellentesque. Maecenas pulvinar arcu vel tortor aliquet commodo. Phasellus dapibus nisl quis nunc pharetra, id lobortis arcu sagittis. Nunc facilisis nibh non diam dictum, vitae iaculis tellus egestas. Curabitur vitae dui tempus, tempus metus vitae, cursus nunc. In cursus odio vitae metus commodo, in posuere ante varius.</p>
				                <p>Mauris sodales faucibus est, eu consequat dolor tristique in. Quisque at lacus sed ligula semper iaculis. In eu imperdiet ipsum. Ut vestibulum ornare venenatis.</p>
				                <ul class="list-tags push-up-10">
				                    <li><a href="#"><strong>#</strong>tempor</a></li>
				                    <li><a href="#"><strong>#</strong>eros</a></li>
				                    <li><a href="#"><strong>#</strong>suspendisse</a></li>
				                    <li><a href="#"><strong>#</strong>dolor</a></li>
				                </ul>
				            </div>
				            <div class="timeline-footer">
				                <a href="#">Details</a>
				                <div class="pull-right">
				                    <a href="#"><span class="fa fa-comments"></span> 35</a> 
				                    <a href="#"><span class="fa fa-eye"></span> 1,432</a>
				                </div>
				            </div>
				        </div>
				    </div>
				    <!-- END TIMELINE ITEM -->                                                                
				    <!-- START TIMELINE ITEM -->
				    <div class="timeline-item timeline-main">
				        <div class="timeline-date">Yesterday</div>
				    </div>
				    <!-- END TIMELINE ITEM -->                                
				    <!-- START TIMELINE ITEM -->
				    <div class="timeline-item timeline-item-right">
				        <div class="timeline-item-info">20:23</div>
				        <div class="timeline-item-icon"><span class="fa fa-info-circle"></span></div>
				        <div class="timeline-item-content">
				            <div class="timeline-heading padding-bottom-0">
				                <img src="assets/assets/images/users/user3.jpg"/> <a href="#">Nadia Ali</a> changed status to:
				            </div>
				            <div class="timeline-body">                                            
				                <i>Peace Will Come, This World Will Rest, Once We Have Togetherness</i>
				            </div>
				        </div>
				    </div>
				    <!-- END TIMELINE ITEM -->                                
				    <!-- START TIMELINE ITEM -->
				    <div class="timeline-item timeline-item-right">
				        <div class="timeline-item-info">18:34</div>
				        <div class="timeline-item-icon"><span class="fa fa-photo"></span></div>
				        <div class="timeline-item-content">
				            <div class="timeline-heading">
				                <img src="assets/assets/images/users/user3.jpg"/> <a href="#">Nadia Ali</a> added images to gallery
				            </div>
				            <div class="timeline-body">
				                <div class="row">
				                    <div class="col-md-3">
				                        <a href="#">
				                        <img src="assets/images/gallery/music-2.jpg" class="img-responsive img-text"/>
				                        </a>
				                    </div>
				                    <div class="col-md-3">
				                        <a href="#">
				                        <img src="assets/images/gallery/music-3.jpg" class="img-responsive img-text"/>
				                        </a>                                                    
				                    </div>
				                    <div class="col-md-3">
				                        <a href="#">
				                        <img src="assets/images/gallery/space-1.jpg" class="img-responsive img-text"/>
				                        </a>                                                    
				                    </div>
				                    <div class="col-md-3">
				                        <a href="#">
				                        <img src="assets/images/gallery/space-2.jpg" class="img-responsive img-text"/>
				                        </a>                                                    
				                    </div>
				                </div>
				                <ul class="list-tags push-up-10">
				                    <li><a href="#"><strong>#</strong>tempor</a></li>
				                    <li><a href="#"><strong>#</strong>eros</a></li>
				                    <li><a href="#"><strong>#</strong>suspendisse</a></li>
				                    <li><a href="#"><strong>#</strong>dolor</a></li>
				                </ul>
				            </div>
				        </div>
				    </div>
				    <!-- END TIMELINE ITEM -->
				    <!-- START TIMELINE ITEM -->
				    <div class="timeline-item timeline-item-right">
				        <div class="timeline-item-info">15:21</div>
				        <div class="timeline-item-icon"><span class="fa fa-users"></span></div>
				        <div class="timeline-item-content">
				            <div class="timeline-heading" style="padding-bottom: 10px;">
				                <img src="assets/assets/images/users/user3.jpg"/>
				                <a href="#">Nadia Ali</a> added to friends 
				                <img src="assets/assets/images/users/user5.jpg"/>
				                <img src="assets/assets/images/users/user6.jpg"/>
				                <img src="assets/assets/images/users/user7.jpg"/>
				            </div>
				            <div class="timeline-body comments">
				                <div class="comment-item">
				                    <img src="assets/assets/images/users/user6.jpg"/>
				                    <p class="comment-head">
				                        <a href="#">Darth Vader</a> <span class="text-muted">@darthvader</span>
				                    </p>
				                    <p>Hello, honey!</p>
				                    <small class="text-muted">15min ago</small>
				                </div>
				                <div class="comment-write">                                                
				                    <textarea class="form-control" placeholder="Write a comment" rows="1"></textarea>                                                
				                </div>
				            </div>
				        </div>
				    </div>
				    <!-- END TIMELINE ITEM -->
				    <!-- START TIMELINE ITEM -->
				    <div class="timeline-item timeline-main">
				        <div class="timeline-date"><a href="#"><span class="fa fa-ellipsis-h"></span></a></div>
				    </div>
				    <!-- END TIMELINE ITEM -->
				</div>
				<!-- END TIMELINE -->
        </div>
    </div>
</div>
@endsection