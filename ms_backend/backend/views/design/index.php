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
    <div class="panel-head"><strong class="icon-reorder"> 形象设计预约</strong> <a href="" style="float:right; display:none;"></a></div>
    <div class="padding border-bottom">
        <ul class="search" style="padding-left:10px;">
            <li>搜索：</li>
            <li>
                支付状态：
                <select name="status" class="input" id="search" style="width:100px; line-height:17px;display:inline-block">
                    <option value="3" >选择</option>
                    <option value="1" <?php if($where['status']==1){ echo "selected"; } ?>>已支付</option>
                    <option value="0" <?php if($where['status']==0){ echo "selected"; } ?>>未支付</option>
                    <option value="2" <?php if($where['status']==2){ echo "selected"; } ?>>已完成</option>
                </select>
            </li>
            <li>
                <input type="text" placeholder="请输入用户名关键字" id="keywords" value="<?= $where['keywords'] ?>" name="keywords" class="input" style="width:250px; line-height:17px;display:inline-block" />
                <input type="button" id="btn" class="button border-main icon-search" value="搜索">
            </li>
        </ul>
    </div>
    <table class="table table-hover text-center">
        <tr>
            <th width="100" style="text-align:left; padding-left:20px;">ID</th>
            <th width="10%">用户名</th>
            <th>性别</th>
            <th>手机号</th>
            <th>邮箱</th>
            <th>QQ</th>
            <th width="10%">预约时间</th>
            <th>支付状态</th>
            <th width="310">操作</th>
        </tr>
        <?php foreach($re as $key => $value): ?>
            <tr>
                <td style="text-align:left; padding-left:20px;">
                    <input type="checkbox" name="id[]" value="<?= $value['id'] ?>" /><?= $value['id'] ?>
                </td>
                <td><?= $value['user_name'] ?></td>
                <td width="10%"><?php if($value['sex']==1){ echo "男"; }else{ echo "女"; } ?></td>
                <td><?= $value['phone'] ?></td>
                <td><?= $value['email'] ?></td>
                <td><?= $value['qq'] ?></td>
                <td><?= date('Y-m-d H:i:s',$value['destine_time']) ?></td>
                <td>
                    <?php if($value['status']==1 ){ ?><a href="javascript:void(0)"><span style="color: blue" id="status" ids="<?= $value['id'] ?>" status="<?= $value['status'] ?>">已支付</span></a>
                    <?php }elseif($value['status']==2){ ?><a href="javascript:void(0)"><span style="color: green" id="status" ids="<?= $value['id'] ?>" status="<?= $value['status'] ?>">已完成</span></a>
                    <?php }else{ ?><a href="javascript:void(0)"><span style="color: red" id="status" ids="<?= $value['id'] ?>" status="<?= $value['status'] ?>">未支付</span></a><?php } ?>
                </td>
                <td>
                    <div class="button-group">
                        <a class="button border-red" href="javascript:void(0)" id="del" ids="<?= $value['id'] ?>"><span class="icon-trash-o"></span> 删除</a>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
        <tr>
            <td style="text-align:left; padding:19px 0;padding-left:20px;"><input type="checkbox" id="checkall"/>
                全选 </td>
            <td colspan="9" style="text-align:left;padding-left:20px;"><a href="javascript:void(0)" class="button border-red icon-trash-o" style="padding:5px 15px;" onclick="DelSelect()"> 删除</a>
            </td>
        </tr>
        <tr>
            <td colspan="9">
                <?= LinkPager::widget(['pagination' => $pages]); ?>
            </td>
        </tr>
    </table>
</div>
<script type="text/javascript">

    //单个删除
    $(function(){
        $(document).on('click','#status',function(){
            var status = $(this).attr("status");
            var id = $(this).attr('ids');
            $.ajax({
                type: "post",
                url: "?r=design/status",
                data: "id="+id+"&status="+status,
                success: function(msg){
                    if(msg==1)
                    {
                        location.reload();
                    }
                    else
                    {
                        alert('修改状态失败');
                    }
                }
            });
        })

        $(document).on('click','#del',function(){
            var comif = confirm("你确定是否删除？？");
            if(comif)
            {
                var ids = $(this).attr("ids");
                var msg_this = $(this);
                $.ajax({
                    type: "get",
                    url: "?r=design/delete",
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

    //联合搜索评论信息
    $(function(){
        $(document).on('click','#btn',function(){
            var search = $('#search').val();
            var keywords = $('#keywords').val();
            location.href="?r=design/index&status="+search+"&keywords="+keywords;
        })
    })

    //全选
    $("#checkall").click(function(){
        $("input[name='id[]']").each(function(){
            if (this.checked) {
                this.checked = false;
            }
            else {
                this.checked = true;
            }
        });
    })

    //批量删除
    function DelSelect(){
        var Checkbox=false;
        $("input[name='id[]']").each(function(){
            if (this.checked==true) {
                Checkbox=true;
            }
        });
        if (Checkbox){
            var t=confirm("您确认要删除选中的内容吗？");
            if (t==false) return false;
            $("#listform").submit();
        }
        else{
            alert("请选择您要删除的内容!");
            return false;
        }
    }


</script>
</body>
</html>