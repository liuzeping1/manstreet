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
class OrderController extends CommonController
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

    public function actionOrderadd()
    {   
        //快递配送方式
        $shippingSql = "select * from man_shipping";
        $shippingResult = yii::$app->db->createCommand($shippingSql)->queryAll();
        //
        //var_dump($shippingResult);die;
        return $this->render('orderadd',['shippingResult'=>$shippingResult]);
    }

    public function actionOrderaddmessage()
    {
        $order_sn = yii::$app->request->post('order_sn');
        $province = yii::$app->request->post('province');
        $city     = yii::$app->request->post('city');
        $consignee= yii::$app->request->post('consignee');
        $zipcode  = yii::$app->request->post('zipcode');
        $address  = yii::$app->request->post('address');
        $mobile   = yii::$app->request->post('mobile');
        $pay_name = yii::$app->request->post('pay_name');
        $order_status = yii::$app->request->post('order_status');
        $shipping_status = yii::$app->request->post('shipping_status');
        $shipping_name   = yii::$app->request->post('shipping_name');
        //添加至数据库
        $OrderInfo = new ManOrderInfoModel();
        $OrderInfo->order_sn = $order_sn;
        $OrderInfo->province = $province;
        $OrderInfo->city     = $city;
        $OrderInfo->consignee= $consignee;
        $OrderInfo->zipcode  = $zipcode;
        $OrderInfo->address  = $address;
        $OrderInfo->mobile   = $mobile;
        $OrderInfo->pay_name = $pay_name;
        $OrderInfo->order_status = $order_status;
        $OrderInfo->shipping_status = $shipping_status;
        $OrderInfo->shipping_name   = $shipping_name;
        if($OrderInfo->save()>0)
        {
            echo "<script>alert('生成订单成功');location.href='?r=order/index'</script>";exit;
        }
        else
        {
            echo "<script>alert('生成订单失败');window.history.go(-1)</script>";exit;
        }
    }


    //修改退货订单状态
    public function actionUpdatestatus()
    {
        $v = yii::$app->request->get('v');
        $id= yii::$app->request->get('id');

        $exitSql = "update man_exitgoods set exit_status='$v' where exit_id = $id";
        $exitResult = yii::$app->db->createCommand($exitSql)->execute();
        if($exitResult)
        {
            echo "successupdate";
        }else{
            echo "failupdate";
        }
    }

    //删除退货订单数据
    public function actionExitdelete()
    {
        $id = yii::$app->request->get('id');
        $delSql = "delete from man_exitgoods where exit_id = '$id'";
        $delResult = yii::$app->db->createCommand($delSql)->execute();
        if($delResult)
        {
            echo "successdelgoods";exit;
        }
        else
        {
            echo "faildelgoods";exit;
        }
    }
}
