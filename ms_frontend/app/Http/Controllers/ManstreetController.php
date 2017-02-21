<?php

namespace App\Http\Controllers;

use App\Manstreet;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use DB;

class ManstreetController extends Controller
{
    //主页
    public function index()
    {
        $goods_show = new Manstreet();
        $res = $goods_show->GoodsList();
        return view('manstreet/index',['goodsList'=>$res]);
    }


}
