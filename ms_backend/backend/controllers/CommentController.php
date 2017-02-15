<?php
namespace backend\controllers;
use yii\web\Controller;
use yii\data\Pagination;
use yii\web\UploadedFile;
use yii\web\Session;
use app\models\Man_comment;
use yii\db\Query;

/**
 * Site controller
 * 评论管理
 */
class CommentController extends CommonController
{
    public $layout = "menu";
    public $enableCsrfValidation= false;
    //用户展示
    public function actionIndex()
    {
//        return $this->render('index');
//        搜索加分页
        $query = new Query();
         $where = \Yii::$app->request->get();
         $query->from('man_comment')->innerJoin( 'man_users', 'man_comment.user_id = man_users.user_id');
        if($where['status']==1)
        {
            $query->where(['status'=>1]);
        }
        elseif($where['status']==0)
        {
            $query->where(['status'=>0]);
        }
        if(!empty($where['keywords']))
        {
            $query->andWhere(['like', 'content', $where['keywords']]);
        }

        $pages = new Pagination(['totalCount' =>$query->count(), 'pageSize' => '2']);
        $model = $query->offset($pages->offset)->limit($pages->limit)->all();
        return $this->render('index',[
            're' => $model,
            'pages' => $pages,
            'where' => $where,
        ]);

    }

    //用户添加页面
    public function actionAdd()
    {
        return $this->render('add');
    }

    //用户添加操作
//    public function actionInsert()
//    {
//        //接值
//        $request = \Yii::$app->request;
//        $user_name = trim($request->post('user_name'));
//        $email = trim($request->post('email'));
//        $password = md5(trim($request->post('password')));
//        $sex = $request->post('sex');
//        $birthday = trim($request->post('birthday'));
//        $reg_time = time();
//        $login_time = 0;
//        $login_ip = 0;
//
//        $man_users = new Man_users();
//        //查询用户名是否已存在
//        $select = $man_users->find()->where(['user_name'=>$user_name])->one();
//        if($select)
//        {
//            echo "<script>alert('用户已存在');location.href='?r=users/index';</script>";
//        }
//        else
//        {
//            //数据入库操作
//            $man_users->email = $email;
//            $man_users->user_name = $user_name;
//            $man_users->password = $password;
//            $man_users->sex = $sex;
//            $man_users->birthday = $birthday;
//            $man_users->reg_time = $reg_time;
//            $man_users->login_time = $login_time;
//            $man_users->login_ip = $login_ip;
//            $re=$man_users->save();
//            if($re)
//            {
//                return $this->redirect('?r=users/index');
//            }
//            else
//            {
//                echo "<script>alert('添加失败，请重新添加');location.href='?r=users/add';</script>";
//            }
//        }
//    }

    //用户删除
    public function actionDelete()
    {
        //接用户ID
        $request = \Yii::$app->request;
        $comment_id = $request->get('id');
        $man_comment = new Man_comment();
        $re = $man_comment->find()->where(['comment_id'=>$comment_id])->one()->delete();
        if($re)
        {
            echo 1;;
        }
        else
        {
            echo 0;
        }
    }

    //修改页面
    public function actionSave()
    {
        $query = new Query();
        $request = \Yii::$app->request;
        $comment_id = $request->get('comment_id');
        $re=$query->from('man_comment')->innerJoin('man_goods', 'man_comment.goods_id = man_goods.goods_id')->where(['comment_id'=>$comment_id])->one();
        return $this->render('save',['re'=>$re]);
    }

    //修改操作
    public function actionUpdate()
    {
        //接值
        $request = \Yii::$app->request;
        $where = $request->post();

        $man_users = new man_comment();
        $man_users = $man_users->findOne($where['comment_id']);
        $man_users->comment_rank = $where['comment_rank'];
        $man_users->content = $where['content'];
        $man_users->status = $where['status'];
        $re=$man_users->save();
        if($re)
        {
            return $this->redirect('?r=comment/index&status='.$where["status"].'&keywords=');
        }
        else
        {
            echo "<script>alert('修改失败');location.href='?r=comment/index&status=2&keywords=';</script>";
        }
    }
}
