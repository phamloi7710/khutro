<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\KhuVuc;
use App\Model\Phong;
use Session;
use Auth;
class PhongController extends Controller
{
    public function section($tenkhuvuc)
	{
		$khuvuc = KhuVuc::where('ten', $tenkhuvuc)->where('user_id', Auth::user()->id)->value('id');
        if($khuvuc&&intval($khuvuc)>0)
        {
            Session::put('khuvucId',$khuvuc);
            Session::put('khuvucName',$tenkhuvuc);
        }

        return redirect()->back()->with('success', 'Lấy Danh Sách Khu Vực Thành Công!');
	} 
    public function getList(Request $request)
    {

        // $roomName = $request->roomName;
        // $status = $request->roomName;
        // $startPrice = $request->startPrice;
        // $endPrice = $request->endPrice;
       
    	if (Session()->has('khuvucId')) {
		    $phong = Phong::where('khuvuc_id', Session::get('khuvucId'));
            $getPhong = $phong->paginate(20)->appends($request->all());
		}
		else{
			$a = KhuVuc::where('user_id', Auth::user()->id)->value('ten');
			if(isset($a)){
				$khuvuc = KhuVuc::where('user_id', Auth::user()->id)->value('id');
				$tenkhuvuc = KhuVuc::where('user_id', Auth::user()->id)->value('ten');
                
				if($khuvuc && intval($khuvuc)>0)
		        {
		            Session::put('khuvucId',$khuvuc);
		            Session::put('khuvucName',$tenkhuvuc);
		        }
	            $phong = Phong::where('khuvuc_id', Session::get('khuvucId'));
                $getPhong = $phong->paginate(20)->appends($request->all());
			}
			else{
				Session::forget('khuvucId');
				Session::forget('khuvucName');
				$sectionKhuVucId = '';
				$sectionKhuVucName = '';
				$phong = Phong::where('khuvuc_id', $sectionKhuVucId);
                $getPhong = $phong->paginate(20)->appends($request->all());
			}
			
		}
    	
    	
    	$getKhuVuc = KhuVuc::where('user_id', Auth::user()->id)->get();
        $getAllPhong = Phong::where('khuvuc_id', Session::get('khuvucId'))->get();
    	return view('frontend.pages.khutro.pages.phong.index', ['getPhong'=>$getPhong, 'phong'=>$phong, 'getKhuVuc'=>$getKhuVuc, 'getAllPhong'=>$getAllPhong]);
    }
    public function postAdd(Request $request)
    {
    	$phong = new Phong();
    	$phong->ten = $request->txtName;
    	$phong->khuvuc_id = $request->sltKhuVuc;
        Session::forget('khuvucId');
        Session::forget('khuvucName');
        $khuvucId = KhuVuc::where('id', $request->sltKhuVuc)->value('id');
        $khuvucName = KhuVuc::where('id', $request->sltKhuVuc)->value('ten');
        Session::put('khuvucId',$khuvucId);
        Session::put('khuvucName',$khuvucName);
    	$phong->songuoi = $request->txtSoNguoi;
    	$phong->tang = $request->txtTang;
    	$phong->dongia = $request->txtDonGia;
    	$phong->mota = $request->mota;
    	$phong->save();
    	return redirect()->back()->with('success', 'Thêm Mới Phòng Trọ Thành Công!');
    }
    public function postEdit(Request $request, $id)
    {
        $phong = Phong::find($id);
    	$phong->ten = $request->txtName;
    	$phong->songuoi = $request->txtSoNguoi;
    	$phong->tang = $request->txtTang;
    	$phong->dongia = $request->txtDonGia;
    	$phong->mota = $request->mota;
    	$phong->save();
    	return redirect()->back()->with('success', 'Cập Nhật Phòng Trọ Thành Công!');
    }
    public function delete($id)
    {
        $phong = Phong::find($id);
        $phong->delete();
        return redirect()->back()->with('success', 'Xoá Phòng Trọ Thành Công!');
    }
}
