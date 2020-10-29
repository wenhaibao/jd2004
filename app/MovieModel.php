<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MovieModel extends Model
{
    protected $table = 'movie';         //model 使用的表
    protected $primaryKey = 'm_id';    //主键
    public $timestamps = false;
}
