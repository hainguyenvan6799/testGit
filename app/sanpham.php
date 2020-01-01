<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sanpham extends Model
{
    // thực hiện liên kết đến bảng sanphamnew1 trong mysql
    protected $table = "sanphamnew1";
    public $timestamps = false; // tắt chế đọ tự thêm created_at và updated_at
    protected $primaryKey = 'idsanpham';
}
