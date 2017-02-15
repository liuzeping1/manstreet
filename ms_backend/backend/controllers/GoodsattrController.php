<?php
namespace backend\controllers;
use yii\web\Controller;
use yii\data\Pagination;
use app\models\Fication;
use app\models\Man_goods_attrbute;
use app\models\Man_goods_type;
use app\models\Man_category;
use yii\web\UploadedFile;
use yii\db\Query;
/**
 * Site controller
 *商品属性
 */
header("content-type:text/html;charset=utf-8");
class GoodsattrController extends CommonController
{
    public $layout = "menu";
    public $enableCsrfValidation = false;
    //商品类型
    public function actionType()
    {
        //mode
        $man_good_type=new Man_goods_type();
        $list=$man_good_type->find()->asArray()->all();
        //商品类型显示模板
        return $this->render('type',['name'=>$list]);

    }
    //商品类型添加模板
    public function actionType_add()
    {
        //商品类型添加模板
        return $this->render('type_add');
    }
    //商品属性模板
    public function actionAttr()
    {
        //类型分类
        $cat_goods_id=\Yii::$app->request->get('cat_goods_id');
        $man_good_type=new Man_goods_type();
        $map=$man_good_type->find()->asArray()->all();
        //类型属性
        $sql = "select * from man_goods_attrbute as attrbute INNER JOIN man_goods_type as `type` on
        attrbute.cat_goods_id = `type`.cat_goods_id WHERE attrbute.cat_goods_id = '$cat_goods_id'";
        $powerl=\Yii::$app->db->createCommand($sql)->queryAll();
        return $this->render('attribute',[
            'name'=>$map,
            'cat_goods_id'=>$cat_goods_id,
            'data'=>$powerl
        ]);
    }
    //新增商品属性模块
    public function actionNature()
    {
        //所属商品类型
        $man_good_type=new Man_goods_type();
        $map=$man_good_type->find()->asArray()->all();
        //商品属性模块
        return $this->render('nature',['name'=>$map]);
    }
    //新增商品属性模块添加
    public function actionNature_add()
    {
        $man_good_type=new Man_goods_attrbute();
        //接值
        $request=\Yii::$app->request->post();
        $man_good_type->cat_goods_id=$request['cat_goods_id'];
        $man_good_type->goods_attr_name=$request['goods_attr_name'];
        $man_good_type->attr_index=$request['attr_index'];
        $man_good_type->attr_input_type=$request['attr_input_type'];
        $man_good_type->attr_values=$request['attr_values'];
        $ser=$man_good_type->save();
        if($ser)
        {
            return $this->redirect('?r=goodsattr/attr');
        }
    }

    //商品添加
    public function actionAppend()
    {
        //mode
        $man_good_type=new Man_goods_type();
        //接值
        $request=\Yii::$app->request->post();
        $man_good_type->cat_name=$request['cat_name'];
        $man_good_type->attr_group=$request['attr_group'];
        //入库
        $srt=$man_good_type->save();
        if($srt)
        {
            return $this->redirect('?r=goodsattr/type');
        }


    }
}