<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use App\User;
class AccountController extends Controller
{
   	public function getLogin()
   	{
   		return view('admin.account.login');
   	}
   	public function postLogin(Request $request)
   	{
   		$data = [
            'username' => $request->username,
            'password' => $request->password,
            'isAdmin' => 'true',
        ];
    	if(Auth::attempt($data)){
    		return redirect()->route('getIndexAdmin')->with('success','Đăng Nhập Thành Công!');
    	}
    	else{
    		return redirect()->route('login')->with('success','Đăng Nhập Thất Bại!');;
    	}
    }
    public function getLogoutAdmin() {
       Auth::logout();
       return redirect()->route('getLoginAdmin');
    }
}
