<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class loaisanpham extends Model
{
    //
    protected $table = "typeproducts";
    public $timestamps = false;
    public function loaisanpham(){
    	echo 'Hello function';
    }
}
