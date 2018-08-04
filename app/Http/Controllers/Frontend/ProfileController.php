<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use Hash;
use Auth;
use Validator;
class ProfileController extends Controller
{
    public function getIndex()
    {
    	return view('frontend.account.profile.index');
    }
    public function getChangePass()
    {
    	return view('frontend.account.profile.pages.changepassword');
    }
    public function postChangePass(Request $request)
    {
    	$user = Auth::user();
    	$oldpassword = $request->txtOldPassword;
    	if (!Hash::check($oldpassword, $user->password)) {
            Session::flash('error', 'Mật Khẩu Cũ Không Đúng!');
        }
        else{
        	$user->password = bcrypt($request->txtReNewPassword);
            Session::flash('success', 'Mật Khẩu Của Bạn Đã Được Thay Đổi');
            $user->save();
        }
        return redirect()->route('getChangePassUser');
    }
}
