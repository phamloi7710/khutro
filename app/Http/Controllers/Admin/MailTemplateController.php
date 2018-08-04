<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\MailTemplate;
class MailTemplateController extends Controller
{
    public function getList()
    {
    	return view('admin.pages.mailtemplate.list');
    }
    public function postAdd(Request $request)
    {
    	$mailtemplate = new MailTemplate();
    	$mailtemplate->title = $request->txtTitle;
    	$mailtemplate->key = $request->txtKey;
    	$mailtemplate->content = $request->content;
    	$mailtemplate->save();
    	return redirect()->route('getListMailTemplate')->with('success', 'Thêm Mới Thành Công!');
    }
}
