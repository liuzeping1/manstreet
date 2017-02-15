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
        <div class="panel-head"><strong class="icon-reorder"> 内容列表</strong> <a href="" style="float:right; display:none;">添加字段</a></div>
        <div class="padding border-bottom">
            <ul class="search" style="padding-left:10px;">
                <li>搜索：</li>
                <li>
                    是否审核
                    <select name="status" class="input" id="search" style="width:80px; line-height:17px;display:inline-block">
                        <option value="2" <?php if($where['status']==2){ echo "selected"; } ?>>选择</option>
                        <option value="1" <?php if($where['status']==1){ echo "selected"; } ?>>是</option>
                        <option value="0" <?php if($where['status']==0){ echo "selected"; } ?>>否</option>
                    </select>
                </li>
                <li>
                    <input type="text" placeholder="请输入搜索关键字" id="keywords" value="" name="keywords" class="input" style="width:250px; line-height:17px;display:inline-block" />
                    <input type="button" id="btn" class="button border-main icon-search" value="搜索">
                </li>
            </ul>
        </div>
        <table class="table table-hover text-center">
            <tr>
                <th width="100" style="text-align:left; padding-left:20px;">ID</th>
                <th width="10%">商品ID</th>
                <th>email</th>
                <th>星级</th>
                <th>用户IP</th>
                <th>内容</th>
                <th width="10%">审核状态</th>
                <th>评论时间</th>
                <th width="310">操作</th>
            </tr>
            <?php foreach($re as $key => $value): ?>
                <tr>
                    <td style="text-align:left; padding-left:20px;">
                        <input type="checkbox" name="id[]" value="<?= $value['comment_id'] ?>" /><?= $value['comment_id'] ?>
                    </td>
                    <td><?= $value['goods_id'] ?></td>
                    <td width="10%"><?= $value['email'] ?></td>
                    <td><?= $value['comment_rank'] ?></td>
                    <td><?= $value['ip_address'] ?></td>
                    <td><?= strlen($value['content'])<=15 ? $value['content'] : (substr($value['content'],0,15).chr(0)."  ...");  ?></td>
                    <td><?php if($value['status']==1){ ?><img src="images/yes.gif"><?php }else{ ?><img src="images/no.gif"><?php } ?></td>
                    <td><?= date('Y-m-d H:i:s',$value['add_time']) ?></td>
                    <td>
                        <div class="button-group">
                            <a class="button border-main" href="?r=comment/save&comment_id=<?=$value['comment_id'] ?>"><span class="icon-edit"></span> 修改</a>
                            <a class="button border-red" href="javascript:void(0)" id="del" ids="<?= $value['comment_id'] ?>"><span class="icon-trash-o"></span> 删除</a>
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
        $(document).on('click','#del',function(){
            var comif = confirm("你确定是否删除？？");
            if(comif)
            {
                var ids = $(this).attr("ids");
                var msg_this = $(this);
                $.ajax({
                    type: "get",
                    url: "?r=comment/delete",
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
            location.href="?r=comment/index&status="+search+"&keywords="+keywords;
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