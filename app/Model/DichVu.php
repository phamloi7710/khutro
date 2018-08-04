<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DichVu extends Model
{
    protected $table = "dichvu";
    public function donvi()
    {
    	return $this -> belongsTo('App\Model\DonVi','donvi_id','id');
	}
}
