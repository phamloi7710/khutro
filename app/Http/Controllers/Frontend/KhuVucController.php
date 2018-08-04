<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\KhuVuc;
use Auth;
class KhuVucController extends Controller
{
    public function getList()
    {
    	$khuvuc = KhuVuc::where('user_id', Auth::user()->id)->get();
    	return view('frontend.pages.khutro.pages.khuvuc.index', ['khuvuc'=>$khuvuc]);
    }
    public function postAdd(Request $request)
    {
    	$khuvuc = new KhuVuc();
    	$khuvuc->ten = $request->txtName;
    	$khuvuc->user_id = Auth::user()->id;
    	$khuvuc->diachi = $request->txtAddress;
    	$khuvuc->mota = $request->mota;
    	$khuvuc->save();
    	return redirect()->route('getListKhuVucFrontend')->with('success', 'Thêm Mới Khu Vực Thành Công!');
    }
    public function postEdit(Request $request,$id)
    {
    	$khuvuc = KhuVuc::find($id);
    	$khuvuc->ten = $request->txtName;
    	$khuvuc->diachi = $request->txtAddress;
    	$khuvuc->mota = $request->mota;
    	$khuvuc->save();
    	return redirect()->route('getListKhuVucFrontend')->with('success', 'Cập Nhật Khu Vực Thành Công!');
    }
    public function delete(Request $request,$id)
    {
    	$khuvuc = KhuVuc::find($id);
    	$khuvuc->delete();
    	return redirect()->route('getListKhuVucFrontend')->with('success', 'Xoá Khu Vực Thành Công!');
    }
}
