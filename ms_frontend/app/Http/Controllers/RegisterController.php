<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Symfony\Component\HttpFoundation\Session\Session;

class RegisterController extends Controller
{
    //注册页
    public function Register()
    {
        return view('register/register');
    }

    //验证接值并入库
    public function into(Request $request)
    {
        $data = $request -> input();
        //验证用户名是否合法
        if($data['user_name']=='')
        {
            echo "<script>alert('用户名不能为空');location.href='register'</script>";die;
        }
        elseif(!preg_match('/^[a-zA-Z\x{4e00}-\x{9fa5}]{3,20}$/u',$data['user_name']))
        {
            echo "<script>alert('用户名为3~20个字符');location.href='register'</script>";die;
        }
        //验证邮箱名称是否合法
        if($data['email']=='')
        {
            echo "<script>alert('邮箱不能为空');location.href='register'</script>";die;
        }
        elseif(!preg_match("/^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+/",$data['email']))
        {
            echo "<script>alert('请填写正确邮箱名称');location.href='register'</script>";die;
        }
        //验证密码是否合法
        if($data['password']=='')
        {
            echo "<script>alert('密码不能为空');location.href='register'</script>";die;
        }
        elseif(!preg_match("/^(\w){6,20}$/",$data['password']))
        {
            echo "<script>alert('密码长度为6~20位数字、字母、下划线');location.href='register'</script>";die;
        }
        //验证手机是否合法
        if($data['phone']=='')
        {
            echo "<script>alert('手机号码不能为空');location.href='register'</script>";die;
        }
        elseif(!preg_match("/^1[34578]\d{9}$/",$data['phone']))
        {
            echo "<script>alert('请填写正确手机号码');location.href='register'</script>";die;
        }
        //验证手机验证码是否合法
        if($data['code']=='')
        {
            echo "<script>alert('验证码不能为空');location.href='register'</script>";die;
        }
        elseif(!preg_match("/^\d{4}$/",$data['code']))
        {
            echo "<script>alert('验证码必须为四位数');location.href='register'</script>";die;
        }
        //验证手机号及邮箱是否已注册
        $re = DB::table('man_users')->where(['phone'=>$data['phone']])->first();
        if($re)
        {
            echo "<script>alert('手机号及邮箱已被注册');location.href='register'</script>";die;
        }
        else
        {
            $session = new Session;
            $time = $session -> get('expiretime');
            $code = $session -> get('code');
            if($time > time())
            {
                if($code == $data['code'])
                {
                    $email=str_replace("'", '&', $data['email']);
                    $user_name=str_replace("'", '&', $data['user_name']);
                    $res = DB::table('man_users')->insertGetId([
                            'email'=>$email,
                            'user_name'=>$user_name,
                            'password'=>md5($data['password']),
                            'phone'=>$data['phone'],
                            'reg_time'=>time(),
                            'login_time'=>time(),
                            'login_ip'=>$_SERVER['REMOTE_ADDR'],
                    ]);
                    if($res)
                    {
                        $users = DB::table('man_users')->where('user_id',$res)->first();
                        $session->set('users',$users);
                        echo "<script>alert('恭喜您，注册成功！');location.href='index'</script>";die;
                    }
                    else
                    {
                        echo "<script>alert('诶呀，发生未知错误注册失败！');location.href='register'</script>";die;
                    }
                }
                else
                {
                    echo "<script>alert('验证码输入错误');location.href='register'</script>";die;
                }
            }
            else
            {
                echo "<script>alert('验证码不存在或已过期，请重新获取');location.href='register'</script>";die;
            }
        }
    }

    //发送短信
    public function send_msg(Request $request)
    {
        //发送短信类库
        $session = new Session;
        require (app_path() . '/Code/Code.php');
        $phone = $request -> input('phone');
        $msg = new \Code();
        $re = $msg -> send_message($phone);
        if($re==false){
            echo "1";
        }else{
            $session->set('expiretime',time()+60);
            $session->set('code',$re);
            echo $re;
        }
    }
}
