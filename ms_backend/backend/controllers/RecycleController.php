<?php
namespace backend\controllers;
use yii\web\Controller;
use yii\data\Pagination;
use app\models\Man_goods;
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

        //商品类型显示
        $sql1= "select * from man_goods left join man_category on man_goods.cat_id=man_category.cat_id where is_delete=1";
        $te=\Yii::$app->db->createCommand($sql1)->queryAll();
        return $this->render('index',['name'=>$te]);
    }
    //还原商品
    public function actionBel()
    {
        $re=\Yii::$app->request->get();
        $fication=new Man_goods();
        $te=$fication->findOne($re['goods_id']);
        $te->is_delete=0;
        $del=$te->save();
        if($del)
        {
            return $del;
        }
    }
    //彻底删除
    public function actionDelete()
    {
        $re=\Yii::$app->request->get();
        $fication=new Man_goods();
        $te=$fication->findOne($re['goods_id']);
        $del=$te->delete();
        if($del)
        {
            return $del;
        }
    }

}