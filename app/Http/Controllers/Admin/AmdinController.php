<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AmdinController extends Controller
{
    public function getIndex()
   	{
   		return view('admin.index');
   	}
}
