<?php
namespace backend\controllers;
use yii\web\Controller;
use yii\data\Pagination;
use app\models\Fication;
use app\models\Man_goods;
use app\models\Man_category;
use yii\web\UploadedFile;
use yii\db\Query;
/**
 * Site controller
 *博文管理
 */
header("content-type:text/html;charset=utf-8");
class GoodsController extends CommonController
{
    public $layout = "menu";
    public $enableCsrfValidation= false;
    //商品显示
    public function actionIndex()
    {
        //商品类型显示

        $request=\Yii::$app->request;
        $data['goods_name']=$request->get('goods_name');
        $test=new Man_goods();
        //  商品搜索
        if(!empty($data['goods_name']))
        {
            $test=new Man_goods();
            $where[]='goods_name like "%'.$data['goods_name'].'%"';
            $where = implode(' AND ',$where);

            $arr=$test->find()->where($where);

            $pages = new Pagination(['totalCount' => $arr->count(), 'pageSize'   => 3]);
            $models = $arr->offset($pages->offset)->where($where)->limit($pages->limit)->all();
        }
        else
        {

            $arr=$test->find();
            $pages = new Pagination(['totalCount' => $arr->count(), 'pageSize'   => 3]);
            $models = $arr->offset($pages->offset)->limit($pages->limit)->all();
        }
        return $this->render('index',['name'=>$models,'pages'=>$pages]);
    }
    //商品t显示模板
    public function actionShow()
    {
        $fication=new Man_category();
        $te['name']=$fication->find()->all();

        return $this->render('goods',$te);
    }
    //商品添加
    public function actionAdd()
    {
        //接值
        $request=\Yii::$app->request;
        $te=$request->post();

        $upload=new UploadedFile(); //实例化上传类
        $name=$upload->getInstanceByName('goods_img'); //获取文件原名称
        $img=$_FILES['goods_img']; //获取上传文件参数
        $upload->tempName=$img['tmp_name']; //设置上传的文件的临时名称
        $img_path='uploads/'.$name; //设置上传文件的路径名称(这里的数据进行入库)
        $upload->saveAs($img_path); //保存文件、
        //添加分类名称
        $man_goods=new Man_goods();
        $man_goods->goods_name=$te['goods_name'];
        $man_goods->cat_id=$te['cat_id'];
        $man_goods->goods_price=$te['goods_price'];
        $man_goods->goods_number=$te['goods_number'];
        $man_goods->goods_sn=$te['goods_sn'];
        $man_goods->is_new=$te['is_new'];
        $man_goods->add_time=time();
        $man_goods->sort=$te['sort'];
        $man_goods->is_promote=$te['is_promote'];
        $man_goods->is_hot=$te['is_hot'];
        $man_goods->is_on_sale=$te['is_on_sale'];
        $man_goods->goods_brief=$te['goods_brief'];
        $man_goods->goods_desc=$te['goods_desc'];
        $man_goods->goods_img=$img_path;
        //判断是否促销
        if($te['is_promote']==1)
        {
            $man_goods->promote_start_date=strtotime($te['promote_start_date']);
            $man_goods->promote_end_date=strtotime($te['promote_end_date']);
            $man_goods->promote_price=$te['promote_price'];
            $te=$man_goods->save();
            if($te)
            {
                return $this->redirect('?r=index/index');
            }
        }
        else
        {
            $te=$man_goods->save();
            if($te)
            {
                return $this->redirect('?r=index/index');
            }
        }

    }
    //添加回收站
    public function actionBel()
    {
        $re=\Yii::$app->request->get();
        $fication=new Man_goods();
        $te=$fication->find()->where(['goods_id'=>$re['goods_id']])->one();
        $te->is_delete=1;
        $del=$te->save();
        if($del)
        {
            return $del;
        }
    }
    //商品修改
    public function actionUpt()
    {
        $re=\Yii::$app->request->get();
        $ficationll=new Man_category();
        $fication=new Man_goods();
        //分类显示模板
        $te['name']=$ficationll->find()->asArray()->all();

        $te['tr']=$fication->find()->where(['goods_id'=>$re['goods_id']])->asArray()->one();
        return $this->render('save',$te);
    }
    public function actionAmend()
    {
        //接值
        $request=\Yii::$app->request;
        $man_goods=new Man_goods();
        $te=$request->post();
        $te=$man_goods->findOne($te['goods_id']);
        $del=$te->delete();
        //删除数据
        if($del) {
            $man_goods=new Man_goods();
            $te=$request->post();
            //图片修改
            $upload = new UploadedFile(); //实例化上传类
            $name = $upload->getInstanceByName('goods_img'); //获取文件原名称
            $img = $_FILES['goods_img']; //获取上传文件参数
            $upload->tempName = $img['tmp_name']; //设置上传的文件的临时名称
            $img_path = 'uploads/' . $name; //设置上传文件的路径名称(这里的数据进行入库)
            $upload->saveAs($img_path); //保存文件、
            //添加分类名称

            $man_goods->goods_name = $te['goods_name'];
            $man_goods->cat_id = $te['cat_id'];
            $man_goods->goods_price = $te['goods_price'];
            $man_goods->goods_number = $te['goods_number'];
            $man_goods->goods_sn = $te['goods_sn'];
            $man_goods->is_new = $te['is_new'];
            $man_goods->add_time = time();
            $man_goods->sort = $te['sort'];
            $man_goods->is_promote = $te['is_promote'];
            $man_goods->is_hot = $te['is_hot'];
            $man_goods->is_on_sale = $te['is_on_sale'];
            $man_goods->goods_brief = $te['goods_brief'];
            $man_goods->goods_desc = $te['goods_desc'];
            $man_goods->goods_img = $img_path;
            $upl = $man_goods->save();
            if ($upl) {
                return $this->redirect('?r=goods/show');
            }

        }

    }





}
