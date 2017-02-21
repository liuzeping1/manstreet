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
class AibumController extends CommonController
{
    public $layout = "menu";
    public $enableCsrfValidation= false;

    //展示相册表单
    public function actionAdd()
    {
        return $this->render('aibumadd');
    }

    //相册展示
    public function actionIndex()
    {
        $query = new Query();
        $query->from('man_aibum');
        $pages = new Pagination(['totalCount' =>$query->count(), 'pageSize' => '2']);
        $model = $query->offset($pages->offset)->limit($pages->limit)->all();
        return $this->render('index',[
            'res' => $model,
            'pages' => $pages,
        ]);
    }

    //相册入库
    public function actionAibumadd()
    {
        $data = \Yii::$app->request->post('goods_id');
//        $file = $_FILES['img'];
        //循环处理数组
//        $img = [];
//        foreach($file as $key=>$val)
//        {
//            foreach($val as $k=>$v)
//            {
//                $img[$k][$key] = $v;
//            }
//        }
//        print_r($img);die;
        $upload = new Uploadfile();
        $type = array('image/gif', 'image/jpeg', 'image/png', 'image/pjpeg', 'image/x-png');
        $upload->Uploadfile($_FILES['img'],'../../img/',10244457,$type);
        $num = $upload->upload();
        if($num!=0) {
            $b_cover = $upload->getSaveInfo();
            foreach($b_cover as $k=>$v){
                $res = \Yii::$app->db->createCommand()->insert('man_aibum',[
                    'img_path' => $v['newpath'],
                    'img' =>$v['name'],
                    'goods_id' =>$data,
                ])->execute();
            }
            if($b_cover)
            {
                return $this->redirect('?r=aibum/index');
            }else
            {
                echo "添加失败";
            }
        }

    }

    public function actionDelete()
    {
        $id = \Yii::$app->request->get('id');

        $aibumDel = \Yii::$app->db->createCommand()->delete('man_aibum',[
            'bum_id'=>$id
        ])->execute();
        if($aibumDel)
        {
            echo 1;
        }else
        {
            echo 0;
        }
    }

}