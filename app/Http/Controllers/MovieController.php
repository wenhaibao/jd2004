<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MovieModel;

class MovieController extends Controller
{
    /**
     * 售票首页
     */
    public function ticket()
    {
        $MovieModel = new MovieModel();
        $movieinfo = $MovieModel->get()->toArray();
        return view('movie.ticket',['movieinfo'=>$movieinfo]);
    }
    /**
     * 购票
     */
    public function addd()
    {
        $m_number = request()->get('m_number');
        $MovieModel = new MovieModel();
        $res = $MovieModel->where('m_number',$m_number)->first()->toArray();
        if($res['is_number']=='1'){
            echo 'no';
        }else{
            echo 'ok';
        }
    }
}
