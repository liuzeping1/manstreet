<?php

namespace App\Http\Controllers;

use App\Center;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use DB;
use Symfony\Component\HttpFoundation\Session\Session;


class CenterController extends Controller
{
    //个人中心
    public function center()
    {
        $session = new Session();
        $users = $session->get('users');
        if(!$users){
            echo "<script>alert('请先登录');history.go(-1)</script>";
        }
        $center = new Center();
        $centerShow = $center->personalList($users['user_id']);

        $address = DB::table("man_user_address")->where('user_id',$users['user_id'])->limit(5)->get();
        $orderList = DB::table("man_order_info")->where('user_id',$users['user_id'])->get();
        return view('center/center',[
            'centerShow'=>$centerShow,
            'list'=>$centerShow,
            'addList'=>$address,
            'orderList'=>$orderList,
        ]);
    }

    //修改密码
    public function pwdUpdate()
    {
        $id = 2;
        $pwd =  md5(Input::get('password'));
        $center = new Center();
        $password = $center->password($pwd,$id);
        if($password)
        {
            $session = new Session();
            $session->remove('users');
            echo "<script>alert('密码修改成功，请重新登录！');location.href='login'</script>";
        }else
        {
            alert('修改失败');
        }

    }
    //查询密码
    public function pwdSel()
    {
        $id = Input::get('id');
        $pwd = md5(Input::get('pwd'));
        $center = new Center();
        $select = $center->select($pwd);
        if($select)
        {
            echo 1;
        }else
        {
            echo 0;
        }
    }

    //修改密码不能重复
    public function pwdUp()
    {
        $id = Input::get('id');
        $pass = md5(Input::get('pass'));
        $center = new Center();
        $update = $center->up($pass);
        if($update)
        {
            echo 0;
        }else
        {
            echo 1;
        }
    }
    //地址删除
    public function del()
    {
        $id = Input::get('id');
        $del = DB::table('man_user_address')->where(['address_id'=>$id])->delete();
        if($del)
        {
            echo 1;
        }else
        {
            echo 0;
        }
    }
    //添加地址
    public function add_into(Request $request)
    {
        $session = new Session();
        $users = $session->get('users');
        if(!$users)
        {
            echo 2;
        }
        $data = $request->input();
        if(!$data)
        {
            echo 1;
        }
        $re = DB::table('man_user_address')->insert([
            'user_id'=>$users['user_id'],
            'consignee'=>$data['consignee'],
            'province'=>$data['province'],
            'city'=>$data['city'],
            'address'=>$data['address'],
            'zipcode'=>$data['zipcode'],
            'mobile'=>$data['mobile'],
        ]);
        if($re)
        {
            echo 0;
        }
        else
        {
            echo 3;
        }
    }

    //退出登录
    public function edit()
    {
        $session = new Session();
        $session->remove('users');
        echo "<script>alert('bye-bye');location.href='index'</script>";
    }
}
