<?php

namespace App\Http\Controllers\Frontend;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function getIndex()
    {
    	if(Auth::check())
        {
            return view('frontend.index');
        }
        else
        {
            return redirect()->route('getLoginFrontend');
        }
    }
}
