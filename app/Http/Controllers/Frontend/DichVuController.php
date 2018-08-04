<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\DichVu;
use App\Model\DonVi;
use App\Model\KhuVuc;
use Auth;
use Session;
class DichVuController extends Controller
{
    public function getList()
    {
        if (Session()->has('khuvucId')) {
            $dichvu = DichVu::where('khuvuc_id', Session::get('khuvucId'));
            $donvi = DonVi::where('khuvuc_id', Session::get('khuvucId'))->get();
            $getDichVu = $dichvu->paginate(20);
        }
        else{
            $kv = KhuVuc::where('user_id', Auth::user()->id)->value('ten');
            if(isset($kv)){
                $khuvuc = KhuVuc::where('user_id', Auth::user()->id)->value('id');
                $tenkhuvuc = KhuVuc::where('user_id', Auth::user()->id)->value('ten');
                
                if($khuvuc && intval($khuvuc)>0)
                {
                    Session::put('khuvucId',$khuvuc);
                    Session::put('khuvucName',$tenkhuvuc);
                }
                $dichvu = DichVu::where('khuvuc_id', Session::get('khuvucId'));
                $donvi = DonVi::where('khuvuc_id', Session::get('khuvucId'))->get();
                $getDichVu = $dichvu->paginate(20);
            }
            else{
                Session::forget('khuvucId');
                Session::forget('khuvucName');
                $sectionKhuVucId = '';
                $sectionKhuVucName = '';
                $dichvu = DichVu::where('khuvuc_id', $sectionKhuVucId);
                $getDichVu = $dichvu->paginate(20);
            }
        }
        $getKhuVuc = KhuVuc::where('user_id', Auth::user()->id)->get();
    	return view('frontend.pages.khutro.pages.dichvu.index',['dichvu'=>$dichvu,'donvi'=>$donvi,'getKhuVuc'=>$getKhuVuc,'getDichVu'=>$getDichVu]);
    }
    public function postAdd(Request $request)
    {
    	$dichvu = new DichVu();
    	$dichvu->ten = $request->txtName;
    	$dichvu->dongia = $request->txtDonGia;
    	$dichvu->dongiatheodaunguoi = $request->txtDonGiaTheoDauNguoi;
    	$dichvu->donvi_id = $request->sltDonVi;
    	$dichvu->mota = $request->mota;
        $dichvu->khuvuc_id = Session::get('khuvucId');
    	$dichvu->save();
    	return redirect()->back()->with('success', 'Thêm Mới Dịch Vụ Thành Công!');
    }
    public function postEdit(Request $request,$id)
    {
    	$dichvu = DichVu::find($id);
    	$dichvu->ten = $request->txtName;
    	$dichvu->dongia = $request->txtDonGia;
    	$dichvu->dongiatheodaunguoi = $request->txtDonGiaTheoDauNguoi;
    	$dichvu->donvi_id = $request->sltDonVi;
    	$dichvu->mota = $request->mota;
    	$dichvu->save();
    	return redirect()->back()->with('success', 'Cập Nhật Dịch Vụ Thành Công!');
    }
    public function delete($id)
    {
    	$dichvu = DichVu::find($id);
    	$dichvu->delete();
    	return redirect()->back()->with('success', 'Xoá Dịch Vụ Thành Công!');
    }
}
