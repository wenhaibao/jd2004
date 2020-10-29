<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\GoodsModel;
use Illuminate\Support\Facades\Redis;
use App\Model\CartModel;
use App\Model\CollectModel;

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
            // echo '有redis缓存';
            // print_r($g);
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
            // echo '存入redis';
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
        $cart = CartModel::where('user_id',session('userinfo')->user_id)->pluck('goods_id');
        $cart = $cart?$cart->toArray():[];
        $goods = GoodsModel::leftjoin('p_cart','p_goods.goods_id','=','p_cart.goods_id')->whereIn('p_cart.goods_id',$cart)->get();
        return view('index.cart',['goods'=>$goods]);
    }
    /**
     * 加入购物车
     */
    public function cart_add(Request $request)
    {
        $goods_id = $request->get('goods_id');
        $goods_num = $request->get('goods_num',1);
        
        // 检查是否下架 库存是否存足

        // 购物车保存商品信息
        $userinfo = session()->get('userinfo');
        if(empty($userinfo))
        {
            $data = [
                'errno'=>400001,
                'msg'=>'请先登录',
            ];
            echo json_encode($data);
            exit;
        }
        $user_id = $userinfo['user_id'];
        $cart_info = [
            'goods_id' => $goods_id,
            'user_id' => $user_id,
            'goods_num' => $goods_num,
            'add_time' => time(),
        ];
        $cartmodel = new CartModel();
        $res = $cartmodel->insert($cart_info);
        if($res>0)
        {
            $data = [
                'errno'=>0,
                'msg'=>'成功加入购物车',
            ];
            echo json_encode($data);
        }else{
            $data = [
                'errno'=>500001,
                'msg'=>'加入购物车失败',
            ];
            echo json_encode($data);
        }
        
    }
    /**
     * 收藏
     */
    function collect()
    {
        $data = request()->all();
        $data['user_id'] = session('userinfo')->user_id;
        $res = CollectModel::where($data)->get();
        $res = $res?$res->toArray():[];
        if(count($res)>0)
        {
            return json_encode(['code'=>0,'msg'=>'有喜']);
        }
        $rest = CollectModel::insert($data);
        if($rest)
        {
            return json_encode(['code'=>1,'msg'=>'成功']);
        }
    }
}
