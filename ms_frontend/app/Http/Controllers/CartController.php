<?php

namespace App\Http\Controllers;
header("content-type:text/html;charset=utf-8");
use App\Cart;
use DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use Symfony\Component\HttpFoundation\Session\Session;

class CartController extends Controller
{
    //购物车查询
    public function cart()
    {
        $session = new Session();
        $users = $session->get('users');
        if(!$users['user_id']){
            echo "<script>alert('请先登录');location.href='login'</script>";
        }
        $cart_list = DB::table('man_cart')
            ->leftJoin('man_goods', 'man_cart.goods_id', '=', 'man_goods.goods_id')
            ->where('user_id',$users['user_id'])
            ->orderBy('cart_id')
            ->get();
        $num = DB::table('man_cart')->where('user_id',$users['user_id'])->count();
$temp = '';
        foreach($cart_list as $key=>$val)
        {
            //总计
            $temp += $val['goods_price']*$val['buy_number'];
        }
        return view('cart/cart',[
            'cartShow'=>$cart_list,
            'num'=>$num,
            'temp'=>$temp,
        ]);
    }

    //删除购物车
    public  function cart_remove(Request $request)
    {
        $cart_id = $request->input('cart_id');
        $re = DB::table('man_cart')->where('cart_id',$cart_id)->delete();
        if($re)
        {
            echo 1;
        }
        else
        {
            echo 0;
        }
    }



}
