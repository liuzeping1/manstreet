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
        //分页
        $query = new Query();
        $query->from('man_goods_type');
        $cat_name['cat_name']=\Yii::$app->request->get('cat_name');
        if(!empty($cat_name['cat_name']))
        {
            $test=new Man_goods_type();
            $where[]='cat_name like "%'.$cat_name['cat_name'].'%"';
            $where = implode(' AND ',$where);
            $arr=$test->find()->where($where);
            $pages = new Pagination(['totalCount' =>$arr->count(), 'pageSize' => '1']);
            $model = $query->offset($pages->offset)->where($where)->limit($pages->limit)->all();
            //属性
            $man_goods_attrbute=new Man_goods_attrbute();
            $mun=[];
            foreach($model as $key=>$value){
                $mun[]=$man_goods_attrbute->find()->where(['cat_goods_id'=>$value['cat_goods_id']])->asArray()->all();
                foreach($mun as $k=>$v)
                {
                    $model[$key]['shu']=count($v);
                }
            }

        }else
        {

            //搜索
            $pages = new Pagination(['totalCount' =>$query->count(), 'pageSize' => '1']);
            $model = $query->offset($pages->offset)->limit($pages->limit)->all();

            $man_goods_attrbute=new Man_goods_attrbute();
            $mun=[];
            foreach($model as $key=>$value){
                $mun[]=$man_goods_attrbute->find()->where(['cat_goods_id'=>$value['cat_goods_id']])->asArray()->all();
                foreach($mun as $k=>$v)
                {
                    $model[$key]['shu']=count($v);
                }
            }
        }
        //商品类型显示模板
        return $this->render('type',[
            'name'=>$model,
            'pages' => $pages,
        ]);

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
        $query = new Query();
        $query->from('man_goods_attrbute')
               ->innerJoin( 'man_goods_type', 'man_goods_attrbute.cat_goods_id = man_goods_type.cat_goods_id')
              ->where(['man_goods_attrbute.cat_goods_id'=>$cat_goods_id]);
        $pages = new Pagination(['totalCount' =>$query->count(), 'pageSize' => '2']);
        $model = $query->offset($pages->offset)->limit($pages->limit)->all();
        return $this->render('attribute',[
            'name'=>$map,
            'cat_goods_id'=>$cat_goods_id,
            'data'=>$model,
            'page'=>$pages
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
    //商品属性删除
    public function actionDelete()
    {

        //接值
        $attr_id=\Yii::$app->request->get('attr_id');
        //mode
        $man_good_type=new Man_goods_attrbute();
        $man_good_type->attr_id=$attr_id;
        $del=$man_good_type->findOne($attr_id);
        $delete=$del->delete();
        if($delete)
        {
            return $delete;
        }

    }
}