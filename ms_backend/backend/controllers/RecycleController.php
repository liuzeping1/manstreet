<?php
namespace backend\controllers;
use yii\web\Controller;
use yii\data\Pagination;
use app\models\Bowen;
use yii\web\UploadedFile;

/**回收站
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/2/5
 * Time: 14:58
 */
header("content-type:text/html;charset=utf-8");
class RecycleController extends CommonController
{
    public $layout = "menu";
    public $enableCsrfValidation= false;
    public function actionIndex()
    {

        $fication=new Bowen();
        $te=$fication->find()->where(['bel'=>0])->asArray()->all();
        return $this->render('index',['name'=>$te]);
    }
    public function actionBel()
    {
        $re=\Yii::$app->request->get();

        $fication=new Bowen();
        $te=$fication->find()->where(['id'=>$re['id']])->one();
        $te->bel=1;
        $del=$te->save();
        if($del)
        {
            return $del;
        }
    }
    public function actionDelete()
    {
        $re=\Yii::$app->request->get();
        $fication=new Bowen();
        $te=$fication->find()->where(['id'=>$re['id']])->one();
        $del=$te->delete();
        if($del)
        {
            return $del;
        }
    }

}