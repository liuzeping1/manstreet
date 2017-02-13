<?php
namespace backend\controllers;
use yii\web\Controller;
use yii\data\Pagination;
use yii\web\UploadedFile;
use yii\web\Session;
use app\models\Man_category;

/**
 * Site controller
 * 商品分类管理
 */
class CategoryController extends CommonController
{
    public $layout = "menu";
    public $enableCsrfValidation= false;
    //分类展示
    public function actionIndex()
    {
        return $this->render('index');
    }

    //分类添加页面
    public function actionAdd()
    {
        return $this->render('add');
    }

    //分类添加操作
    public function actionInsert()
    {
        //接值
        $request=\Yii::$app->request;
        $cat_name=trim($request->post('cat_name'));
        $sort=trim($request->post('sort'));
        $is_show=$request->post('is_show');
        $add_time=time();

        $man_catrgory = new Man_category();
        $select = $man_catrgory->find()->where(['cat_name'=>$cat_name])->one();
        if($select){
            echo "<script>alert('分类已存在');location.href='?r=category/index';</script>";
        }else{
            $man_catrgory->cat_name = $cat_name;
            $man_catrgory->is_show = $is_show;
            $man_catrgory->addtime = $add_time;
            $man_catrgory->sort = $sort;
            $re=$man_catrgory->save();
        }



        return $this->redirect('?r=category/index');
    }
}
