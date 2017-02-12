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
        <ul class="search" style="padding-left:10px;">
            <li>
                <a class="button border-main icon-plus-square-o" href="?r=classification/add"> 添加分类</a>

            </li>
            <li>

                <?php

                $form=ActiveForm::begin([
                    'action'=>Url::toRoute(['doctor/show']),
                    'method'=>'get',
                    'class'=>'forms'
                ]);

//                echo Html::input('text', 'd_name', '', ['class' =>'input']);
//                echo Html::input('text', 'num', , ['class' =>'num']);
//                echo Html::input('text', 'd_time', $data, ['class' =>'datatime']);
//                echo '&nbsp';

                echo Html::style('.input { width:250px; line-height:17px;display:inline-block }');
                echo Html::submitButton('搜索', ['class' => 'button border-main icon-search']);
                ActiveForm::end();
                ?>
                <!--                    <form action="?r=doctor/sou" method="get">-->
                <!--                    <input type="text" placeholder="请输入搜索关键字" name="d_name" class="input" style="width:250px; line-height:17px;display:inline-block" />-->
                <!--                   <input type="submit" value="搜索"  class="button border-main icon-search" />-->
                <!--                    </form>-->
            </li>

        </ul>
    </div>
    <table class="table table-hover text-center">
        <tr>
            <th width="100" style="text-align:left; padding-left:20px;">ID</th>
            <th>医生形象</th>
            <th>医生形证件</th>
            <th>医生专业</th>
            <th>医生级别</th>
            <th>医生注册时间</th>
            <th>就医年数</th>
            <th width="310">操作</th>
        </tr>

        <volist name="list" id="vo">
            <tbody class="huan">
                    <tr>
                        <td>医生形证件</td>
                        <td>医生专业</td>
                        <td>医生级别</td>
                        <td>医生专业</td>
                        <td>医生级别</td>
                        <td>医生专业</td>
                        <td>医生级别</td>
                        <td><div class="button-group"> <a class="button border-main" href="javascript:void(0)" onclick="return shen()"><span class="icon-edit"></span> 取消医生审核</a> <a class="button border-red" href="javascript:void(0)" onclick="return del()"><span class="icon-trash-o"></span> 删除</a> </div></td>
                    </tr>
            </tbody>
            <tr>

            </tr>
    </table>
</div>

<script type="text/javascript">
    $("form:first").submit(function(){
        var mydate = new Date();
        var t=mydate.getTime()/1000;

        var time = $('.datatime').val();
//        alert(time);
        if(time == ''){
            $('.datatime').val(t);
        }
        else{

            if(t-time<5)
            {
                alert('五秒钟后在搜素！');
                return false;
            }
            else{

                var ti=$('.num').val();
                if(ti=="")
                {
                    var tr=$('.num').val(+1);
                    alert(tr)
                    return true;
                }







            }
        }


    });


    //单个删除
    function del(d_id){
        if(confirm("您确定要删除吗?")){

            var url="?r=doctor/del";
            $.get(url,{'d_id':d_id},function(mms)
            {
                if(mms==1)
                {
                    location.reload();
                }
            })
        }
    }
    //审核
    function shen(d_id){
        if(confirm("确定审核通过吗?")){

            var url="?r=doctor/del";
            $.get(url,{'d_id':d_id},function(mms)
            {
                if(mms==1)
                {
                    location.reload();
                }
            })
        }
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