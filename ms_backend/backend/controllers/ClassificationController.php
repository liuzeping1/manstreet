<?php
namespace backend\controllers;
use yii\web\Controller;
use yii\data\Pagination;
use app\models\Man_category;
use yii\web\UploadedFile;
/**
 * Site controller
 *分类管理
 */
header("content-type:text/html;charset=utf-8");
class ClassificationController extends CommonController
{
    public $layout = "menu";
    public $enableCsrfValidation= false;
    //分类显示
    public function actionIndex()
    {
        return $this->render('index');
    }

    //添加分类
    public function actionAdd()
    {
        $fication=new Man_category();

        $list['name']=$fication::find()->asArray()->all();
        return $this->render('add',$list);
    }
    //添加分类
    public function actionMap()
    {
        $fication=new Man_category();
        $request=\Yii::$app->request;
        $te=$request->get();
        $fication->that_id=$te['that_id'];
        $fication->cat_name=$te['f_name'];
        $fication->sort=$te['sort'];

        $te=$fication->save();
        if($te)
        {
            echo 1;
        }
    }
    //分类删除
    public function actionDle()
    {
        $request=\Yii::$app->request;
        $id=$request->get('id');
        $fication=new Man_category();
        $ter=$fication->find()->where(['cat_id'=>$id])->one();
        $ter->is_show=0;
        $del=$ter->save();
        if($del)
        {
            return $del;
        }
    }
    //即点技改
    public function actionUpt()
    {
        $request=\Yii::$app->request;
        $id=$request->get('id');
        $f_sort=$request->get('f_sort');
        $fication=new Man_category();
        $ter=$fication->find()->where(['cat_id'=>$id])->one();
        $ter->sort=$f_sort;
        $upt=$ter->save();
        if($upt)
        {
            return $upt;
        }
    }


}
