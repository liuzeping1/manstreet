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
        <button type="button" class="button border-yellow" onclick="window.location.href='?r=activity/add'"><span class="icon-plus-square-o"></span> 添加内容</button>
    </div>
    <table class="table table-hover text-center">
        <tr>
            <th width="10%">ID</th>
            <th width="20%">活动名称</th>
            <th width="15%">开始时间</th>
            <th width="20%">结束时间</th>
            <th width="10%">是否开启</th>
            <th width="10%">活动简介</th>
            <th width="15%">操作</th>
        </tr>
        <?php foreach($res as $k=>$v) :?>
        <tr>
            <td><?php echo $v['act_id']?></td>
            <td><?php echo $v['act_name']?></td>
            <td><?php echo $v['status_time']?></td>
            <td><?php echo $v['die_time']?></td>
            <td>
                <?php
                if($v['is_show']==1)
                {
                    echo "开启";
                }else
                {
                    echo "关闭";
                }

                ?>
            </td>
            <td><?php echo $v['content']?></td>
            <td><div class="button-group">
                    <a class="button border-main" href="#add"><span class="icon-edit"></span> 修改</a>
                    <a class="button border-red" href="javascript:void(0)" id="del" ids="<?php echo $v['act_id']?>"><span class="icon-trash-o"></span> 删除</a>
                </div></td>
        </tr>
    <?php endforeach?>
    </table>
</div>
<script type="text/javascript">
    $(function(){
        $(document).on('click','#del',function(){
            var confir = confirm("你是否确定删除？");
            if(confir)
            {
                var ids = $(this).attr("ids");
                var _this = $(this);
                $.ajax({
                    type: "get",
                    url: "?r=activity/delete",
                    data: "ids="+ids,
                    success: function(msg){
                        if(msg==1)
                        {
                            _this.parents("tr").remove();
                        }else
                        {
                            alert("删除失败");
                        }
                    }
                });
            }
        })
    })
</script>
</body></html>