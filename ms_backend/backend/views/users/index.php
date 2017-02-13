<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\widgets\LinkPager;
use yii\base;
?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>用户列表</title>
    <link rel="stylesheet" href="css/pintuer.css">
    <link rel="stylesheet" href="css/admin.css">
    <script src="js/jquery.js"></script>
    <script src="js/pintuer.js"></script>
</head>
<body>
<div class="panel admin-panel">
    <div class="panel-head"><strong class="icon-reorder"> 用户列表</strong></div>

    <div class="padding border-bottom">
        <ul class="search" style="padding-left:10px;">
            <li> <a class="button border-main icon-plus-square-o" href="?r=users/add"> 添加会员</a> </li>

            <li>
                <?php
                $from = ActiveForm::begin([
                    'action' =>Url::toRoute(['index']),
                    'method' => 'get',
                ]);
                echo '搜索：'.Html::input('text','user_name');
                echo Html::submitButton('搜索');
                echo '<br />';
                ActiveForm::end();

                ?>
            </li>

        </ul>
    </div>
    <table class="table table-hover text-center">
        <tr>
            <th width="5%">用户ID</th>
            <th>用户名</th>
            <th>邮箱</th>
            <th>性别</th>
            <th>生日</th>
            <th>注册时间</th>
            <th width="250">操作</th>
        </tr>
<?php foreach($re as $v): ?>
        <tr>
            <td><?= $v['user_id'] ?></td>
            <td><?= $v['user_name'] ?></td>
            <td><?= $v['email'] ?></td>
            <td><?php if($v['sex'] == 1){ echo '男'; }else{ echo '女'; } ?></td>
            <td><?= $v['birthday'] ?></td>
            <td><?= date('Y-m-d H:i:s',$v['reg_time']) ?></td>
            <td>
                <div class="button-group">
                    <a type="button" class="button border-main" href="?r=users/save&user_id=<?= $v['user_id'] ?>"><span class="icon-edit"></span>修改</a>
                    <a class="button border-red" href="javascript:void(0)" id="del" ids="<?= $v['user_id'] ?>"><span class="icon-trash-o"></span> 删除</a>
                </div>
            </td>
        </tr>
        <?php endforeach; ?>
        <tr>
            <td colspan="8">
                <?= LinkPager::widget(['pagination' => $pages]); ?>
<!--                <div class="pagelist">-->
<!--                    <a href="">上一页</a> <span class="current">1</span><a href="">2</a><a href="">3</a><a href="">下一页</a><a href="">尾页</a>-->
<!--                </div>-->
            </td>
        </tr>
    </table>
</div>
<script>
    $(function(){
        $(document).on('click','#del',function(){
            var comif = confirm("你确定是否删除？？");
            if(comif)
            {
                var ids = $(this).attr("ids");
                var msg_this = $(this);
                $.ajax({
                    type: "get",
                    url: "?r=users/delete",
                    data: "id="+ids,
                    success: function(msg){
                        if(msg==1)
                        {
                            msg_this.parents('tr').remove();
                        }
                        else
                        {
                            alert('删除失败');
                        }
                    }
                });
            }
        })
    })
</script>
</body></html>