<?php
namespace backend\controllers;
use yii\web\Controller;
use yii\data\Pagination;
use app\models\Doctor;
use yii\web\UploadedFile;
/**
 * Site controller
 *首页
 */
header("content-type:text/html;charset=utf-8");
class CoatingController extends CommonController
{
    public $layout = "menu";
    public $enableCsrfValidation= false;

    public function actionIndex()
    {
        return $this->render('index');
    }
}
