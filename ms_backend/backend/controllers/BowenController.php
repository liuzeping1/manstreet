<?php
namespace backend\controllers;
use yii\web\Controller;
use yii\data\Pagination;
use app\models\Fication;
use app\models\Man_goods;
use app\models\Man_category;
use yii\web\UploadedFile;
/**
 * Site controller
 *博文管理
 */
header("content-type:text/html;charset=utf-8");
class BowenController extends CommonController
{
    public $layout = "menu";
    public $enableCsrfValidation= false;
    //分类显示
    public function actionIndex()
    {

        $fication=new Man_category();
        $te=$fication->find()->where(['is_show'=>1])->asArray()->all();
        var_dump($te);
        return $this->render('index',['name'=>$te]);
    }
    //博文显示
    public function actionAdd()
    {
        $fication=new Man_category();
        $te['name']=$fication->find()->all();

        return $this->render('bowen',$te);
    }
    //博文添加
    public function actionB_add()
    {

        $request=\Yii::$app->request;
        $te=$request->post();

        $upload=new UploadedFile(); //实例化上传类
        $name=$upload->getInstanceByName('img'); //获取文件原名称
        $img=$_FILES['img']; //获取上传文件参数
        $upload->tempName=$img['tmp_name']; //设置上传的文件的临时名称
        $img_path='uploads/'.$name; //设置上传文件的路径名称(这里的数据进行入库)
        $upload->saveAs($img_path); //保存文件、
        //添加分类名称
        $fenlei=new Fication();
        $fication=new Bowen();
        $data=$fication->find()->where(['f_id'=>$te['f_id']])->asArray()->one();
        $fication->f_id=$data['f_name'];
        $fication->title=$te['title'];
        $fication->content=$te['content'];
        $fication->huthor=$te['huthor'];
        $fication->comment=$te['comment'];
        $fication->add_time=time();
        $fication->img=$img_path;
        $te=$fication->save();
        if($te)
        {
            return $this->redirect('?r=coating/index');
        }

    }
    public function actionBel()
    {
        $re=\Yii::$app->request->get();

        $fication=new Bowen();
        $te=$fication->find()->where(['id'=>$re['id']])->one();
        $te->bel=0;
        $del=$te->save();
        if($del)
        {
            return $del;
        }
    }



}
