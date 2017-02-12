<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/1/13
 * Time: 10:47
 */
namespace backend\models;

class Rbac extends \yii\base\Model
{
    public $power;
    public $role;

    public function roles()
    {
        return [

        ];
    }
    public function attributeLabels()
    {
        return [
            'power'=>'权限',
            'role'=>'角色',
            'user'=>'用户',
        ];
    }
}