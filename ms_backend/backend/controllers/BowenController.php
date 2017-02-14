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
class BowenController extends CommonController
{
    public $layout = "menu";
    public $enableCsrfValidation= false;

    //文章表单展示
    public function actionAdd()
    {
        return $this->render('bowen');
    }

    public function actionAddfrom()
    {
        $data = \Yii::$app->request->post();
        $artcleAdd = \Yii::$app->db->createCommand()->insert('man_article',[
            'title' => $data['title'],
            'content' =>$data['content'],
            'author' =>$data['author'],
            'is_show' =>$data['is_show'],
            'add_time' =>date('Y-m-d h:i:s'),
            'description' =>$data['description'],
        ])->execute();

        if($artcleAdd)
        {
            return $this->redirect('?r=bowen/show');
        }else
        {
            echo "添加失败，请重新添加";
        }
    }

    //文章展示
    public function actionShow()
    {
        $query = new Query();
        $where = \Yii::$app->request->get();
        $query->from('man_article');
        if(!empty($where['title']))
        {
            $query->andWhere(['title'=>$where['title']]);
        }

        $pages = new Pagination(['totalCount' =>$query->count(), 'pageSize' => '4']);
        $model = $query->offset($pages->offset)->limit($pages->limit)->all();

        return $this->render('index',[
            'res' => $model,
            'pages' => $pages,
            'where' => $where,
        ]);
    }

    //文章删除
    public function actionDelete()
    {
        $id = \Yii::$app->request->get('id');

        $articleDel = \Yii::$app->db->createCommand()->delete('man_article',[
            'art_id'=>$id,
        ])->execute();
        if($articleDel)
        {
            echo 1;
        }else
        {
            echo 0;
        }
    }

    //文章查询单条
    public function actionFind()
    {
        $id = \Yii::$app->request->get('id');

        $query = new Query();
        $artFind = $query->from('man_article')->where(['art_id'=>$id])->one();

        return $this->render('find',['res'=>$artFind]);
    }

    //文章修改
    public function actionUpdate()
    {
        $id = \Yii::$app->request->post('art_id');
        $data = \Yii::$app->request->post();

        $articleUp = \Yii::$app->db->createCommand()->update('man_article',[
            'title' => $data['title'],
            'content' =>$data['content'],
            'author' =>$data['author'],
            'is_show' =>$data['is_show'],
            'add_time' =>date('Y-m-d h:i:s'),
            'description' =>$data['description'],
        ],['art_id'=>$id])->execute();
        if($articleUp)
        {
            return $this->redirect('?r=bowen/show');
        }else
        {
            echo '修改失败';
        }
    }
}
