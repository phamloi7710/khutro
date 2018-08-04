<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DonVi extends Model
{
    protected $table = "donvi";
    public function dichvu()
    {
    	return $this->hasMany('App\Model\DichVu','donvi_id','id');
    }
}
