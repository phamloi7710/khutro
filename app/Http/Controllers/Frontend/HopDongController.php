<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\KhuVuc;
use App\Model\Phong;
use Auth;
use Session;
class HopDongController extends Controller
{
    public function getList()
    {
    	$phong = Phong::all();
    	$getKhuVuc = KhuVuc::where('user_id', Auth::user()->id)->get();
    	return view('frontend.pages.khachthue.pages.hopdong.index',['getKhuVuc'=>$getKhuVuc, 'phong'=>$phong]);
    }
}
