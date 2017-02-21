<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Center extends Model
{
    protected $table = "man_users";

    //查询个人资料
    public function personalList($id)
    {
        $res = DB::table('man_users')->where('user_id',$id)->get();
        return $res;
    }

    //修改密码
    public function password($password,$id)
    {
        $arr = ['user_id'=>$id,'password'=>$password];
        $res = DB::table('man_users')->where(['user_id'=>$id])->update($arr);
        return $res;
    }

    //修改查询
    public function select($pwd)
    {
        $res = DB::table('man_users')->where(['password'=>$pwd])->first();
        return $res;
    }

    //密码重复性
    public function up($pwd)
    {
        $res = DB::table('man_users')->where(['password'=>$pwd])->first();
        return $res;
    }

}
