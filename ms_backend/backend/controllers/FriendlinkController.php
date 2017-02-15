<?php

namespace backend\controllers;

use Yii;
use app\models\FriendLinkModel;
use app\models\SearchLinkModel;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Query;
use yii\widgets\LinkPager;
use yii\data\pagination;
use yii\web\UploadedFile;
/**
 * FriendlinkController implements the CRUD actions for FriendLinkModel model.
 */
class FriendlinkController extends Controller
{   
    public $enableCsrfValidation = false;
    public $layout = "menu";

    /*
     *  功能:展示友情链接主页面
     *  by:your father
     *  author:527
     * 
     */
    public function actionIndex()
    {   
        //计算数据库总条数  
        $friendSql = "select * from man_friend_link";
        $friendResult = yii::$app->db->createCommand($friendSql)->queryAll();
        $friendCount = count($friendResult);
        //分页
        $query = new Query();
        //绑定表
        $query->from('man_friend_link');
        $pages = new Pagination(['totalCount'=>$friendCount,'pageSize'=>10]);
        $Result = $query->orderby('show_order','ASC')->offset($pages->offset)->limit($pages->limit)->all();
        return $this->render('index',['result'=>$Result,'pages'=>$pages]);

    }

    //添加页面展示
    public function actionAddlist()
    {   

        return $this->render('addlist');
    }

    //数据添加
    public function actionAddlink()
    {
        $link_name = yii::$app->request->post('link_name');
        $link_url  = yii::$app->request->post('link_url');
        $show_order= yii::$app->request->post('show_order');

        $image = UploadedFile::getInstanceByName('link_img');
        $dir='uploads/'.date("YmdH",time()).'/';
        if(!is_dir($dir))
        {
            mkdir($dir,'777');
        }
        //var_dump($dir);die;
        $name = $dir.$image->name; //文件名绝对路径
        
        $status = $image->saveAs($name,true); //保存文件
        if ($status) {
            $friendSql = "insert into man_friend_link(`link_name`,`link_url`,`show_order`,`link_img`)VALUES('$link_name','$link_url','$show_order','$name')";
            $friendResult = yii::$app->db->createCommand($friendSql)->execute();
            if($friendResult)
            {
                echo "<script>alert('添加成功');location.href='?r=friendlink/index'</script>";
            }
            else
            {
                echo "<script>alert('添加失败');window.history.go(-1)</script>";
            }
        }else {
            echo "<script>alert('图片不符合需求');window.history.go(-1)</script>";
        }
    }

    //友情链接删除
    public function actionAdddel()
    {   
        header('content-type:text/html;charset=utf8');
        $id = yii::$app->request->get('id');
        $delSql = "delete from man_friend_link where link_id = '$id'";
        $delResult = yii::$app->db->createCommand($delSql)->execute();
        if($delResult)
        {
            echo "<script>alert('删除成功');location.href='?r=friendlink/index'</script>";exit;
        }
        else
        {
            echo "<script>alert('删除失败');window.history.go(-1)</script>";exit;
        }
    }
}