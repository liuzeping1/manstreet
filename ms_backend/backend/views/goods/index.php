<?php
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\LinkPager;
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


                <?php

                $form=ActiveForm::begin([
                    'action'=>Url::toRoute(['goods/index']),
                    'method'=>'get',
                    'class'=>'forms'
                ]);
                echo Html::input('text', 'goods_name', '', ['class' =>'input']);
                echo Html::style('.input { width:250px; line-height:17px;display:inline-block }');
                echo Html::submitButton('搜索', ['class' => 'button border-main icon-search']);
                ActiveForm::end();
                ?>



        </div>
        <table class="table table-hover text-center">
            <tr>
                <th width="5%">商品ID</th>
                <th width="10%">商品名称</th>
                <th width="5%">商品库存</th>
                <th width="5%">商品价格</th>
                <th width="5%">是否在售</th>
                <th width="5%">发布时间</th>
                <th width="5%">商品货号</th>
                <th width="5%">是否促销</th>
                <th width="25%">操作</th>
            </tr>
            <?php foreach($name as $k=>$v){?>
               <?php if($v['is_delete']==0){?>
                <tr>
                    <th width="10%"><?php echo $v['goods_id']?></th>
                    <th width="10%"><?php echo $v['goods_name']?></th>
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
                    <td><div class="button-group"> <a class="button border-main" href="?r=goods/upt&goods_id=<?php echo $v['goods_id']?>"><span class="icon-edit"></span> 修改</a> <a class="button border-red" href="javascript:void(0)" onclick="return del(<?php echo $v['goods_id']?>)"><span class="icon-trash-o" ></span> 删除</a> </div></td>

                </tr>
                <?php }?>
            <?php }?>
            <tr>
                <td colspan="8"><div class="pagelist">      <?php

                        echo LinkPager::widget([
                            'pagination' => $pages,
                        ]);
                        ?> </div></td>
            </tr>


        </table>
    </div>

<script type="text/javascript">
    function del(goods_id,mid){

        if(confirm("您确定要删除吗?")){
            var url="?r=goods/bel";

            $.get(url,{goods_id:goods_id},function(mms){

                if(mms)
                {
                    location.reload();
                }
            })
        }
    }
    //搜索
    function changesearch(){

    }


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

    //批量排序
    function sorts(){
        var Checkbox=false;
        $("input[name='id[]']").each(function(){
            if (this.checked==true) {
                Checkbox=true;
            }
        });
        if (Checkbox){

            $("#listform").submit();
        }
        else{
            alert("请选择要操作的内容!");
            return false;
        }
    }


    //批量首页显示
    function changeishome(o){
        var Checkbox=false;
        $("input[name='id[]']").each(function(){
            if (this.checked==true) {
                Checkbox=true;
            }
        });
        if (Checkbox){

            $("#listform").submit();
        }
        else{
            alert("请选择要操作的内容!");

            return false;
        }
    }

    //批量推荐
    function changeisvouch(o){
        var Checkbox=false;
        $("input[name='id[]']").each(function(){
            if (this.checked==true) {
                Checkbox=true;
            }
        });
        if (Checkbox){


            $("#listform").submit();
        }
        else{
            alert("请选择要操作的内容!");

            return false;
        }
    }

    //批量置顶
    function changeistop(o){
        var Checkbox=false;
        $("input[name='id[]']").each(function(){
            if (this.checked==true) {
                Checkbox=true;
            }
        });
        if (Checkbox){

            $("#listform").submit();
        }
        else{
            alert("请选择要操作的内容!");

            return false;
        }
    }


    //批量移动
    function changecate(o){
        var Checkbox=false;
        $("input[name='id[]']").each(function(){
            if (this.checked==true) {
                Checkbox=true;
            }
        });
        if (Checkbox){

            $("#listform").submit();
        }
        else{
            alert("请选择要操作的内容!");

            return false;
        }
    }

    //批量复制
    function changecopy(o){
        var Checkbox=false;
        $("input[name='id[]']").each(function(){
            if (this.checked==true) {
                Checkbox=true;
            }
        });
        if (Checkbox){
            var i = 0;
            $("input[name='id[]']").each(function(){
                if (this.checked==true) {
                    i++;
                }
            });
            if(i>1){
                alert("只能选择一条信息!");
                $(o).find("option:first").prop("selected","selected");
            }else{

                $("#listform").submit();
            }
        }
        else{
            alert("请选择要复制的内容!");
            $(o).find("option:first").prop("selected","selected");
            return false;
        }
    }

</script>
</body>
</html>