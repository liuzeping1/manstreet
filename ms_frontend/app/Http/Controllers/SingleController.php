<?php

namespace App\Http\Controllers;
header("content-type:text/html;charset=utf-8");
use DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use Input,Redirect,url,Validator;
use Symfony\Component\HttpFoundation\Session\Session;

class SingleController extends Controller
{

    //商品详情页
    public function single(Request $request)
    {
        $goods_id = $request->input('goods_id');
        //查询商品
         $good = DB::table('man_goods')->where('goods_id',$goods_id)->first();
        //查询属性相同的商品

        $data = DB::table('man_goods')->where('cat_id',$good['cat_id'])->whereNotIn('goods_id',[$goods_id])->limit(3)->get();

        //查询商品相册
        $good_aibum = DB::table('man_aibum')->where('goods_id',$goods_id)->get();
        $img=[];
        foreach($good_aibum as $key=>$value)
        {
            $img[]=$value['img_path'];
        }
        //查询商品属性
        $attr_value = DB::table('man_good_attr')->
        leftJoin('man_goods_attrbute', 'man_good_attr.attr_id', '=', 'man_goods_attrbute.attr_id')
            ->where('goods_id',$goods_id)->get();
        $merge=[];
        foreach($attr_value as $key=>$value)
        {
            $merge[$key][$value['goods_attr_name']]=$value['attr_value'];

        }

        $arr = [];
        foreach($merge as $k=>$v){
            foreach($v as $kk=>$vv){
                $arr[$kk][] = $vv;
            }
        }
        //商品评论
        $comment = DB::table('man_comment')
            ->leftJoin('man_users', 'man_comment.user_id', '=', 'man_users.user_id')
            ->where('goods_id',$goods_id)->get();
        //评论条数
        $com_num = DB::table('man_comment')->where('goods_id',$goods_id)->count();


        return view('single/single',[
            'arr'=>$arr,
            'good'=>$good,
            'img_path'=>$img,
            'data'=>$data,
            'comment'=>$comment,
            'com_num'=>$com_num
        ]);

    }
    public function singleCart()
    {
        $session = new Session();
        $users = $session->get('users');
        if(!$users['user_id']){
            echo 2;die;
        }
        $goods_id = $_POST['goods_id'];
        $num = $_POST['num'];
        $attr_value = $_POST['ids'];
        //查询商品信息
        $goods_list = DB::table('man_goods')->where('goods_id',$goods_id)->first();
        $re = DB::table('man_cart')->insert([
            'user_id'=>$users['user_id'],
            'goods_id'=>$goods_id,
            'goods_sn'=>$goods_list['goods_sn'],
            'goods_name'=>$goods_list['goods_name'],
            'goods_price'=>$goods_list['goods_price'],
            'buy_number'=>$num,
            'attr_value'=>$attr_value,
        ]);
        if($re){
            echo 1;
        }else{
            echo 0;
        }
    }
    //商品评论
    public function singleComment()
    {

    }

}
