<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Session;
use App\Http\Requests;
use App\OrderModel;
use DB;
use Symfony\Component\HttpFoundation\Session\Session;

class OrderController extends Controller
{
    public function order(Request $r)
    {
        $session = new Session();
        $users = $session->get('users');
        if(!$users){
            echo "<script>alert('请先登录');history.go(-1)</script>";
        }
        $user_id = $users['user_id'];
        //查看所有快递配送方式
        $shippingWay = DB::table('man_shipping')->where('enabled','1')->get();

        //查询购物车信息
        $shopCart = DB::table('man_cart')
                        ->where('man_cart.user_id',"$user_id")
                        ->get();
        if(!$shopCart){
            echo "<script>alert('购物车没有商品,快去选购吧！');location.href='product'</script>";die;
        }
        $arr = '';

        foreach($shopCart as $key)
        {
            $arr += $key['goods_price']*$key['buy_number'];
        }
        //dd($shopCart);
        //查看用户的所有地址信息
        $addressList = DB::table('man_user_address')->where('user_id',"$user_id")->get();
        return view('order/order',['shippingWay'=>$shippingWay,'shopCart'=>$shopCart,'addressList'=>$addressList,'arr'=>$arr]);

    }


    //生成订单页面
    public function clearing(Request $r)
    {
        $shippingway = $r->input('shippingway');
        $zfb = $r->input('zfb');
        $session = new Session();
        $users = $session->get('users');
        $address_id = $r->input("address_id");
        $message = $r->input("message");
        $goods_amount = $r->input('goods_amount');
        //查询用户的地址信息
        $shippingList = DB::table('man_shipping')->where('shipping_id',$shippingway)->first();

        //dd($addressList);
        //查询用户的
        $order_sn = time().rand(100000,999999);
        $address = DB::table("man_user_address")->where("address_id",$address_id)->first();

        $insertId = DB::table('man_order_info')->insertGetId(
            array('order_sn' => $order_sn,
                  'user_id' => $users['user_id'],
                  'order_status' => 0,
                  'shipping_status' => 0,
                  'pay_status' => 0,
                  'message' => $message,
                  'shipping_id' =>$shippingList['shipping_id'],
                  'shipping_name' =>$shippingList['shipping_name'],
                  'pay_id' => 1,
                  'pay_name' => $zfb,
                  'goods_amount' => $goods_amount,
                  'money_paid' => 0,
                  'order_amount' => $goods_amount,
                  'add_time' => date('Y-m-d H:i:s', time()),
                  'pay_time' => date('Y-m-d H:i:s', time()),
                  'shipping_time' => '',
                  'consignee' =>$address['consignee'],
                  'province' =>$address['province'],
                  'city' =>$address['city'],
                  'address' =>$address['address'],
                  'zipcode' =>$address['zipcode'],
                  'mobile' =>$address['mobile']
            )
        );
        if($insertId)
        {
            echo $insertId;die;
        }else{
            echo 0;die;
        }

    }

    //支付页面
    public function pay(Request $request)
    {
        $order_id = $request->input('pay');
        if(!$order_id)
        {
            echo "<script>alert('订单支付失败');location.href='index'</script>";
        }
        else
        {
            $re = DB::table('man_order_info')->where('order_id',$order_id)->first();
            if(!$re)
            {
                echo "<script>alert('订单无效，请重新下单');location.href='index'</script>";
            }
            else
            {
                $pay = $this->order_pay($re['order_sn'],$re['goods_amount']);
                echo "<script>location.href='".$pay."'</script>";
            }
        }
    }
    //同步
    public function syn(Request $request)
    {
        $session = new Session();
        $users = $session->get('users');
        $result = $request->input();
        if($result['is_success']=='T'){
            $re = DB::table('man_order_info')->where('order_sn',$result['subject'])
                ->update([
                    'pay_status'=>1,
                    'money_paid'=>$result['total_fee'],
                    'pay_time'=>$result['notify_time']
                ]);
            if($re){
                DB::table('man_cart')->where('user_id',$users['user_id'])->delete();
                echo "<script>alert('完成支付，返回首页');location.href='index'</script>";
            }else{
                echo "<script>alert('支付状态修改失败，请联系客服');location.href='index'</script>";
            }
//            echo "这是同步";
        }else{
            echo "<script>location.href='index'</script>";
        }

    }

    //异步
    public function asy(Request $request)
    {
        $data = $request->input();
        $out_trade_no = $data['out_trade_no'];
        $trade_status = $data['trade_status'];
        $gmt_payment = $data['gmt_payment'];
        $re = DB::table('man_order_info')->where('order_sn',$out_trade_no)->first();
        if($re)
        {
            $res = DB::table('man_order_info')->where('order_sn',$out_trade_no)->update([
                'pay_status'=>1,
                'pay_time'=>$gmt_payment
            ]);
            if($res){
                echo 'success';
            }
        }
    }

    function  order_pay($sn,$price)
    {
        //合作身份者id，以2088开头的16位纯数字
        $alipay_config['partner']		= '2088121321528708';
        //收款支付宝账号
        $alipay_config['seller_email']	= 'itbing@sina.cn';
        //安全检验码，以数字和字母组成的32位字符
        $alipay_config['key']			= '1cvr0ix35iyy7qbkgs3gwymeiqlgromm';
        //↑↑↑↑↑↑↑↑↑↑请在这里配置您的基本信息↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑
        //签名方式 不需修改
        $alipay_config['sign_type']    = strtoupper('MD5');
        //字符编码格式 目前支持 gbk 或 utf-8
        //$alipay_config['input_charset']= strtolower('utf-8');
        //ca证书路径地址，用于curl中ssl校验
        //请保证cacert.pem文件在当前文件夹目录中
        //$alipay_config['cacert']    = getcwd().'\\cacert.pem';
        //访问模式,根据自己的服务器是否支持ssl访问，若支持请选择https；若不支持请选择http
        $alipay_config['transport']    = 'http';
        $parameter = array(
            "service" => "create_direct_pay_by_user",
            "partner" => $alipay_config['partner'], // 合作身份者id
            "seller_email" => $alipay_config['seller_email'], // 收款支付宝账号
            "payment_type"	=> '1', // 支付类型
            "notify_url"	=> "http://localhost/manstreet/ms_frontend/public/asy", // 服务器异步通知页面路径
            "return_url"	=> "http://localhost/manstreet/ms_frontend/public/syn", // 页面跳转同步通知页面路径
            "out_trade_no"	=> $sn, // 商户网站订单系统中唯一订单号
            "subject"	=> $sn, // 订单名称
            "total_fee"	=> $price, // 付款金额
            "body"	=> "《男人街》订单", // 订单描述 可选
            "show_url"	=> "", // 商品展示地址 可选
            "anti_phishing_key"	=> "", // 防钓鱼时间戳  若要使用请调用类文件submit中的query_timestamp函数
            "exter_invoke_ip"	=> "", // 客户端的IP地址
            "_input_charset"	=> 'utf-8', // 字符编码格式
        );

        // 去除值为空的参数
        foreach ($parameter as $k => $v) {
            if (empty($v)) {
                unset($parameter[$k]);
            }
        }
        // 参数排序
        ksort($parameter);
        reset($parameter);

        // 拼接获得sign
        $str = "";
        foreach ($parameter as $k => $v) {
            if (empty($str)) {
                $str .= $k . "=" . $v;
            } else {
                $str .= "&" . $k . "=" . $v;
            }
        }
        $parameter['sign'] = md5($str . $alipay_config['key']);	// 签名
        $parameter['sign_type'] = $alipay_config['sign_type'];
        $html = "https://mapi.alipay.com/gateway.do?".$str.'&sign='.$parameter['sign'].'&sign_type='.$parameter['sign_type'];
        return  $html;

    }
}
