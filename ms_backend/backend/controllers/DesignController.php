<?php
namespace backend\controllers;
use yii\web\Controller;
use yii\data\Pagination;
use yii\web\UploadedFile;
use yii\web\Session;
use app\models\Man_design;
use yii\db\Query;

/**
 * Site controller
 * 形象设计管理
 */
class DesignController extends CommonController
{
    public $layout = "menu";
    public $enableCsrfValidation= false;
    //用户订单展示
    public function actionIndex()
    {
        //搜索加分页
        $query = new Query();
        $where = \Yii::$app->request->get();
        $query->from('man_design');
        if($where['status']==2)
        {
            $query->where(['status'=>2]);
        }
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
            $query->andWhere(['like', 'user_name', $where['keywords']]);
        }

        $pages = new Pagination(['totalCount' =>$query->count(), 'pageSize' => '5']);
        $model = $query->offset($pages->offset)->limit($pages->limit)->all();
        return $this->render('index',[
            're' => $model,
            'pages' => $pages,
            'where' => $where,
        ]);

    }

    //订单状态即点即改
    public function actionStatus()
    {
        //接用户ID
        $request = \Yii::$app->request;
        $id = $request->post('id');
        $status = $request->post('status');
        $man_design = new Man_design();
        if($status == 0)
        {
            $man_design = $man_design->findOne($id);
            $man_design->status = 1;
            $re=$man_design->save();
            if($re)
            {
                echo 1;die;
            }
            else
            {
                echo 0;die;
            }
        }
        elseif($status == 1)
        {
            $man_design = $man_design->findOne($id);
            $man_design->status = 2;
            $re=$man_design->save();
            if($re)
            {
                echo 1;die;
            }
            else
            {
                echo 0;die;
            }
        }
        elseif($status == 2)
        {
            $man_design = $man_design->findOne($id);
            $man_design->status = 0;
            $re=$man_design->save();
            if($re)
            {
                echo 1;die;
            }
            else
            {
                echo 0;die;
            }
        }
    }


    //订单信息删除
    public function actionDelete()
    {
        //接用户ID
        $request = \Yii::$app->request;
        $id = $request->get('id');
        $man_design = new Man_design();
        $re = $man_design->find()->where(['id'=>$id])->one()->delete();
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
        $request = \Yii::$app->request;
        $user_id = $request->get('user_id');
        $man_users = new Man_users();
        $re = $man_users->find()->where(['user_id'=>$user_id])->asArray()->one();
        return $this->render('save',['re'=>$re]);
    }

    //修改操作
    public function actionUpdate()
    {
        //接值
        $request = \Yii::$app->request;
        $user_id = $request->post('user_id');
        $user_name = trim($request->post('user_name'));
        $email = trim($request->post('email'));
        $sex = $request->post('sex');
        $birthday = trim($request->post('birthday'));

        $man_user = new Man_users();
        //查询用户名是否已存在
        $select = $man_user->find()->where(['user_name'=>$user_name])->one();
        if($select)
        {
            echo "<script>alert('用户已存在');location.href='?r=users/index';</script>";
        }
        else
        {
            $man_users = new Man_users();
            $man_users = $man_users->findOne($user_id);
            $man_users->email = $email;
            $man_users->user_name = $user_name;
            $man_users->sex = $sex;
            $man_users->birthday = $birthday;
            $re=$man_users->save();
            if($re)
            {
                return $this->redirect('?r=users/index');
            }
            else
            {
                echo "<script>alert('修改失败');location.href='?r=users/index';</script>";
            }
        }
    }

}
