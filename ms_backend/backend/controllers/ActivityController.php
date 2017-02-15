<?php
namespace backend\controllers;
use yii\web\Controller;
use yii\data\Pagination;
use app\models\Fication;
use app\models\Man_goods;
use app\models\Man_category;
use yii\web\UploadedFile;
use yii\db\Query;
use common\Uploadfiles\Uploadfile;
/**
 * Site controller
 *博文管理
 */
header("content-type:text/html;charset=utf-8");
class ActivityController extends CommonController
{
    public $layout = "menu";
    public $enableCsrfValidation= false;

    //添加活动页面
    public function actionAdd()
    {
        $request = \Yii::$app->request;
        if($request->isPost)
        {
            $data = $request->post();
            $actAdd = \Yii::$app->db->createCommand()->insert('man_activity',[
                'act_name'=>$data['act_name'],
                'status_time'=>$data['status_time'],
                'die_time'=>$data['die_time'],
                'is_show'=>$data['is_show'],
                'content'=>$data['content'],
            ])->execute();
            if($actAdd)
            {
                return $this->redirect('?r=activity/index');
            }else
            {
                 echo "添加失败";
            }
        }else
        {
            return $this->render('actadd');
        }

    }

    //活动展示
    public function actionIndex()
    {
        $query = new Query();
        $query->from('man_activity');
        $pages = new Pagination(['totalCount' =>$query->count(), 'pageSize' => '5']);
        $model = $query->offset($pages->offset)->limit($pages->limit)->all();

        return $this->render('index',[
            'res' => $model,
            'pages' => $pages,
        ]);
    }

    //活动删除
    public function actionDelete()
    {
        $id = \Yii::$app->request->get('ids');
        $actDel = \Yii::$app->db->createCommand()->delete('man_activity',[
            'act_id'=>$id,
        ])->execute();
        if($actDel)
        {
            echo 1;
        }else
        {
            echo 0;
        }
    }

}