<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Str;
use App\Mail\ResetPasswordSeccess;
use App\Mail\RegisterSuccess;
use App\Model\MailTemplate;
use App\User;
use Session;
class AccountController extends Controller
{
    public function getRegister()
    {
    	return view('frontend.account.register');
    }
    public function postRegister(Request $request)
    {
    	$user = new User();
    	$user->name = $request->txtName;
    	$user->phone = $request->txtPhone;
        $user->username = 'test';
        $user->isAdmin = 'false';
    	$user->role = '1';
    	$user->goidichvu_id = $request->sltGoiDichVu;
    	$user->email = $request->txtEmail;
    	$password = 'user_'.rand(11111111, 99999999);
    	$user->password = bcrypt($password);
    	$user->save();
    	Mail::to($request->txtEmail)->send(new RegisterSuccess($user,$password));
        return redirect()->route('getLoginFrontend')->with('success','Đăng Ký Thành Công. Mật khẩu đã được gửi tới email của quý khách. Vui lòng kiểm tra email để hoàn tất thủ tục!');
    }
    public function getLogin()
    {
        if(Auth::check())
        {
            return redirect()->route('getIndexFrontend');
        }
        else
        {
            return view('frontend.account.login');
        }
    }
    public function postLogin(Request $request)
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if(Auth::attempt($data)){
            Session::put('user_id', Auth::user()->id);
            return redirect()->route('getIndexFrontend')->with('success','Đăng Nhập Thành Công!');

        }
        else{
            return redirect()->route('login')->with('success','Đăng Nhập Thất Bại!');;
        }
    }
    public function getLogoutFrontend() {
       Auth::logout();
       Session::flush();
       return redirect()->route('getLoginFrontend');
    }
    public function getforgot()
    {
        return view('frontend.account.forgotpassword');
    }
    public function postforgot(Request $request)
    {
        $this->validateEmail($request);
        
        $response = $this->broker()->sendResetLink(
            $request->only('email')
        );
        return $response == Password::RESET_LINK_SENT ? $this->sendResetLinkResponse($response) : $this->sendResetLinkFailedResponse($request, $response);
    }
    protected function validateEmail(Request $request)
    {
        $this->validate($request, ['email' => 'required|email']);
    }
    protected function sendResetLinkResponse($response)
    {
        return back()->with('status', trans($response));
    }
    protected function sendResetLinkFailedResponse(Request $request, $response)
    {
        return back()->withErrors(
            ['email' => trans($response)]
        );
    }
    //reset pass
    public function getResetPass(Request $request, $token = null)
    {
        return view('frontend.account.resetpassword')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }
    public function postResetPass(Request $request)
    {
        $this->validate($request, $this->rules(), $this->validationErrorMessages());
        $response = $this->broker()->reset(
            $this->credentials($request), function ($user, $password) {
                $this->resetPassword($user, $password);
            }
        );
        return $response == Password::PASSWORD_RESET
                    ? $this->sendResetResponse($response)
                    : $this->sendResetFailedResponse($request, $response);
    }
    protected function rules()
    {
        return [
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:6',
        ];
    }
    protected function validationErrorMessages()
    {
        return [];
    }
    protected function credentials(Request $request)
    {
        return $request->only(
            'email', 'password', 'password_confirmation', 'token'
        );
    }
    protected function resetPassword($user, $password)
    {
        $user->forceFill([
            'password' => bcrypt($password),
            'remember_token' => Str::random(60),
        ])->save();
        $this->guard()->login($user);
    }
    protected function sendResetResponse($response)
    {
        return redirect()->route('getIndexFrontend')->with('thongbao', trans($response));
    }
    protected function sendResetFailedResponse(Request $request, $response)
    {
        return redirect()->back()
                    ->withInput($request->only('email'))
                    ->withErrors(['email' => trans($response)]);
    }
    public function broker()
    {
        return Password::broker();
    }
    protected function guard()
    {
        return Auth::guard();
    }
}
