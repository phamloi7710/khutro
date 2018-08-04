<?php
Route::group(['prefix'=>'admin', 'middleware'=>'checkRoleAdmin'], function (){
	Route::get('dang-nhap.html', 'Admin\AccountController@getLogin')->name('getLoginAdmin');
	Route::post('dang-nhap.html', 'Admin\AccountController@postLogin')->name('postLoginAdmin');
	Route::get('', 'Admin\AmdinController@getIndex')->name('getIndexAdmin');
	Route::group(['mail-template'], function (){
		Route::get('danh-sach', 'Admin\MailtemplateController@getList')->name('getListMailTemplate');
		Route::post('them-moi', 'Admin\MailtemplateController@postAdd')->name('postAddMailTemplate');
	});
});
Route::get('dang-ky.html','Frontend\AccountController@getRegister')->name('getRegisterUser');
Route::post('dang-ky.html','Frontend\AccountController@postRegister')->name('postRegisterUser');
Route::get('dang-nhap.html','Frontend\AccountController@getLogin')->name('getLoginFrontend');
Route::post('dang-nhap.html','Frontend\AccountController@postLogin')->name('postLoginFrontend');
Route::get('dang-xuat.html','Frontend\AccountController@getLogoutFrontend')->name('getLogoutFrontend');
Route::get('khoi-phuc-mat-khau.html','Frontend\AccountController@getforgot')->name('getForgotFrontend');
Route::post('khoi-phuc-mat-khau.html','Frontend\AccountController@postforgot')->name('postForgotFrontend');
Route::get('khoi-phuc-mat-khau-{token}', 'Frontend\AccountController@getResetPass')->name('getResetPassFrontend');
Route::post('khoi-phuc-mat-khau', 'Frontend\AccountController@postResetPass')->name('postResetPassFrontend');
Route::group(['middleware'=>'checkRoleFrontend'], function(){
	Route::get('quan-ly-hinh-anh', function(){
		return view('frontend.pages.imageManager');
	})->name('getImageManager');
	Route::get('uploads', '\UniSharp\LaravelFilemanager\controllers\LfmController@show');
    Route::post('uploads/upload', '\UniSharp\LaravelFilemanager\controllers\UploadController@upload');
	Route::group(['prefix'=>'tai-khoan'], function(){
		Route::get('', 'Frontend\ProfileController@getIndex')->name('getIndexProfile');
		Route::get('thay-doi-mat-khau.html', 'Frontend\ProfileController@getChangePass')->name('getChangePassUser');
		Route::post('thay-doi-mat-khau.html', 'Frontend\ProfileController@postChangePass')->name('postChangePassUser');
	});
	Route::group(['prefix'=>'khu-vuc'], function(){
		Route::get('', 'Frontend\KhuVucController@getList')->name('getListKhuVucFrontend');
		Route::post('them-moi', 'Frontend\KhuVucController@postAdd')->name('postAddKhuVucFrontend');
		Route::post('sua/{id}', 'Frontend\KhuVucController@postEdit')->name('postEditKhuVucFrontend');
		Route::get('delete/{id}', 'Frontend\KhuVucController@delete')->name('deleteKhuVuc');
	});
	Route::group(['prefix'=>'phong-tro'], function(){
		Route::get('set-section-khu-vuc/{tenkhuvuc}','Frontend\PhongController@section')->name('getSectionFrontend');
		Route::get('danh-sach', 'Frontend\PhongController@getList')->name('getListPhongFrontend');
		Route::post('them-moi', 'Frontend\PhongController@postAdd')->name('postAddPhongFrontend');
		Route::post('chinh-sua/{id}', 'Frontend\PhongController@postEdit')->name('postEditPhongFrontend');
		Route::get('xoa/{id}', 'Frontend\PhongController@delete')->name('deletePhongFrontend');
	});
	Route::group(['prefix'=>'dich-vu'], function(){
		Route::get('danh-sach', 'Frontend\DichVuController@getList')->name('getListDichVuFrontend');
		Route::post('them-moi', 'Frontend\DichVuController@postAdd')->name('postAddDichVuFrontend');
		Route::post('chinh-sua/{id}', 'Frontend\DichVuController@postEdit')->name('postEditDichVuFrontend');
		Route::get('xoa/{id}', 'Frontend\DichVuController@delete')->name('deleteDichVuFrontend');
	});
	Route::group(['prefix'=>'don-vi'], function(){
		Route::get('danh-sach', 'Frontend\DonViController@getList')->name('getListDonViFrontend');
		Route::post('them-moi', 'Frontend\DonViController@postAdd')->name('postAddDonViFrontend');
		Route::post('chinh-sua/{id}', 'Frontend\DonViController@postEdit')->name('postEditDonViFrontend');
		Route::get('xoa/{id}', 'Frontend\DonViController@delete')->name('deleteDonViFrontend');
	});
	Route::group(['prefix'=>'khach-thue'], function (){
		Route::get('danh-sach', 'Frontend\KhachThueController@getList')->name('getListKhachThueFrontend');
		Route::post('them-moi', 'Frontend\KhachThueController@postAdd')->name('postAddKhachThueFrontend');
		Route::post('chinh-sua/{id}', 'Frontend\KhachThueController@postEdit')->name('postEditKhachThueFrontend');
		Route::get('xoa/{id}', 'Frontend\KhachThueController@delete')->name('deleteKhachThueFrontend');
	});
	Route::group(['prefix'=>'hop-dong'], function (){
		Route::get('danh-sach', 'Frontend\HopDongController@getList')->name('getListHopDongFrontend');
		Route::post('them-moi', 'Frontend\HopDongController@postAdd')->name('postAddHopDongFrontend');
		Route::post('chinh-sua/{id}', 'Frontend\HopDongController@postEdit')->name('postEditHopDongFrontend');
		Route::get('xoa/{id}', 'Frontend\HopDongController@delete')->name('deleteHopDongFrontend');
	});
});

Route::get('','Frontend\HomeController@getIndex')->name('getIndexFrontend');
Auth::routes(); 



















