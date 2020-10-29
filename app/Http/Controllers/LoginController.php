<?php

namespace App\Http\Controllers;

use App\Model\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    /**
     * 注册
     */
    public function register()
    {
        return view('login.register');
    }
    public function registeradd(Request $request)
    {
        $user_name = $request->user_name;
        $password = $request->password;
        $passwords = $request->passwords;
        $user_tel = $request->user_tel;
        $email = $request->email;
        if($password!=$passwords){
            return view('login.register');
        }
        $data = [
            'user_name'=>$user_name,
            'password'=>md5($password),
            'user_tel'=>$user_tel,
            'email'=>$email,
        ];
        $UserModel = new UserModel();
        $uid = $UserModel->insertGetId($data);
        // 发送激活邮件
        $active_code = Str::random(64);
        // 保存激活吗与用户的对应关系 使用有序集合
        $redis_active_key = 'ss:user:active';
        Redis::zAdd($redis_active_key,$uid,$active_code);
        $active_url = env('APP_URL').'/active?code='.$active_code;
        echo $active_url;exit;
        if($uid){
            return redirect('login');
        }
    }
    /**
     * 激活用户
     */
    public function active(Request $request)
    {
        $active_code = $request->get('code');
        echo "激活吗:".$active_code;echo '<br>';
        $redis_active_key = 'ss:user:active';
        $uid = Redis::zScore($redis_active_key,$active_code);
        if($uid)
        {
            echo "uid:".$uid;
            // 激活用户
            $UserModel = new UserModel();
            $userinfo = $UserModel->where(['user_id'=>$uid])->update(['is_validated'=>1]);
            echo '激活超过';
            // 删除集合中的激活码
            Redis::zRem($redis_active_key,$active_code);
        }else{
            echo '没有此用户';
        }
        
    }
    /**
     * 登录
     */
    public function login()
    {
        return view('login.login');
    }
    /**
     * 登录执行
     */
    public function logindo(Request $request)
    {
        $account = $request->account;
        $password = $request->password;
        $UserModel = new UserModel();
        $userinfo = $UserModel
        ->where('user_name',$account)
        ->orwhere('user_tel',$account)
        ->orwhere('email',$account)
        ->first();
        if($userinfo['password']===md5($password))
        {
            session(['userinfo'=>$userinfo]);
            return redirect('index');
        }else{
            return view('login.login');
        }
    }
    /**
     * 退出
     */
    public function quit()
    {
        session(['userinfo'=>null]);
        return redirect('index');
    }
    /**
     * github登录
     */
    public function github(Request $request)
    {
        $code = $request->get('code');
        echo 'code：'.$code;
        // 获取access_token
        $this->getAccessToken($code);
    }
    /**
     * 获取access_token
     */
    private function getAccessToken()
    {

    }
}
