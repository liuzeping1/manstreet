<?php
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\helpers\Html;


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
        <form action="?r=bowen/add" method="post" enctype="multipart/form-data">
            <input type="submit" class="button border-yellow" value="添加博文">
        </form>
    </div>
    <table class="table table-hover text-center">
        <tr>
                <th width="5%">ID</th>
                <th width="10%">分类</th>
                <th width="15%">标题</th>
                <th width="5%">发布人</th>
                <th width="5%">发布时间</th>
                <th width="5%">评论</th>
                <th width="25%">操作</th>
        </tr>
        <?php foreach($name as $k=>$v){?>
            <tr>
                <th width="10%"><?php echo $v['id']?></th>
                <th width="10%"><?php echo $v['f_id']?></th>
                <th width="10%"><?php echo $v['title']?></th>
                <th width="10%"><?php echo $v['huthor']?></th>
                <th width="10%"><?php echo $v['add_time']?></th>
                <th width="10%"></th>
                <td><div class="button-group"> <a class="button border-main" href="cateedit.html"><span class="icon-edit"></span> 修改</a> <a class="button border-red" href="javascript:void(0)" onclick="return del(<?php echo $v['id']?>)"><span class="icon-trash-o" ></span> 删除</a> </div></td>

                </tr>
        <?php }?>


    </table>
</div>
<script type="text/javascript">
    function del(id,mid){

        if(confirm("您确定要删除吗?")){
            var url="?r=bowen/bel";

            $.get(url,{id:id},function(mms){

                if(mms)
                {
                    location.reload();
                }
            })
        }
    }
</script>
</body>

</html>