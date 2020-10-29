<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CartModel extends Model
{
    protected $table = 'p_cart';         //model 使用的表
    protected $primaryKey = 'id';    //主键
    public $timestamps = false;
}
