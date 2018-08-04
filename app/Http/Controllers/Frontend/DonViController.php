<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\DonVi;
use App\Model\KhuVuc;
use Auth;
use Session;
class DonViController extends Controller
{
    public function getList()
    {
        if (Session()->has('khuvucId')) {
            $donvi = DonVi::where('khuvuc_id', Session::get('khuvucId'))->get();
        }
        else{
            $a = KhuVuc::where('user_id', Auth::user()->id)->value('ten');
            // echo $a;exit();
            if(isset($a)){
                $khuvuc = KhuVuc::where('user_id', Auth::user()->id)->value('id');
                $tenkhuvuc = KhuVuc::where('user_id', Auth::user()->id)->value('ten');
                
                if($khuvuc && intval($khuvuc)>0)
                {
                    Session::put('khuvucId',$khuvuc);
                    Session::put('khuvucName',$tenkhuvuc);
                }
                $donvi = DonVi::where('khuvuc_id', Session::get('khuvucId'))->get();
            }
            else{
                Session::forget('khuvucId');
                Session::forget('khuvucName');
                $sectionKhuVucId = '';
                $sectionKhuVucName = '';
                $donvi = DonVi::where('khuvuc_id', Session::get('khuvucId'))->get();
            }
        }
        $getKhuVuc = KhuVuc::where('user_id', Auth::user()->id)->get();
    	return view('frontend.pages.hethong.pages.donvi.index',['donvi'=>$donvi, 'getKhuVuc'=>$getKhuVuc]);
    }
    public function postAdd(Request $request)
    {
    	$donvi = new DonVi();
    	$donvi->ten = $request->txtName;
        $donvi->khuvuc_id = Session::get('khuvucId');
    	$donvi->mota = $request->mota;
    	$donvi->save();
    	return redirect()->route('getListDonViFrontend')->with('success', 'Thêm Mới Đơn Vị Thành Công!');
    }
    public function postEdit(Request $request,$id)
    {
        $donvi = DonVi::find($id);
        $donvi->ten = $request->txtName;
        $donvi->mota = $request->mota;
        $donvi->save();
        return redirect()->route('getListDonViFrontend')->with('success', 'Cập Nhật Đơn Vị Thành Công!');
    }
    public function delete($id)
    {
        $donvi = DonVi::find($id);
        $donvi->delete();
        return redirect()->route('getListDonViFrontend')->with('success', 'Xoá Đơn Vị Thành Công!');
    }
}
