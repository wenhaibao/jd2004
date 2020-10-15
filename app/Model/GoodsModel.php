<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class GoodsModel extends Model
{
    protected $table = 'p_goods';         //model 使用的表
    protected $primaryKey = 'goods_id';    //主键
    public $timestamps = false;
}
