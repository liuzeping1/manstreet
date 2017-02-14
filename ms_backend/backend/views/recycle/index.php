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
    <div class="panel-head"><strong class="icon-reorder">回收站</strong></div>
    <div class="padding border-bottom">
    </div>
    <table class="table table-hover text-center">
        <tr>
            <th width="5%">商品ID</th>
            <th width="10%">商品类型</th>
            <th width="5%">商品库存</th>
            <th width="5%">商品价格</th>
            <th width="5%">是否在售</th>
            <th width="5%">发布时间</th>
            <th width="5%">商品货号</th>
            <th width="5%">是否促销</th>
            <th width="25%">操作</th>
        </tr>
        <?php foreach($name as $k=>$v){?>
            <tr>
                <th width="10%"><?php echo $v['goods_id']?></th>
                <th width="10%"><?php echo $v['cat_name']?></th>
                <th width="10%"><?php echo $v['goods_number']?></th>
                <th width="10%"><?php echo $v['goods_price']?></th>
                <th width="10%">
                    <?php
                    if($v['is_on_sale']==1){?>
                        <img src="images/no.gif" >
                    <?php  }else {  ?>
                        <img src="images/no.gif" >
                    <?php } ?>

                </th>
                <th width="10%"><?php echo $v['add_time']?></th>
                <th width="10%"><?php echo $v['goods_sn']?></th>
                <th width="10%"><?php
                    if($v['is_promote'] == 1){?>
                        <img src="images/no.gif" >
                    <?php  }else {  ?>
                        <img src="images/no.gif" >
                    <?php } ?>

                </th>
                <td><div class="button-group"> <a class="button border-main" href="#" onclick="return the(<?php echo $v['goods_id']?>)"><span class="icon-edit"></span> 还原</a> <a class="button border-red" href="javascript:void(0)" onclick="return del(<?php echo $v['goods_id']?>)"><span class="icon-trash-o" ></span> 彻底删除</a> </div></td>

            </tr>
        <?php }?>


    </table>
</div>
<script type="text/javascript">
    //
    function the(goods_id,mid){

        if(confirm("您确定要还原吗?")){
            var url="?r=recycle/bel";

            $.get(url,{goods_id:goods_id},function(mms){

                if(mms)
                {
                    location.reload();
                }
            })
        }
    }
    function del(goods_id,mid){

        if(confirm("您确定要删除吗?")){
            var url="?r=recycle/delete";

            $.get(url,{goods_id:goods_id},function(mms){

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