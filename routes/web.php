<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
// 测试
Route::get('/test/upload','TestController@uploadImg');
Route::post('/test/uploadadd','TestController@uploadadd');
Route::get('blade', function () {
    return view('child');
    });

//前台首页
Route::get('/index','IndexController@index');
// 商品详情
Route::get('/item','IndexController@item');
//登录
Route::get('/login','LoginController@login');
// 注册
Route::get('/register','LoginController@register');
Route::post('/registeradd','LoginController@registeradd');
Route::post('/logindo','LoginController@logindo');
// 退出
Route::get('/quit','LoginController@quit');
// 激活用户
Route::get('/active','LoginController@active');

// 购物车
Route::get('/cart','IndexController@cart');
//加入购物车
Route::get('/cart_add','IndexController@cart_add');
//收藏
Route::get('/collect','IndexController@collect');

// 电影票
Route::get('/ticket','MovieController@ticket');
Route::get('/addd','MovieController@addd');

// GITHUB登录
Route::get('/github/callback','LoginController@github');
