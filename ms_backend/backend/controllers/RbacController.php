<?php
namespace backend\controllers;
use yii\web\Controller;
use yii\data\Pagination;
use app\models\Admin;
use backend\models\Rbac;
use yii\web\UploadedFile;
use yii\web\Session;
use Yii;
/**
 * Site controller
 */
header("content-type:text/html;charset=utf-8");
class RbacController extends CommonController
{
    public $enableCsrfValidation= false;
    public $layout = "menu";

    public function actionList()
    {
        return $this->render('list');
    }
    public function actionCreatepermission()
    {

        $te=\Yii::$app->request->post();
        $item=$te['huthor'];
        $auth = Yii::$app->authManager;
        $createPost = $auth->createPermission($item);

        $createPost->description = '创建了 ' . $item . ' 许可';
        $auth->add($createPost);
        return $this->redirect('?r=rbac/role');
    }
    public function actionRole()
    {
        return $this->render('jvese');
    }
    public function actionCreaterole()
    {

        $te=\Yii::$app->request->post();
        $item=$te['huthor'];
        $auth = Yii::$app->authManager;
        $role = $auth->createRole($item);
        $role->description = '创建了 ' . $item . ' 角色';
        $auth->add($role);
        return $this->redirect('?r=rbac/rb');
    }
    public function actionRb()
    {
        $sql='select name from  auth_item where type=1';
        $role=\Yii::$app->db->createCommand($sql)->queryAll();
        foreach($role as $v)
        {
            $rolel[$v['name']]=$v['name'];
        }


        $sql1='select name from  auth_item where type=2 ';
        $power=\Yii::$app->db->createCommand($sql1)->queryAll();
        foreach($power as $vv)
        {
            $powerl[$vv['name']]=$vv['name'];
        }

        return $this->render('rb',['role'=>$rolel,'power'=>$powerl]);
    }
    public function actionCreateempowerment()
    {
        $re=\Yii::$app->request->post();
        $item=trim($re['role']);
        foreach($re['power'] as $value )
        {

            $auth = Yii::$app->authManager;
            $parent = $auth->createRole($item);
            $child = $auth->createPermission($value);
            $auth->addChild($parent, $child);

        }
        return $this->redirect('?r=rbac/fenpei');

    }
    public function actionFenpei()
    {
        $sql='select name from  auth_item where type=1';
        $role=\Yii::$app->db->createCommand($sql)->queryAll();
        foreach($role as $v)
        {
            $rolel[$v['name']]=$v['name'];
        }


        $sql1='select admin_id,username from  man_admin';
        $power=\Yii::$app->db->createCommand($sql1)->queryAll();

        foreach($power as $vv)
        {
            $powerl[$vv['admin_id']]=$vv['username'];
        }
        return $this->render('feipei',['role'=>$rolel,'power'=>$powerl]);
    }
    public function actionAssign()
    {
        $re=\Yii::$app->request->post();
        $item=trim($re['role']);
        foreach($re['power'] as $value )
        {
            $auth = Yii::$app->authManager;
            $reader = $auth->createRole($item);
            $auth->assign($reader,$value);
        }

        return $this->redirect('?r=rbac/role');
    }
}