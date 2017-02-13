<?php
namespace backend\controllers;
use yii\web\Controller;
use yii\data\Pagination;
use app\models\Admin;
use yii\web\UploadedFile;
use yii\web\Session;

/**
 * Site controller
 */
class IndexController extends CommonController
{
    public $layout = "menu";
    public $enableCsrfValidation= false;

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLogout()
    {
        unset($_SESSION['admin']);
        echo "<script>alert('退出成功');location.href='?r=login/index'</script>script>";
    }
}
