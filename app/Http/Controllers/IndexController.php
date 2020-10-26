<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\GoodsModel;
use Illuminate\Support\Facades\Redis;

class IndexController extends Controller
{
    /**
     * 前台首页
     */
    public function index()
    {
        $goodsmodel = new GoodsModel();
        return view('index.index');
    }
    /**
     * 详情页
     */
    public function item()
    {
        $goods_id = request()->get('goods_id');
        $key = 'h:goods_info:'. $goods_id;
        // 查询缓存
        $g = Redis::hGetAll($key);
        if($g)
        {
            // 有缓存
            echo '有redis缓存';
            print_r($g);
        }else{
            echo '无缓存,查询数据库，缓存';
            $goodsmodel = new GoodsModel();
            $goodsinfo = $goodsmodel->where('goods_id',$goods_id)->first();
            if(empty($goodsinfo))
            {
                echo '商品不存在';die;
            }
            $g = $goodsinfo->toArray();
            // 存入缓存
            Redis::hMset($key,$g);
            echo '存入redis';
        }
        $data = [
            'goods' =>$g
        ];
        return view('index.item',$data);
    }
    /**
     * 购物车
     */
    public function cart()
    {
        return view('index.cart');
    }
}
