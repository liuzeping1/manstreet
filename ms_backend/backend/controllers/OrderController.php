<?php

namespace backend\controllers;

use Yii;
use app\models\ManOrderInfoModel;
use backend\models\SearchOrderInfoModel;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\widgets\LinkPager;
use yii\data\pagination;
use yii\db\Query;
/**
 * OrderController implements the CRUD actions for ManOrderInfoModel model.
 */
class OrderController extends Controller
{
    public $enableCsrfValidation = false;
    public $layout = "menu";

    //显示列表主页面//未支付
    public function actionIndex()
    {   
        $sql="select * from man_order_info where pay_status = 0";
        $res = yii::$app->db->createCommand($sql)->queryAll();
        //var_dump($res);die;
        $listCount = count($res);

        $query = new Query();
        $query->from('man_order_info');
        $pages = new Pagination(['totalCount' =>$listCount, 'pageSize' => '10']);
        $model = $query->where(array('pay_status'=>0))->offset($pages->offset)->limit($pages->limit)->all();

        return $this->render('index',['result'=>$model,'pages'=>$pages]);

    }

    //显示列表页面删除
    public function actionDelorder()
    {
        $id = yii::$app->request->get('id');
        $listSql = "delete from man_order_info where order_id =  '$id'";
        $listResult =yii::$app->db->createCommand($listSql)->execute();
        if($listResult)
        {
            echo 1;
        }
        else
        {
            echo 0;
        }

    }

    //显示列表页面修改页面支付状态
    public function actionUpdateorder()
    {
        $id = yii::$app->request->get('id');
        $updateSql = "update man_order_info set pay_status = 1 where order_id= '$id'";
        $updateResult = yii::$app->db->createCommand($updateSql)->execute();
        if($updateResult)
        {
            echo 'successupdate';
        }
        else
        {
            echo 'failupdate';
        }
    }

    //显示列表支付成功历史页面
    public function actionHistorylist()
    {   
        $sql="select * from man_order_info where pay_status = 1";
        $res = yii::$app->db->createCommand($sql)->queryAll();
        //var_dump($res);die;
        $listCount = count($res);

        $query = new Query();
        $query->from('man_order_info');
        $pages = new Pagination(['totalCount' =>$listCount, 'pageSize' => '10']);
        $model = $query->where(array('pay_status'=>1))->offset($pages->offset)->limit($pages->limit)->all();
        return $this->render('history',['result'=>$model,'pages'=>$pages]);
    }

    //退货列表展示
    public function actionExitlist()
    {
        $exitsql = "select * from man_exitgoods";
        $listResult = yii::$app->db->createCommand($exitsql)->queryAll();
        //var_dump($listResult);die;
        $listCount  = count($listResult);

        $query = new Query();
        $query->from('man_exitgoods');
        $pages = new Pagination(['totalCount'=>$listCount,'pageSize'=>10]);
        $model = $query->offset($pages->offset)->limit($pages->limit)->all();
        //var_dump($model);die;
        return $this->render('exitgoods',['pages'=>$pages,'result'=>$model]);


    }
}
