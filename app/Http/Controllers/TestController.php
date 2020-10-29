<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function uploadImg()
    {
        return view('test.upload');
    }
    public function uploadadd(Request $request)
    {
        $f = $request->file('img');
        $name = $f->getClientOriginalName(); //获取原始文件名
        $ext = $f->getClientOriginalExtension(); //获取扩展
        $size = $f->getSize();
        // dd($size);

        // 保存
        $path = 'public/img';
        $name = 'aaa.'.$ext;
        $res = $f->storeAs($path,$name);
        dump($res);

    }
    /**
     * 天气
     */
    public function api1()
    {
        $api_url = "https://github.com/login/oauth/access_token";
        //post

        // 如何请求post请求？
    }   
}