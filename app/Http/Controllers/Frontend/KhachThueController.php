<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\KhuVuc;
use App\Model\KhachThue;
use Auth;
use Session;
class KhachThueController extends Controller
{
    public function getList()
    {
    	if (Session()->has('khuvucId')) {
		    $khachthue = KhachThue::where('khuvuc_id', Session::get('khuvucId'));
            $getKhachThue = $khachthue->paginate(20);
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
	            $khachthue = KhachThue::where('khuvuc_id', Session::get('khuvucId'));
            	$getKhachThue = $khachthue->paginate(20);
			}
			else{
				Session::forget('khuvucId');
				Session::forget('khuvucName');
				$sectionKhuVucId = '';
				$sectionKhuVucName = '';
				$khachthue = KhachThue::where('khuvuc_id', Session::get('khuvucId'));
            	$getKhachThue = $khachthue->paginate(20);
			}
			
		}
    	$getKhuVuc = KhuVuc::where('user_id', Auth::user()->id)->get();
    	return view('frontend.pages.khachthue.pages.khachthue.index',['getKhachThue'=>$getKhachThue, 'khachthue'=>$khachthue, 'getKhuVuc'=>$getKhuVuc]);
    }
    public function postAdd(Request $request)
    {
    	$khachthue = new KhachThue();
    	$khachthue->ten = $request->txtName;
    	$khachthue->email = $request->txtEmail;
    	$khachthue->sodienthoai = $request->txtPhone;
    	$khachthue->ngaysinh = strtotime($request->txtBirthday);
    	$khachthue->cmnd = $request->txtCMND;
    	$khachthue->noicap = $request->txtNoiCap;
    	$khachthue->ngaycap = strtotime($request->ngaycap);
    	$khachthue->nghenghiep = $request->txtNgheNghiep;
    	$khachthue->noicongtac = $request->txtNoiCongTac;
    	$khachthue->gioitinh = $request->gioitinh;
    	$khachthue->hokhau = $request->txtHoKhau;
    	$khachthue->sodienthoailienhe = $request->txtSoDienThoaiLienHe;
    	$khachthue->ghichu = $request->ghichu;
    	$khachthue->khuvuc_id = Session::get('khuvucId');
    	$khachthue->anhdaidien = $request->avatar;
    	$khachthue->cmndmattruoc = $request->cmndMatTruoc;
    	$khachthue->cmndmatsau = $request->cmndMatSau;
    	$khachthue->save();
    	return redirect()->back()->with('success', 'Thêm Mới Khách Thuê Thành Công!');
    }
    public function postEdit(Request $request, $id)
    {
    	$khachthue = KhachThue::find($id);
    	$khachthue->ten = $request->txtName;
    	$khachthue->email = $request->txtEmail;
    	$khachthue->sodienthoai = $request->txtPhone;
    	$khachthue->ngaysinh = strtotime($request->txtBirthday);
    	$khachthue->cmnd = $request->txtCMND;
    	$khachthue->noicap = $request->txtNoiCap;
    	$khachthue->ngaycap = strtotime($request->ngaycap);
    	$khachthue->nghenghiep = $request->txtNgheNghiep;
    	$khachthue->noicongtac = $request->txtNoiCongTac;
    	$khachthue->gioitinh = $request->gioitinh;
    	$khachthue->hokhau = $request->txtHoKhau;
    	$khachthue->sodienthoailienhe = $request->txtSoDienThoaiLienHe;
    	$khachthue->ghichu = $request->ghichu;
    	$khachthue->khuvuc_id = Session::get('khuvucId');
    	$khachthue->anhdaidien = $request->avatar;
    	$khachthue->cmndmattruoc = $request->cmndMatTruoc;
    	$khachthue->cmndmatsau = $request->cmndMatSau;
    	$khachthue->save();
    	return redirect()->back()->with('success', 'Cập Nhật Khách Thuê Thành Công!');
    }
    public function delete($id)
    {
    	$khachthue = KhachThue::find($id);
    	$khachthue->delete();
    	return redirect()->back()->with('success', 'Xoá Khách Thuê Thành Công!');
    }
}
