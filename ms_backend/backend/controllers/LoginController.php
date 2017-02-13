<?php
namespace backend\controllers;
header("content-type:text/html;charset=utf-8");
use yii\web\Controller;
use yii\data\Pagination;
use yii\web\UploadedFile;
use yii\web\Session;
use app\models\Man_admin;
class LoginController extends Controller
{
    public $layout = false;


         public $enableCsrfValidation = false;
         public function actionIndex()

         {
             return $this->render('index');
         }
        public function actionAdd()

        {

            $request=\Yii::$app->request;
            $re=$request->post();
            $login=new Man_admin();
            $username=trim($re['username']);
            $password_hash=md5($re['password']);
            if($username =="")
            {
                echo "<script>alert('登录失败'); history.go(-1)</script>";die;
            }
            if($password_hash =="")
            {
                echo "<script>alert('登录失败'); history.go(-1)</script>";die;
            }
            $list=$login->find()->where(['username'=>$username])->asArray()->one();
            if($password_hash==$list['password'])
            {

                $session=\Yii::$app->session;
                $session->open();
                $session->set('admin',$list['admin_id']);
                $map=$session->get('admin');
                $session->close();
                if($map)
                {
                    $this->redirect('?r=index/index');
                }
            }else
            {
                echo 345;
                $this->redirect('?r=login/index');
            }
        }
    public function actionError()
    {
        $data['address'] = '?r=login/index';
        $data['pormpt'] = '登录失败';
        $data['waitSecond'] = '3';
        return $this->render('error',$data);
    }

    public function actionLoginout()
    {
        unset(Yii::$app->session['admin']);
        echo "<script>alert('退出成功');location.href='?r=login/index'</script>script>";
    }
}