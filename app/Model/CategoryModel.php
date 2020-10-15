<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    protected $table = 'p_category';         //model 使用的表
    protected $primaryKey = 'cat_id';    //主键
    public $timestamps = false; 
}
