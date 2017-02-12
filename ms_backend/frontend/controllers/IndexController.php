<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/2/5
 * Time: 19:02
 */
class IndexController extends Controller
{
    public $enableCsrfValidation= false;
    public $layout=false;
    public function actionIndex()
    {
        return $this->render('index');
    }
}