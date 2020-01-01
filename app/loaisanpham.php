<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class loaisanpham extends Model
{
    //
    protected $table = "typeproducts";
    public function loaisanpham(){
    	return $this->belongTo('App\loaisanpham','idloaisanpham','idloai');
    }
}
