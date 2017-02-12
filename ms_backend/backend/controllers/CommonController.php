<?php
namespace backend\controllers;
use yii\web\Controller;
use yii\data\Pagination;
use app\models\Admin;
use app\models\Auth_item_child;
use app\models\Auth_assignment;
use backend\models\Rbac;
use yii\web\UploadedFile;
use yii\web\Session;
use Yii;
/**
 * 公共控制器
 */
header("content-type:text/html;charset=utf-8");
class CommonController extends Controller
{
	public $enableCsrfValidation= false;
	public $layout = "menu";
	public function init()
	{

		parent::init();

		$session = \Yii::$app->session;
		$session->open();
		$admin = $session->get('admin');
		if(!isset($admin) && empty($admin))
		{
			$this->redirect('?r=login/error');
		}


		$session->close();
	}
	public function beforeAction($action)
	{

		//判断是否有权限
		$auth_item_child=new Auth_item_child();
		$auth_assignment=new Auth_assignment();
		//查看session的用户ID；
		$session = \Yii::$app->session;
		$session->open();
		$admin = $session->get('admin');

		//根据session的用户ID查库有没什么角色；

     	$sql=$auth_assignment->find()->where(['user_id'=>$admin])->asArray()->one();
        $item=$sql['item_name'];

        if(!empty($item))
		{

			//获取控制器和方法
			$action = Yii::$app->controller->id.'/'.Yii::$app->controller->action->id;
			//根据角色查询有什么权限；
			$child=$auth_item_child->find()->where(['parent'=>$item,'child'=>$action])->asArray()->all();
			if(!empty($child))
			{
				return true;
			}
			else
			{
				throw new \yii\web\UnauthorizedHttpException('对不起，您现在还没获此操作的权限');
			}
		}
		else
		{
			throw new \yii\web\UnauthorizedHttpException('对不起，您现在还没获此操作的权限');
		}




	}

	}