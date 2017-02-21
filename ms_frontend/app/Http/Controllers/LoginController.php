<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Symfony\Component\HttpFoundation\Session\Session;

class LoginController extends Controller
{
       //登录
    public function login()
    {
        return view('login/login');
    }

    //登录验证
    public function check_login(Request $request)
    {
        //new一个session；
        $session = new Session();
        //接值
        $data = $request->input();
        if(!$data)
        {
            echo "<script>alert('请先填写登录信息');location.href='login'</script>";die;
        }
        else
        {
            if($data['user']=='')
            {
                echo "<script>alert('请填写您的邮箱或者手机号码');location.href='login'</script>";die;
            }
            else
            {
                if($data['password']=='')
                {
                    echo "<script>alert('请填写您的账号密码');location.href='login'</script>";die;
                }
                else
                {
                    $email = '/^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+/';
                    $phone = '/^1[34578]\d{9}$/';
                    if(preg_match($email,$data['user']))
                    {
                        $user = str_replace("'",'&',$data['user']);
                        $re = DB::table('man_users')->where('email',$user)->where('password',md5($data['password']))->first();
                        if($re)
                        {
                            $session->set('users',$re);
                            echo "<script>alert('登录成功！');location.href='index'</script>";die;
                        }
                        else
                        {
                            echo "<script>alert('邮箱名或密码错误');location.href='login'</script>";die;
                        }
                    }
                    elseif(preg_match($phone,$data['user']))
                    {
                        $user = str_replace("'",'&',$data['user']);
                        $re = DB::table('man_users')->where('phone',$user)->where('password',md5($data['password']))->first();
                        if($re)
                        {
                            $session->set('users',$re);
                            echo "<script>alert('登录成功！');location.href='index'</script>";die;
                        }
                        else
                        {
                            echo "<script>alert('手机号码或密码错误');location.href='login'</script>";die;
                        }
                    }else
                    {
                        echo "<script>alert('请填写您的邮箱或手机号码！');location.href='login'</script>";die;
                    }
                }
            }
        }
    }
}
