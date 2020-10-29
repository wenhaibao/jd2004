<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CollectModel extends Model
{
    protected $table = 'p_collect';         //model 使用的表
    protected $primaryKey = 'collect_id';    //主键
    public $timestamps = false;
}
