<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class CheckRoleFrontend
{
    public function handle($request, Closure $next)
    {
        if(Auth::check())
        {
            $user = Auth::user();
            if($user->role == '1'){
                return $next($request);
            }else{
                return redirect()->back()->with('error','Bạn Không Có Quyền Truy Cập Vào Trang Này');
            }
        }else{
            return redirect()->route('getLoginFrontend');
        }
    }
}
