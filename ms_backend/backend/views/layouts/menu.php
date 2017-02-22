<?php
use yii\helpers\Url;
?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>后台管理中心</title>
    <link rel="stylesheet" href="css/pintuer.css">
    <link rel="stylesheet" href="css/admin.css">
    <script src="js/jquery.js"></script>
</head>
<body style="background-color:#f2f9fd;">
<div class="header bg-main">
    <div class="logo margin-big-left fadein-top">
        <h1><img src="images/y.jpg" class="radius-circle rotate-hover" height="50" alt="" />后台管理中心</h1>
    </div>
    <div class="head-l"><a class="button button-little bg-green" href="" target="_blank"><span class="icon-home"></span> 前台首页</a> &nbsp;&nbsp;<a href="##" class="button button-little bg-blue"><span class="icon-wrench"></span> 清除缓存</a> &nbsp;&nbsp;<a class="button button-little bg-red" href="?r=index/logout"><span class="icon-power-off"></span> 退出登录</a> </div>
</div>
<div class="leftnav">
    <div class="leftnav-title"><strong><span class="icon-list"></span>菜单列表</strong></div>
    <h2><span class="icon-pencil-square-o"></span>商品管理</h2>
    <ul style="display:none">
        <li><a href="<?php echo Url::toRoute(['goods/index']);?>"><span class="icon-caret-right"></span>商品展示</a></li>
        <li><a href="<?php echo Url::toRoute(['goods/show']);?>"><span class="icon-caret-right"></span>添加商品</a></li>
        <li><a href="<?php echo Url::toRoute(['goodsattr/type']);?>"><span class="icon-caret-right"></span>商品类型</a></li>
        <li><a href="<?php echo Url::toRoute(['recycle/index']);?>"><span class="icon-caret-right"></span>回收站</a></li>
    </ul>
    <h2><span class="icon-pencil-square-o"></span>分类管理</h2>
    <ul style="display:none">
        <li><a href="<?php echo Url::toRoute(['classification/add']);?>"><span class="icon-caret-right"></span>分类添加</a></li>
    </ul>
    <h2><span class="icon-pencil-square-o"></span>会员管理</h2>
    <ul style="display:none">
        <li><a href="<?php echo Url::toRoute(['users/index']);?>"><span class="icon-caret-right"></span>会员展示</a></li>
        <li><a href="<?php echo Url::toRoute(['users/add']);?>"><span class="icon-caret-right"></span>会员添加</a></li>
    </ul>
    <h2><span class="icon-pencil-square-o"></span>订单管理</h2>
    <ul style="display:none">

        <li><a href="<?php echo Url::toRoute(['order/index']);?>"><span class="icon-caret-right"></span>未支付订单列表</a></li>
        <li><a href="<?php echo Url::toRoute(['order/orderadd']);?>"><span class="icon-caret-right"></span>订单添加</a></li>
        <li><a href="<?php echo Url::toRoute(['order/historylist']);?>"><span class="icon-caret-right"></span>发货订单</a></li>
        <li><a href="<?php echo Url::toRoute(['order/exitlist']);?>"><span class="icon-caret-right"></span>退款申请列表</a></li>
    </ul>
    <h2><span class="icon-pencil-square-o"></span>文章管理</h2>
    <ul style="display:none">

        <li><a href="<?php echo Url::toRoute(['bowen/show']);?>"><span class="icon-caret-right"></span>文章列表</a></li>
        <li><a href="<?php echo Url::toRoute(['bowen/add']);?>"><span class="icon-caret-right"></span>添加文章</a></li>
    </ul>
    <h2><span class="icon-pencil-square-o"></span>相册管理</h2>
    <ul style="display:none">

        <li><a href="<?php echo Url::toRoute(['aibum/index']);?>"><span class="icon-caret-right"></span>相册展示</a></li>
    </ul>
    <h2><span class="icon-pencil-square-o"></span>形象设计管理</h2>
    <ul style="display:none">
        <li><a href="?r=design/index&status=3&keywords="><span class="icon-caret-right"></span>订单详情</a></li>
    </ul>
    <h2><span class="icon-pencil-square-o"></span>活动管理</h2>
    <ul style="display:none">

        <li><a href="<?php echo Url::toRoute(['activity/index']);?>"><span class="icon-caret-right"></span>活动列表</a></li>
        <li><a href="<?php echo Url::toRoute(['activity/add']);?>"><span class="icon-caret-right"></span>添加活动</a></li>
    </ul>
    <h2><span class="icon-pencil-square-o"></span>评论管理</h2>
    <ul style="display:none">

        <li><a href="?r=comment/index&status=2&keywords="><span class="icon-caret-right"></span>评论列表</a></li>
    </ul>
    <h2><span class="icon-pencil-square-o"></span>友情链接管理</h2>
    <ul style="display:none">

        <li><a href="<?php echo Url::toRoute(['friendlink/addlist']);?>"><span class="icon-caret-right"></span>添加友情链接</a></li>
        <li><a href="<?php echo Url::toRoute(['friendlink/index']);?>"><span class="icon-caret-right"></span>友情链接列表</a></li>
    </ul>
    <h2><span class="icon-user"></span>权限管理</h2>
    <ul style="display:none">
        <li><a href="<?php echo URL::toRoute(['rbac/list'])?>"><span class="icon-caret-right"></span>分配权限</a></li>
        <li><a href="<?php echo URL::toRoute(['rbac/role'])?>"><span class="icon-caret-right"></span>角色添加</a></li>
        <li><a href="<?php echo URL::toRoute(['rbac/rb'])?>"><span class="icon-caret-right"></span>角色分配权限</a></li>
        <li><a href="<?php echo URL::toRoute(['rbac/fenpei'])?>"><span class="icon-caret-right"></span>用户分配角色</a></li>
<!--        <li><a href="--><?php //echo URL::toRoute(['rbac/regisssster'])?><!--"><span class="icon-caret-right"></span>添加管理员</a></li>-->
        <!--    <li><a href="add.html" target="right"><span class="icon-caret-right"></span>添加内容</a></li>-->
        <!--    <li><a href="cate.html" target="right"><span class="icon-caret-right"></span>分类管理</a></li>        -->
    </ul>

</div>
<script type="text/javascript">
    $(function(){
        $(".leftnav h2").click(function(){
            $(this).next().slideToggle(200);
            $(this).toggleClass("on");
        })
        $(".leftnav ul li a").click(function(){
            $("#a_leader_txt").text($(this).text());
            $(".leftnav ul li a").removeClass("on");
            $(this).addClass("on");
        })
    });
</script>
<ul class="bread">
    <li><a href="?r=index/index" target="right" class="icon-home"> 首页</a></li>
    <li><a href="##" id="a_leader_txt">网站信息</a></li>
    <li><b>当前语言：</b><span style="color:red;">中文</php></span>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;切换语言：<a href="##">中文</a> &nbsp;&nbsp;<a href="##">英文</a> </li>
</ul>
<div class="admin">
    <?= $content ?>
    <!-- <iframe scrolling="auto" rameborder="0" src="info.html" name="right" width="100%" height="100%"></iframe> -->
</div>
<div style="text-align:center;">
    <p>来源:<a href="http://www.aspku.com/" target="_blank">源码之家</a></p>
</div>
</body>
</html>