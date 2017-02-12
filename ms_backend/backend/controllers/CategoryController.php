<?php
namespace backend\controllers;
use yii\web\Controller;
use yii\data\Pagination;
use yii\web\UploadedFile;
use yii\web\Session;

/**
 * Site controller
 */
class CategoryController extends CommonController
{
    public $layout = "menu";
    public $enableCsrfValidation= false;

    public function actionIndex()
    {
        return $this->render('index');
    }
}
