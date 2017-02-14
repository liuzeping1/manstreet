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
    <title></title>
    <link rel="stylesheet" href="css/pintuer.css">
    <link rel="stylesheet" href="css/admin.css">
    <script src="js/jquery.js"></script>
    <script src="js/pintuer.js"></script>
</head>
<body>
<div class="panel admin-panel">
    <div class="panel-head"><strong class="icon-reorder"> 内容列表</strong></div>
    <div class="padding border-bottom">
        <?php
        $from = ActiveForm::begin([
            'action' =>Url::toRoute(['show']),
            'method' => 'get',
        ]);
        echo '搜索：'.Html::input('text','title');
        echo Html::submitButton('搜索');
        echo '<br />';
        echo '<br />';

        ActiveForm::end();

        ?>
    </div>

    <table class="table table-hover text-center">
        <tr>
            <th width="10%">ID</th>
            <th width="20%">文章标题</th>
            <th width="15%">文章作者</th>
            <th width="20%">是否显示</th>
            <th width="10%">文章描述</th>
            <th width="10%">添加时间</th>
            <th width="15%">操作</th>
        </tr>
        <?php foreach($res as $k=>$v) :?>
        <tr>
            <td><?php echo $v['art_id']?></td>
            <td><?php echo $v['title']?></td>
            <td><?php echo $v['author']?></td>
            <td>
                <?php
                if($v['is_show']==1)
                {
                    echo '是';
                }else
                {
                    echo '否';
                }
                ?>
            </td>
            <td><?php echo $v['description']?></td>
            <td><?php echo $v['add_time']?></td>
            <td><div class="button-group">
                    <a class="button border-main" href="?r=bowen/find&id=<?php echo $v['art_id']?>"><span class="icon-edit"></span> 修改</a>
                    <a class="button border-red" href="javascript:void(0)" id="del" ids="<?php echo $v['art_id']?>" "><span class="icon-trash-o"></span> 删除</a>
                </div></td>
        </tr>
        <?endforeach?>
    </table>
    <?= LinkPager::widget(['pagination' => $pages]); ?>
</div>
<script type="text/javascript">
    $(function(){
        $(document).on('click','#del',function(){
            var comif = confirm("你确定是否删除？？");
            if(comif)
            {
                var ids = $(this).attr("ids");
                var msg_this = $(this);
                $.ajax({
                    type: "get",
                    url: "?r=bowen/delete",
                    data: "id="+ids,
                    success: function(msg){
                        if(msg==1)
                        {
                            msg_this.parents('tr').remove();
                            window.location.reload();
                        }else
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